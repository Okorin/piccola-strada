@extends('layouts.master')

@section('title', 'Zutatenliste')
@section('page-title', 'Piccola Strada Lingen')
@section('page-description')
Pizzeria &amp; Kebaphaus
an der Elisabethstraße 1 &middot; 49808 Lingen (Ems)
@endsection
@section('content')
    <a href="/categories/{{ $category->id }}/edit">{{ $category->name }}</a>
@endsection