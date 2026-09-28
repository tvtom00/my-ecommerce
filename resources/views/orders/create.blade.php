@extends('layouts.app')

@section('title', 'Order Now - ' . $product->name)

@section('content')
<div class="container">

    <div class="detail">
        <h1>Order Now</h1>

        <h2>{{ $product->name }}</h2>

        <p class="detail-price">
            ৳{{ number_format($product->price, 2) }}
        </p>

        <p>
            Available Stock: {{ $product->stock }}
        </p>

        @if ($errors->any())
            <div style="background:#fee2e2; color:#991b1b; padding:12px; border-radius:6px; margin-bottom:15px;">
                <ul style="margin:0; padding-left:20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('orders.store', $product->slug) }}" method="POST">
            @csrf

            <div style="margin-bottom:15px;">
                <label for="customer_name">আপনার নাম</label>

                <input
                    type="text"
                    id="customer_name"
                    name="customer_name"
                    value="{{ old('customer_name') }}"
                    required
                    style="width:100%; padding:12px; margin-top:6px; border:1px solid #ddd; border-radius:6px;"
                >
            </div>

            <div style="margin-bottom:15px;">
                <label for="phone">মোবাইল নম্বর</label>

                <input
                    type="tel"
                    id="phone"
                    name="phone"
                    value="{{ old('phone') }}"
                    required
                    style="width:100%; padding:12px; margin-top:6px; border:1px solid #ddd; border-radius:6px;"
                >
            </div>

            <div style="margin-bottom:15px;">
                <label for="address">ডেলিভারি ঠিকানা</label>

                <textarea
                    id="address"
                    name="address"
                    rows="4"
                    required
                    style="width:100%; padding:12px; margin-top:6px; border:1px solid #ddd; border-radius:6px;"
                >{{ old('address') }}</textarea>
            </div>

            <div style="margin-bottom:15px;">
                <label for="quantity">Quantity</label>

                <input
                    type="number"
                    id="quantity"
                    name="quantity"
                    value="{{ old('quantity', 1) }}"
                    min="1"
                    max="{{ $product->stock }}"
                    required
                    style="width:100%; padding:12px; margin-top:6px; border:1px solid #ddd; border-radius:6px;"
                >
            </div>

            <div style="margin-bottom:15px;">
                <label for="note">অতিরিক্ত নোট (Optional)</label>

                <textarea
                    id="note"
                    name="note"
                    rows="3"
                    style="width:100%; padding:12px; margin-top:6px; border:1px solid #ddd; border-radius:6px;"
                >{{ old('note') }}</textarea>
            </div>

            <div style="background:#f3f4f6; padding:15px; border-radius:8px; margin-bottom:15px;">
                <strong>Payment Method:</strong>

                <p style="margin-bottom:0;">
                    Cash on Delivery (COD)
                </p>
            </div>

            <button type="submit" class="btn">
                🛒 Place Order
            </button>
        </form>

    </div>

</div>
@endsection
