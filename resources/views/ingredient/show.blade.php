@extends('layouts.master')

@section('title', 'Zutatenliste')
@section('page-title', 'Piccola Strada Lingen')
@section('page-description')
Pizzeria &amp; Kebaphaus
an der Elisabethstraße 1 &middot; 49808 Lingen (Ems)
@endsection
@section('content')
    <a href="/ingredients/{{ $ingredient->id }}/edit">{{ $ingredient->name }}</a>
@endsection