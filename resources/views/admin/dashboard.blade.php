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

    @if(session('error'))
    <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
        {{ session('error') }}
    </div>
    @endif

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
            
             <p><strong>Les Etudiants inscrits :</strong> 

            @if($event->reservations->count() > 0)

    <ul class="list-disc ml-6">

        @foreach($event->reservations as $reservation)

            <li>{{ $reservation->user->name }}</li>

        @endforeach

    </ul>

@else

    <p class="text-gray-500">Aucun étudiant inscrit.</p>

@endif







        </div>


<div class="mt-4 flex gap-3">

    <a href="{{ route('events.edit', $event) }}"
       class="bg-yellow-500 text-white px-4 py-2 rounded">
        Modifier
    </a>

    <form action="{{ route('events.destroy', $event) }}"
          method="POST">

        @csrf
        @method('DELETE')

        <button
            class="bg-red-600 text-white px-4 py-2 rounded"
            onclick="return confirm('Supprimer cet événement ?')">

            Supprimer

        </button>

    </form>

</div>



@endforeach

    

</body>
</html>