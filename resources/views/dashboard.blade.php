<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <x-slot name="controllButtons">
        @isset($edit)
            <a class="rounded border border-blue-500 bg-transparent py-2 px-4 font-semibold text-blue-700 hover:border-transparent hover:bg-blue-500 hover:text-white"
                href="{{ route('edit-category') }}">
                @if ($edit)
                    Save Category
                @else
                    Edit Category
                @endif
            </a>
        @endisset
        @isset($add)
            <a class="rounded border border-blue-500 bg-transparent py-2 px-4 font-semibold text-blue-700 hover:border-transparent hover:bg-blue-500 hover:text-white"
                href="{{ route('add-category') }}">
                @if ($add)
                    Hide Add Category
                @else
                    Show Add Category
                @endif
            </a>
        @endisset
    </x-slot>

    <div class="flex flex-col">
        <div class="sticky top-0 flex flex-row bg-white">
            <input class="peer hidden" id="category-menu" name="" type="checkbox">
            <div class="ml-2 overflow-hidden pb-2 peer-checked:h-11">
                <ul class="mt-1 flex w-72 flex-col overflow-x-hidden">

                    @foreach ($data as $category)
                        <li class="relative">
                            @if (isset($edit) && $edit)
                                <input class="peer/edit hidden" id="{{ $category['name'] . $category['id'] }}"
                                    type="checkbox">
                                <label class="absolute right-0 top-0 m-1 h-8 w-8"
                                    for="{{ $category['name'] . $category['id'] }}">
                                    <svg class="fill-blue-800 transition-colors hover:fill-blue-400" viewBox="0 0 32 32"
                                        version="1.1" xmlns="http://www.w3.org/2000/svg">
                                        <title>Edytuj</title>
                                        <path
                                            d="M10.681 18.207l-2.209 5.67 5.572-2.307-3.363-3.363zM26.855 6.097l-0.707-0.707c-0.78-0.781-2.047-0.781-2.828 0l-1.414 1.414 3.535 3.536 1.414-1.414c0.782-0.781 0.782-2.048 0-2.829zM10.793 17.918l0.506-0.506 3.535 3.535 9.9-9.9-3.535-3.535 0.707-0.708-11.113 11.114zM23.004 26.004l-17.026 0.006 0.003-17.026 11.921-0.004 1.868-1.98h-14.805c-0.552 0-1 0.447-1 1v19c0 0.553 0.448 1 1 1h19c0.553 0 1-0.447 1-1v-14.058l-2.015 1.977 0.054 11.085z">
                                        </path>
                                    </svg>
                                </label>

                                <div
                                    class="absolute top-0 -left-80 h-8 w-[248px] rounded-lg bg-gray-100 transition-all peer-checked/edit:left-0">

                                    <form action="{{ route('category.update', $category['id']) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input
                                            class="absolute top-0 left-0 h-10 w-40 rounded-lg border-2 border-blue-500"
                                            name="name" type="text" placeholder="{{ $category['name'] }}">
                                        <button class="absolute right-10 m-1 h-8 w-8" type="submit">
                                            <svg class="fill-green-700 transition-colors hover:fill-green-400"
                                                viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                <title>Zapisz</title>
                                                <path
                                                    d="M28.998 8.531l-2.134-2.134c-0.394-0.393-1.030-0.393-1.423 0l-12.795 12.795-6.086-6.13c-0.393-0.393-1.029-0.393-1.423 0l-2.134 2.134c-0.393 0.394-0.393 1.030 0 1.423l8.924 8.984c0.393 0.393 1.030 0.393 1.423 0l15.648-15.649c0.393-0.392 0.393-1.030 0-1.423z">
                                                </path>
                                            </svg>
                                        </button>
                                    </form>

                                    <form action="{{ route('category.destroy', $category['id']) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="absolute right-0 m-1 h-8 w-8" type="submit"
                                            onclick="return confirm('Czy na pewno chcesz usunąć tą kategorię?')">
                                            <svg class="fill-red-700 transition-colors hover:fill-red-400"
                                                viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                <title>Usuń</title>
                                                <path
                                                    d="M8 26c0 1.656 1.343 3 3 3h10c1.656 0 3-1.344 3-3l2-16h-20l2 16zM19 13h2v13h-2v-13zM15 13h2v13h-2v-13zM11 13h2v13h-2v-13zM25.5 6h-6.5c0 0-0.448-2-1-2h-4c-0.553 0-1 2-1 2h-6.5c-0.829 0-1.5 0.671-1.5 1.5s0 1.5 0 1.5h22c0 0 0-0.671 0-1.5s-0.672-1.5-1.5-1.5z">
                                                </path>
                                            </svg>
                                        </button>
                                    </form>

                                </div>
                            @endif

                            <livewire:category.button-trigger-category :category="$category" />

                            @isset($category['children'])
                                <input class="peer/collapse hidden"
                                    id="{{ $category['name'] . $category['id'] . 'collapse' }}" type="checkbox">
                                <label
                                    class="absolute left-0 top-0 m-2 hidden h-6 w-6 peer-checked/collapse:inline-block peer-checked/edit:hidden"
                                    for="{{ $category['name'] . $category['id'] . 'collapse' }}">
                                    <svg class="fill-blue-800 transition-colors" viewBox="0 0 24 24" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <title>rozwin-minus</title>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M12 3a1 1 0 0 0-1 1v7H4a1 1 0 1 0 0 2h7v7a1 1 0 1 0 2 0v-7h7a1 1 0 1 0 0-2h-7V4a1 1 0 0 0-1-1z" />
                                    </svg>
                                </label>
                                <label
                                    class="absolute left-0 top-0 m-2 h-6 w-6 peer-checked/collapse:hidden peer-checked/edit:hidden"
                                    for="{{ $category['name'] . $category['id'] . 'collapse' }}">
                                    <svg class="fill-blue-800 transition-colors" viewBox="0 0 24 24" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <title>zwin-plus</title>
                                        <path d="M20.75 11a1.25 1.25 0 0 1 0 2.5H3.25a1.25 1.25 0 1 1 0-2.5h17.5z" />
                                    </svg>
                                </label>
                                <ul class="flex flex-col peer-checked/collapse:hidden">
                                    @foreach ($category['children'] as $child)
                                        <li class="relative">
                                            @if (isset($edit) && $edit)
                                                <input class="peer/edit hidden" id="{{ $child['name'] . $child['id'] }}"
                                                    type="checkbox">
                                                <label class="absolute right-0 top-0 m-1 h-8 w-8"
                                                    for="{{ $child['name'] . $child['id'] }}">
                                                    <svg class="fill-blue-800 transition-colors hover:fill-blue-400"
                                                        viewBox="0 0 32 32" version="1.1"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <title>Edytuj</title>
                                                        <path
                                                            d="M10.681 18.207l-2.209 5.67 5.572-2.307-3.363-3.363zM26.855 6.097l-0.707-0.707c-0.78-0.781-2.047-0.781-2.828 0l-1.414 1.414 3.535 3.536 1.414-1.414c0.782-0.781 0.782-2.048 0-2.829zM10.793 17.918l0.506-0.506 3.535 3.535 9.9-9.9-3.535-3.535 0.707-0.708-11.113 11.114zM23.004 26.004l-17.026 0.006 0.003-17.026 11.921-0.004 1.868-1.98h-14.805c-0.552 0-1 0.447-1 1v19c0 0.553 0.448 1 1 1h19c0.553 0 1-0.447 1-1v-14.058l-2.015 1.977 0.054 11.085z">
                                                        </path>
                                                    </svg>
                                                </label>

                                                <div
                                                    class="absolute top-0 -left-80 h-10 w-[248px] rounded-lg bg-gray-100 transition-all peer-checked/edit:left-0">

                                                    <form action="{{ route('category.update', $child['id']) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input
                                                            class="absolute top-0 left-0 h-10 w-40 rounded-lg border-2 border-pink-500"
                                                            name="name" type="text"
                                                            placeholder="{{ $child['name'] }}">
                                                        <button class="absolute right-10 m-1 h-8 w-8" type="submit">
                                                            <svg class="fill-green-700 transition-colors hover:fill-green-400"
                                                                viewBox="0 0 32 32" version="1.1"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <title>Zapisz</title>
                                                                <path
                                                                    d="M28.998 8.531l-2.134-2.134c-0.394-0.393-1.030-0.393-1.423 0l-12.795 12.795-6.086-6.13c-0.393-0.393-1.029-0.393-1.423 0l-2.134 2.134c-0.393 0.394-0.393 1.030 0 1.423l8.924 8.984c0.393 0.393 1.030 0.393 1.423 0l15.648-15.649c0.393-0.392 0.393-1.030 0-1.423z">
                                                                </path>
                                                            </svg>
                                                        </button>
                                                    </form>

                                                    <form action="{{ route('category.destroy', $child['id']) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="absolute right-0 m-1 h-8 w-8" type="submit"
                                                            onclick="return confirm('Czy na pewno chcesz usunąć tą kategorię?')">
                                                            <svg class="fill-red-700 transition-colors hover:fill-red-400"
                                                                viewBox="0 0 32 32" version="1.1"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <title>Usuń</title>
                                                                <path
                                                                    d="M8 26c0 1.656 1.343 3 3 3h10c1.656 0 3-1.344 3-3l2-16h-20l2 16zM19 13h2v13h-2v-13zM15 13h2v13h-2v-13zM11 13h2v13h-2v-13zM25.5 6h-6.5c0 0-0.448-2-1-2h-4c-0.553 0-1 2-1 2h-6.5c-0.829 0-1.5 0.671-1.5 1.5s0 1.5 0 1.5h22c0 0 0-0.671 0-1.5s-0.672-1.5-1.5-1.5z">
                                                                </path>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            @endif
                                            <label
                                                class="absolute left-0 top-0 mt-2 h-5 w-5 rotate-180 transition-all peer-checked/edit:-left-20">
                                                <svg class="fill-blue-800 transition-colors" viewBox="0 0 91 91"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                    <title>right</title>
                                                    <path class="st0"
                                                        d="M12.6,28.9c10.2,5.4,19.8,12.2,25.3,22.6c2.8,5.3,10.9,0.6,8-4.7C43,41.5,39,36.9,34.5,33   c13.6-1.6,30-1.2,32.3,14.2c1,6.8,1.3,13.8,1.4,20.7c0.1,6-1.2,12.7,2,18c0.9,1.6,3.6,2.3,4.9,0.6c5.2-6.6,3.7-17.6,3.5-25.7   c-0.2-8.1,0.2-18.2-4.3-25.4c-9-14.5-29.5-13.8-45.3-12c7.6-4.1,14.4-9.5,20.9-15.7c1.1-1.1-0.3-3.1-1.7-2.2   c-10.8,6.9-22.3,12.3-34.6,15.7C10.3,22.2,9.4,27.2,12.6,28.9z" />

                                                </svg>
                                            </label>

                                            <livewire:category.button-trigger-child :child="$child" />

                                            @isset($child['children'])
                                                <input class="peer/collapse hidden"
                                                    id="{{ $child['name'] . $child['id'] . 'collapse' }}" type="checkbox">
                                                <label
                                                    class="absolute left-5 top-0 m-2 hidden h-6 w-6 peer-checked/collapse:inline-block peer-checked/edit:hidden"
                                                    for="{{ $child['name'] . $child['id'] . 'collapse' }}">
                                                    <svg class="fill-blue-800 transition-colors" viewBox="0 0 24 24"
                                                        version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                        <title>rozwin-minus</title>
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M12 3a1 1 0 0 0-1 1v7H4a1 1 0 1 0 0 2h7v7a1 1 0 1 0 2 0v-7h7a1 1 0 1 0 0-2h-7V4a1 1 0 0 0-1-1z" />
                                                    </svg>
                                                </label>
                                                <label
                                                    class="absolute left-5 top-0 m-2 h-6 w-6 peer-checked/collapse:hidden peer-checked/edit:hidden"
                                                    for="{{ $child['name'] . $child['id'] . 'collapse' }}">
                                                    <svg class="fill-blue-800 transition-colors" viewBox="0 0 24 24"
                                                        version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                        <title>zwin-plus</title>
                                                        <path
                                                            d="M20.75 11a1.25 1.25 0 0 1 0 2.5H3.25a1.25 1.25 0 1 1 0-2.5h17.5z" />
                                                    </svg>
                                                </label>
                                                <ul class="flex flex-col peer-checked/collapse:hidden">
                                                    @foreach ($child['children'] as $lastChild)
                                                        <li class="relative">

                                                            <x-category.edit :category="$lastChild" :$edit />
                                                            <livewire:category.button-trigger-last-child :lastChild="$lastChild" />

                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endisset
                                            @if (isset($add) && $add)
                                                <div class="relative w-72">
                                                    <label
                                                        class="absolute left-5 top-0 mt-2 h-5 w-5 rotate-180 transition-all peer-checked/edit:-left-20">
                                                        <svg class="fill-pink-500 transition-colors" viewBox="0 0 91 91"
                                                            version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                            <title>right</title>
                                                            <path class="st0"
                                                                d="M12.6,28.9c10.2,5.4,19.8,12.2,25.3,22.6c2.8,5.3,10.9,0.6,8-4.7C43,41.5,39,36.9,34.5,33   c13.6-1.6,30-1.2,32.3,14.2c1,6.8,1.3,13.8,1.4,20.7c0.1,6-1.2,12.7,2,18c0.9,1.6,3.6,2.3,4.9,0.6c5.2-6.6,3.7-17.6,3.5-25.7   c-0.2-8.1,0.2-18.2-4.3-25.4c-9-14.5-29.5-13.8-45.3-12c7.6-4.1,14.4-9.5,20.9-15.7c1.1-1.1-0.3-3.1-1.7-2.2   c-10.8,6.9-22.3,12.3-34.6,15.7C10.3,22.2,9.4,27.2,12.6,28.9z" />
                                                        </svg>
                                                    </label>
                                                    <label
                                                        class="absolute -left-1 top-0 mt-2 h-5 w-5 transition-all peer-checked/edit:-left-20">
                                                        <svg class="fill-blue-800 transition-colors" viewBox="0 0 91 91"
                                                            version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                            <title>down</title>
                                                            <path class="st0"
                                                                d="M11.5,54.9c6.1,4.1,12.7,8.2,18.3,13.1c2.9,2.5,5.5,5.3,7.7,8.5c2.1,3.2,3.3,7,5.6,10.1c3.2,4.3,9,2.9,10.1-2   c7.4-11.4,16.5-24.1,27-32.5c1.9-1.5-0.5-4.4-2.5-3.3c-9.5,5.6-17.5,12.1-24.5,19.9c0.2-7.7,0.5-15.5,0.6-23.2   c0.1-6.9,0.2-13.9,0.3-20.8c0.1-5.7,1.2-11.8,0.5-17.5c-0.7-6.8-12.1-9.9-13.2-1.8c-1.7,12.5,0.3,26.4,0.5,39   c0.1,6.6,0.4,13.2,0.6,19.8c-1.3-1.1-2.6-2.1-3.8-3c-7.6-5.6-15.8-9.4-24.9-11.6C10.5,48.8,8.8,53,11.5,54.9z" />
                                                        </svg>
                                                    </label>
                                                    <x-category.add-new class="left-10 w-[248px] border-green-500"
                                                        length="w-[208px]" :category="$child['id']" />
                                                </div>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            @endisset
                            @if (isset($add) && $add)
                                <div class="relative w-72">
                                    <label
                                        class="absolute left-0 top-0 mt-2 h-5 w-5 rotate-180 transition-all peer-checked/edit:-left-20">
                                        <svg class="fill-blue-800 transition-colors" viewBox="0 0 91 91"
                                            version="1.1" xmlns="http://www.w3.org/2000/svg">
                                            <title>down</title>
                                            <path class="st0"
                                                d="M12.6,28.9c10.2,5.4,19.8,12.2,25.3,22.6c2.8,5.3,10.9,0.6,8-4.7C43,41.5,39,36.9,34.5,33   c13.6-1.6,30-1.2,32.3,14.2c1,6.8,1.3,13.8,1.4,20.7c0.1,6-1.2,12.7,2,18c0.9,1.6,3.6,2.3,4.9,0.6c5.2-6.6,3.7-17.6,3.5-25.7   c-0.2-8.1,0.2-18.2-4.3-25.4c-9-14.5-29.5-13.8-45.3-12c7.6-4.1,14.4-9.5,20.9-15.7c1.1-1.1-0.3-3.1-1.7-2.2   c-10.8,6.9-22.3,12.3-34.6,15.7C10.3,22.2,9.4,27.2,12.6,28.9z" />
                                        </svg>
                                    </label>
                                    <x-category.add-new class="left-5 w-[268px] border-pink-500" length="w-[228px]"
                                        :category="$category['id']" />
                                </div>
                            @endif
                        </li>
                    @endforeach
                    @if (isset($add) && $add)
                        <x-category.add-new class="w-72 border-blue-500 pl-1" length="w-[248px]" />
                    @endif
                </ul>
            </div>
            <label class="ml-4 mt-2 h-8 w-8 -rotate-90 cursor-pointer transition-all peer-checked:rotate-90"
                for="category-menu">
                <svg class="fill-black hover:fill-black/75" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M12.293 7.293a1 1 0 0 1 1.414 0l4 4a1 1 0 0 1 0 1.414l-4 4a1 1 0 0 1-1.414-1.414L15.586 12l-3.293-3.293a1 1 0 0 1 0-1.414Z" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M6.293 7.293a1 1 0 0 1 1.414 0l4 4a1 1 0 0 1 0 1.414l-4 4a1 1 0 0 1-1.414-1.414L9.586 12 6.293 8.707a1 1 0 0 1 0-1.414Z" />
                </svg>
            </label>
        </div>
        <div class="flex h-80 overflow-scroll">
            <div class="m-auto w-10/12">

                <livewire:category.serch-ingredients />

            </div>
        </div>

    </div>
    <livewire:category.form-ingredients />
</x-app-layout>
