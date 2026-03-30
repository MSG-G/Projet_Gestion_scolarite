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
            <a href="{{route('settings.create_school_year')}}" class="bg-blue-500 rounded-md p-2 text-sm text-white hover:bg-blue-900 transition ease-out">Nouvelle Annee Scolaire</a>
        </div>
        {{-- message de succes --}}
        <div class="flex flex-col">
            @if (session('success'))
                <div class="mb-6 rounded bg-green-100 border border-green-400 text-green-700 px-4 py-4">
                    <strong>✔️Succès :</strong> {{ session('success') }}
                </div>
            @endif
            @if (session('success'))
                <div class="mb-6 rounded bg-green-100 border border-green-400 text-green-700 px-4 py-4">
                    <strong>✔️Succès :</strong> {{ session('message') }}
                </div>
            @endif
            {{-- table de liste des annees scolaires --}}
            <div class="overflow-x-auto sm:mx-6 lg:mx-8">
                <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full text-center">
                            <thead class="border-b bg-gray-800">
                                <tr>
                                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                        Annee Scolaire
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                        Annee en cours
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                        Statut
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($schoolYears as $year)

                                    <tr class="bg-white border-b">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $year->school_year }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $year->current_year ? 'Oui' : 'Non' }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            @if($year->active)
                                                <span class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">Actif</span>
                                            @else
                                                <span class="bg-red-100 text-red-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">Inactif</span>
                                            @endif
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <button class="p-2 text-white {{$year->active == 1 ? 'bg-red-400 rounded-md hover:bg-red-700' : 'bg-green-400 rounded-md hover:bg-green-700'}}" wire:click='toggleStatus({{ $year->id }})'>{{$year->active == 1 ? 'Rendre Inactif' : 'Rendre Actif'}}</button>
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
                    {{ $schoolYears->links() }}
                </nav>
            </div>
        </div>
    </div>
</div>
