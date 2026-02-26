<x-app-layout>
    <div class="py-10 bg-slate-950 min-h-screen">
        <div class="max-w-7xl mx-auto px-6">

            <h1 class="text-3xl font-bold text-white mb-8">
                Admin Dashboard
            </h1>

            <!-- Stats -->
            <div class="grid md:grid-cols-3 gap-6 mb-10">
                <div class="bg-white/10 p-6 rounded-2xl shadow-lg ring-1 ring-white/10">
                    <p class="text-slate-400 text-sm">Total Users</p>
                    <h2 class="text-2xl font-bold text-white mt-2">
                        {{--    {{ $usersCount }} --}}
                    </h2>
                </div>

                <div class="bg-white/10 p-6 rounded-2xl shadow-lg ring-1 ring-white/10">
                    <p class="text-slate-400 text-sm">Total Colocations</p>
                    <h2 class="text-2xl font-bold text-white mt-2">
                        {{--   {{ $colocationsCount }} --}}
                    </h2>
                </div>

                <div class="bg-white/10 p-6 rounded-2xl shadow-lg ring-1 ring-white/10">
                    <p class="text-slate-400 text-sm">Total Expenses</p>
                    <h2 class="text-2xl font-bold text-white mt-2">
                        {{-- {{ $expensesCount }} --}}
                    </h2>
                </div>
            </div>

            <!-- Latest Users -->
            <div class="bg-white/10 p-6 rounded-2xl shadow-lg ring-1 ring-white/10">
                <h2 class="text-lg font-semibold text-white mb-4">
                    Latest Users
                </h2>

                <div class="space-y-3">
                    {{--  @foreach ($latestUsers as $user)
                        <div class="flex justify-between items-center bg-slate-800/60 p-3 rounded-xl">
                            <div>
                                <p class="text-white font-medium">{{ $user->name }}</p>
                                <p class="text-sm text-slate-400">{{ $user->email }}</p>
                            </div>
                            <span
                                class="text-xs px-3 py-1 rounded-full 
                                {{ $user->role === 'admin' ? 'bg-indigo-500/20 text-indigo-300' : 'bg-slate-700 text-slate-300' }}">
                                {{ $user->role }}
                            </span>
                        </div>
                    @endforeach --}}
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
