<x-app-layout>
    <div class="bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-6 py-10">

            <h1 class="text-3xl font-extrabold text-slate-900 mb-8">
                Admin Dashboard
            </h1>

            <div class="grid md:grid-cols-3 gap-6">

                <div class="bg-white rounded-3xl p-6 shadow-sm ring-1 ring-slate-200">
                    <p class="text-sm text-slate-500">Total Users</p>
                    <p class="text-3xl font-bold text-indigo-600 mt-2">
                        {{ $usersCount }}
                    </p>
                </div>

                <div class="bg-white rounded-3xl p-6 shadow-sm ring-1 ring-slate-200">
                    <p class="text-sm text-slate-500">Total Colocations</p>
                    <p class="text-3xl font-bold text-emerald-600 mt-2">
                        {{ $colocationsCount }}
                    </p>
                </div>

                <div class="bg-white rounded-3xl p-6 shadow-sm ring-1 ring-slate-200">
                    <p class="text-sm text-slate-500">Total Expenses</p>
                    <p class="text-3xl font-bold text-rose-600 mt-2">
                        {{ $expensesCount }}
                    </p>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
