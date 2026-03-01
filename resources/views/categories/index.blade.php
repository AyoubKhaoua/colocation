<x-app-layout>

    <div class="bg-slate-50 min-h-screen">
        <div class="mx-auto max-w-7xl px-6 py-10">

            {{-- Flash Message --}}
            @if (session('success'))
                <div class="mb-6 rounded-2xl bg-emerald-50 ring-1 ring-emerald-200 px-5 py-4 text-emerald-700 shadow-sm">
                    <span class="font-semibold">✔</span> {{ session('success') }}
                </div>
            @endif


            <div x-data="{ open: @json($errors->any()) }">

                {{-- Header --}}
                <div class="flex items-center justify-between mb-10">
                    <div>
                        <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">
                            Catégories
                        </h1>
                        <p class="mt-2 text-sm text-slate-500">
                            Colocation :
                            <span class="font-semibold text-slate-800">
                                {{ $colocation->name }}
                            </span>
                        </p>
                    </div>


                </div>

                {{-- Modal --}}
                @include('categories.form')

                {{-- Grid --}}
                @if ($categories->count() > 0)

                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">

                        @foreach ($categories as $category)
                            <div
                                class="group rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-200 hover:shadow-md hover:-translate-y-1 transition">

                                {{-- Top Section --}}
                                <div class="flex items-start justify-between">

                                    <div class="flex items-center gap-4">
                                        <div
                                            class="h-14 w-14 rounded-2xl bg-indigo-100 text-indigo-600 
                                        flex items-center justify-center text-xl font-bold ring-1 ring-indigo-200">
                                            {{ strtoupper(substr($category->name, 0, 1)) }}
                                        </div>

                                        <div>
                                            <h3 class="text-lg font-bold text-slate-900">
                                                {{ $category->name }}
                                            </h3>
                                            <p class="text-xs text-slate-500 mt-1">
                                                Created {{ $category->created_at->diffForHumans() }}
                                            </p>
                                        </div>
                                    </div>

                                </div>

                                {{-- Divider --}}
                                <div class="my-5 h-px bg-slate-100"></div>

                                {{-- Actions --}}
                                <div class="flex items-center justify-between">

                                    <button
                                        class="text-sm font-semibold text-indigo-600 hover:text-indigo-500 transition">
                                        Modifier
                                    </button>

                                    <form action="{{ route('destroy.categorie', $category) }}" method="POST"
                                        onsubmit="return confirm('Delete this category?');">
                                        @csrf


                                        <button type="submit"
                                            class="inline-flex items-center gap-1 rounded-xl bg-rose-50 px-3 py-2 text-sm font-semibold text-rose-600 ring-1 ring-rose-200 hover:bg-rose-100 transition">
                                            🗑 Supprimer
                                        </button>
                                    </form>

                                </div>

                            </div>
                        @endforeach

                    </div>
                @else
                    {{-- Empty State --}}
                    <div class="rounded-3xl bg-white p-14 text-center shadow-sm ring-1 ring-slate-200">
                        <div class="text-4xl mb-4">📂</div>
                        <h3 class="text-lg font-bold text-slate-900">
                            Aucune catégorie pour le moment
                        </h3>
                        <p class="text-sm text-slate-500 mt-2">
                            Commencez par créer votre première catégorie.
                        </p>

                        <button @click="open = true"
                            class="mt-6 inline-flex items-center gap-2 rounded-2xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white hover:bg-indigo-500 transition">
                            + Ajouter catégorie
                        </button>
                    </div>

                @endif

            </div>

        </div>
    </div>

</x-app-layout>
