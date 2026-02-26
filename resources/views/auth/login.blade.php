<x-guest-layout>
    <div class="min-h-screen bg-slate-950 text-white">
        {{-- background blobs --}}
        <div class="pointer-events-none absolute inset-0 overflow-hidden">
            <div class="absolute -top-24 -left-24 h-72 w-72 rounded-full bg-indigo-500/20 blur-3xl"></div>
            <div class="absolute top-1/3 -right-24 h-72 w-72 rounded-full bg-fuchsia-500/15 blur-3xl"></div>
            <div class="absolute bottom-0 left-1/4 h-72 w-72 rounded-full bg-cyan-500/10 blur-3xl"></div>
        </div>

        <div class="relative mx-auto flex min-h-screen items-center justify-center px-4 py-10">
            <div class="max-w-md mx-auto w-full">
                {{-- Brand --}}
                <a href="/" class="mb-6 flex items-center justify-center gap-3">
                    <img src="{{ asset('images/logo.png') }}" alt="EasyColoc" class="h-20 w-20 rounded-2xl" />

                </a>

                {{-- Card --}}
                <div class="rounded-3xl bg-white/5 p-6 shadow-2xl ring-1 ring-white/10 backdrop-blur">
                    <div class="mb-6 text-center">
                        <h1 class="text-2xl font-semibold">Welcome back</h1>
                        <p class="mt-1 text-sm text-slate-300">Log in to manage your colocation.</p>
                    </div>

                    {{-- Session Status --}}
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}" class="space-y-4">
                        @csrf

                        {{-- Email --}}
                        <div>
                            <x-input-label for="email" :value="__('Email')" class="text-slate-200" />
                            <x-text-input id="email"
                                class="mt-1 block w-full rounded-xl border-white/10 bg-white/5 text-white placeholder:text-slate-400 focus:border-indigo-400 focus:ring-indigo-400"
                                type="email" name="email" :value="old('email')" required autofocus
                                autocomplete="username" placeholder="you@example.com" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        {{-- Password --}}
                        <div>
                            <x-input-label for="password" :value="__('Password')" class="text-slate-200" />
                            <x-text-input id="password"
                                class="mt-1 block w-full rounded-xl border-white/10 bg-white/5 text-white placeholder:text-slate-400 focus:border-indigo-400 focus:ring-indigo-400"
                                type="password" name="password" required autocomplete="current-password"
                                placeholder="••••••••" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        {{-- Remember me + Forgot --}}
                        <div class="flex items-center justify-between">
                            <label for="remember_me" class="inline-flex items-center gap-2 text-sm text-slate-200">
                                <input id="remember_me" type="checkbox"
                                    class="rounded border-white/10 bg-white/5 text-indigo-500 focus:ring-indigo-400"
                                    name="remember">
                                <span>{{ __('Remember me') }}</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a class="text-sm text-slate-300 underline-offset-4 hover:underline hover:text-white"
                                    href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                        </div>

                        {{-- Button --}}
                        <button type="submit"
                            class="mt-2 inline-flex w-full items-center justify-center rounded-xl bg-indigo-500 px-4 py-2.5 text-sm font-semibold text-white shadow-lg shadow-indigo-500/20 hover:bg-indigo-400 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2 focus:ring-offset-slate-950">
                            {{ __('Log in') }}
                        </button>

                        {{-- Register --}}
                        @if (Route::has('register'))
                            <p class="pt-2 text-center text-sm text-slate-300">
                                Don’t have an account?
                                <a href="{{ route('register') }}"
                                    class="font-medium text-white underline-offset-4 hover:underline">
                                    Create one
                                </a>
                            </p>
                        @endif
                    </form>
                </div>

                <p class="mt-6 text-center text-xs text-slate-400">
                    © {{ date('Y') }} EasyColoc. All rights reserved.
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>
