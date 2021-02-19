<div>

    <div class="w-full">
        <input wire:model="search" type="text" name="first_name"
            class="w-full px-5 py-3 border border-gray-400 rounded-lg outline-none focus:shadow-outline"
            autocomplete="off" placeholder="Ingrese el nombre o correo para buscar">
    </div>
    @if ($users->count())

    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Estado
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Rol
                </th>
                <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Editar</span>
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($users as $user)

            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-10 w-10">
                            <img class="h-10 w-10 rounded-full"
                                src="{{ URL::asset('storage/'.$user->profile_photo_path) }}" alt="">
                        </div>
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">
                                {{$user->name}}
                            </div>
                            <div class="text-sm text-gray-500">
                                {{$user->email}}
                            </div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    @if ($user->active)
                    <span
                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                        Activo
                    </span>

                    @else
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                        Deshabilitado
                    </span>

                    @endif
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    @foreach ($user->roles as $role)
                    <li>{{ $role->name }}</li>
                    @endforeach
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <a href="{{route('users.edit', $user)}}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="w-full">{{$users->links()}}</div>
    @else
    <p class="my-5 text-xl">No hay resultados</p>
    @endif
</div>