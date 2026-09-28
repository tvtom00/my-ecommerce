<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'My Ecommerce')</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            color: #222;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .navbar {
            background: #111827;
            color: white;
            padding: 16px 20px;
        }

        .nav-container {
            max-width: 1100px;
            margin: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 22px;
            font-weight: bold;
        }

        .nav-link {
            background: white;
            color: #111827;
            padding: 8px 14px;
            border-radius: 6px;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            padding: 25px 15px;
        }

        .page-title {
            margin-bottom: 20px;
        }

        .products {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
        }

        .product-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        .product-image {
            width: 100%;
            height: 220px;
            object-fit: cover;
            background: #eee;
        }

        .product-info {
            padding: 15px;
        }

        .product-name {
            font-size: 17px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .price {
            font-size: 20px;
            font-weight: bold;
            color: #16a34a;
        }

        .old-price {
            color: #999;
            text-decoration: line-through;
            margin-left: 5px;
            font-size: 14px;
        }

        .btn {
            display: block;
            width: 100%;
            text-align: center;
            border: 0;
            padding: 11px;
            margin-top: 12px;
            border-radius: 6px;
            background: #111827;
            color: white;
            cursor: pointer;
            font-size: 15px;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .pagination {
            margin-top: 25px;
        }

        .detail {
            background: white;
            padding: 20px;
            border-radius: 10px;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        .detail-image {
            width: 100%;
            max-height: 500px;
            object-fit: contain;
            background: #f1f1f1;
            border-radius: 8px;
        }

        .detail-title {
            font-size: 30px;
            margin-top: 0;
        }

        .detail-price {
            font-size: 28px;
            color: #16a34a;
            font-weight: bold;
        }

        .description {
            line-height: 1.7;
            margin-top: 20px;
        }

        @media (max-width: 800px) {
            .products {
                grid-template-columns: repeat(2, 1fr);
            }

            .detail-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .products {
                grid-template-columns: 1fr 1fr;
                gap: 10px;
            }

            .product-image {
                height: 170px;
            }

            .product-info {
                padding: 10px;
            }

            .product-name {
                font-size: 15px;
            }

            .price {
                font-size: 17px;
            }
        }
    </style>
</head>

<body>

<nav class="navbar">
    <div class="nav-container">
        <a href="{{ route('products.index') }}" class="logo">
            My Ecommerce
        </a>

        <a href="{{ route('products.index') }}" class="nav-link">
            Products
        </a>
    </div>
</nav>

<main>
    @yield('content')
</main>

</body>
</html>
