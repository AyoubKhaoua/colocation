<x-app-layout>


    <div class="mx-auto max-w-2xl px-4 py-10">
        <div class="rounded-3xl bg-white dark:bg-slate-900/60 ring-1 ring-slate-200 dark:ring-white/10 shadow-sm p-8">
            <p class="text-sm text-slate-500 dark:text-slate-400">
                Smiha bchi name واضح (مثلا: “Appartement Maarif”).
            </p>

            <form method="POST" action="{{ route('store.colocation') }}" class="mt-6 space-y-5">
                @csrf

                <div>
                    <label class="text-sm font-semibold text-slate-700 dark:text-slate-200">Nom de la colocation</label>
                    <input name="name" value="{{ old('name') }}" required
                        class="mt-2 w-full rounded-2xl bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 px-4 py-3 text-slate-900 dark:text-white placeholder-slate-400 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                        placeholder="Ex: EasyColoc Maarif">
                    @error('name')
                        <div class="mt-2 text-sm text-rose-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="flex items-center justify-end gap-3">
                    <a href="{{ url()->previous() }}"
                        class="rounded-2xl px-5 py-2.5 text-sm font-semibold text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-white/5">
                        Annuler
                    </a>

                    <button type="submit"
                        class="rounded-2xl bg-emerald-600 px-5 py-2.5 text-sm font-semibold text-white hover:bg-emerald-500">
                        Créer
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
