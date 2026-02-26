<header class="relative z-10 border-b border-white/20 bg-slate-900">
    <div class="mx-auto flex max-w-6xl items-center justify-between px-4 py-4">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 font-semibold tracking-tight">
            <img src="{{ asset('images/logo.png') }}" alt="EasyColoc Logo" class="h-20 w-auto">
        </a>

        <nav class="flex items-center gap-2">

            <a href="{{ route('profile.edit') }}"
                class="rounded-xl px-4 py-2 text-sm font-medium text-slate-200 hover:text-white hover:bg-white/5">
                Profile
            </a>
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit"
                    class="rounded-xl bg-indigo-500 px-4 py-2 text-sm font-semibold text-white shadow-lg shadow-indigo-500/20 hover:bg-indigo-400">
                    Logout
                </button>
            </form>
        </nav>
    </div>
</header>
