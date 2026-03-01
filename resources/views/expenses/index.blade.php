<x-app-layout>
    {{-- Flash success --}}
    @if (session('success'))
        <div class="mb-6 rounded-2xl bg-emerald-500/10 ring-1 ring-emerald-400/20 p-4 w-1/2 m-auto">
            <div class="flex items-center justify-between">
                <span class="text-sm font-semibold text-emerald-400 m-auto">
                    {{ session('success') }}
                </span>
            </div>
        </div>
    @endif

    <div x-data="{ open: @json($errors->any()) }" class="px-8 py-10">

        {{-- Header --}}
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between mb-8">
            <div>
                <h1 class="text-2xl font-semibold text-slate-800">Expenses</h1>
                <p class="text-slate-500 text-sm mt-1">
                    Colocation : <span class="font-semibold">{{ $colocation->name }}</span>
                </p>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('balances.show', $colocation) }}"
                    class="rounded-xl bg-white px-4 py-2.5 text-sm font-semibold text-slate-800 ring-1 ring-slate-200 hover:bg-slate-50 transition">
                    View balances
                </a>

                <button @click="open = true"
                    class="rounded-xl bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white hover:bg-indigo-500 transition shadow-sm">
                    + Add expense
                </button>
            </div>
        </div>

        {{-- Modal form --}}
        @include('expenses._form')

        {{-- Stats cards --}}
        <div class="grid gap-6 md:grid-cols-3 mb-8">
            <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-100">
                <p class="text-sm text-slate-500">Total expenses</p>
                <p class="mt-2 text-2xl font-bold text-slate-800">
                    {{ number_format($expenses->sum('amount'), 2) }} DH
                </p>
                <p class="mt-2 text-xs text-slate-400">All expenses in this colocation</p>
            </div>

            <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-100">
                <p class="text-sm text-slate-500">Members</p>
                <p class="mt-2 text-2xl font-bold text-slate-800">
                    {{ $members->count() }}
                </p>
                <p class="mt-2 text-xs text-slate-400">Active members</p>
            </div>

            <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-100">
                <p class="text-sm text-slate-500">Categories</p>
                <p class="mt-2 text-2xl font-bold text-slate-800">
                    {{ $categories->count() }}
                </p>
                <p class="mt-2 text-xs text-slate-400">For better grouping</p>
            </div>
        </div>

        {{-- List --}}
        @if ($expenses->count())
            <div class="rounded-2xl bg-white shadow-sm ring-1 ring-slate-100 overflow-hidden">
                <div class="flex items-center justify-between px-6 py-4 border-b border-slate-100">
                    <div>
                        <h2 class="text-lg font-semibold text-slate-800">Recent expenses</h2>
                        <p class="text-xs text-slate-500 mt-0.5">Track who paid what</p>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="bg-slate-50">
                            <tr class="text-left text-xs font-semibold text-slate-500">
                                <th class="px-6 py-3">Title</th>
                                <th class="px-6 py-3">Category</th>
                                <th class="px-6 py-3">Paid by</th>
                                <th class="px-6 py-3">Date</th>
                                <th class="px-6 py-3 text-right">Amount</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-slate-100">
                            @foreach ($expenses as $expense)
                                <tr class="hover:bg-slate-50/60 transition">
                                    <td class="px-6 py-4">
                                        <p class="font-semibold text-slate-800">{{ $expense->title }}</p>
                                        @if ($expense->note)
                                            <p class="text-xs text-slate-400 mt-1 line-clamp-1">{{ $expense->note }}</p>
                                        @endif
                                    </td>

                                    <td class="px-6 py-4">
                                        @if ($expense->category)
                                            <span
                                                class="inline-flex items-center rounded-full bg-indigo-50 px-2.5 py-1 text-xs font-semibold text-indigo-700 ring-1 ring-indigo-100">
                                                {{ $expense->category->name }}
                                            </span>
                                        @else
                                            <span class="text-xs text-slate-400">—</span>
                                        @endif
                                    </td>

                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <span
                                                class="inline-flex h-9 w-9 items-center justify-center rounded-xl bg-slate-100 text-slate-700 font-bold">
                                                {{ strtoupper(substr($expense->payer?->name ?? 'U', 0, 1)) }}
                                            </span>
                                            <div>
                                                <p class="text-sm font-semibold text-slate-800">
                                                    {{ $expense->payer?->name ?? 'Unknown' }}</p>
                                                <p class="text-xs text-slate-400">Payer</p>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4">
                                        <p class="text-sm text-slate-700">
                                            {{ $expense->spent_at ? \Carbon\Carbon::parse($expense->spent_at)->format('d/m/Y') : '—' }}
                                        </p>
                                    </td>

                                    <td class="px-6 py-4 text-right">
                                        <p class="text-sm font-bold text-slate-900">
                                            {{ number_format($expense->amount, 2) }} DH
                                        </p>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Footer --}}
                <div class="px-6 py-4 bg-slate-50 border-t border-slate-100 flex items-center justify-between">
                    <p class="text-xs text-slate-500">
                        Showing <span class="font-semibold">{{ $expenses->count() }}</span> expenses
                    </p>
                </div>
            </div>
        @else
            <div class="rounded-2xl bg-white p-10 shadow-sm ring-1 ring-slate-100 text-center">
                <p class="text-slate-500">No expenses yet. Add the first one.</p>
                <button @click="open = true"
                    class="mt-5 rounded-xl bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white hover:bg-indigo-500 transition shadow-sm">
                    + Add expense
                </button>
            </div>
        @endif
    </div>
</x-app-layout>
