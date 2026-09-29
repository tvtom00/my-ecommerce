@extends('layouts.app')

@section('title', 'Products')

@section('content')

<div class="container">

    <h1>Products</h1>

    <div class="product-grid">

        @forelse($products as $product)

            <div class="card">

                @if($product->image)
                    <img
                        src="{{ asset('storage/' . $product->image) }}"
                        alt="{{ $product->name }}"
                        style="width:100%; height:220px; object-fit:contain;"
                    >
                @else
                    <div style="
                        width:100%;
                        height:220px;
                        background:#f1f1f1;
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        border-radius:10px;
                    ">
                        No Image
                    </div>
                @endif

                <h2>{{ $product->name }}</h2>

                <p>
                    <strong style="font-size:20px;">
                        ৳{{ number_format($product->price, 2) }}
                    </strong>

                    @if($product->old_price)
                        <span style="
                            margin-left:8px;
                            color:#777;
                            text-decoration:line-through;
                        ">
                            ৳{{ number_format($product->old_price, 2) }}
                        </span>
                    @endif
                </p>

                @if($product->stock > 0)

                    <a
                        href="{{ route('products.show', ['slug' => $product->slug]) }}"
                        class="btn"
                    >
                        View Product
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

            </div>

        @empty

            <p>No products found.</p>

        @endforelse

    </div>

    <div style="margin-top:30px;">
        {{ $products->links() }}
    </div>

</div>

@endsection
