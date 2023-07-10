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
    <style>
        .ui-accordion-header {
            cursor: pointer;
        }

        .ui-accordion-header:hover {
            background-color: #f5f5f5;
        }

        .ui-accordion-content {
            padding: 10px;
        }

        .ui-accordion .ui-accordion {
            margin-left: 20px;
            margin-top: 10px;
        }
    </style>

    <!-- Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
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

            <button
                class="text-blue-900 font-semibold py-2 px-4 rounded-full hover:bg-blue-600 transition duration-300 ease-in-out md:hidden"
                id="menu-toggle">
                <svg class="h-6 w-6 fill-current" viewBox="0 0 20 20">
                    <path
                        d="M3 7h14a1 1 0 0 1 0 2H3a1 1 0 0 1 0-2zm0 4h14a1 1 0 0 1 0 2H3a1 1 0 0 1 0-2zm0 4h14a1 1 0 0 1 0 2H3a1 1 0 0 1 0-2z" />
                </svg>
            </button>
            <!-- Menu Mobile -->
            <div class="hidden md:block" id="menu">
                <a href="/"
                    class="text-white font-semibold py-2 px-4 rounded-full hover:bg-blue-600 transition duration-300 ease-in-out">Home</a>
                <a href="{{ route('blog.index') }}"
                    class="text-white font-semibold py-2 px-4 rounded-full hover:bg-blue-600 transition duration-300 ease-in-out">Blog</a>
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
    <div class="px-40 py-12">
        <div>
            <h1 class="text-2xl font-bold py-3">Berikut penjalasan program studi berdasarkan jurusan</h1>
            <div id="accordion-jurusan">
                @foreach ($jurusans as $jurusan)
                    <h3>{{ $jurusan->namaJurusan }}</h3>
                    <div class="accordion-prodi">
                        @foreach ($jurusan->prodis as $prodi)
                            <h3>{{ $prodi->nama_prodi }}</h3>
                            <div>
                                <p>Keterangan: {{ $prodi->keterangan }}</p>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        $(function() {
            // Inisialisasi accordion untuk tabel jurusan
            $("#accordion-jurusan").accordion({
                collapsible: true,
                heightStyle: "content",
                active: false,
            });

            // Inisialisasi sub-accordion untuk tabel prodi
            $(".accordion-prodi").accordion({
                collapsible: true,
                heightStyle: "content",
                active: false,
            });
        });
    </script>
</body>

</html>
