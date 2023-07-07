<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

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
    <div class="">
        <nav class="bg-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center h-16">
                    <div class="flex justify-between">
                        <div class="">
                            <a href="/" class="text-white text-lg font-semibold">Logo</a>
                        </div>
                        <div class="hidden md:block">
                            <ul class="ml-10 flex items-baseline space-x-4">
                                <li><a href="/form"
                                        class="text-gray-300 hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium">Home</a>
                                </li>
                                <li><a href="/blog"
                                        class="text-gray-300 hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium">Blog</a>
                                </li>
                                <li>
                                    @if (Auth::check())
                                        @if (Auth::user()->role == 'admin')
                                            <a href="{{ route('admin.home') }}"
                                                class="text-gray-300 hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium">Go
                                                to Admin Dashboard</a>
                                        @else
                                            <a href="{{ route('user.home') }}"
                                                class="text-gray-300 hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium">Go
                                                to User Dashboard</a>
                                        @endif
                                    @else
                                        <a href="{{ route('login') }}"
                                            class="text-gray-300 hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium">Login</a>
                                    @endif
                                    {{-- <a href="/login"
                                        class="text-gray-300 hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium">Login</a> --}}
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="-mr-2 flex md:hidden">
                        <!-- Tombol untuk menu hamburger pada mode responsif -->
                        <button type="button"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white transition duration-150 ease-in-out"
                            aria-label="Menu">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    {{-- End Navbar --}}

    <div class="px-40 py-12">
        <h1>Perguruan Tinggi yang Memiliki Program Studi Tersebut:</h1>
        @if (Auth::user()->status_pembayaran)
            @if ($perguruanTinggis->isEmpty())
                <p>Tidak ada perguruan tinggi yang sesuai dengan pilihan Anda.</p>
            @else
                <ul>
                    @foreach ($perguruanTinggis as $pt)
                        <li>{{ $pt->nama_pt }}</li>
                    @endforeach
                </ul>
            @endif
        @else
            <!-- Tampilkan pesan jika pengguna belum bayar -->
            <p>Anda harus melakukan pembayaran untuk melihat hasil perguruan tinggi.</p>
            <!-- Tambahkan tombol atau tautan untuk mengarahkan pengguna ke halaman pembayaran -->
            <a href="{{ route('pembayaran') }}">Bayar Sekarang</a>
        @endif
    </div>
</body>

</html>
