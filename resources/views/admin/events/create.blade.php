<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer un événement</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

     @include('layouts.navbar')

<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">

    <h1 class="text-2xl font-bold mb-6">
        Créer un événement
    </h1>

    <form action="{{ route('events.store') }}" method="POST">

        @csrf

        <div class="mb-4">
            <label>Titre</label>
            <input type="text" name="title" class="w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label>Description</label>
            <textarea name="description" class="w-full border p-2 rounded"></textarea>
        </div>

        <div class="mb-4">
            <label>Date</label>
            <input type="date" name="date" class="w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label>Heure</label>
            <input type="time" name="time" class="w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label>Lieu</label>
            <input type="text" name="location" class="w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label>Prix</label>
            <input type="number" name="price" class="w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label>Capacité</label>
            <input type="number" name="capacity" class="w-full border p-2 rounded">
        </div>

        <button
            type="submit"
            class="bg-blue-600 text-white px-4 py-2 rounded">
            Enregistrer
        </button>

    </form>

</div>

</body>
</html>