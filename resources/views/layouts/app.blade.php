<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Warnet</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <!-- Navbar -->
    <nav class="bg-blue-600 text-white px-6 py-4 flex justify-between items-center shadow">
        <div class="font-bold text-lg">XWarnet</div>
        <ul class="flex space-x-6">
            <li><a href="/" class="hover:text-yellow-300">Beranda</a></li>
            <li><a href="/computers" class="hover:text-yellow-300">Komputer</a></li>
            <li><a href="/users" class="hover:text-yellow-300">Akun</a></li>
            <li><a href="/memberships" class="hover:text-yellow-300">Member</a></li>
            <li><a href="/services" class="hover:text-yellow-300">Pricelist</a></li>
            <li><a href="/employees" class="hover:text-yellow-300">Karyawan</a></li>
            <li><a href="/transactions" class="hover:text-yellow-300">Daftar Transaksi</a></li>
        </ul>
    </nav>

    <!-- Konten -->
    <main class="p-6">
        @yield('content')
    </main>

</body>
</html>
