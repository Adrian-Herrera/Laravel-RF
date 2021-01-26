<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between" >

            <h2 class="font-semibold text-xl text-gray-800 leading-tight my-auto">
                Podcast
            </h2>
            <a class="px-5 py-2 border-green-500 border text-green-500 rounded transition duration-300 hover:bg-green-700 hover:text-white focus:outline-none"
                href="{{ route('podcasts.create') }}">Agregar Podcast</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- component -->
                <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">

                    <div
                        class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
                        <table class="min-w-full">
                            <thead>
                                <tr>

                                    <th
                                        class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
                                        Titulo</th>
                                    <th
                                        class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
                                        Descripción</th>
                                    <th
                                        class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
                                        Creado el:</th>
                                    <th
                                        class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
                                        Editado el:</th>

                                    <th class="px-6 py-3 border-b-2 border-gray-300"></th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @foreach ($podcasts as $item)
                                <tr>


                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                        <div class="text-sm leading-5 text-blue-900">{{$item->name}}</div>
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-normal border-b text-blue-900 border-gray-500 text-sm leading-5">
                                        {{$item->description}}</td>
                                    <td
                                        class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                                        {{$item->created_at}}</td>
                                    <td
                                        class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                                        {{$item->updated_at}}</td>

                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm  ">
                                        <a href="{{route('podcasts.edit', $item)}}"
                                            class="px-3 py-2 border-yellow-500 border text-yellow-500 rounded transition duration-300 hover:bg-yellow-700 hover:text-white focus:outline-none inline-block">Editar</a>
                                        <form action="{{route('podcasts.destroy', $item)}}" method="POST"
                                            class="inline-block">
                                            @csrf
                                            @method('delete')
                                            <button
                                                class="px-3 py-2 border-red-500 border text-red-500 rounded transition duration-300 hover:bg-red-700 hover:text-white focus:outline-none ">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$podcasts->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>