@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container mt-5">
    @if (!empty($products))
        <h1 class="text-center mb-5">Edytuj produkt - {{ $products->product_name }}</h1>
        {!! Form::open(['action' => ['ProductController@update', $products->id], 'method' => 'POST']) !!}
            <div class="form-group">
                {{ Form::label('product_name', 'Nazwa produktu') }}
                {{ Form::text('product_name', $products->product_name, ['class' => 'form-control', 'placeholder' => 'Nazwa produktu']) }}
            </div>
            <div class="form-group">
                {{ Form::label('price', 'Cena produktu') }}
                {{ Form::number('price', $products->price, ['step' => 'any', 'class' => 'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('discounted_price', 'Cena produktu po obniżce') }}
                {{ Form::number('discounted_price', $products->discounted_price, ['step' => 'any', 'class' => 'form-control', 'placeholder' => '0,00']) }}
            </div>
            <div class="form-group">
                {{ Form::label('description', 'Opis produktu') }}
                {{ Form::textarea('description', $products->description, ['rows' => '5', 'class' => 'form-control', 'placeholder' => 'Opis produktu']) }}
            </div>
            <div class="form-group">
                {!! Form::select('category_name', $cats, $products->category_name, ['class' => 'form-control']) !!}
            </div>
            {{ Form::hidden('_method', 'PUT') }}
            {{ Form::submit('Zapisz Produkt', ['class' => 'btn btn-primary mt-3 rounded-0']) }}
            {{ Form::hidden('url',Request::url()) }}
        {!! Form::close() !!}
        <a href="{{ url('/products') }}" class="btn btn-primary mt-3 rounded-0 text-light">Wróć</a>
    @else
        <h1 class="text-center mb-5">Brak produktu do edycji</h1>
        <a href="{{ url('/products') }}" class="btn btn-primary mt-3 rounded-0 text-light">Wróć</a>
    @endif    
    </div>
</div>
@endsection