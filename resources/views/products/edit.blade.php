@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container mt-5">
        <h1 class="text-center mb-5">Edytuj produkt - {{ $product->product_name }}</h1>
        {!! Form::open(['action' => ['ProductController@update', $product->id], 'method' => 'POST']) !!}
            <div class="form-group">
                {{ Form::label('product_name', 'Nazwa produktu') }}
                {{ Form::text('product_name', $product->product_name, ['class' => 'form-control', 'placeholder' => 'Nazwa produktu']) }}
            </div>
            <div class="form-group">
                {{ Form::label('price', 'Cena produktu') }}
                {{ Form::number('price', $product->price, ['step' => 'any', 'class' => 'form-control', 'placeholder' => 'Cena produktu']) }}
            </div>
            <div class="form-group">
                {{ Form::label('description', 'Opis produktu') }}
                {{ Form::textarea('description', $product->description, ['rows' => '5', 'class' => 'form-control', 'placeholder' => 'Opis produktu']) }}
            </div>
            {{ Form::hidden('_method', 'PUT') }}
            {{ Form::submit('Zapisz Produkt', ['class' => 'btn btn-primary mt-3 rounded-0']) }}
        {!! Form::close() !!}
        <a href="{{ url('/products') }}" class="btn btn-primary mt-3 rounded-0 text-light">Wróć</a>
    </div>
</div>
@endsection