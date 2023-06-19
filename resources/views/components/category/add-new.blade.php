<div {{ $attributes->merge(['class' => 'relative inline-block h-10 rounded-lg border-2  leading-10']) }}>
    <form action="{{ route('category.store') }}" method="POST">
        @csrf
        <input class="{{ 'absolute top-0 left-0 h-9 rounded-lg border-none ' . $length }}" name="name" type="text"
            placeholder="Nowa kategoria">
        @isset($category)
            <input name="category" type="hidden" value="{{ $category }}">
        @endisset
        <button class="absolute top-0 right-0 h-9 w-9" type="submit">
            <svg class="fill-green-700 transition-colors hover:fill-green-400" viewBox="0 0 32 32" version="1.1"
                xmlns="http://www.w3.org/2000/svg">
                <title>Zapisz</title>
                <path
                    d="M28.998 8.531l-2.134-2.134c-0.394-0.393-1.030-0.393-1.423 0l-12.795 12.795-6.086-6.13c-0.393-0.393-1.029-0.393-1.423 0l-2.134 2.134c-0.393 0.394-0.393 1.030 0 1.423l8.924 8.984c0.393 0.393 1.030 0.393 1.423 0l15.648-15.649c0.393-0.392 0.393-1.030 0-1.423z">
                </path>
            </svg>
        </button>
    </form>
</div>
