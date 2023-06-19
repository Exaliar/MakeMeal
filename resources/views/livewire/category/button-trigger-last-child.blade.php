<div>
    <button
        class="mb-1 ml-10 inline-block h-10 w-[248px] cursor-pointer rounded-lg border-2 border-green-500 text-center leading-10 peer-checked/edit:border-none"
        wire:click="$emit('serch', '{{ $lastChild['name_en'] }}')">{{ $lastChild['name'] }}
    </button>
</div>
