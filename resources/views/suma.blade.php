@extends('layouts.app')
@section('content')

    <h2>Sumar dos números</h2>
    <form action="/suma" method="POST">
        @csrf
        <label for="num1">Número 1:</label>
        <input type="number" name="num1" id="num1" required>
        <br>

        <label for="num2">Número 2:</label>
        <input type="number" name="num2" id="num2" required>
        <br>

        <button type="submit">Sumar</button>
    </form>
    <br>

        @if(isset($res))
            <h3>Resultado de la suma: {{ $res }}</h3>
        @endif
    
@endsection