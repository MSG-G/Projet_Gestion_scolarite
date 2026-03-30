<div class="bg-white shadow-xl sm:rounded-lg p-8">

    {{-- Messages --}}
    @if (session('error'))
        <div class="mb-4 rounded bg-red-100 border border-red-400 text-red-700 px-4 py-3">
            <strong>❌Erreur :</strong> {{ session('error') }}
        </div>
    @endif

    

    {{-- Formulaire --}}
    <form wire:submit.prevent="store"
        class="bg-gray-100 shadow-md rounded px-8 pt-6 pb-8 mb-6">

        <div class="mb-4">
            <label for="nom"
                class="block text-gray-700 text-lg font-bold mb-2">
                Nom de l'eleve
            </label>

            <input
                type="text"
                id="nom"
                placeholder="Saisir le nom  "
                wire:model.defer="nom"
                class="w-full rounded border px-4 py-3 text-gray-700
                    focus:outline-none focus:ring-2 focus:ring-blue-400
                    @error('nom') border-red-500 bg-red-50 @enderror">

            @error('nom')
                <p class="mt-1 text-sm text-red-600 font-semibold">
                    {{ $message }}
                </p>
            @enderror

        </div>
        <div class="mb-4">
            <label for="prenom"
                class="block text-gray-700 text-lg font-bold mb-2">
                Prenom de l'eleve
            </label>

            <input
                type="text"
                id="prenom"
                placeholder="Ex : "
                wire:model.defer="prenom"
                class="w-full rounded border px-4 py-3 text-gray-700
                    focus:outline-none focus:ring-2 focus:ring-blue-400
                    @error('prenom') border-red-500 bg-red-50 @enderror">

            @error('prenom')
                <p class="mt-1 text-sm text-red-600 font-semibold">
                    {{ $message }}
                </p>
            @enderror

        </div>
        <div class="mb-4">
            <label for="libelle"
                class="block text-gray-700 text-lg font-bold mb-2">
                Matricule
            </label>

            <input
                type="text"
                id="matricule"
                placeholder="Ex : "
                wire:model.defer="matricule"
                class="w-full rounded border px-4 py-3 text-gray-700
                    focus:outline-none focus:ring-2 focus:ring-blue-400
                    @error('matricule') border-red-500 bg-red-50 @enderror">

            @error('matricule')
                <p class="mt-1 text-sm text-red-600 font-semibold">
                    {{ $message }}
                </p>
            @enderror

        </div>

        <div class="mb-4">
            <label for="libelle"
                class="block text-gray-700 text-lg font-bold mb-2">
                Date de naissance
            </label>

            <input
                type="date"
                id="dateNaissance"
                placeholder="Ex : "
                wire:model.defer="dateNaissance"
                class="w-full rounded border px-4 py-3 text-gray-700
                    focus:outline-none focus:ring-2 focus:ring-blue-400
                    @error('dateNaissance') border-red-500 bg-red-50 @enderror">

            @error('dateNaissance')
                <p class="mt-1 text-sm text-red-600 font-semibold">
                    {{ $message }}
                </p>
            @enderror

        </div>
        <div class="mb-4">
            <label for="contact_parent"
                class="block text-gray-700 text-lg font-bold mb-2">
                Numero du tuteur
            </label>

            <input
                type="text"
                id="contact_parent"
                placeholder="Ex : "
                wire:model.defer="contact_parent"
                class="w-full rounded border px-4 py-3 text-gray-700
                    focus:outline-none focus:ring-2 focus:ring-blue-400
                    @error('contact_parent') border-red-500 bg-red-50 @enderror">

            @error('contact_parent')
                <p class="mt-1 text-sm text-red-600 font-semibold">
                    {{ $message }}
                </p>
            @enderror

        </div>
        

        <div class="flex justify-end">
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded transition">
                Créer
            </button>
        </div>
    </form>

    {{-- Info + Image --}}
    <div class="bg-gray-100 shadow-md rounded px-8 py-6 text-center">
        <p class="text-gray-700 text-lg mb-4">
            page d'ajoute et de mis a jour des classes
        </p>

        <img
            src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b"
            alt="School"
            class="mx-auto w-1/2 rounded-lg shadow-md">
    </div>

    {{-- Retour --}}
    <div class="flex justify-center mt-6">
        <a href="{{ route('settings') }}"
        class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-6 rounded transition">
            ← Retour aux paramètres
        </a>
    </div>
</div>