@extends('layouts.master')

@section('title', 'Neues Produkt')
@section('page-title', 'Piccola Strada Lingen')
@section('page-description')
Pizzeria &amp; Kebaphaus
an der Elisabethstraße 1 &middot; 49808 Lingen (Ems)
@endsection

@section('content')

    <form method="POST" action="/products">
        {{ csrf_field() }}

  <div class="form-group">
    <label for="productName">Name</label>
    <input type="text" class="form-control" name="productName" id="productName">
  </div>
  <div class="form-group">
    <label for="category">Category</label>
    <select class="form-control" name="category" id="category">
        @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
</div>
    @foreach($sizes as $size)
   <div class="form-group">
        <label for="size[{{ $size->id }}]">Groesse {{ $size->name }}</label>
        <input type="text" class="form-control" name="size[{{ $size->id }}]" id="size[{{ $size->id }}]">
   </div>
    @endforeach
    @foreach($ingredients as $ingredient)
      <div class="form-check-inline">
        <input type="checkbox" class="form-check-input" name="ingredient[{{ $ingredient->id }}]" id="ingredient[{{ $ingredient->id }}]">
        <label class="form-check-label" for="ingredient[{{ $ingredient->id }}]">{{$ingredient->name}}</label>
      </div>
    @endforeach
    <hr>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection