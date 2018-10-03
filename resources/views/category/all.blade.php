@extends('layouts.master')


@section('title', 'Karte')
@section('page-title', 'Piccola Strada Lingen')
@section('page-description')
Pizzeria &amp; Kebaphaus
an der Elisabethstraße 1 &middot; 49808 Lingen (Ems)
@endsection
@section('content')
    <a href="/categories/create">Neu</a>
    @foreach ( $categories as $category )
    <div class="row">
        {{ $category->priority }}. <a href="categories/{{ $category->id }}/edit">{{ $category->name }}</a><br>
    </div>
    @endforeach
       <!-- /container -->
@endsection
