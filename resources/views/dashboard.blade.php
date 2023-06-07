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

    <ul>
        @foreach ($data as $category)
            <li>
                {{ $category['name'] }}

                @isset($category['children'])
                    <ul class="pl-10">
                        @foreach ($category['children'] as $child)
                            <li>
                                {{ $child['name'] }}

                                @isset($child['children'])
                                    <ul class="pl-10">
                                        @foreach ($child['children'] as $lastChild)
                                            <li>
                                                {{ $lastChild['name'] }}
                                            </li>
                                        @endforeach
                                    </ul>
                                @endisset
                                <form class="pl-10" action="/category" method="POST">
                                    @csrf
                                    <input name="name" type="text">
                                    <input name="category" type="hidden" value="{{ $child['id'] }}">
                                    <button type="submit">Zapisz-2</button>
                                </form>
                            </li>
                        @endforeach

                    </ul>
                @endisset

                <form class="pl-10" action="/category" method="POST">
                    @csrf
                    <input name="name" type="text">
                    <input name="category" type="hidden" value="{{ $category['id'] }}">
                    <button type="submit">Zapisz-1</button>
                </form>
            </li>
        @endforeach
        <form action="/category" method="POST">
            @csrf
            <input name="name" type="text">
            <button type="submit">Zapisz-0</button>
        </form>
    </ul>

    <div class="py-12">
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
                        {{-- <li class="text-gray-700">Warzywa:
                            <ul class="ml-4">
                                <li>Liściaste:<ul class="ml-4">
                                        <li>Szpinak</li>
                                        <li>Rukola</li>
                                        <li>Sałata</li>
                                    </ul>
                                </li>
                                <li>Korzeniowe:<ul class="ml-4">
                                        <li>Marchewka</li>
                                        <li>Ziemniaki</li>
                                        <li>Buraki</li>
                                    </ul>
                                </li>
                                <li>Strączkowe:<ul class="ml-4">
                                        <li>Groch</li>
                                        <li>Fasola</li>
                                        <li>Soczewica</li>
                                    </ul>
                                </li>
                                <li>Warzywne przetwory:<ul class="ml-4">
                                        <li>Ketchup</li>
                                        <li>Kwaszone ogórki</li>
                                        <li>Konserwy warzywne</li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="text-gray-700">Mięso i ryby:
                            <ul class="ml-4">
                                <li>Drób:<ul class="ml-4">
                                        <li>Kurczak</li>
                                        <li>Indyk</li>
                                        <li>Kaczka</li>
                                    </ul>
                                </li>
                                <li>Wołowina:<ul class="ml-4">
                                        <li>Stek</li>
                                        <li>Mielone</li>
                                        <li>Gulasz</li>
                                    </ul>
                                </li>
                                <li>Wieprzowina:<ul class="ml-4">
                                        <li>Schab</li>
                                        <li>Karkówka</li>
                                        <li>Kiełbasa</li>
                                    </ul>
                                </li>
                                <li>Ryby i owoce morza:<ul class="ml-4">
                                        <li>Łosoś</li>
                                        <li>Tuńczyk</li>
                                        <li>Krewetki</li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="text-gray-700">Nabiał:
                            <ul class="ml-4">
                                <li>Mleko i produkty mleczne:<ul class="ml-4">
                                        <li>Mleko</li>
                                        <li>Jogurt</li>
                                        <li>Śmietana</li>
                                    </ul>
                                </li>
                                <li>Jaja:<ul class="ml-4">
                                        <li>Kurze jaja</li>
                                        <li>Kacze jaja</li>
                                        <li>Przepiórcze jaja</li>
                                    </ul>
                                </li>
                                <li>Ser:<ul class="ml-4">
                                        <li>Cheddar</li>
                                        <li>Gouda</li>
                                        <li>Mozzarella</li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="text-gray-700">Produkty zbożowe:
                            <ul class="ml-4">
                                <li>Chleb i pieczywo:<ul class="ml-4">
                                        <li>Chleb pszenny</li>
                                        <li>Bułki</li>
                                        <li>Rogaliki</li>
                                    </ul>
                                </li>
                                <li>Makarony:<ul class="ml-4">
                                        <li>Spaghetti</li>
                                        <li>Penne</li>
                                        <li>Fusilli</li>
                                    </ul>
                                </li>
                                <li>Płatki śniadaniowe:<ul class="ml-4">
                                        <li>Płatki owsiane</li>
                                        <li>Płatki kukurydziane</li>
                                        <li>Płatki ryżowe</li>
                                    </ul>
                                </li>
                                <li>Mąka i kasze:<ul class="ml-4">
                                        <li>Mąka pszenna</li>
                                        <li>Mąka kukurydziana</li>
                                        <li>Kasza gryczana</li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="text-gray-700">Napoje:
                            <ul class="ml-4">
                                <li>Woda:<ul class="ml-4">
                                        <li>Woda mineralna</li>
                                        <li>Woda gazowana</li>
                                        <li>Woda smakowa</li>
                                    </ul>
                                </li>
                                <li>Soki owocowe:<ul class="ml-4">
                                        <li>Sok pomarańczowy</li>
                                        <li>Sok jabłkowy</li>
                                        <li>Sok wiśniowy</li>
                                    </ul>
                                </li>
                                <li>Napoje gazowane:<ul class="ml-4">
                                        <li>Cola</li>
                                        <li>Sprite</li>
                                        <li>Fanta</li>
                                    </ul>
                                </li>
                                <li>Kawa i herbata:<ul class="ml-4">
                                        <li>Kawa ziarnista</li>
                                        <li>Kawa rozpuszczalna</li>
                                        <li>Czarna herbata</li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="text-gray-700">Słodycze:
                            <ul class="ml-4">
                                <li>Czekolada:<ul class="ml-4">
                                        <li>Mleczna czekolada</li>
                                        <li>Gorzka czekolada</li>
                                        <li>Biała czekolada</li>
                                    </ul>
                                </li>
                                <li>Ciastka i herbatniki:<ul class="ml-4">
                                        <li>Kruche ciastka</li>
                                        <li>Owsiane ciastka</li>
                                        <li>Herbatniki maślane</li>
                                    </ul>
                                </li>
                                <li>Lody:<ul class="ml-4">
                                        <li>Waniliowe lody</li>
                                        <li>Czekoladowe lody</li>
                                        <li>Truskawkowe lody</li>
                                    </ul>
                                </li>
                                <li>Cukierki:<ul class="ml-4">
                                        <li>Karmelki</li>
                                        <li>Żelki</li>
                                        <li>Kwaśne cukierki</li>
                                    </ul>
                                </li>
                            </ul>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
