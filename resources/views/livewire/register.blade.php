<div>
    <section>
        <h1 class="font-bold text-4xl text-center pt-16">Jarvis</h1>
        <p class="relative text-center mt-4 mr-96 font-bold text-xl">Sign</p>
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
        <section>
            <form class="flex flex-col">
                <div class="mb-4">
                    <label class="block text-grey-darker text-sm font-bold mb-2" for="name">
                        * Name
                    </label>
                    <input required wire:model="name" wire:key="name" value="{{ $name }}" name="name"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="name"
                        type="text">
                </div>
                <div class="mb-4">
                    <label class="block text-grey-darker text-sm font-bold mb-2" for="email">
                        * Email
                    </label>
                    <input required wire:model="email" wire:key="email" value="{{ $email }}" name="email"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="email"
                        type="email">
                </div>
                <div class="mb-4">
                    <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
                        * Password
                    </label>
                    <input required wire:model="password" wire:key="password" value="{{ $password }}" name="password"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="password"
                        type="password">
                </div>
                <div class="mb-4">
                    <label class="block text-grey-darker text-sm font-bold mb-2" for="repassw">
                        * Re-type passw
                    </label>
                    <input required wire:model="repassw" wire:key="repassw" value="{{ $repassw }}" name="repassw"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="repassw"
                        type="password">
                </div>
                <div class="flex items-start">
                    <div class="flex items-center h-5 mb-4">
                        <input wire:model="terms" wire:key="terms" value="{{ $terms }}"  required id="term" name="term" type="checkbox"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="term" class="font-medium text-gray-700">
                            I agree to the <a wire:key='termUse'
                                class="underline inline-block align-baseline font-bold text-sm text-blue-700 hover:text-blue-darker"
                                href="#">Term of Use</a> and
                        </label>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <button wire:click="register()"
                        class="w-36 px-4 py-2 bg-gray-800 border border-black rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150"
                        type="button">
                        Sign up
                    </button>
                    <a class="underline inline-block align-baseline font-bold text-sm text-blue-700 hover:text-blue-darker"
                        href="#">
                        Learn more
                    </a>
            </form>
        </section>
    </main>
</div>
