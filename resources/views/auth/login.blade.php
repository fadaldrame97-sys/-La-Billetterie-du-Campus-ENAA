<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">

    <div class="bg-white p-8 rounded-lg shadow-md w-96">

        <h1 class="text-2xl font-bold text-center mb-6">
            Connexion
        </h1>

        <form action="{{ route('login.store') }}" method="POST">

            @csrf

            <div class="mb-4">
                <label class="block mb-2 font-medium">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>

            <div class="mb-6">
                <label class="block mb-2 font-medium">
                    Mot de passe
                </label>

                <input
                    type="password"
                    name="password"
                    class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>

            <button
                type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700"
            >
                Se connecter
            </button>

        </form>

    </div>

</body>
</html>