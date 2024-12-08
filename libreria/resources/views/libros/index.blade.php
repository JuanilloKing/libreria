<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Libros
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">ID</th>
                                    <th scope="col" class="px-6 py-3">Titulo</th>
                                    <th scope="col" class="px-6 py-3">autor</th>
                                    <th scope="col" class="px-6 py-3">Precio</th>
                                    <th scope="col" class="px-6 py-3"><span class="sr-only">Editar</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($libros as $libro)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $libro->numero }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $libro->titulo }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $libro->autor }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $libro->precio }}
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <a href="{{route('libros.edit', $libro)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                                            <form method="POST" action="{{ route('libros.destroy', $libro) }}">
                                                @method('DELETE')
                                                @csrf
                                                <a href="{{ route('libros.destroy', $libro) }}"
                                                    class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3"
                                                    onclick="event.preventDefault(); if (confirm('¿Está seguro?')) this.closest('form').submit();">
                                                    Eliminar
                                                </a>
                                            </form>                                        
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 translate-x-96">
                <a href="{{ route('libros.create') }}" >Crear </a></button>
        </div>
    </div>
</x-app-layout>