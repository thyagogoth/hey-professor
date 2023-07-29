<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Vote for a question') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <div>
                {{-- listagem --}}
                <h1 class="mb-2 font-bold uppercase dark:text-gray-400">Lista de perguntas</h1>
                <hr class="my-4 mb-4 border-gray-700">

                <div class="dark:text-gray-400">
                    @foreach ($questions as $item)
                        <x-question :question="$item" />
                    @endforeach
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
