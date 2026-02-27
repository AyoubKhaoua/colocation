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

    <div x-data="{ open: @json($errors->any()) }" x-init="if ($el.querySelector('.modal-errors')) open = true" class="px-8 py-10">

        <!-- Header -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-2xl font-semibold text-slate-800">
                    Catégories
                </h1>
                <p class="text-slate-500 text-sm mt-1">
                    Colocation : {{ $colocation->name }}
                </p>
            </div>

            <button @click="open = true"
                class="rounded-xl bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white hover:bg-indigo-500 transition shadow-sm">
                + Ajouter catégorie
            </button>
        </div>

        <!-- include modal form -->
        @include('categories.form')


        @if ($categories->count() > 0)

            <div class="grid md:grid-cols-3 gap-6">

                @foreach ($categories as $category)
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 hover:shadow-md transition">

                        <!-- Icon -->
                        <div class="flex items-center justify-between mb-5">
                            <div
                                class="h-12 w-12 flex items-center justify-center 
                            rounded-xl bg-indigo-100 text-indigo-600 font-bold text-lg">
                                {{ strtoupper(substr($category->name, 0, 1)) }}
                            </div>

                            {{--  <span class="text-xs text-slate-400">
                                {{ $category->expenses->count() ?? 0 }} dépenses
                            </span> --}}
                        </div>

                        <!-- Name -->
                        <h3 class="text-lg font-semibold text-slate-800">
                            {{ $category->name }}
                        </h3>

                        <!-- Actions -->
                        <div class="mt-6 flex items-center gap-4 text-sm">
                            <button class="text-indigo-600 hover:text-indigo-500 font-medium">
                                Modifier
                            </button>

                            <form action="{{ route('destroy.categorie', $category) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this category?');"
                                class="inline">
                                @csrf

                                <button type="submit" class="text-red-500 hover:text-red-400 font-medium">
                                    Supprimer
                                </button>
                            </form>
                        </div>

                    </div>
                @endforeach

            </div>
        @else
            <!-- Empty State -->
            <div class="bg-white rounded-2xl p-10 shadow-sm border border-slate-100 text-center">
                <p class="text-slate-500">
                    Aucune catégorie disponible pour le moment.
                </p>
            </div>

        @endif

    </div>

</x-app-layout>
