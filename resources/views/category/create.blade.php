@extends('layouts.master')

@section('title', 'Neues Produkt')
@section('page-title', 'Piccola Strada Lingen')
@section('page-description')
Pizzeria &amp; Kebaphaus
an der Elisabethstraße 1 &middot; 49808 Lingen (Ems)
@endsection

@section('content')

    <form method="POST" action="/categories">
        {{ csrf_field() }}

  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" id="name">
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <input type="text" class="form-control" name="description" id="description">
  </div>
  <div class="form-group">
    <label for="ingred_word">Ingredient descriptor</label>
    <input type="text" class="form-control" name="ingred_word" id="ingred_word">
  </div>
  <div class="form-group">
    <label for="priority">Priority</label>
    <input type="text" class="form-control" name="priority" id="priority">
  </div>
  @foreach($sizes as $size)
    <div class="form-check-inline">
      <input type="checkbox" class="form-check-input" name="size[{{ $size->id }}]" id="size[{{ $size->id }}]">
      <label class="form-check-label" for="size[{{ $size->id }}]">{{$size->name}}</label>
    </div>
  @endforeach
    <hr>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection