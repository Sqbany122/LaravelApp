@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container mt-5">
        <h1 class="text-center mb-5">Dodaj nowy produkt</h1>
        {!! Form::open(['action' => 'ProductController@store', 'method' => 'POST']) !!}
            <div class="form-group">
                {{ Form::label('product_name', 'Nazwa produktu') }}
                {{ Form::text('product_name', '', ['class' => 'form-control', 'placeholder' => 'Nazwa produktu']) }}
            </div>
            <div class="form-group">
                {{ Form::label('price', 'Cena produktu') }}
                {{ Form::number('price', '0.00', ['step' => 'any', 'class' => 'form-control', 'placeholder' => 'Cena produktu']) }}
            </div>
            <div class="form-group">
                {{ Form::label('description', 'Opis produktu') }}
                {{ Form::textarea('description', '', ['rows' => '5', 'class' => 'form-control', 'placeholder' => 'Opis produktu']) }}
            </div>
            <div class="form-group">
                {!! Form::select('category_name', $cats, null, ['class' => 'form-control', 'placeholder' => 'Wybierz kategorie produktu']) !!}
            </div>
            {{ Form::submit('Dodaj produkt', ['class' => 'btn btn-primary mt-3 rounded-0']) }}
        {!! Form::close() !!}
        <a href="{{ url('/products') }}" class="btn btn-primary mt-3 rounded-0 text-light">Wróć</a>
    </div>
</div>
@endsection