@extends('layouts.app')

@section('title', 'Order Successful')

@section('content')
<div class="container">

    <div class="detail" style="text-align:center;">

        <div style="font-size:50px; margin-bottom:10px;">
            ✅
        </div>

        <h1>Order Placed Successfully!</h1>

        <p>
            আপনার অর্ডারটি সফলভাবে গ্রহণ করা হয়েছে।
        </p>

        <div style="background:#f3f4f6; padding:20px; border-radius:8px; margin:20px 0; text-align:left;">

            <p>
                <strong>Order Number:</strong>
                {{ $order->order_number }}
            </p>

            <p>
                <strong>Customer Name:</strong>
                {{ $order->customer_name }}
            </p>

            <p>
                <strong>Phone:</strong>
                {{ $order->phone }}
            </p>

            <p>
                <strong>Address:</strong>
                {{ $order->address }}
            </p>

            <p>
                <strong>Payment:</strong>
                Cash on Delivery (COD)
            </p>

            <p>
                <strong>Status:</strong>
                {{ ucfirst($order->status) }}
            </p>

            <hr>

            <h3>Order Items</h3>

            @foreach ($order->items as $item)
                <div style="padding:10px 0; border-bottom:1px solid #ddd;">
                    <strong>{{ $item->product_name }}</strong>

                    <br>

                    Quantity:
                    {{ $item->quantity }}

                    ×

                    ৳{{ number_format($item->price, 2) }}

                    <br>

                    Total:
                    <strong>
                        ৳{{ number_format($item->total, 2) }}
                    </strong>
                </div>
            @endforeach

            <h3 style="margin-top:20px;">
                Total: ৳{{ number_format($order->total, 2) }}
            </h3>

        </div>

        <a href="{{ route('products.index') }}" class="btn">
            Continue Shopping
        </a>

    </div>

</div>
@endsection
