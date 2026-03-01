<x-app-layout>
    <div class="min-h-screen bg-slate-50 flex items-center justify-center px-4">
        <div class="max-w-md w-full bg-white rounded-3xl p-8 shadow-lg ring-1 ring-slate-200">
            <div class="text-center mb-6">
                <div class="text-5xl mb-4">📨</div>
                <h2 class="text-2xl font-bold text-slate-900">Invitation</h2>
            </div>

            <div class="bg-slate-50 rounded-2xl p-4 mb-6">
                <p class="text-sm text-slate-600 mb-2">You're invited to join:</p>
                <p class="text-lg font-bold text-slate-900">{{ $invitation->colocation->name }}</p>
                <p class="text-sm text-slate-500 mt-2">Role: <span
                        class="font-semibold text-slate-700">{{ ucfirst($invitation->role) }}</span></p>
            </div>

            <p class="text-sm text-slate-600 text-center mb-6">
                Do you want to accept or decline this invitation?
            </p>

            <div class="flex gap-3">
                <form method="POST" action="{{ route('invitations.accept', $invitation->token) }}" class="flex-1">
                    @csrf
                    <button type="submit"
                        class="w-full rounded-2xl bg-emerald-500 hover:bg-emerald-600 px-4 py-3 text-white font-semibold transition flex items-center justify-center gap-2">
                        <span>✔️</span> Accept
                    </button>
                </form>
                <form method="POST" action="{{ route('invitations.decline', $invitation->token) }}" class="flex-1">
                    @csrf
                    <button type="submit"
                        class="w-full rounded-2xl bg-red-500 hover:bg-red-600 px-4 py-3 text-white font-semibold transition flex items-center justify-center gap-2">
                        <span>❌</span> Decline
                    </button>
                </form>
            </div>

            @if ($invitation->expires_at)
                <p class="mt-6 text-xs text-slate-400 text-center">
                    This invitation expires {{ $invitation->expires_at->diffForHumans() }}
                </p>
            @endif
        </div>
    </div>
</x-app-layout>
