<div>
    <button
        class="mb-1 inline-block h-10 w-72 rounded-lg border-2 border-blue-500 text-center leading-10 peer-checked/edit:border-none"
        wire:click="$emit('serch', '{{ $category['name_en'] }}')">{{ $category['name'] }}
    </button>
</div>
