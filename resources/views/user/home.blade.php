<!-- resources/views/admin/dashboard.blade.php -->

<!DOCTYPE html>
<html>

<head>
    <title>User Dashboard</title>
</head>

<body>
    <h2>User Dashboard</h2>

    <!-- Konten dashboard admin -->

    <form action="{{ route('user.logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>

</html>
