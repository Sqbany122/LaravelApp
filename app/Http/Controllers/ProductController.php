<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Categories;
use Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(6);
        $cats = Categories::get();
        return view('products.index', compact('products', 'cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        $cats = Categories::all()->pluck('category_name', 'category_name');

        if (Auth::check() && Auth::user()->hasAnyRole('admin')) {
            return view('products.create', compact('cats'));
        } else {
            return redirect('/products');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function search()
    {
        $search = \Request::get('search');
        $cats = Categories::get();
        $products = Product::where('product_name', 'like', '%'.$search.'%')->paginate(6);
        $pagination = $products->appends (array (
            'search' => \Request::get('search')
        ));
        return view('products.index', compact('products', 'cats', 'search'))->withQuery($search);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function categories($id)
    {
        $cats = Categories::get();
        $specifyCategory = Categories::select('category_name')->where('id', $id)->get();
        $products = Product::select('products.id', 'products.product_name', 'products.price', 'products.description')
                    ->join('categories', 'categories.category_name', '=', 'products.category_name')
                    ->where('categories.id', $id)->paginate(6);             
        return view('products.index', compact('products', 'cats', 'specifyCategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'product_name' => 'required',
            'price'  => 'required',
            'description' => 'required',
            'category_name' => 'required'           
        ]);
        
        // Create new product
        $product = new Product;
        $product->product_name = $request->input('product_name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->category_name = $request->input('category_name');
        $product->save();
        
        return redirect('/products')->with('success', 'Dodano nowy produkt');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('products.product')->with('product', $product); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::find($id);
        $cats = Categories::all()->pluck('category_name', 'category_name');
        if (Auth::check() && Auth::user()->hasAnyRole('admin')) {
            return view('products.edit', compact('products', 'cats'));
        } else {
            return redirect('/products');
        }     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'product_name' => 'required',
            'price'  => 'required',
            'description' => 'required',
            'category_name' => 'required'      
        ]);

        // Create new product
        $product = Product::find($id);
        $product->product_name = $request->input('product_name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->category_name = $request->input('category_name');
        $product->save();
        
        return redirect('/products')->with('success', 'Zaktualizowano prpdukt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect('/products')->with('success', 'Produkt został usunięty');
    }
}
