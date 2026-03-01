<x-app-layout>
    @if (session('success'))
        <div class="mb-6 rounded-2xl bg-emerald-500/10 ring-1 ring-emerald-400/20 p-4 w-1/2 m-auto">
            <div class="flex items-center justify-between">
                <span class="text-sm font-semibold text-emerald-400 m-auto">
                    {{ session('success') }}
                </span>
            </div>
        </div>
    @endif
    @if (session('error'))
        <div class="mb-6 rounded-2xl bg-red-500/10 ring-1 ring-red-400/20 p-4 w-1/2 m-auto">
            <div class="flex items-center justify-between">
                <span class="text-sm font-semibold text-red-400 m-auto">
                    {{ session('error') }}
                </span>
            </div>
        </div>
    @endif

    <div class="min-h-[calc(100vh-7rem)] bg-slate-50 dark:bg-slate-950">
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
            <div class="grid gap-6 lg:grid-cols-[280px_1fr]">
                {{-- SIDEBAR --}}
                <aside
                    class="rounded-3xl bg-white dark:bg-slate-900/60 ring-1 ring-slate-200 dark:ring-white/10 shadow-sm">
                    <div class="p-5">
                        {{-- Logo --}}
                        <div class="flex items-center gap-3">
                            <div
                                class="h-11 w-11 rounded-2xl bg-emerald-500/15 ring-1 ring-emerald-400/25 grid place-items-center">
                                <span class="text-emerald-400 font-black text-lg">E</span>
                            </div>
                            <div class="leading-tight">
                                <div class="text-lg font-semibold text-slate-900 dark:text-white">EasyColoc</div>
                                <div class="text-xs text-slate-500 dark:text-slate-400">User space</div>
                            </div>
                        </div>

                        {{-- Divider --}}
                        <div class="my-5 h-px bg-slate-200 dark:bg-white/10"></div>

                        {{-- Section title --}}
                        <div class="text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">
                            Mes colocations
                        </div>

                        {{-- Colocations list (dynamic) --}}
                        <div class="mt-3 space-y-2">
                            @foreach ($colocations as $coloc)
                                <a href="#"
                                    class="group flex items-center gap-3 rounded-2xl px-3 py-2.5 hover:bg-slate-100 dark:hover:bg-white/5">
                                    <span
                                        class="inline-flex h-9 w-9 items-center justify-center rounded-xl bg-white/5 ring-1 ring-white/10">
                                        🏠
                                    </span>
                                    <div class="min-w-0">
                                        <div class="truncate text-sm font-medium text-slate-700 dark:text-slate-200">
                                            {{ $coloc->name }}
                                        </div>
                                        <div class="text-xs text-slate-500 dark:text-slate-400">
                                            {{ $coloc->members()->count() ?? 0 }} membres
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>

                        <a href="show">
                            <button
                                class="mt-5 w-full rounded-2xl bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">
                                + Créer une colocation
                            </button></a>

                        {{-- reputation --}}
                        <div
                            class="mt-6 rounded-2xl bg-slate-50 dark:bg-white/5 ring-1 ring-slate-200 dark:ring-white/10 p-4">
                            <div
                                class="text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">
                                Ma réputation
                            </div>
                            <div class="mt-2 flex items-center justify-between">
                                <div class="text-sm font-semibold text-slate-900 dark:text-white">Score</div>
                                <div
                                    class="rounded-full bg-emerald-500/10 px-3 py-1 text-xs font-semibold text-emerald-400 ring-1 ring-emerald-400/20">
                                    0 pts
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- user card --}}
                    <div class="border-t border-slate-200 dark:border-white/10 p-5">
                        <div class="flex items-center gap-3">
                            <div
                                class="h-11 w-11 rounded-2xl bg-emerald-500/15 ring-1 ring-emerald-400/25 grid place-items-center">
                                <span class="text-emerald-400 font-bold">
                                    {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                                </span>
                            </div>
                            <div class="min-w-0">
                                <div class="truncate text-sm font-semibold text-slate-900 dark:text-white">
                                    {{ auth()->user()->name }}
                                </div>
                                <div class="truncate text-xs text-slate-500 dark:text-slate-400">
                                    {{ auth()->user()->email }}
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>

                {{-- MAIN --}}
                <section class="space-y-6">
                    {{-- TOP SUMMARY --}}
                    <div class="grid gap-6 xl:grid-cols-2">
                        {{-- Balance card --}}
                        <div
                            class="rounded-3xl bg-white dark:bg-slate-900/60 ring-1 ring-slate-200 dark:ring-white/10 shadow-sm p-6">
                            <div class="flex items-start justify-between">
                                <div>
                                    <div class="text-sm font-semibold text-slate-500 dark:text-slate-400">Mon solde
                                    </div>

                                    {{-- Replace with dynamic value --}}
                                    @php
                                        $balance = -75.0; // TODO replace by real computed balance
                                    @endphp

                                    <div
                                        class="mt-2 text-4xl font-black tracking-tight
                                        {{ $balance < 0 ? 'text-rose-500' : 'text-emerald-500' }}">
                                        {{ number_format($balance, 2, ',', ' ') }} MAD
                                    </div>

                                    <div class="mt-2 text-sm text-slate-500 dark:text-slate-400">
                                        Statut :
                                        <span
                                            class="font-semibold {{ $balance < 0 ? 'text-rose-400' : 'text-emerald-400' }}">
                                            {{ $balance < 0 ? 'Vous devez payer' : 'Vous êtes créditeur' }}
                                        </span>
                                    </div>
                                </div>

                                <div
                                    class="h-14 w-14 rounded-2xl grid place-items-center
                                    {{ $balance < 0 ? 'bg-rose-500/10 ring-1 ring-rose-400/20' : 'bg-emerald-500/10 ring-1 ring-emerald-400/20' }}">
                                    <span class="text-2xl">{{ $balance < 0 ? '⬇️' : '⬆️' }}</span>
                                </div>
                            </div>

                            <div class="mt-6 grid grid-cols-2 gap-3">
                                <button
                                    class="rounded-2xl bg-slate-900 px-4 py-2.5 text-sm font-semibold text-white hover:bg-slate-800 dark:bg-white/10 dark:hover:bg-white/15">
                                    Voir dettes
                                </button>
                                <button
                                    class="rounded-2xl bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-indigo-500">
                                    Recalculer
                                </button>
                            </div>
                        </div>

                        {{-- Quick actions --}}
                        <div
                            class="rounded-3xl bg-white dark:bg-slate-900/60 ring-1 ring-slate-200 dark:ring-white/10 shadow-sm p-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <div class="text-sm font-semibold text-slate-500 dark:text-slate-400">Actions
                                        rapides</div>
                                    <div class="mt-1 text-lg font-bold text-slate-900 dark:text-white">Gérer la
                                        colocation</div>
                                </div>
                                <div class="text-xs text-slate-500 dark:text-slate-400">Coloc: <span
                                        class="font-semibold">test</span></div>
                            </div>

                            <div class="mt-5 grid gap-4 sm:grid-cols-2">
                                <a href="#"
                                    class="group rounded-3xl bg-slate-50 dark:bg-white/5 ring-1 ring-slate-200 dark:ring-white/10 p-5 hover:shadow-sm transition">
                                    <div class="flex items-center gap-3">
                                        <span
                                            class="h-11 w-11 rounded-2xl bg-orange-500/10 ring-1 ring-orange-400/20 grid place-items-center">🧾</span>
                                        <div>
                                            <div class="font-semibold text-slate-900 dark:text-white">Nouvelle dépense
                                            </div>
                                            <div class="text-xs text-slate-500 dark:text-slate-400">Ajouter une dépense
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <a href="{{ route('invitations.index') }}"
                                    class="group rounded-3xl bg-slate-50 dark:bg-white/5 ring-1 ring-slate-200 dark:ring-white/10 p-5 hover:shadow-sm transition">
                                    <div class="flex items-center gap-3">
                                        <span
                                            class="h-11 w-11 rounded-2xl bg-sky-500/10 ring-1 ring-sky-400/20 grid place-items-center">👤</span>
                                        <div>
                                            <div class="font-semibold text-slate-900 dark:text-white">Inviter membre
                                            </div>
                                            <div class="text-xs text-slate-500 dark:text-slate-400">Envoyer invitation
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <a href="categories"
                                    class="group rounded-3xl bg-slate-50 dark:bg-white/5 ring-1 ring-slate-200 dark:ring-white/10 p-5 hover:shadow-sm transition">
                                    <div class="flex items-center gap-3">
                                        <span
                                            class="h-11 w-11 rounded-2xl bg-emerald-500/10 ring-1 ring-emerald-400/20 grid place-items-center">🏷️</span>
                                        <div>
                                            <div class="font-semibold text-slate-900 dark:text-white">Catégories</div>
                                            <div class="text-xs text-slate-500 dark:text-slate-400">Gérer catégories
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <div
                                    class="rounded-3xl bg-slate-50 dark:bg-white/5 ring-1 ring-slate-200 dark:ring-white/10 p-5">
                                    <div class="flex items-center gap-3">
                                        <span
                                            class="h-11 w-11 rounded-2xl bg-violet-500/10 ring-1 ring-violet-400/20 grid place-items-center">👥</span>
                                        <div>
                                            <div class="font-semibold text-slate-900 dark:text-white">Membres actifs
                                            </div>
                                            {{-- replace by dynamic --}}
                                            <div class="text-xs text-slate-500 dark:text-slate-400"><span
                                                    class="font-bold text-white">0</span> membres</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- TABS + CONTENT --}}
                    <div
                        class="rounded-3xl bg-white dark:bg-slate-900/60 ring-1 ring-slate-200 dark:ring-white/10 shadow-sm">
                        <div
                            class="flex flex-wrap items-center justify-between gap-3 border-b border-slate-200 dark:border-white/10 px-6 py-4">
                            <div class="flex items-center gap-2">
                                <button
                                    class="rounded-xl bg-emerald-500/10 px-4 py-2 text-sm font-semibold text-emerald-400 ring-1 ring-emerald-400/20">
                                    Transactions
                                </button>
                                <button
                                    class="rounded-xl px-4 py-2 text-sm font-semibold text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-white/5">
                                    Dettes
                                </button>
                                <button
                                    class="rounded-xl px-4 py-2 text-sm font-semibold text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-white/5">
                                    Membres
                                </button>
                            </div>

                            <div
                                class="rounded-full bg-orange-500/10 px-4 py-2 text-sm font-semibold text-orange-400 ring-1 ring-orange-400/20">
                                Total: 0 MAD
                            </div>
                        </div>

                        <div class="p-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <div class="text-sm font-semibold text-slate-900 dark:text-white">Historique</div>
                                    <div class="text-xs text-slate-500 dark:text-slate-400">Dernières opérations</div>
                                </div>
                            </div>

                            {{-- Empty state --}}
                            <div
                                class="mt-6 rounded-3xl bg-slate-50 dark:bg-white/5 ring-1 ring-slate-200 dark:ring-white/10 p-10 text-center">
                                <div
                                    class="mx-auto mb-3 h-12 w-12 rounded-2xl bg-slate-900/5 dark:bg-white/10 grid place-items-center">
                                    👻
                                </div>
                                <div class="text-sm font-semibold text-slate-900 dark:text-white">Aucune transaction
                                </div>
                                <div class="mt-1 text-xs text-slate-500 dark:text-slate-400">
                                    Ajoute une dépense pour voir l’historique ici.
                                </div>

                                <div class="mt-5">
                                    <a href="#"
                                        class="inline-flex items-center justify-center rounded-2xl bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white hover:bg-indigo-500">
                                        + Nouvelle dépense
                                    </a>
                                </div>
                            </div>

                            {{-- Example table (when you have data) --}}
                            {{-- 
                            <div class="mt-6 overflow-hidden rounded-2xl ring-1 ring-slate-200 dark:ring-white/10">
                                <table class="min-w-full divide-y divide-slate-200 dark:divide-white/10">
                                    <thead class="bg-slate-50 dark:bg-white/5">
                                        <tr>
                                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500">Date</th>
                                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500">Titre</th>
                                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-500">Payeur</th>
                                            <th class="px-4 py-3 text-right text-xs font-semibold text-slate-500">Montant</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-200 dark:divide-white/10 bg-white dark:bg-transparent">
                                        <tr class="hover:bg-slate-50 dark:hover:bg-white/5">
                                            <td class="px-4 py-3 text-sm text-slate-600 dark:text-slate-300">2026-02-26</td>
                                            <td class="px-4 py-3 text-sm font-semibold text-slate-900 dark:text-white">Internet</td>
                                            <td class="px-4 py-3 text-sm text-slate-600 dark:text-slate-300">Imran</td>
                                            <td class="px-4 py-3 text-sm font-bold text-right text-slate-900 dark:text-white">150.00 MAD</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> 
                            --}}
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
