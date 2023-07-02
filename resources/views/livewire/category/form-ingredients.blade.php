<div>
    @if ($ingredient === null)
        <div class="border-t border-b border-blue-500 bg-blue-100 px-4 py-3 text-blue-700" role="alert">
            <p class="font-bold">Informational message</p>
            <p class="text-sm">Please select ingredient above to process...</p>
        </div>
    @endif
    @error('ingredient')
        <div class="relative rounded border border-red-400 bg-red-100 px-4 py-3 text-red-700" role="alert">
            <strong class="font-bold">Holy smokes!</strong>
            <span class="block sm:inline">{{ $message }}</span>
        </div>
    @enderror
    @isset($ingredient)
        {{-- {{ dd($ingredient) }} --}}
        <form class="mx-auto mt-5 flex w-full max-w-lg flex-col rounded-lg border bg-white p-3"
            wire:submit.prevent="saveIngredient">
            {{-- @csrf --}}
            <div class="mx-auto flex h-20 md:m-7">
                <object class="m-auto max-h-20 w-20 bg-contain" type="image/jpg"
                    data="{{ 'https://spoonacular.com/cdn/ingredients_100x100/' . $ingredient['image'] }}">
                    <svg class="h-16 w-16 fill-black" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink">
                        <path
                            d="M29 0C27.90625 0 27 0.90625 27 2L27 5C27 5.976563 27.722656 6.804688 28.65625 6.96875C28.246094 7.632813 27.835938 8.382813 27.4375 9.28125C26.609375 11.148438 25.8125 13.429688 25.1875 15.59375L23.8125 14.8125C23.605469 14.691406 23.363281 14.644531 23.125 14.6875C22.933594 14.730469 22.761719 14.828125 22.625 14.96875L21.28125 16.25C19.492188 14.714844 17.164063 13.78125 14.625 13.78125C9.167969 13.78125 4.675781 18.078125 4.40625 24L2.84375 24C1.285156 24 0 25.285156 0 26.84375L0 30.15625C0 31.714844 1.285156 33 2.84375 33L3 33L3 36C3 36.21875 3.023438 36.191406 3.03125 36.21875C3.039063 36.246094 3.027344 36.261719 3.03125 36.28125C3.042969 36.320313 3.050781 36.355469 3.0625 36.40625C3.089844 36.503906 3.140625 36.652344 3.1875 36.8125C3.28125 37.132813 3.402344 37.566406 3.5625 38.09375C3.878906 39.148438 4.328125 40.554688 4.75 41.9375C5.597656 44.707031 6.4375 47.4375 6.4375 47.4375C6.449219 47.511719 6.472656 47.585938 6.5 47.65625C6.769531 48.140625 7.046875 48.632813 7.4375 49.09375C7.828125 49.554688 8.457031 50 9.21875 50L40.78125 50C41.554688 50 42.269531 49.621094 42.6875 49.125C43.105469 48.628906 43.308594 48.066406 43.53125 47.53125C43.542969 47.5 43.554688 47.46875 43.5625 47.4375C43.5625 47.4375 44.402344 44.707031 45.25 41.9375C45.671875 40.554688 46.121094 39.148438 46.4375 38.09375C46.597656 37.566406 46.71875 37.132813 46.8125 36.8125C46.859375 36.652344 46.910156 36.503906 46.9375 36.40625C46.949219 36.355469 46.957031 36.320313 46.96875 36.28125C46.972656 36.261719 46.960938 36.246094 46.96875 36.21875C46.976563 36.191406 47 36.21875 47 36L47 33L47.15625 33C48.714844 33 50 31.714844 50 30.15625L50 26.84375C50 25.285156 48.714844 24 47.15625 24L44 24L44 21.8125C44 19.558594 42.941406 15.703125 41.65625 12.15625C41.015625 10.382813 40.328125 8.703125 39.625 7.4375C39.53125 7.269531 39.4375 7.125 39.34375 6.96875C40.277344 6.804688 41 5.976563 41 5L41 2C41 0.90625 40.09375 0 39 0 Z M 29 2L39 2L39 5L29 5 Z M 31.09375 7L36.84375 7C36.871094 7.015625 36.953125 7.066406 37.0625 7.1875C37.28125 7.429688 37.566406 7.882813 37.875 8.4375C38.492188 9.546875 39.164063 11.105469 39.78125 12.8125C41.015625 16.226563 42 20.269531 42 21.8125L42 24L40 24C39.988281 23.988281 39.980469 23.980469 39.96875 23.96875L26.96875 16.625C27.582031 14.402344 28.414063 11.984375 29.25 10.09375C29.710938 9.050781 30.203125 8.160156 30.59375 7.59375C30.789063 7.3125 30.957031 7.121094 31.0625 7.03125C31.089844 7.007813 31.082031 7.007813 31.09375 7 Z M 14.625 15.78125C16.601563 15.78125 18.398438 16.46875 19.8125 17.625L13.0625 24L6.40625 24C6.660156 19.066406 10.222656 15.78125 14.625 15.78125 Z M 23.4375 16.9375L35.9375 24L15.96875 24 Z M 2.84375 26L47.15625 26C47.628906 26 48 26.371094 48 26.84375L48 30.15625C48 30.628906 47.628906 31 47.15625 31L4.0625 31C4.042969 31 4.019531 31 4 31L2.84375 31C2.371094 31 2 30.628906 2 30.15625L2 26.84375C2 26.371094 2.371094 26 2.84375 26 Z M 5 33L12 33L12 45C12 45.550781 12.449219 46 13 46L16 46C16.550781 46 17 45.550781 17 45L17 33L19 33L19 45C19 45.550781 19.449219 46 20 46L23 46C23.550781 46 24 45.550781 24 45L24 33L26 33L26 45C26 45.550781 26.449219 46 27 46L30 46C30.550781 46 31 45.550781 31 45L31 33L33 33L33 45C33 45.550781 33.449219 46 34 46L37 46C37.550781 46 38 45.550781 38 45L38 33L45 33L45 35.875C44.976563 35.957031 44.953125 36.09375 44.90625 36.25C44.816406 36.5625 44.660156 37.003906 44.5 37.53125C44.183594 38.582031 43.765625 39.960938 43.34375 41.34375C42.511719 44.0625 41.714844 46.691406 41.6875 46.78125C41.6875 46.78125 41.65625 46.875 41.65625 46.875C41.464844 47.316406 41.285156 47.660156 41.15625 47.8125C41.015625 47.980469 41.023438 48 40.78125 48L9.21875 48C9.144531 48 9.152344 48 8.96875 47.78125C8.800781 47.582031 8.558594 47.191406 8.3125 46.75C8.277344 46.632813 7.484375 44.050781 6.65625 41.34375C6.234375 39.960938 5.816406 38.582031 5.5 37.53125C5.339844 37.003906 5.183594 36.5625 5.09375 36.25C5.046875 36.09375 5.023438 35.957031 5 35.875 Z M 14 33L15 33L15 44L14 44 Z M 21 33L22 33L22 44L21 44 Z M 28 33L29 33L29 44L28 44 Z M 35 33L36 33L36 44L35 44Z" />
                    </svg>
                </object>
            </div>
            <div class="flex flex-row flex-wrap">
                <div class="mb-6 w-1/2 px-3 md:mb-0 md:w-1/2">
                    <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-gray-700" for="grid-weight">
                        waga
                    </label>
                    <input
                        class="block w-full appearance-none rounded border border-gray-200 bg-gray-200 py-3 px-4 leading-tight text-gray-700 focus:border-gray-500 focus:bg-white focus:outline-none"
                        id="grid-weight" type="text" wire:model="weight">
                    @error('weight')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-6 w-1/2 px-3 md:mb-0 md:w-1/2">
                    <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-gray-700" for="grid-unit">
                        Jednostki wagi
                    </label>
                    <div class="relative">
                        <select
                            class="block w-full appearance-none rounded border border-gray-200 bg-gray-200 py-3 px-4 pr-8 leading-tight text-gray-700 focus:border-gray-500 focus:bg-white focus:outline-none"
                            id="grid-unit" wire:model="unit">
                            @foreach ($ingredient['possibleUnits'] as $unit)
                                <option value="{{ $unit }}" @if ($loop->first) selected @endif>
                                    {{ $unit }}</option>
                            @endforeach
                        </select>
                        @error('unit')
                            <span class="error">{{ $message }}</span>
                        @enderror
                        {{-- <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div> --}}
                    </div>
                </div>
            </div>
            <button
                class="mx-3 mt-5 max-w-lg rounded border border-green-500 bg-transparent py-2 font-semibold text-green-700 hover:border-transparent hover:bg-green-500 hover:text-white"
                type="submit">Zapisz</button>
        </form>
    @endisset
</div>
