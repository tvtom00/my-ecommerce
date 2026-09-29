<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'My E-Commerce')
    </title>

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
            background: #111;
            color: white;
            padding: 15px 20px;
        }

        .nav-container {
            max-width: 1100px;
            margin: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
        }

        .logo {
            font-size: 22px;
            font-weight: bold;
        }

        .nav-link {
            color: white;
        }

        .container {
            width: 92%;
            max-width: 1100px;
            margin: 30px auto;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(
                auto-fit,
                minmax(220px, 1fr)
            );
            gap: 20px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, .08);
        }

        .btn {
            display: inline-block;
            background: #111;
            color: white;
            padding: 12px 18px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            font-size: 15px;
        }

        .btn:hover {
            opacity: .85;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 12px;
            margin-top: 6px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
        }

        label {
            font-weight: bold;
        }

        @media (max-width: 600px) {
            .nav-container {
                flex-direction: column;
                align-items: flex-start;
            }

            .container {
                width: 94%;
            }

            .card {
                padding: 15px;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar">

        <div class="nav-container">

            <a
                href="{{ route('products.index') }}"
                class="logo"
            >
                My E-Commerce
            </a>

            <a
                href="{{ route('products.index') }}"
                class="nav-link"
            >
                Products
            </a>

        </div>

    </nav>

    <main>
        @yield('content')
    </main>

</body>
</html>
