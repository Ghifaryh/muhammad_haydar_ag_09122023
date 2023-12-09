@extends('layouts.app')

@section('main')
    <h1 class="text-3xl font-bold underline">
        Hello world!
    </h1>

    <div class="container">
        <a href="{{ route('tugas.pertama') }}">Tugas Pertama</a>
        <a href="{{ route('tugas.kedua') }}">Tugas Kedua</a>
    </div>
@endsection
