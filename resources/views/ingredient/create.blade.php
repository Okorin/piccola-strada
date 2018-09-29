@extends('layouts.master')

@section('title', 'Neues Produkt')
@section('page-title', 'Piccola Strada Lingen')
@section('page-description')
Pizzeria &amp; Kebaphaus
an der Elisabethstraße 1 &middot; 49808 Lingen (Ems)
@endsection

@section('content')

    <form method="POST" action="/ingredients">
        {{ csrf_field() }}

  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" id="name">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection