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

   

    @if(session('success'))
    <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    <h1>Mes Billets</h1>

@foreach($reservations as $reservation)

<div class="bg-white rounded-xl shadow-xl overflow-hidden mb-8 border-2 border-blue-600">

            <div class="bg-blue-600 text-white text-center py-4">
                <h2 class="text-2xl font-bold">
                    PASS ÉTUDIANT
                </h2>
            </div>

            <div class="p-6">

                <div class="grid grid-cols-2 gap-4">

                    <div>
                        <p class="text-gray-500">Nom</p>
                        <p class="font-bold">{{ $reservation->user->name }}</p>
                    </div>

                    <div>
                        <p class="text-gray-500">Code du billet</p>
                        <p class="font-bold text-blue-600">
                            {{ $reservation->ticket_code }}
                        </p>
                    </div>

                    <div>
                        <p class="text-gray-500">Événement</p>
                        <p class="font-bold">
                            {{ $reservation->event->title }}
                        </p>
                    </div>

                    <div>
                        <p class="text-gray-500">Date</p>
                        <p class="font-bold">
                            {{ $reservation->event->date }}
                        </p>
                    </div>

                    <div>
                        <p class="text-gray-500">Heure</p>
                        <p class="font-bold">
                            {{ $reservation->event->time }}
                        </p>
                    </div>

                    <div>
                        <p class="text-gray-500">Lieu</p>
                        <p class="font-bold">
                            {{ $reservation->event->location }}
                        </p>
                    </div>

                </div>

            </div>

            <div class="bg-gray-100 border-t px-6 py-4 text-center">
                <p class="text-sm text-gray-500">
                    Présentez ce billet à l'entrée de l'événement.
                </p>
            </div>

        </div>
@endforeach
    
</body>
</html>