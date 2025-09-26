<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 p-8 font-sans">

    <h1 class="text-2xl font-bold mb-4">Dashboard</h1>

    <p class="mb-6">ยินดีต้อนรับคุณ {{ auth()->user()->name }}</p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
            ออกจากระบบ
        </button>
    </form>

</body>
</html>
