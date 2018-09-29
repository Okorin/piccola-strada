@extends('layouts.master')

@section('title', 'Produkt aendern')
@section('page-title', 'Piccola Strada Lingen')
@section('page-description')
Pizzeria &amp; Kebaphaus
an der Elisabethstraße 1 &middot; 49808 Lingen (Ems)
@endsection

@section('content')

  <form method="POST" action="/products/{{ $product->id }}">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
  <div class="form-group">
    <label for="productName">Name</label>
    <input type="text" class="form-control" name="productName" id="productName" value="{{ $product->name }}">
  </div>
  <div class="form-group">
    <label for="category">Example select</label>
    <select class="form-control" name="category" id="category">
        @foreach ($categories as $category)
        <option @if($category->id == $product->category_id)selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
   </div>
   @foreach($sizes as $size)
   <div class="form-group">
        <label for="size{{ $size->id }}">Groesse {{ $size->name }}</label>
        @php $pro = $product->sizes->firstWhere('id', $size->id);
        @endphp
        <input type="text" class="form-control" name="size[{{ $size->id }}]" id="size[{{ $size->id }}]" value="@if($pro !== null){{ $pro->pivot->price }}@endif">
   </div>
   @endforeach
    @foreach($ingredients as $ingredient)
      <div class="form-check-inline">
        <input type="checkbox" class="form-check-input" name="ingredient[{{ $ingredient->id }}]" id="ingredient[{{ $ingredient->id }}]" 
        @if($product->ingredients->contains('id',$ingredient->id)) checked @endif>
        <label class="form-check-label" for="ingredient[{{ $ingredient->id }}]">{{$ingredient->name}}</label>
      </div>
    @endforeach
    <hr>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection