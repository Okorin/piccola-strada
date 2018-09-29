@extends('layouts.master')

@section('title', 'Produkt aendern')
@section('page-title', 'Piccola Strada Lingen')
@section('page-description')
Pizzeria &amp; Kebaphaus
an der Elisabethstraße 1 &middot; 49808 Lingen (Ems)
@endsection

@section('content')

  <form method="POST" action="/ingredients/{{ $ingredient->id }}">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" id="name" value="{{ $ingredient->name }}">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection