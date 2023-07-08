<div>
    <div class="max-w-sm overflow-hidden rounded shadow-lg">
        <img class="w-full" src="{{ $recipe['image'] }}" alt="{{ $recipe['title'] }}">
        <div class="mb-2 text-xl font-bold">{{ $recipe['title'] }}</div>
        <div class="px-6 py-4">
            <ul class="mt-4">
                <li class="mb-2 text-base text-gray-700">Used Ingredients:</li>
                @foreach ($recipe['usedIngredients'] as $usedIngredient)
                    <li class="text-sm text-gray-600">
                        <img class="inline-block h-10 w-10 rounded-md" src="{{ $usedIngredient['image'] }}"
                            alt="{{ $usedIngredient['name'] }}">
                        {{ $usedIngredient['amount'] }} {{ $usedIngredient['unit'] }} - {{ $usedIngredient['name'] }}
                    </li>
                @endforeach
            </ul>
            <ul class="mt-4">
                <li class="mb-2 text-base text-gray-700">Missed Ingredients:</li>
                @foreach ($recipe['missedIngredients'] as $missedIngredient)
                    <li class="text-sm text-gray-600">
                        <img class="inline-block h-10 w-10 rounded-md" src="{{ $missedIngredient['image'] }}"
                            alt="{{ $missedIngredient['name'] }}">
                        {{ $missedIngredient['amount'] }} {{ $missedIngredient['unit'] }} -
                        {{ $missedIngredient['name'] }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

</div>
{{-- <div>
    <div class="max-w-sm overflow-hidden rounded shadow-lg">
        <img class="w-full" src="{{ $recipe['image'] }}" alt="{{ $recipe['title'] }}">
        <div class="px-6 py-4">
            <div class="mb-2 text-xl font-bold">{{ $recipe['title'] }}</div>
            <div class="flex justify-between">
                <div class="text-base text-gray-700">Used Ingredients: {{ $recipe['usedIngredientCount'] }}</div>
                <div class="text-base text-gray-700">Missed Ingredients: {{ $recipe['missedIngredientCount'] }}</div>
            </div>
            <ul class="mt-4">
                <li class="mb-2 text-base text-gray-700">Used Ingredients:</li>
                @foreach ($recipe['usedIngredients'] as $usedIngredient)
                    <li class="text-sm text-gray-600">
                        {{ $usedIngredient['amount'] }} {{ $usedIngredient['unit'] }} - {{ $usedIngredient['name'] }}
                    </li>
                @endforeach
            </ul>
            <ul class="mt-4">
                <li class="mb-2 text-base text-gray-700">Missed Ingredients:</li>
                @foreach ($recipe['missedIngredients'] as $missedIngredient)
                    <li class="text-sm text-gray-600">
                        {{ $missedIngredient['amount'] }} {{ $missedIngredient['unit'] }} -
                        {{ $missedIngredient['name'] }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div> --}}
