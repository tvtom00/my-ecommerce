@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="container">

    <div class="card">

        @if($product->image)
            <img
                src="{{ asset('storage/' . $product->image) }}"
                alt="{{ $product->name }}"
                style="width:100%; max-width:500px; height:350px; object-fit:contain; border-radius:10px;"
            >
        @else
            <div style="
                width:100%;
                max-width:500px;
                height:350px;
                background:#f1f1f1;
                display:flex;
                align-items:center;
                justify-content:center;
                border-radius:10px;
                margin-bottom:20px;
            ">
                No Image
            </div>
        @endif

        <h1>{{ $product->name }}</h1>

        @if($product->category)
            <p>
                <strong>Category:</strong>
                {{ $product->category->name }}
            </p>
        @endif

        <div style="margin:15px 0;">
            <span style="font-size:28px; font-weight:bold;">
                ৳{{ number_format($product->price, 2) }}
            </span>

            @if($product->old_price)
                <span style="
                    margin-left:10px;
                    text-decoration:line-through;
                    color:#777;
                ">
                    ৳{{ number_format($product->old_price, 2) }}
                </span>
            @endif
        </div>

        @if($product->stock > 0)
            <p>
                <strong>Stock:</strong>
                {{ $product->stock }}
            </p>
        @else
            <p style="color:red;">
                <strong>Out of Stock</strong>
            </p>
        @endif

        @if($product->description)
            <div style="margin:20px 0;">
                <h3>Description</h3>
                <p>{{ $product->description }}</p>
            </div>
        @endif

        @if($product->stock > 0)
            <a
                href="{{ route('orders.create', $product->slug) }}"
                class="btn"
            >
                🛒 Order Now
            </a>
        @else
            <button
                type="button"
                class="btn"
                disabled
                style="opacity:.5;"
            >
                Out of Stock
            </button>
        @endif

        <br><br>

        <a href="{{ route('products.index') }}">
            ← Back to Products
        </a>

    </div>

    @if($relatedProducts->count())
        <div style="margin-top:40px;">
            <h2>Related Products</h2>

            <div class="product-grid">

                @foreach($relatedProducts as $related)
                    <div class="card">

                        @if($related->image)
                            <img
                                src="{{ asset('storage/' . $related->image) }}"
                                alt="{{ $related->name }}"
                                style="width:100%; height:200px; object-fit:contain;"
                            >
                        @endif

                        <h3>{{ $related->name }}</h3>

                        <p>
                            ৳{{ number_format($related->price, 2) }}
                        </p>

                        <a
                            href="{{ route('products.show', $related->slug) }}"
                            class="btn"
                        >
                            View Product
                        </a>

                    </div>
                @endforeach

            </div>
        </div>
    @endif

</div>
@endsection
