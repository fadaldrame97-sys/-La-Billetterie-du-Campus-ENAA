<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body class="bg-gray-100">
    
     @include('layouts.navbar')
<form action="{{ route('logout') }}" method="POST">
    @csrf

  
</form>

<div class="max-w-4xl mx-auto mt-10">

    <h1 class="text-3xl font-bold text-center mb-8">
        Liste des événements
    </h1>


      
    @foreach($events as $event)



    @if(session('success'))
    <div class="bg-green-100 text-green-700 p-3 mb-4 rounded">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
        {{ session('error') }}
    </div>
     @endif

        <div class="bg-white rounded-lg shadow p-6 mb-6">

            <h2 class="text-xl font-bold text-blue-600 mb-3">
                {{ $event->title }}
            </h2>

            <p class="mb-2">
                <span class="font-semibold">Description :</span>
                {{ $event->description }}
            </p>

            <p class="mb-2">
                <span class="font-semibold">Date :</span>
                {{ $event->date }}
            </p>

            <p class="mb-2">
                <span class="font-semibold">Heure :</span>
                {{ $event->time }}
            </p>

            <p class="mb-2">
                <span class="font-semibold">Lieu :</span>
                {{ $event->location }}
            </p>

            <p class="mb-2">
                <span class="font-semibold">Prix :</span>
                {{ $event->price }} DH
            </p>

            <p class="mb-4">
                <span class="font-semibold">Capacité :</span>
                {{ $event->capacity }}
            </p>

            <form action="{{ route('reservations.store', $event->id) }}" method="POST">
    @csrf

    <button
        type="submit"
        class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
        Réserver
    </button>
</form>

        </div>

    @endforeach

</div>

</body>
</html>