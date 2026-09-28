@extends('layouts.app')

@section('title', $product->name . ' - My Ecommerce')

@section('content')

<div class="container">

    <div class="detail">

        <div class="detail-grid">

            <div>

                @if($product->image)

                    <img
                        src="{{ asset('storage/' . $product->image) }}"
                        alt="{{ $product->name }}"
                        class="detail-image"
                    >

                @else

                    <div class="detail-image"></div>

                @endif

            </div>

            <div>

                <h1 class="detail-title">
                    {{ $product->name }}
                </h1>

                <div class="detail-price">
                    ৳{{ number_format($product->price, 2) }}

                    @if($product->old_price)
                        <span class="old-price">
                            ৳{{ number_format($product->old_price, 2) }}
                        </span>
                    @endif
                </div>

                <p>
                    @if($product->stock > 0)
                        <strong style="color: green;">
                            In Stock
                        </strong>
                    @else
                        <strong style="color: red;">
                            Out of Stock
                        </strong>
                    @endif
                </p>

                @if($product->category)

                    <p>
                        Category:
                        <strong>{{ $product->category->name }}</strong>
                    </p>

                @endif

                <div class="description">
                    {!! nl2br(e($product->description)) !!}
                </div>

                @if($product->stock > 0)

                    <a
                        href="#"
                        class="btn"
                    >
                        🛒 Order Now
                    </a>

                @endif

            </div>

        </div>

    </div>

</div>

@endsection
