<div class="bg-white shadow-xl sm:rounded-lg p-8">

    {{-- Messages --}}
    @if (session('error'))
        <div class="mb-4 rounded bg-red-100 border border-red-400 text-red-700 px-4 py-3">
            <strong>❌Erreur :</strong> {{ session('error') }}
        </div>
    @endif

    

    {{-- Formulaire --}}
    <form wire:submit.prevent="update"
        class="bg-gray-100 shadow-md rounded px-8 pt-6 pb-8 mb-6">

        
        <div class="mb-4">
            <label for="libelle"
                class="block text-gray-700 text-lg font-bold mb-2">
                Libelle
            </label>

            <input
                type="text"
                id="libelle"
                placeholder="Ex : "
                wire:model.defer="libelle"
                class="w-full rounded border px-4 py-3 text-gray-700
                    focus:outline-none focus:ring-2 focus:ring-blue-400
                    @error('libelle') border-red-500 bg-red-50 @enderror">

            @error('libelle')
                <p class="mt-1 text-sm text-red-600 font-semibold">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="mb-5">
            <label for="level_id" class="block text-sm font-medium text-gray-700">
                Niveau scolaire
            </label>
            <select 
                wire:model="level_id" 
                id="level_id" 
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
            >
                <option value="">-- Choisir un niveau --</option>
                
                @foreach ($levels as $level)
                    <option value="{{ $level->id }}"
                            {{ old('level_id', $level_id) == $level->id ? 'selected' : '' }}>
                        {{ $level->libelle }} 
                        ({{ $level->code ?? '' }}) 
                        {{ $level->schoolYear ? ' - ' . $level->schoolYear->school_year : '' }}
                    </option>
                @endforeach
            </select>
            @error('level_id') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>
        
        

        <div class="flex justify-end">
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded transition">
                Mettre a jour
            </button>
        </div>
    </form>

    {{-- Info + Image --}}
    <div class="bg-gray-100 shadow-md rounded px-8 py-6 text-center">
        <p class="text-gray-700 text-lg mb-4">
            la gestion des classes et des niveaux
        </p>

        <img
            src={{ asset('storage/niveau.jpg') }}
            alt="School"
            class="mx-auto w-1/2 rounded-lg shadow-md">
    </div>

    {{-- Retour --}}
    <div class="flex justify-center mt-6">
        <a href="{{ route('classes.index') }}"
        class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-6 rounded transition">
            ← Retour aux paramètres
        </a>
    </div>
</div>