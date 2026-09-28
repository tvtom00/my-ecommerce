@extends('layouts.app')

@section('title', 'Products - My Ecommerce')

@section('content')

<div class="container">

    <h1 class="page-title">আমাদের Products</h1>

    @if($products->count())

        <div class="products">

            @foreach($products as $product)

                <div class="product-card">

                    @if($product->image)
                        <img
                            src="{{ asset('storage/' . $product->image) }}"
                            alt="{{ $product->name }}"
                            class="product-image"
                        >
                    @else
                        <div class="product-image"></div>
                    @endif

                    <div class="product-info">

                        <div class="product-name">
                            {{ $product->name }}
                        </div>

                        <div>
                            <span class="price">
                                ৳{{ number_format($product->price, 2) }}
                            </span>

                            @if($product->old_price)
                                <span class="old-price">
                                    ৳{{ number_format($product->old_price, 2) }}
                                </span>
                            @endif
                        </div>

                        <a
                            href="{{ route('products.show', $product->slug) }}"
                            class="btn"
                        >
                            View Product
                        </a>

                    </div>

                </div>

            @endforeach

        </div>

        <div class="pagination">
            {{ $products->links() }}
        </div>

    @else

        <div class="detail">
            <h3>এখনো কোনো product যোগ করা হয়নি।</h3>
            <p>Admin panel থেকে product যোগ করলে এখানে দেখা যাবে।</p>
        </div>

    @endif

</div>

@endsection
