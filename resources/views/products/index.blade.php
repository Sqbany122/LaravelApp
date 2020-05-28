@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container mt-5">
    <h1 class="text-center mb-5">Wszystkie produkty</h1>
            <table class="table table-bordered">
                <thead class="text-center">
                    <tr class="font-weight-bold">
                        <td>Nazwa produktu</td>
                        <td>Cena</td>
                        <td>Opis</td>
                        <td colspan=3>Akcje</td>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @if (count($products) > 0)
                        @foreach ($products as $product)
                            <tr>
                                <td>{{$product->product_name}}</td>
                                <td>{{$product->price}}zł</td>
                                <td>{{$product->description}}</td>
                                <td><a class="btn btn-primary rounded-0 text-light" href="{{ url('/products') }}/{{$product->id}}">Szczegóły</a></td>
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
    </div>
</div>
@endsection