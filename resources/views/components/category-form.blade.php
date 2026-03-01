@props([
    'colocation' => null,
    'category' => null,
    'action' => null,
    'method' => 'POST',
    'placeholder' => 'Nouvelle catégorie',
    'button' => 'Ajouter',
])

@php
    $formAction = $action ?? ($colocation ? route('categories.store', $colocation) : '#');
    $value = old('name', $category->name ?? '');
    $methodUpper = strtoupper($method ?? 'POST');
@endphp

<form action="{{ $formAction }}" method="POST" class="mb-6">
    @csrf
    @if ($methodUpper !== 'POST')
        @method($methodUpper)
    @endif

    <div class="flex gap-3">
        <input type="text" name="name" placeholder="{{ $placeholder }}" value="{{ $value }}"
            class="flex-1 rounded-xl border border-slate-200 px-4 py-2 focus:ring-2 focus:ring-indigo-500">

        <button class="rounded-xl bg-indigo-600 px-5 py-2 text-white font-semibold hover:bg-indigo-500">
            {{ $button }}
        </button>
    </div>

    @error('name')
        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
    @enderror
</form>
