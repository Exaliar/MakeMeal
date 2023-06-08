<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    {{-- <form action="/category" method="POST">
        @csrf
        <input name="name" type="text">
        <input name="category" type="hidden" value="0">
        <button type="submit">Zapisz</button>
    </form> --}}
    <div class="flex">
        <div class="flex w-2/5">
            <div class="m-auto">
                <ul class="">
                    @foreach ($data as $category)
                        <li>
                            <span
                                class="m-1 inline-block w-60 rounded-lg border-2 border-blue-500 text-center">{{ $category['name'] }}
                            </span>

                            @isset($category['children'])
                                <ul class="pl-10">
                                    @foreach ($category['children'] as $child)
                                        <li class="relative">
                                            <span
                                                class="m-1 inline-block h-10 w-72 rounded-lg border-2 border-pink-500 text-center leading-10">{{ $child['name'] }}
                                            </span>

                                            <button class="edit-category absolute right-0 top-0 m-2 h-8 w-8">
                                                <svg class="fill-blue-800 transition-colors hover:fill-blue-400"
                                                    viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                    <title>Edytuj</title>
                                                    <path
                                                        d="M10.681 18.207l-2.209 5.67 5.572-2.307-3.363-3.363zM26.855 6.097l-0.707-0.707c-0.78-0.781-2.047-0.781-2.828 0l-1.414 1.414 3.535 3.536 1.414-1.414c0.782-0.781 0.782-2.048 0-2.829zM10.793 17.918l0.506-0.506 3.535 3.535 9.9-9.9-3.535-3.535 0.707-0.708-11.113 11.114zM23.004 26.004l-17.026 0.006 0.003-17.026 11.921-0.004 1.868-1.98h-14.805c-0.552 0-1 0.447-1 1v19c0 0.553 0.448 1 1 1h19c0.553 0 1-0.447 1-1v-14.058l-2.015 1.977 0.054 11.085z">
                                                    </path>
                                                </svg>
                                            </button>

                                            <div
                                                class="form-category absolute top-0 left-0 m-2 hidden h-8 w-60 rounded-lg bg-gray-100">

                                                <form action="{{ route('category.update', $child['id']) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input class="absolute top-0 left-0 h-8 w-40 rounded-lg border-none"
                                                        name="name" type="text" placeholder="Nowa nazwa">
                                                    <button class="absolute right-10 h-8 w-8" type="submit">
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

                                                <form action="{{ route('category.destroy', $child['id']) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="absolute right-0 h-8 w-8" type="submit"
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

                                            @isset($child['children'])
                                                <ul class="pl-10">
                                                    @foreach ($child['children'] as $lastChild)
                                                        <li>
                                                            <span
                                                                class="m-1 inline-block w-60 rounded-lg border-2 border-green-500 text-center">{{ $lastChild['name'] }}
                                                            </span>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endisset

                                            {{-- <form class="pl-10" action="{{ route('category.store') }}" method="POST">
                                                @csrf
                                                <input name="name" type="text">
                                                <input name="category" type="hidden" value="{{ $child['id'] }}">
                                                <button type="submit">Zapisz-2</button>
                                            </form> --}}
                                            <span
                                                class="relative left-10 inline-block h-10 w-56 rounded-lg border-2 border-green-500 text-left leading-10">
                                                <form action="{{ route('category.store') }}" method="POST">
                                                    @csrf
                                                    <input class="absolute top-0 left-0 h-9 w-44 rounded-lg border-none"
                                                        name="name" type="text" placeholder="Nowa kategoria">
                                                    <input name="category" type="hidden" value="{{ $child['id'] }}">
                                                    <button class="absolute top-0 right-0 h-9 w-9" type="submit">
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
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>
                            @endisset

                            {{-- <form class="pl-10" action="{{ route('category.store') }}" method="POST">
                                @csrf
                                <input name="name" type="text">
                                <input name="category" type="hidden" value="{{ $category['id'] }}">
                                <button type="submit">Zapisz-1</button>
                            </form> --}}
                            <span
                                class="relative left-10 inline-block h-10 w-56 rounded-lg border-2 border-pink-500 text-left leading-10">
                                <form action="{{ route('category.store') }}" method="POST">
                                    @csrf
                                    <input class="absolute top-0 left-0 h-9 w-44 rounded-lg border-none" name="name"
                                        type="text" placeholder="Nowa kategoria">
                                    <input name="category" type="hidden" value="{{ $category['id'] }}">
                                    <button class="absolute top-0 right-0 h-9 w-9" type="submit">
                                        <svg class="fill-green-700 transition-colors hover:fill-green-400"
                                            viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                            <title>Zapisz</title>
                                            <path
                                                d="M28.998 8.531l-2.134-2.134c-0.394-0.393-1.030-0.393-1.423 0l-12.795 12.795-6.086-6.13c-0.393-0.393-1.029-0.393-1.423 0l-2.134 2.134c-0.393 0.394-0.393 1.030 0 1.423l8.924 8.984c0.393 0.393 1.030 0.393 1.423 0l15.648-15.649c0.393-0.392 0.393-1.030 0-1.423z">
                                            </path>
                                        </svg>
                                    </button>
                                </form>
                            </span>
                        </li>
                    @endforeach

                    <span
                        class="relative inline-block h-10 w-56 rounded-lg border-2 border-blue-500 pl-1 text-left leading-10">
                        <form action="{{ route('category.store') }}" method="POST">
                            @csrf
                            <input class="absolute top-0 left-0 h-9 w-44 rounded-lg border-none" name="name"
                                type="text" placeholder="Nowa kategoria">
                            <button class="absolute top-0 right-0 h-9 w-9" type="submit">
                                <svg class="fill-green-700 transition-colors hover:fill-green-400" viewBox="0 0 32 32"
                                    version="1.1" xmlns="http://www.w3.org/2000/svg">
                                    <title>Zapisz</title>
                                    <path
                                        d="M28.998 8.531l-2.134-2.134c-0.394-0.393-1.030-0.393-1.423 0l-12.795 12.795-6.086-6.13c-0.393-0.393-1.029-0.393-1.423 0l-2.134 2.134c-0.393 0.394-0.393 1.030 0 1.423l8.924 8.984c0.393 0.393 1.030 0.393 1.423 0l15.648-15.649c0.393-0.392 0.393-1.030 0-1.423z">
                                    </path>
                                </svg>
                            </button>
                        </form>
                    </span>
                </ul>
            </div>
        </div>
        <div class="flex w-3/5">
            <div class="m-auto"></div>
        </div>
    </div>
    {{-- <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <ul>
                        <li class="text-gray-700">Owoce:
                            <ul class="ml-4">
                                <li>Cytrusy:
                                    <ul class="ml-4">
                                        <li>Pomarańcze</li>
                                        <li>Cytryny</li>
                                        <li>Limonki</li>
                                    </ul>
                                </li>
                                <li>Jagody:
                                    <ul class="ml-4">
                                        <li>Maliny</li>
                                        <li>Jagody</li>
                                        <li>Borówki</li>
                                    </ul>
                                </li>
                                <li>Egzotyczne owoce:
                                    <ul class="ml-4">
                                        <li>Ananasy</li>
                                        <li>Mango</li>
                                        <li>Awokado</li>
                                    </ul>
                                </li>
                                <li>Owocowe przetwory:
                                    <ul class="ml-4">
                                        <li>Dżemy</li>
                                        <li>Konfitury</li>
                                        <li>Musy owocowe</li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div> --}}
    @push('scripts')
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function() {
                const editCategories = document.querySelectorAll('.edit-category');

                editCategories.forEach(category => {
                    category.addEventListener('click', () => category.nextElementSibling.classList.toggle(
                        "hidden"))
                });
            });
        </script>
    @endpush
</x-app-layout>
