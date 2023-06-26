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
        <h1 class="text-2xl font-semibold">Pilih Jurusan dan Program Studi</h1>
        <form class="flex flex-col my-4" method="POST" action="/perguruan-tinggi">
            @csrf
            <label class="text-lg font-semibold" for="jurusan">Jurusan</label>
            <select class="rounded-md" id="jurusan" name="jurusan">
                <option value="">Pilih Jurusan</option>
                @foreach ($jurusans as $jurusan)
                    <option value="{{ $jurusan->id }}">{{ $jurusan->namaJurusan }}</option>
                @endforeach
            </select>

            <label class="text-lg font-semibold mt-4" for="prodi">Program Studi</label>
            <select class="rounded-md" id="prodi" name="prodi">
                <option value="">Pilih Jurusan Terlebih Dahulu</option>
                <!-- Opsi program studi akan diisi menggunakan JavaScript -->
            </select>

            <button class="bg-indigo-600 text-white mt-3 py-2 border rounded-md" type="submit">Tampilkan Perguruan
                Tinggi</button>
        </form>

        <script>
            // Ambil data program studi berdasarkan jurusan yang dipilih
            var jurusanSelect = document.getElementById('jurusan');
            var prodiSelect = document.getElementById('prodi');

            jurusanSelect.addEventListener('change', function() {
                var jurusanId = jurusanSelect.value;

                fetch('/api/program-studi/' + jurusanId)
                    .then(function(response) {
                        return response.json();
                    })
                    .then(function(data) {
                        prodiSelect.innerHTML = '';
                        data.forEach(function(programStudi) {
                            var option = document.createElement('option');
                            option.value = programStudi.id;
                            option.text = programStudi.nama_prodi;
                            prodiSelect.appendChild(option);
                        });
                    });
            });
        </script>
    </div>
</body>

</html>
