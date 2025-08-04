@extends('layouts.app')

@section(section: 'content')

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="min-h-screen flex items-center justify-center">
        <div class="text-center">
            <h1 class="text-3xl font-bold">Bem-vindo, {{ Auth::user()->name }}!</h1>
            <p class="mt-2">Você está logado no sistema.</p>

            <form action="{{ route('logout') }}" method="POST" class="mt-4">
                @csrf
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    Sair
                </button>
            </form>
        </div>
    </div>
</body>
</html>
@endsection

