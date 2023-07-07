<!-- resources/views/pembayaran.blade.php -->

<!DOCTYPE html>
<html>

<head>
    <title>Pembayaran</title>
</head>

<body>
    <h2>Halaman Pembayaran</h2>

    <!-- Tambahkan form atau tautan untuk memulai proses pembayaran -->
    <form action="{{ route('pembayaran.checkout') }}" method="POST">
        @csrf
        <!-- Form input lainnya -->
        <button type="submit">Bayar Sekarang</button>
    </form>
</body>

</html>
