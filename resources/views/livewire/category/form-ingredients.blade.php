<div>
    @if ($ingredient === null)
        <div class="border-t border-b border-blue-500 bg-blue-100 px-4 py-3 text-blue-700" role="alert">
            <p class="font-bold">Informational message</p>
            <p class="text-sm">Please select igredient above to process...</p>
        </div>
    @endif
    @error('ingredient')
        <div class="relative rounded border border-red-400 bg-red-100 px-4 py-3 text-red-700" role="alert">
            <strong class="font-bold">Holy smokes!</strong>
            <span class="block sm:inline">{{ $message }}</span>
        </div>
    @enderror
    {{-- <p>Ingredient id: {{ $ingredient }}</p> --}}
</div>
