<div>
    <button
        class="mb-1 ml-5 inline-block h-10 w-[268px] cursor-pointer rounded-lg border-2 border-pink-500 text-center leading-10 peer-checked/edit:border-none"
        wire:click="$emit('serch', '{{ $child['name_en'] }}')">{{ $child['name'] }}
    </button>
</div>
