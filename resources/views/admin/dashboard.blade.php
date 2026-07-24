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

     @include('layouts.navbar')

       <h1 class="text-3xl font-bold text-center mb-8">
        Liste des événements
    </h1>


    @if(session('error'))
    <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
        {{ session('error') }}
    </div>
    @endif

  
    <form action="{{ route('logout') }}" method="POST">
    @csrf

  
    </form>
  

        @foreach($events as $event)

        @php
          $LesPlacesDisponibles= $event->capacity - $event->reservations->count();
        @endphp

        <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6 mb-6 hover:shadow-xl transition">

    <h2 class="text-2xl font-bold text-blue-700 mb-3">
        {{ $event->title }}
    </h2>

    <p class="text-gray-600 mb-5">
        {{ $event->description }}
    </p>

    <div class="grid grid-cols-2 gap-4 mb-5">

        <div>
            <p class="text-gray-500 text-sm">Date</p>
            <p class="font-semibold">{{ $event->date }}</p>
        </div>

        <div>
            <p class="text-gray-500 text-sm">Lieu</p>
            <p class="font-semibold">{{ $event->location }}</p>
        </div>

        <div>
            <p class="text-gray-500 text-sm">Prix</p>
            <p class="font-semibold text-green-600">{{ $event->price }} DH</p>
        </div>

        <div>
            <p class="text-gray-500 text-sm">Capacité</p>
            <p class="font-semibold">{{ $event->capacity }}</p>
        </div>

    </div>

    <div class="flex gap-8 mb-5">

        <div>
            <p class="text-gray-500 text-sm">Réservations</p>
            <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full font-bold">
                {{ $event->reservations->count() }}
            </span>
        </div>

        <div>
            <p class="text-gray-500 text-sm">Places restantes</p>
            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full font-bold">
                {{ $LesPlacesDisponibles }}
            </span>
        </div>

    </div>

    <hr class="my-4">

    <div class="mt-6 flex gap-3 justify-end ">

        <a href="{{ route('events.edit', $event) }}"
           class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg">
            Modifier
        </a>

        <form action="{{ route('events.destroy', $event) }}" method="POST">

            @csrf
            @method('DELETE')

            <button
                type="submit"
                onclick="return confirm('Supprimer cet événement ?')"
                class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg">
                Supprimer
            </button>

        </form>

    </div>

    <h3 class="font-bold text-lg mb-3">
        Étudiants inscrits
    </h3>

    @if($event->reservations->count() > 0)

        <ul class="space-y-2">

            @foreach($event->reservations as $reservation)

                <li class="bg-gray-100 rounded-lg px-4 py-2">
                    {{ $reservation->user->name }}
                </li>

            @endforeach

        </ul>

    @else

        <p class="text-gray-500 italic">
            Aucun étudiant inscrit.
        </p>

    @endif

    

</div>

   

    


@endforeach

    

</body>
</html>