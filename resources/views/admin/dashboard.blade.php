<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>

    <a href="{{ route('events.create') }}">
    Créer un événement
</a>
</head>
<body>

    <a href="{{ route('events.create') }}">
    Créer un événement
    </a>

    <form action="{{ route('logout') }}" method="POST">
    @csrf

    <button
        type="submit"
        class="bg-red-600 text-white px-4 py-2 rounded">
        Déconnexion
    </button>
    </form>
    <h1>Dashboard Admin</h1>

    

</body>
</html>