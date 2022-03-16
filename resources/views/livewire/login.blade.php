<div>
    <section>
        <h1 class="font-bold text-4xl text-center pt-16">Jarvis</h1>
        <p class="relative text-center mt-4 mr-96 font-bold text-xl">Login</p>
    </section>

    <main class="bg-white max-w-lg mx-auto p-8 md:p-12 my-4 rounded-lg shadow-2xl">
        @if (session()->has('message'))
            <div class="bg-red-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                role="alert">
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
        @endif
        <section class="mt-10">
            <form class="flex flex-col" method="POST" action="#">
                <div class="mb-4">
                    <label class="block text-grey-darker text-sm font-bold mb-2" for="email">
                        Email
                    </label>
                    <input required wire:model="email" wire:key="email" value="{{ $email }}" name="email"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="email"
                        type="email">
                </div>
                <div class="mb-6">
                    <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
                        Password
                    </label>
                    <input required wire:model="password" wire:key="password" value="{{ $password }}"
                        name="password"
                        class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3"
                        id="password" type="password">
                </div>
                <div class="flex items-center justify-between">
                    <button wire:click.prevent='login()'
                        class="w-36 px-4 py-2 bg-gray-800 border border-black rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150"
                        type="submit">
                        Login
                    </button>
                    <a class="underline inline-block align-baseline font-bold text-sm text-blue-700 hover:text-blue-darker"
                        href="{{ env('APP_URL') . '/register' }}">
                        Register
                    </a>
                    <a class="underline inline-block align-baseline font-bold text-sm text-blue-700 hover:text-blue-darker"
                        href="#">
                        Forgot Password?
                    </a>
                </div>
            </form>
        </section>
    </main>
</div>
