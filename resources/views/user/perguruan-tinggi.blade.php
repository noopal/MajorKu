<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hello</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.css" rel="stylesheet" />

    <!-- Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body class="antialiased">
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
                            class="bg-white hover:bg-blue-400 text-blue-900 font-semibold py-2 px-16 py-4 rounded-full transition duration-300 ease-in-out">
                            Logout</a>
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

    <div class="px-40 py-12">
        <h1 class="text-4xl md:text-3xl font-bold text-gray-800 mb-4">Perguruan Tinggi yang Memiliki Program Studi
            Tersebut :</h1>
        @if (Auth::user()->status_pembayaran)
            @if ($perguruanTinggis->isEmpty())
                <p>Tidak ada perguruan tinggi yang sesuai dengan pilihan Anda.</p>
            @else
                <ul>
                    @foreach ($perguruanTinggis as $pt)
                        <li class="bg-yellow-400 rounded-full p-4 text-white text-center">{{ $pt->nama_pt }}</li>
                    @endforeach
                </ul>
            @endif
        @else
            <!-- Tampilkan pesan jika pengguna belum bayar -->
            <p class="mb-5">Anda harus melakukan pembayaran untuk melihat hasil perguruan tinggi.</p>
            <!-- Tambahkan tombol atau tautan untuk mengarahkan pengguna ke halaman pembayaran -->
            <a class="w-full bg-yellow-400 hover:bg-yellow-300 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline transition duration-300 ease-in-out"
                href="{{ route('pembayaran') }}">Bayar Sekarang</a>
        @endif
    </div>
</body>

</html>
