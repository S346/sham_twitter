@extends('layout')

@section('content')
    {{ $tweet->user->name }}
    {{ $tweet->body }}
@endsection