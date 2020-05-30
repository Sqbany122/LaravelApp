@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container mt-5">
        @if (request()->is('products/category/*'))
            @foreach ($specifyCategory as $category)
                <h1 class="text-center mb-5">Kategoria - {{ $category->category_name }}</h1>
            @endforeach
        @elseif (request()->is('products/search*'))
            <h1 class="text-center mb-5">Wyszukiwana fraza - {{ $search }}</h1>
        @else
            <h1 class="text-center mb-5">Wszystkie produkty</h1>
        @endif
        @if (count($cats) > 0)
        <button class="w-100 btn border rounded-0 btnTransition btnExpandCategories" id="expandCategories" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" onclick="onClickCategoriesBtn()">
            Kliknij aby pokazać dostępne kategorie
        </button>
        <div class="collapse" id="collapseExample">
            <div class="d-flex flex-wrap justify-content-between">
                @foreach ($cats as $categories)
                    <a href="{{ url('/products/category') }}/{{ $categories->id }}" id="{{ $categories->category_name }}" class="btn border btnCategory rounded-0 mt-3">
                        {{ $categories->category_name }}
                    </a>
                @endforeach
            </div>
        </div>
        @endif
        <div class="w-25 mt-4 border text-center">
            <span>Dostępnych produktów: {{ $products->total() }}</span>
        </div>
        <table class="table table-bordered mt-2">
            <thead class="text-center">
                <tr class="font-weight-bold">
                    <td>Nazwa produktu</td>
                    <td>Cena</td>
                    <td colspan=3>Akcje</td>
                </tr>
            </thead>
            <tbody class="text-center">
                @if (count($products) > 0)
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->product_name }}</td>
                            @if ($product->discounted_price == NULL)
                                <td>{{ $product->price }}zł</td>
                            @else
                                <td><span class="normalPrice">{{ $product->price }}zł</span><span class="discountedPrice">{{ $product->discounted_price }}zł</span></td>
                            @endif
                            <td><a class="btn btn-success rounded-0 text-light" href="{{ url('/products') }}/{{$product->id}}">Szczegóły</a></td>
                            @if (Auth::check() && Auth::user()->hasAnyRole('admin'))
                                <td><a class="btn btn-primary rounded-0 text-light" href="{{ url('/products') }}/{{$product->id}}/edit">Edytuj</a></td>
                                <td>
                                {!! Form::open(['action' => ['ProductController@destroy', $product->id], 'method' => 'POST']) !!}
                                    {{ Form::hidden('_method', 'DELETE') }}
                                    {{ Form::submit('Usuń', ['class' => 'btn btn-danger rounded-0']) }}
                                {!! Form::close() !!}
                                </td>
                            @endif
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan=4>Brak produktów</td>
                    </tr>
                @endif
            </tbody>
        </table>
        <div class="row">
            <div class="col-12 text-center">
                {{ $products->render() }}
            </div>
        </div>
        @if (request()->is('products/category/*') || request()->is('products/search*'))
            <a href="{{ url('/products') }}" class="btn btn-primary mt-3 rounded-0 text-light">Wróć</a>
        @endif
    </div>
</div>
<script>
    var x = true;
    function onClickCategoriesBtn() {
        if (x === true) {
            document.getElementById('expandCategories').innerHTML = 'Schowaj listę kategorii';
            document.getElementById('expandCategories').classList.add('btnClicked');
            x = false;
        } else {
            document.getElementById('expandCategories').innerHTML = 'Kliknij aby pokazać dostępne kategorie';
            document.getElementById('expandCategories').classList.remove('btnClicked');
            x = true;
        }
    }
</script>
@endsection