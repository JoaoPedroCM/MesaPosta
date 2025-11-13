<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'MesaPosta') }}</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f7f9fb; /* Fundo cinza claro */
        }
    </style>
</head>
<body class="min-h-screen flex flex-col">

    <header class="bg-white shadow-md">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <a href="{{ url('/') }}" class="flex-shrink-0 flex items-center text-2xl font-bold text-gray-900 tracking-tight">
                        Home
                    </a>
                    <div class="hidden sm:-my-px sm:ml-6 sm:flex sm:space-x-8">
                        <a href="#" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">
                            Receitas
                        </a>
                        @auth
                            <a href="#" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:border-b-2 hover:border-yellow-500 hover:text-gray-700 transition duration-150 ease-in-out">
                                + Nova Receita
                            </a>
                        @endauth
                    </div>
                </div>

                <div class="hidden sm:ml-6 sm:flex sm:items-center">
                    @guest
                        <a href="{{ route('login') }}" class="text-gray-500 hover:text-gray-700 text-sm font-medium px-3 py-2 rounded-md transition duration-150 ease-in-out">
                            Entrar
                        </a>
                        <a href="{{ route('register') }}" class="ml-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-white bg-yellow-600 hover:bg-yellow-700 transition duration-150 ease-in-out">
                            Registrar
                        </a>
                    @else
                        <span class="text-sm font-medium text-gray-700 mr-4">{{ Auth::user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-gray-500 hover:text-gray-700 text-sm font-medium px-3 py-2 rounded-md transition duration-150 ease-in-out">
                                Sair
                            </button>
                        </form>
                    @endguest
                </div>
            </div>
        </nav>
    </header>

    <main class="py-10 flex-grow">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @yield('content')
        </div>
    </main>

    <footer class="bg-white border-t border-gray-200 mt-auto">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 text-center text-sm text-gray-500">
            &copy; {{ date('Y') }} blogmesaposta. Todos os direitos reservados.
        </div>
    </footer>

</body>
</html>