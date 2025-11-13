@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8 md:p-12 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 tracking-tight mb-4">
                Bem-vindo ao Blog MesaPosta!
            </h1>
            <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">
                O seu lar digital para as melhores receitas. Descubra, crie e compartilhe pratos deliciosos.
            </p>

            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="#" class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-full shadow-sm text-white bg-yellow-600 hover:bg-yellow-700 transition duration-150 ease-in-out">
                    Ver Todas as Receitas
                </a>
                @auth
                    <a href="#" class="inline-flex items-center justify-center px-8 py-3 border border-yellow-600 text-base font-medium rounded-full text-yellow-600 bg-white hover:bg-yellow-50 transition duration-150 ease-in-out">
                        Compartilhar Sua Receita
                    </a>
                @else
                    <a href="#" class="inline-flex items-center justify-center px-8 py-3 border border-yellow-600 text-base font-medium rounded-full text-yellow-600 bg-white hover:bg-yellow-50 transition duration-150 ease-in-out">
                        Comece Agora (Gratuito)
                    </a>
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection