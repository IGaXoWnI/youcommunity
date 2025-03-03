{{-- resources/views/welcome.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouCommunity - Bienvenue</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-r from-teal-400 to-blue-500">
    <header class="bg-gradient-to-r from-purple-600 to-pink-500 text-white shadow-lg">
        <nav class="container mx-auto flex justify-between items-center p-4">
            <h1 class="text-3xl font-bold">YouCommunity</h1>
            <ul class="flex space-x-6">
                <li><a href="{{ route('dashboard') }}" class="hover:text-gray-200 transition">Dashboard</a></li>
                <li><a href="{{ route('profile.edit') }}" class="hover:text-gray-200 transition">Profil</a></li>
            </ul>
        </nav>
    </header>

    <section class="hero bg-cover bg-center h-screen" style="background-image: url('https://scontent.fcmn1-1.fna.fbcdn.net/v/t39.30808-6/347263899_290683236647251_4678897397743974119_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=127cfc&_nc_ohc=DHRJd89R76UQ7kNvgFDpb9r&_nc_oc=AdiCq7OR35e0FSF7qPTLjrXtDE18nq5mgE0yNw_psypUiN8EFfi-hzYpacxPWpgDzJg&_nc_zt=23&_nc_ht=scontent.fcmn1-1.fna&_nc_gid=AqCfRFthTdMe05GPHhACdar&oh=00_AYAR6fkxII1HGfRE411O5NgdI62kdVtswSCyyaHlkrPUGw&oe=67C757BF');">
        <div class="flex items-center justify-center h-full bg-black bg-opacity-50">
            <div class="text-center text-white">
                <h2 class="text-5xl font-extrabold mb-4">Bienvenue à YouCommunity</h2>
                <p class="text-lg mb-6">Découvrez, créez et gérez des événements communautaires locaux.</p>
                <a href="{{ route('dashboard') }}" class="bg-yellow-400 hover:bg-yellow-500 text-gray-800 font-semibold py-3 px-6 rounded-lg transition">Explorer les Événements</a>
            </div>
        </div>
    </section>

    <footer class="bg-gradient-to-r from-purple-600 to-pink-500 text-white text-center py-4 shadow-inner">
        <div class="container mx-auto">
            <p>&copy; 2023 YouCommunity. Tous droits réservés.</p>
        </div>
    </footer>
</body>
</html>