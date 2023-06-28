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
        .accordion {
            width: 100%;
            margin-top: 20px;
        }

        .accordion-item {
            border: 1px solid #ccc;
            margin-bottom: 10px;
        }

        .accordion-header {
            background-color: #f5f5f5;
            padding: 10px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .accordion-header h3 {
            margin: 0;
        }

        .accordion-content {
            display: none;
            padding: 10px;
        }

        ul {
            margin: 0;
            padding: 0;
            list-style-type: none;
        }

        ul li {
            margin-bottom: 5px;
        }
    </style>

    <!-- Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body class="antialiased">
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
                                <li><a href="/login"
                                        class="text-gray-300 hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium">Login</a>
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
    <div class="px-40 py-12">
        <div>
            <h1 class="text-4xl font-bold py-3">Daftar Kejuruan</h1>
            <div class="accordion">
                @foreach ($jurusans as $jurusan)
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <h3>{{ $jurusan->namaJurusan }}</h3>
                            <span class="icon"></span>
                        </div>
                        <div class="accordion-content">
                            <ul>
                                @foreach ($jurusan->prodis as $prodi)
                                    <li>{{ $prodi->nama_prodi }}</li>
                                    <li>{{ $prodi->keterangan }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.accordion-header').click(function() {
                $(this).toggleClass('active');
                $(this).next('.accordion-content').slideToggle();
                $('.accordion-header').not($(this)).removeClass('active');
                $('.accordion-content').not($(this).next('.accordion-content')).slideUp();
            });
        });
    </script>
</body>

</html>
