@extends('layouts.master')

@section('title', 'Produkt aendern')
@section('page-title', 'Piccola Strada Lingen')
@section('page-description')
Pizzeria &amp; Kebaphaus
an der Elisabethstraße 1 &middot; 49808 Lingen (Ems)
@endsection

@section('content')

  <form method="POST" action="/categories/{{ $category->id }}">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" id="name" value="{{ $category->name }}">
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <input type="text" class="form-control" name="description" id="description" value="{{ $category->description }}">
  </div>
  <div class="form-group">
    <label for="ingred_word">Ingredient descriptor</label>
    <input type="text" class="form-control" name="ingred_word" id="ingred_word" value="{{ $category->ingred_word }}">
  </div>
  <div class="form-group">
    <label for="priority">Priority</label>
    <input type="text" class="form-control" name="priority" id="priority" value="{{ $category->priority }}">
  </div>
    @foreach($sizes as $size)
      <div class="form-check-inline">
        <input type="checkbox" class="form-check-input" name="size[{{ $size->id }}]" id="size[{{ $size->id }}]" 
        @if($category->sizes->contains('id',$size->id)) checked @endif>
        <label class="form-check-label" for="size[{{ $size->id }}]">{{$size->name}}</label>
      </div>
    @endforeach
      <hr>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection