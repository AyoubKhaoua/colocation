<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-950 text-slate-100 antialiased">
    {{-- Background glow --}}
    <div class="pointer-events-none fixed inset-0 overflow-hidden">
        <div
            class="absolute -top-40 left-1/2 h-[520px] w-[520px] -translate-x-1/2 rounded-full bg-indigo-500/20 blur-3xl">
        </div>
        <div class="absolute -bottom-40 right-0 h-[520px] w-[520px] rounded-full bg-emerald-500/10 blur-3xl"></div>
    </div>

    {{-- Navbar --}}
    <header class="relative z-10 border-b border-white/10 bg-slate-950/60 backdrop-blur">
        <div class="mx-auto flex max-w-6xl items-center justify-between px-4 py-4">
            <a href="/" class="flex items-center gap-2 font-semibold tracking-tight">
                <img src="{{ asset('images/logo.png') }}" alt="EasyColoc Logo" class="h-20 w-auto">
            </a>

            <nav class="flex items-center gap-2">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ route('admin.dashboard') }}"
                            class="rounded-xl bg-white/10 px-4 py-2 text-sm font-medium ring-1 ring-white/15 hover:bg-white/15">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="rounded-xl px-4 py-2 text-sm font-medium text-slate-200 hover:text-white hover:bg-white/5">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="rounded-xl bg-indigo-500 px-4 py-2 text-sm font-semibold text-white shadow-lg shadow-indigo-500/20 hover:bg-indigo-400">
                                Register
                            </a>
                        @endif
                    @endauth
                @endif
            </nav>
        </div>
    </header>

    {{-- Hero --}}
    <main class="relative z-10">
        <section class="mx-auto max-w-6xl px-4 pt-14 pb-10">
            <div class="grid items-center gap-10 lg:grid-cols-2">
                <div>
                    <p
                        class="inline-flex items-center gap-2 rounded-full bg-white/5 px-3 py-1 text-xs font-medium text-slate-200 ring-1 ring-white/10">
                        <span class="h-2 w-2 rounded-full bg-emerald-400"></span>
                        Simple. Transparent. Fair.
                    </p>

                    <h1 class="mt-4 text-4xl font-bold tracking-tight sm:text-5xl">
                        Split expenses with your roommates,
                        <span class="text-indigo-300">without headaches</span>.
                    </h1>

                    <p class="mt-4 text-base leading-relaxed text-slate-300">
                        Create a colocation, invite members, add expenses by category and let the app calculate
                        who owes who — with simplified reimbursements and payment tracking.
                    </p>

                    <div class="mt-6 flex flex-col gap-3 sm:flex-row">
                        @auth
                            <a href="{{ route('admin.dashboard') }}"
                                class="inline-flex items-center justify-center rounded-xl bg-indigo-500 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-500/20 hover:bg-indigo-400">
                                Go to dashboard
                            </a>
                        @else
                            <a href="{{ Route::has('register') ? route('register') : route('login') }}"
                                class="inline-flex items-center justify-center rounded-xl bg-indigo-500 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-500/20 hover:bg-indigo-400">
                                Get started
                            </a>
                            <a href="{{ route('login') }}"
                                class="inline-flex items-center justify-center rounded-xl bg-white/5 px-5 py-3 text-sm font-semibold text-slate-100 ring-1 ring-white/10 hover:bg-white/10">
                                I already have an account
                            </a>
                        @endauth
                    </div>

                    <div class="mt-8 grid grid-cols-3 gap-4 text-center">
                        <div class="rounded-2xl bg-white/5 p-4 ring-1 ring-white/10">
                            <p class="text-2xl font-bold">1</p>
                            <p class="mt-1 text-xs text-slate-300">Active colocation / user</p>
                        </div>
                        <div class="rounded-2xl bg-white/5 p-4 ring-1 ring-white/10">
                            <p class="text-2xl font-bold">Auto</p>
                            <p class="mt-1 text-xs text-slate-300">Balances & settlements</p>
                        </div>
                        <div class="rounded-2xl bg-white/5 p-4 ring-1 ring-white/10">
                            <p class="text-2xl font-bold">✓</p>
                            <p class="mt-1 text-xs text-slate-300">Mark payments paid</p>
                        </div>
                    </div>
                </div>

                {{-- Right card --}}
                <div class="rounded-3xl bg-white/5 p-6 ring-1 ring-white/10">
                    <div class="rounded-2xl bg-slate-900/70 p-5 ring-1 ring-white/10">
                        <p class="text-sm font-semibold">Example</p>
                        <p class="mt-1 text-sm text-slate-300">“Rent + Groceries” colocation</p>

                        <div class="mt-5 space-y-3">
                            <div class="flex items-center justify-between rounded-xl bg-white/5 px-4 py-3">
                                <div>
                                    <p class="text-sm font-semibold">Groceries</p>
                                    <p class="text-xs text-slate-300">Paid by: Imran</p>
                                </div>
                                <p class="text-sm font-bold">240.00 MAD</p>
                            </div>

                            <div class="flex items-center justify-between rounded-xl bg-white/5 px-4 py-3">
                                <div>
                                    <p class="text-sm font-semibold">Internet</p>
                                    <p class="text-xs text-slate-300">Paid by: Sara</p>
                                </div>
                                <p class="text-sm font-bold">199.00 MAD</p>
                            </div>

                            <div
                                class="flex items-center justify-between rounded-xl bg-emerald-500/10 px-4 py-3 ring-1 ring-emerald-500/20">
                                <div>
                                    <p class="text-sm font-semibold">Settlement</p>
                                    <p class="text-xs text-slate-300">Yassine → Imran</p>
                                </div>
                                <p class="text-sm font-bold text-emerald-300">+80.25 MAD</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5 grid grid-cols-3 gap-3">
                        <div class="rounded-2xl bg-white/5 p-4 ring-1 ring-white/10">
                            <p class="text-xs text-slate-300">Categories</p>
                            <p class="mt-1 text-sm font-semibold">Rent, Food, Bills</p>
                        </div>
                        <div class="rounded-2xl bg-white/5 p-4 ring-1 ring-white/10">
                            <p class="text-xs text-slate-300">Reputation</p>
                            <p class="mt-1 text-sm font-semibold">+1 / -1</p>
                        </div>
                        <div class="rounded-2xl bg-white/5 p-4 ring-1 ring-white/10">
                            <p class="text-xs text-slate-300">Admin</p>
                            <p class="mt-1 text-sm font-semibold">Stats & ban</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Features --}}
        <section class="mx-auto max-w-6xl px-4 pb-12">
            <div class="grid gap-6 md:grid-cols-3">
                <div class="rounded-3xl bg-white/5 p-6 ring-1 ring-white/10">
                    <p class="text-lg font-semibold">Invitations by token</p>
                    <p class="mt-2 text-sm leading-relaxed text-slate-300">
                        Invite members via email/token and control who can join your colocation.
                    </p>
                </div>

                <div class="rounded-3xl bg-white/5 p-6 ring-1 ring-white/10">
                    <p class="text-lg font-semibold">Balances & “who owes who”</p>
                    <p class="mt-2 text-sm leading-relaxed text-slate-300">
                        Automatic calculation of each member’s balance and simplified reimbursements.
                    </p>
                </div>

                <div class="rounded-3xl bg-white/5 p-6 ring-1 ring-white/10">
                    <p class="text-lg font-semibold">Track payments</p>
                    <p class="mt-2 text-sm leading-relaxed text-slate-300">
                        Mark settlements as paid to keep everything clear and up-to-date.
                    </p>
                </div>
            </div>
        </section>

        {{-- How it works --}}
        <section class="mx-auto max-w-6xl px-4 pb-16">
            <div class="rounded-3xl bg-white/5 p-8 ring-1 ring-white/10">
                <h2 class="text-2xl font-bold">How it works</h2>
                <div class="mt-6 grid gap-6 md:grid-cols-3">
                    <div class="rounded-2xl bg-slate-900/60 p-6 ring-1 ring-white/10">
                        <p class="text-sm font-semibold text-indigo-300">Step 1</p>
                        <p class="mt-1 font-semibold">Create a colocation</p>
                        <p class="mt-2 text-sm text-slate-300">You become the Owner automatically.</p>
                    </div>
                    <div class="rounded-2xl bg-slate-900/60 p-6 ring-1 ring-white/10">
                        <p class="text-sm font-semibold text-indigo-300">Step 2</p>
                        <p class="mt-1 font-semibold">Invite members</p>
                        <p class="mt-2 text-sm text-slate-300">Join via token and keep 1 active colocation per user.
                        </p>
                    </div>
                    <div class="rounded-2xl bg-slate-900/60 p-6 ring-1 ring-white/10">
                        <p class="text-sm font-semibold text-indigo-300">Step 3</p>
                        <p class="mt-1 font-semibold">Add expenses</p>
                        <p class="mt-2 text-sm text-slate-300">App recalculates balances and suggests reimbursements.
                        </p>
                    </div>
                </div>

                <div class="mt-8 flex flex-col items-start justify-between gap-4 sm:flex-row sm:items-center">
                    <p class="text-sm text-slate-300">
                        Ready to test your app with real data?
                    </p>
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="rounded-xl bg-indigo-500 px-5 py-3 text-sm font-semibold text-white hover:bg-indigo-400">
                            Open dashboard
                        </a>
                    @else
                        <a href="{{ route('register') }}"
                            class="rounded-xl bg-indigo-500 px-5 py-3 text-sm font-semibold text-white hover:bg-indigo-400">
                            Create account
                        </a>
                    @endauth
                </div>
            </div>
        </section>

        {{-- Footer --}}
        <footer class="border-t border-white/10 py-8">
            <div
                class="mx-auto flex max-w-6xl flex-col gap-2 px-4 text-sm text-slate-400 sm:flex-row sm:items-center sm:justify-between">
                <p>© {{ date('Y') }} {{ config('app.name', 'ColocPay') }}. All rights reserved.</p>
                <p class="text-slate-500">Built with Laravel + Tailwind.</p>
            </div>
        </footer>
    </main>
</body>

</html>
