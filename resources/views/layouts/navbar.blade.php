<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
    

<nav class="bg-blue-700 text-white shadow">
    <div class="max-w-7xl mx-auto flex justify-between items-center px-6 py-4">

        <h1 class="text-2xl font-bold">
            BDE-Events
        </h1>

        <div class="flex items-center gap-4">

            @if(Auth::user()->role == 'admin')

                <a href="{{ route('admin.dashboard') }}"
                   class="hover:text-yellow-300">
                    Dashboard
                </a>

                <a href="{{ route('events.create') }}"
                   class="hover:text-yellow-300">
                    Créer un événement
                </a>

            @else

                <a href="{{ route('events.index') }}"
                   class="hover:text-yellow-300">
                    Événements
                </a>

                <a href="{{ route('reservations.index') }}"
                   class="hover:text-yellow-300">
                    Mes Billets
                </a>

            @endif

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button
                    class="bg-red-600 px-4 py-2 rounded hover:bg-red-700">
                    Déconnexion
                </button>

            </form>

        </div>

    </div>
</nav>

</body>
</html>