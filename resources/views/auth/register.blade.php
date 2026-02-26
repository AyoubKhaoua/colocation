<x-guest-layout>
    <div class="bg-slate-950 py-16 px-4">
        <div class="max-w-md mx-auto">

            <div class="bg-white/10 backdrop-blur-md rounded-3xl p-8 shadow-xl ring-1 ring-white/20">

                <!-- Logo -->
                <div class="flex justify-center ">
                    <img src="{{ asset('images/logo.png') }}" alt="EasyColoc Logo" class="h-10 w-auto">
                </div>

                <h2 class="text-xl font-semibold text-center text-white ">
                    Create your account
                </h2>

                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    <!-- Name -->
                    <div>
                        <label class="text-sm text-slate-300">Full Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" required autofocus
                            class="mt-1 w-full rounded-xl bg-slate-800/80 border border-white/20 px-4 py-2 text-white placeholder-slate-400 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="text-sm text-slate-300">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required
                            class="mt-1 w-full rounded-xl bg-slate-800/80 border border-white/20 px-4 py-2 text-white placeholder-slate-400 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <label class="text-sm text-slate-300">Password</label>
                        <input type="password" name="password" required
                            class="mt-1 w-full rounded-xl bg-slate-800/80 border border-white/20 px-4 py-2 text-white placeholder-slate-400 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label class="text-sm text-slate-300">Confirm Password</label>
                        <input type="password" name="password_confirmation" required
                            class="mt-1 w-full rounded-xl bg-slate-800/80 border border-white/20 px-4 py-2 text-white placeholder-slate-400 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                    </div>

                    <!-- Button -->
                    <button type="submit"
                        class="w-full bg-indigo-500 hover:bg-indigo-400 text-white font-semibold py-2 rounded-xl transition duration-200">
                        Register
                    </button>

                    <p class="text-sm text-center text-slate-400 mt-4">
                        Already have an account?
                        <a href="{{ route('login') }}" class="text-indigo-400 hover:text-indigo-300 font-medium">
                            Login
                        </a>
                    </p>

                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
