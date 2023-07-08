<div class="flex flex-col">

    <div class="flex flex-row gap-5 overflow-x-scroll px-5 py-5">
        @foreach ($ingredientsDatabase as $ingredient)
            <livewire:ingredient-list.card-ingredient :ingredient="$ingredient" />
        @endforeach
    </div>
</div>
