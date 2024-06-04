<x-guest-layout>
    <x-slot:title>
        Home Page
    </x-slot:title>

    <div class="container mx-auto">
        <h1 class="py-2 mt-3 text-3xl md:text-4xl font-bold">Hello World</h1>

        <div x-data="{showModal: false}" class="grid mx-auto items-center w-full h-[50vh] py-10 px-4 bg-slate-200 dark:bg-slate-800 rounded-lg">
            <div>
                <p class="font-medium">Testing Modal</p>

                <x-secondary-button
                    x-on:click="$dispatch('open-modal', 'some-modal')"
                    class="w-max">
                    Open Modal
                </x-secondary-button>

                <x-modal name="some-modal">
                    <div class="p-5 py-10">
                        <p class="font-semibold">This is a modal</p>
                    </div>
                </x-modal>
            </div>


            <div class="my-4 px-4 py-10">
                <label>
                    <input type="range" min="0" max="5" step="0.1">
                </label>
            </div>
        </div>
    </div>
</x-guest-layout>
