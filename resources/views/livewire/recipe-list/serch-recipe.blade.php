<div>
    <div class="flex w-full">
        <button
            class="my-2 mx-auto w-2/4 rounded border border-blue-500 bg-transparent px-2 py-1 font-semibold text-blue-700 transition-all hover:border-transparent hover:bg-blue-500 hover:text-white"
            wire:click="$emit('recipeSerch')">Serch
            reciple</button>
    </div>

    @error('ingredient')
        <div class="relative rounded border border-red-400 bg-red-100 px-4 py-3 text-red-700" role="alert">
            <strong class="font-bold">Holy smokes!</strong>
            <span class="block sm:inline">{{ $message }}</span>
            {{-- {{ dd(session()) }} --}}
        </div>
    @enderror

    <div class="columns-1 gap-5 space-y-5 px-5 lg:columns-2 xl:columns-3 2xl:columns-4">
        @if (filled($recipes))
            @foreach ($recipes as $recipe)
                <livewire:recipe-list.card-recipe :recipe="$recipe" />
            @endforeach
        @endif
    </div>
</div>
