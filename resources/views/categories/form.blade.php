<!-- This partial only renders the modal itself. The surrounding x-data and
open flag must be provided by the parent (e.g. the index view). -->

<!-- Overlay -->
<div x-show="open" x-transition class="fixed inset-0 bg-black/40 backdrop-blur-sm flex items-center justify-center z-50">

    <!-- Modal Box -->
    <div @click.away="open = false" class="bg-white rounded-2xl shadow-xl w-full max-w-md p-8 relative">

        <!-- Close Button -->
        <button @click="open = false" class="absolute top-4 right-4 text-slate-400 hover:text-slate-600 text-lg">
            ✕
        </button>

        <h2 class="text-xl font-semibold text-slate-800 mb-6">
            Ajouter une catégorie
        </h2>

        <form action="{{ route('store.categorie', $colocation) }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="text-sm text-slate-600">Nom de la catégorie</label>

                <input type="text" name="name" value="{{ old('name') }}"
                    class="mt-1 w-full rounded-xl border border-slate-200 px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Ex: Food" required>

                @error('name')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end gap-3 pt-4">
                <button type="button" @click="open = false"
                    class="px-4 py-2 text-sm text-slate-600 hover:text-slate-800">
                    Annuler
                </button>

                <button type="submit"
                    class="rounded-xl bg-indigo-600 px-5 py-2 text-sm font-semibold text-white hover:bg-indigo-500 transition">
                    Ajouter
                </button>
            </div>

        </form>

    </div>
</div>
