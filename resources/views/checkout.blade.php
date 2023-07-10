<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="SB-Mid-client-HHeM4IRynyjfnLjP"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.css" rel="stylesheet" />

    <!-- Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    {{-- Navbar --}}
    <nav class="bg-blue-900">
        <div class="container mx-auto flex items-center justify-between py-6 px-24">
            <!-- Logo -->
            <div class="flex items-center"><a href="/">
                    <img class="h-8 w-auto mr-2" src="{{ asset('img/logo.png') }}" alt="Logo">
                </a>
            </div>
            <!-- Tombol Login -->
            <div>
                @if (Auth::check())
                    @if (Auth::user()->role == 'admin')
                        <a href="{{ route('admin.home') }}"
                            class="bg-white hover:bg-blue-400 text-blue-900 font-semibold py-2 px-16 py-4 rounded-full transition duration-300 ease-in-out">Logout</a>
                    @else
                        <a href="{{ route('user.home') }}"
                            class="bg-white hover:bg-blue-400 text-blue-900 font-semibold py-2 px-16 py-4 rounded-full transition duration-300 ease-in-out">Logout</a>
                    @endif
                @else
                    <a href="{{ route('login') }}"
                        class="bg-white hover:bg-blue-400 text-blue-900 font-semibold py-2 px-16 py-4 rounded-full transition duration-300 ease-in-out">Login</a>
                @endif
            </div>
        </div>
    </nav>
    {{-- End Navbar --}}
    <div class="flex items-center justify-center min-h-screen bg-blue-900">
        <div class="bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4 w-full max-w-sm">
            <h2 class="text-2xl text-center font-bold mb-6">Halaman Pembayaran</h2>
            <button
                class="w-full bg-green-500 hover:bg-green-300 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline transition duration-300 ease-in-out"
                id="pay-button">Bayar!</button>

            <script type="text/javascript">
                // For example trigger on button clicked, or any time you need
                var payButton = document.getElementById('pay-button');
                payButton.addEventListener('click', function() {
                    // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
                    window.snap.pay('{{ $snapToken }}');
                    // customer will be redirected after completing payment pop-up
                });
            </script>
        </div>
    </div>

</body>

</html>
