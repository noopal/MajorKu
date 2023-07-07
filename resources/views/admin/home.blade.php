<!-- resources/views/admin/dashboard.blade.php -->

<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
</head>

<body>
    <h2>Admin Dashboard</h2>

    <!-- Konten dashboard admin -->

    <form action="{{ route('admin.logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>

</html>
