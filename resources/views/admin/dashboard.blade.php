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

        @foreach($events as $event)

        @php
          $LesPlacesDisponibles= $event->capacity - $event->reservations->count();
        @endphp

        <div class="bg-white shadow rounded-lg p-5 mb-4">

            <h2 class="text-xl font-bold text-blue-600">
                {{ $event->title }}
            </h2>

            <p>{{ $event->description }}</p>

            <p><strong>Date :</strong> {{ $event->date }}</p>

            <p><strong>Lieu :</strong> {{ $event->location }}</p>

            <p><strong>Prix :</strong> {{ $event->price }} DH</p>

            <p><strong>Capacité :</strong> {{ $event->capacity }}</p>

            <p><strong>Réservations :</strong> {{ $event->reservations->count() }}</p>

             <p><strong>Les places disponibles :</strong> {{ $LesPlacesDisponibles }}</p>

        </div>
@endforeach

    

</body>
</html>