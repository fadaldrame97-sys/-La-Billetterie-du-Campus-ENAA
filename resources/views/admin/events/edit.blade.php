<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un événement</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

     @include('layouts.navbar')

<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">

    <h1 class="text-2xl font-bold mb-6">
        Modifier l'événement
    </h1>

    <form action="{{ route('events.update', $event) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-4">
            <label>Titre</label>
            <input
                type="text"
                name="title"
                value="{{ old('title', $event->title) }}"
                class="w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label>Description</label>
            <textarea
                name="description"
                class="w-full border p-2 rounded">{{ old('description', $event->description) }}</textarea>
        </div>

        <div class="mb-4">
            <label>Date</label>
            <input
                type="date"
                name="date"
                value="{{ old('date', $event->date) }}"
                class="w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label>Heure</label>
            <input
                type="time"
                name="time"
                value="{{ old('time', $event->time) }}"
                class="w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label>Lieu</label>
            <input
                type="text"
                name="location"
                value="{{ old('location', $event->location) }}"
                class="w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label>Prix</label>
            <input
                type="number"
                name="price"
                value="{{ old('price', $event->price) }}"
                class="w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label>Capacité</label>
            <input
                type="number"
                name="capacity"
                value="{{ old('capacity', $event->capacity) }}"
                class="w-full border p-2 rounded">
        </div>

        <button
            type="submit"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Enregistrer les modifications
        </button>

    </form>

</div>

</body>
</html>