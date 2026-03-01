<x-app-layout>
    <div class="bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-6 py-10 space-y-10">

            <!-- header + stats -->
            <div class="space-y-4">
                <h1 class="text-3xl font-extrabold text-slate-900">Admin Dashboard</h1>
                <p class="text-sm text-slate-500">Overview of users, colocations and expenses.</p>

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

            <!-- user management section -->
            <div>

                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h1 class="text-2xl font-bold text-slate-900">Users</h1>
                        <p class="text-sm text-slate-500 mt-1">Manage roles and access</p>
                    </div>

                    <form class="flex gap-2">
                        <input name="q" value="{{ $q }}"
                            class="rounded-xl border border-slate-200 px-4 py-2 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Search name/email..." />
                        <button
                            class="rounded-xl bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-500">
                            Search
                        </button>
                    </form>
                </div>

                @if (session('success'))
                    <div class="mb-4 rounded-2xl bg-emerald-500/10 ring-1 ring-emerald-400/20 p-4">
                        <p class="text-sm font-semibold text-emerald-600">{{ session('success') }}</p>
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-4 rounded-2xl bg-rose-500/10 ring-1 ring-rose-400/20 p-4">
                        <p class="text-sm font-semibold text-rose-600">{{ session('error') }}</p>
                    </div>
                @endif

                <div class="bg-white rounded-3xl shadow-sm ring-1 ring-slate-200 overflow-hidden">
                    <table class="w-full text-sm">
                        <thead class="bg-slate-100/70 text-slate-600">
                            <tr>
                                <th class="text-left p-4">User</th>
                                <th class="text-left p-4">Role</th>
                                <th class="text-left p-4">Status</th>
                                <th class="text-right p-4">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $user)
                                <tr class="border-t border-slate-100">
                                    <td class="p-4">
                                        <div class="font-semibold text-slate-900">{{ $user->name }}</div>
                                        <div class="text-slate-500">{{ $user->email }}</div>
                                    </td>

                                    <td class="p-4">
                                        <span
                                            class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold
                                        {{ $user->role === 'admin' ? 'bg-indigo-100 text-indigo-700' : 'bg-slate-100 text-slate-700' }}">
                                            {{ $user->role }}
                                        </span>
                                    </td>

                                    <td class="p-4">
                                        <span
                                            class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold
                                        {{ $user->is_blocked ? 'bg-rose-100 text-rose-700' : 'bg-emerald-100 text-emerald-700' }}">
                                            {{ $user->is_blocked ? 'blocked' : 'active' }}
                                        </span>
                                    </td>

                                    <td class="p-4 text-right">
                                        <form action="{{ route('users.block', $user) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit"
                                                class="text-sm font-medium {{ $user->is_blocked ? 'text-emerald-600' : 'text-rose-600' }} hover:underline">
                                                {{ $user->is_blocked ? 'Unblock' : 'Block' }}
                                            </button>
                                        </form>
                                    </td>


                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>



            </div>
        </div>
    </div>
</x-app-layout>
