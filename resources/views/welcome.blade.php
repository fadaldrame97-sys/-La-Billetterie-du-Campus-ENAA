<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>BDE-Events</title>
</head>
<body class="bg-gray-100">

<div class="min-h-screen flex items-center justify-center">

    <div class="bg-white shadow-xl rounded-xl p-10 text-center max-w-xl">

        <h1 class="text-5xl font-bold text-blue-700 mb-4">
            BDE-Events
        </h1>

        <p class="text-gray-600 mb-8">
            La plateforme officielle de gestion des événements du campus.
        </p>

        <div class="space-y-4">

            <a href="{{ route('login') }}"
               class="block bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700">
                🔐 Se connecter
            </a>

            <a href="{{ route('events.index') }}"
               class="block bg-green-600 text-white py-3 rounded-lg hover:bg-green-700">
                📅 Voir les événements
            </a>

        </div>

    </div>

</div>

</body>
</html>