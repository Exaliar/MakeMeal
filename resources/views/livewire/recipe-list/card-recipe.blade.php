<div>
    <div class="items-center overflow-hidden rounded-md bg-white shadow-lg sm:grid sm:grid-cols-2">
        <img class="m-auto mt-3 h-40 rounded-lg" src="{{ $recipe['image'] }}" alt="{{ $recipe['title'] }}">
        <div class="my-2 mx-3 text-center text-xl font-bold">{{ $recipe['title'] }}</div>
        <div class="m-3 sm:col-span-2 sm:grid sm:grid-cols-2">
            <ul class="mb-3 sm:mb-0">
                <li class="mb-2 text-base text-gray-700">Used Ingredients:</li>
                @foreach ($recipe['usedIngredients'] as $usedIngredient)
                    <li class="text-sm text-gray-600">
                        <img class="inline-block h-10 w-10 rounded-md" src="{{ $usedIngredient['image'] }}"
                            alt="{{ $usedIngredient['name'] }}">
                        {{ $usedIngredient['amount'] }} {{ $usedIngredient['unit'] }} - {{ $usedIngredient['name'] }}
                    </li>
                @endforeach
            </ul>
            <ul class="sm:ml-3">
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
        <div class="flex w-full sm:col-span-2">
            <button
                class="my-2 mx-auto w-3/4 rounded border border-blue-500 bg-transparent px-2 py-1 text-base font-semibold text-blue-700 transition-all hover:border-transparent hover:bg-blue-500 hover:text-white"
                type="submit">Make Meal</button>
        </div>
    </div>

</div>
