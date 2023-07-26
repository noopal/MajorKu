<!-- resources/views/welcome.blade.php -->

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cari kampus mu</title>

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
    {{-- TOP --}}
    <div class="bg-blue-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-center h-16">
                <!-- Teks -->
                <div class="md:block">
                    <div class="ml-4 text-white text-center text-md">
                        Pilihlah yang terbaik buat kamu!
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div class="md:hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <!-- Mobile menu items -->
                <!-- Tambahkan item-menu di sini -->
            </div>
        </div>
    </div>
    {{-- End TOP --}}
    {{-- Navbar --}}
    <nav class="bg-white">
        <div class="container mx-auto flex items-center justify-between py-6 px-24">
            <!-- Logo -->
            <div class="flex items-center"><a href="/">
                    <img class="h-8 w-auto mr-2" src="{{ asset('img/logo2.png') }}" alt="Logo">
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
                    class="text-blue-900 font-semibold py-2 px-4 rounded-full hover:bg-blue-600 transition duration-300 ease-in-out">Home</a>
                <a href="{{ route('blog.index') }}"
                    class="text-blue-900 font-semibold py-2 px-4 rounded-full hover:bg-blue-600 transition duration-300 ease-in-out">Blog</a>
            </div>

            <!-- Tombol Login -->
            <div>
                @if (Auth::check())
                    @if (Auth::user()->role == 'admin')
                        <a href="{{ route('admin.home') }}"
                            class="bg-blue-900 hover:bg-blue-400 text-white font-semibold py-2 px-16 py-4 rounded-full transition duration-300 ease-in-out">Logout</a>
                    @else
                        <a href="{{ route('user.home') }}"
                            class="bg-blue-900 hover:bg-blue-400 text-white font-semibold py-2 px-16 py-4 rounded-full transition duration-300 ease-in-out">Logout</a>
                    @endif
                @else
                    <a href="{{ route('login') }}"
                        class="bg-blue-900 hover:bg-blue-400 text-white font-semibold py-2 px-16 py-4 rounded-full transition duration-300 ease-in-out">Login</a>
                @endif
            </div>
            <!-- Tombol Toggle Menu Mobile -->
        </div>
    </nav>
    {{-- End Navbar --}}
    {{-- Hero --}}
    <section class="bg-white py-12 px-24">
        <div class="container mx-auto flex flex-col md:flex-row items-center justify-center">
            <!-- Kolom Pertama -->
            <div class="md:w-1/2">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Nyari jurusan, prodi dan perguruan tinggi,
                    <br /> <span class="text-blue-900">jangan bingung!
                    </span>
                </h1>
                <p class="text-lg text-gray-600 mb-8">Kamu bisa dengan mudah mengetahu persoalan dunia perkuliah di
                    majorKu, majorKu siap membantu kamu.</p>
            </div>

            <!-- Kolom Kedua -->
            <div class="md:w-1/2">
                <div class="animate-pulse">
                    <img class="w-full" src="{{ asset('img/illustrationHero.png') }}" alt="Ilustrasi">
                </div>
            </div>
        </div>
    </section>
    {{-- End Hero --}}
    {{-- Form Pemilihan Program Studi --}}
    <div class="px-24 py-12">
        <h1 class="text-4xl font-bold text-blue-900">Pilih Jurusan dan Program Studi</h1>
        <form class="flex flex-col my-4 px-24 py-2" action="{{ route('user.perguruan-tinggi') }}" method="GET">
            @csrf
            <label class="text-lg font-semibold mb-2" for="jurusan">Jurusan</label>
            <select class="rounded-full h-10 pl-3 mb-4" id="jurusan" name="jurusan">
                <option value="">Pilih Jurusan</option>
                @foreach ($jurusans as $jurusan)
                    <option value="{{ $jurusan->id }}">{{ $jurusan->namaJurusan }}</option>
                @endforeach
            </select>

            <label class="text-lg font-semibold mb-2 mt-4" for="prodi">Program Studi</label>
            <select class="rounded-full h-10 pl-3 mb-6" id="prodi" name="prodi">
                <option value="">Pilih Jurusan Terlebih Dahulu</option>
                <!-- Opsi program studi akan diisi menggunakan JavaScript -->
            </select>

            <button class="bg-blue-900 text-white mt-3 py-2 border rounded-full" type="submit">Tampilkan Perguruan
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
    {{-- End Form Pemilihan Program Studi  --}}
    {{-- <h2>Welcome to the Website</h2> --}}
</body>

</html>
