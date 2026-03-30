<div class="mt-5">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
        {{-- titre et creation de bouton --}}
        <div class="flex justify-between items-center text-gray-700 mb-6">
            <div class="w-1/3">
                <input
                type="text"
                id="search"
                placeholder="Rechercher une année scolaire..."
                wire:model.live.debounce.500ms="search"
                class="w-full block rounded border px-4 py-3 text-gray-700
                    focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <a href="{{route('classes.create')}}" class="bg-blue-500 rounded-md p-2 text-sm text-white hover:bg-blue-900 transition ease-out">Ajouter niveau</a>
        </div>
        {{-- message de succes --}}
        <div class="flex flex-col">
            @if (session('success'))
                <div class="mb-6 rounded bg-green-100 border border-green-400 text-green-700 px-4 py-4">
                    <strong>✔️Succès :</strong> {{ session('success') }}
                </div>
            @endif
            {{-- @if (session('success'))
                <div class="mb-6 rounded bg-green-100 border border-green-400 text-green-700 px-4 py-4">
                    <strong>✔️Succès :</strong> {{ session('message') }}
                </div>
            @endif --}}
            {{-- table de liste des annees scolaires --}}
            <div class="overflow-x-auto sm:mx-6 lg:mx-8">
                <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full text-center">
                            <thead class="border-b bg-gray-800">
                                <tr>
                                    
                                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                        Libelle
                                    </th>

                                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                        niveau
                                    </th>

                                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                        Montant scolarite
                                    </th>
                                    
                                    
                                    
                                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($classes as $items)

                                    <tr class="bg-white border-b">
                                        
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $items->libelle }}
                                        </td>
                                            @foreach ($niveau as $item)
                                                @if ($items->level_id == $item->id)
                                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                        {{ $item->libelle }}
                                                    </td>
                                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                        {{ $item->scolarite }} Euro/Fcfa
                                                    </td>
                                                @endif
                                            @endforeach
                                        
                                        
                                        
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <button  type="button" class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-white 
                                                        bg-green-400 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>
                                                            <a href={{route('classes.editer',$items->id)}}>Modifier</a>
                                            </button>
                                            <button type="button" class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 
                                                                    focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all duration-200" >
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                                            <a href="" wire:click="deleteConfirmed({{ $items->id }})">Supprimer</a>
                                            </button>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr class="e-full">
                                            <td colspan="4" class="px-6 flex-1 w-full py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                <p class="flex justify-center items-center">
                                                    <img src={{ asset('storage/empety.svg') }} alt="" class="w-20 h-20 object-cover">
                                                    <div>Aucun element trouve !!!</div>
                                                </p>
                                            </td>
                                        </tr>
                                    
                                    
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- pagination moderne--}}
            <div class="flex justify-end mt-4">
                <nav class="inline-flex -space-x-px">
                    {{ $classes->links() }}
                </nav>
            </div>
        </div>
    </div>
</div>
