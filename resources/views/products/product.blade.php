@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container mt-5">
    @if (!empty($product))
        <h1 class="text-center mb-5">Widok produktu - {{ $product->product_name }}</h1>
            <table class="table table-bordered">
                <thead class="text-center">
                    <tr class="font-weight-bold">
                        <td>Nazwa produktu</td>
                        <td>Cena</td>
                        <td>Opis</td>
                        <td>Kategoria</td>
                        @if (Auth::check() && Auth::user()->hasAnyRole('admin'))
                            <td colspan=2>Akcje</td>
                        @endif
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <td>{{ $product->product_name }}</td>
                        @if ($product->discounted_price == NULL)
                            <td>{{ $product->price }}zł</td>
                        @else
                            <td><span class="normalPrice">{{ $product->price }}zł</span><span class="discountedPrice">{{ $product->discounted_price }}zł</span></td>
                        @endif
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->category_name }}</td>
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
                </tbody>
            </table>
        <a href="{{ url('/products') }}" class="btn btn-primary mt-3 rounded-0 text-light">Wróć</a>
    @else
        <h1 class="text-center mb-5">Brak produktu</h1>
        <a href="{{ url('/products') }}" class="btn btn-primary mt-3 rounded-0 text-light">Wróć</a>
    @endif   
    </div>
</div>
@endsection