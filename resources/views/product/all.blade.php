@extends('layouts.master')


@section('title', 'Karte')
@section('page-title', 'Piccola Strada Lingen')
@section('page-description')
Pizzeria &amp; Kebaphaus
an der Elisabethstraße 1 &middot; 49808 Lingen (Ems)
@endsection
@section('content')
    <div class="row">
    @foreach ( $categories as $key => $category )
    @if ($key !== 0)
    <div class="row">
    @endif
    <div class="col-md-8">
        <div class="card mb4 box-shadow p-2 mt-1">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="p-2 d-inline-block" id="{{ $category->id }}-heading">{{ $category->name }} </h2>
                <a href="#page-header-main"><h3 class="d-inline-block badge badge-dark">nach oben</h4></a>
            </div>
            <p>{{ $category->description }}</p>
            <table class="table table-hover table-sm table-borderless">
                <colgroup>
                    <col class="w-5">
                    <col style="width: 65%">
                    @php $width = $category->sizes->count(); 
                    if($width !== 0){ $width = floor(30 / $width); } @endphp
                    @foreach($category->sizes as $size)
                    <col style="width: {{ $width }}%">
                    @endforeach
                </colgroup>
                <tr>
                    <td></td>
                    <th>Name</th>
                    @foreach($category->sizes as $size)
                    <th class="text-center">{{ $size->name }}</th>
                    @endforeach
                </tr>
            @foreach($products[$category->id] as $product)
                <tr>
                    <td><span class="font-weight-bold">{{ $product->id }}.</span></td>
                    <td><span class="font-weight-bold" id="product-{{ $product->id }}-ref">{{ $product->name }}</span>
                    @if (sizeof($product->ingredients) !== 0)
                    <br />
                    <small>{{ $product->category->ingred_word }}
                    @for ($i=0; $i < sizeof($product->ingredients); $i++)
                        {{ $product->ingredients[$i]->name }}@if($i !== (sizeof($product->ingredients) - 1)),@endif
                    @endfor
                    </small>
                    @endif
                    </td>
                    @foreach($category->sizes as $size)
                    <td class="text-center">@php $prod = $product->sizes->firstWhere('id', $size->id) @endphp
                        @if($prod !== null and $prod->pivot->price != 0){{ number_format($prod->pivot->price, 2, ',', '.') }} €@endif
                    </td>
                    @endforeach

                </tr>

            @endforeach
            </table>
        </div>
    </div>
    @if ($key !== 0)
        <div class="col-md-4">&nbsp;</div>
    @else
        <div class="col-sm-3 list-group">
    @foreach ( $categories as $category) 
            <a href="#{{ $category->id }}-heading" class="list-group-item list-group-item-action flex-column align-items-star">
                <div class="d-flex w-100 justify-content-between align-items-center">
                    <h5 class="mb-1">{{ $category->name }}</h5><small class="badge badge-dark">{{ $category->products->count() }}</small>
                </div>
            </a>
    @endforeach
        </div>
    @endif
</div>
    @endforeach

        <hr>

      </div> <!-- /container -->
@endsection
