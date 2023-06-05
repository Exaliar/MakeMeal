<x-guest-layout>
    <div class="flex flex-col text-gray-900 dark:text-gray-100">

        <h3 class="text-center leading-10">Log in / Register</h3>
        <fieldset class="grid w-full grid-cols-2 gap-5">

            <input class="peer/login hidden" id="login" name="status" type="radio" checked />
            <label
                class="inline-block rounded-md border-4 px-5 py-2 text-center peer-checked/login:border-sky-500 peer-checked/login:text-sky-500"
                for="login">Login</label>

            <input class="peer/register hidden" id="register" name="status" type="radio" />
            <label
                class="inline-block rounded-md border-4 px-5 py-2 text-center peer-checked/register:border-sky-500 peer-checked/register:text-sky-500"
                for="register">Register</label>

            <div class="col-span-2 hidden peer-checked/login:block">
                @include('auth.login')
            </div>
            <div class="col-span-2 hidden peer-checked/register:block">
                @include('auth.register')
            </div>
        </fieldset>
    </div>
</x-guest-layout>
