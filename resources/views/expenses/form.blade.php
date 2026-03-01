<div x-show="open" x-transition
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 backdrop-blur-sm px-4" style="display:none;">

    <div @click.away="open = false"
        class="w-full max-w-lg rounded-3xl bg-white p-8 shadow-2xl ring-1 ring-slate-200 relative">

        <button @click="open = false" class="absolute right-5 top-5 text-slate-400 hover:text-slate-700 text-lg">
            ✕
        </button>

        <h2 class="text-xl font-semibold text-slate-800">Add expense</h2>
        <p class="text-sm text-slate-500 mt-1">Track payments with category and payer.</p>

        {{-- errors block to keep open when validation fails --}}
        @if ($errors->any())
            <div class="modal-errors mt-4 rounded-2xl bg-red-500/10 ring-1 ring-red-400/20 p-4">
                <p class="text-sm font-semibold text-red-600">Fix the errors below.</p>
            </div>
        @endif

        <form action="{{ route('expenses.store', $colocation) }}" method="POST" class="mt-6 space-y-4">
            @csrf

            <div>
                <label class="text-sm text-slate-600 font-medium">Title</label>
                <input type="text" name="title" value="{{ old('title') }}" required placeholder="Ex: Groceries"
                    class="mt-1 w-full rounded-xl border border-slate-200 px-4 py-2.5 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                @error('title')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <label class="text-sm text-slate-600 font-medium">Amount (DH)</label>
                    <input type="number" step="0.01" name="amount" value="{{ old('amount') }}" required
                        placeholder="0.00"
                        class="mt-1 w-full rounded-xl border border-slate-200 px-4 py-2.5 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    @error('amount')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="text-sm text-slate-600 font-medium">Spent at</label>
                    <input type="date" name="spent_at" value="{{ old('spent_at') }}"
                        class="mt-1 w-full rounded-xl border border-slate-200 px-4 py-2.5 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    @error('spent_at')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <label class="text-sm text-slate-600 font-medium">Category</label>
                    <select name="category_id"
                        class="mt-1 w-full rounded-xl border border-slate-200 px-4 py-2.5 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">— None —</option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}" @selected(old('category_id') == $cat->id)>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="text-sm text-slate-600 font-medium">Paid by</label>
                    <select name="paid_by" required
                        class="mt-1 w-full rounded-xl border border-slate-200 px-4 py-2.5 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="" disabled @selected(old('paid_by') == null)>Select member</option>
                        @foreach ($members as $m)
                            <option value="{{ $m->id }}" @selected(old('paid_by') == $m->id)>
                                {{ $m->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('paid_by')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label class="text-sm text-slate-600 font-medium">Note (optional)</label>
                <textarea name="note" rows="3" placeholder="Add details if needed..."
                    class="mt-1 w-full rounded-xl border border-slate-200 px-4 py-2.5 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">{{ old('note') }}</textarea>
                @error('note')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end gap-3 pt-4">
                <button type="button" @click="open = false"
                    class="px-4 py-2 text-sm font-semibold text-slate-600 hover:text-slate-800">
                    Cancel
                </button>

                <button type="submit"
                    class="rounded-xl bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white hover:bg-indigo-500 transition shadow-sm">
                    Save expense
                </button>
            </div>
        </form>
    </div>
</div>
