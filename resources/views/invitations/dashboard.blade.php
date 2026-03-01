<x-app-layout>
    <div class="bg-slate-50 min-h-screen">
        <div class="mx-auto max-w-7xl px-6 py-10">

            @if (session('success'))
                <div class="mb-6 rounded-2xl bg-emerald-50 ring-1 ring-emerald-200 px-5 py-4 text-emerald-700 shadow-sm">
                    ✔ {{ session('success') }}
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

            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-3xl font-extrabold text-slate-900">Inviter des membres</h1>
                    <p class="mt-2 text-sm text-slate-500">
                        Colocation : <span class="font-semibold text-slate-800">{{ $colocation->name }}</span>
                    </p>
                </div>
            </div>

            {{-- Invite Form --}}
            <div class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-200 mb-8">
                <form method="POST" action="{{ route('invitations.store', $colocation) }}"
                    class="grid md:grid-cols-3 gap-4 items-end">
                    @csrf

                    <div class="md:col-span-2">
                        <label class="text-sm font-semibold text-slate-700">Email</label>
                        <input name="email" value="{{ old('email') }}" type="email"
                            class="mt-2 w-full rounded-2xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="member@email.com">
                        @error('email')
                            <p class="text-rose-600 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>



                    <div class="md:col-span-3 flex justify-end">
                        <button
                            class="rounded-2xl bg-indigo-600 px-6 py-3 text-sm font-semibold text-white hover:bg-indigo-500 transition">
                            + Send Invitation
                        </button>
                    </div>
                </form>
            </div>

            {{-- Invitations List --}}
            {{-- <div class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
                <h2 class="text-lg font-bold text-slate-900 mb-4">Invitations</h2>

                @if ($invitations->count())
                    <div class="divide-y divide-slate-100">
                        @foreach ($invitations as $inv)
                            <div class="py-4 flex items-center justify-between">
                                <div>
                                    <p class="font-semibold text-slate-900">{{ $inv->email }}</p>
                                    <p class="text-sm text-slate-500">
                                        Role: <span class="font-semibold text-slate-700">{{ $inv->role }}</span> •
                                        Status: <span class="font-semibold">{{ $inv->status }}</span>
                                        @if ($inv->expires_at)
                                            • Expires: {{ $inv->expires_at->diffForHumans() }}
                                        @endif
                                    </p>
                                </div>

                                <a href="{{ route('invitations.accept', $inv->token) }}"
                                    class="text-indigo-600 hover:text-indigo-500 text-sm font-semibold">
                                    Copy link
                                </a>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-slate-500">Mazal ma kayna ta invitation.</p>
                @endif
            </div> --}}

        </div>
    </div>
</x-app-layout>
