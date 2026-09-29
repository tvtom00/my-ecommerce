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
                        height:220px;
                        background:#f1f1f1;
                        display:flex;
                        align-items:center;
                        justify-content:center;
                    ">
                        No Image
                    </div>
                @endif

                <h2>{{ $product->name }}</h2>

                <p>
                    <strong>
                        ৳{{ number_format($product->price, 2) }}
                    </strong>

                    @if($product->old_price)
                        <span style="
                            text-decoration:line-through;
                            color:#777;
                            margin-left:8px;
                        ">
                            ৳{{ number_format($product->old_price, 2) }}
                        </span>
                    @endif
                </p>

                <a
                    href="{{ url('/product/' . $product->slug) }}"
                    class="btn"
                >
                    View Product
                </a>

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
