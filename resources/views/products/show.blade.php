@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="container">

    <div class="detail">

        <div class="detail-grid">

            {{-- Product Image --}}
            <div>
                @if($product->image)
                    <img
                        src="{{ asset('storage/' . $product->image) }}"
                        alt="{{ $product->name }}"
                        class="detail-image"
                    >
                @else
                    <div
                        style="
                            width:100%;
                            height:350px;
                            background:#eee;
                            display:flex;
                            align-items:center;
                            justify-content:center;
                            border-radius:8px;
                        "
                    >
                        No Image
                    </div>
                @endif
            </div>

            {{-- Product Information --}}
            <div>

                <h1 class="detail-title">
                    {{ $product->name }}
                </h1>

                @if($product->category)
                    <p>
                        Category:
                        <strong>{{ $product->category->name }}</strong>
                    </p>
                @endif

                <div class="detail-price">
                    ৳{{ number_format($product->price, 2) }}

                    @if($product->old_price)
                        <span class="old-price">
                            ৳{{ number_format($product->old_price, 2) }}
                        </span>
                    @endif
                </div>

                <p style="margin-top:15px;">
                    @if($product->stock > 0)
                        <strong style="color:green;">
                            In Stock
                        </strong>

                        <br>

                        Available:
                        {{ $product->stock }} pcs
                    @else
                        <strong style="color:red;">
                            Out of Stock
                        </strong>
                    @endif
                </p>

                {{-- Description --}}
                @if($product->description)
                    <div class="description">
                        <h3>Description</h3>

                        <p>
                            {!! nl2br(e($product->description)) !!}
                        </p>
                    </div>
                @endif

                {{-- Order Button --}}
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
                        style="background:#999; cursor:not-allowed;"
                    >
                        Out of Stock
                    </button>

                @endif

                <a
                    href="{{ route('products.index') }}"
                    style="
                        display:block;
                        text-align:center;
                        margin-top:12px;
                        color:#555;
                    "
                >
                    ← Back to Products
                </a>

            </div>

        </div>

    </div>

</div>
@endsection
