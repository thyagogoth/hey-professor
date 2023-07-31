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
                    <form method="get" action="{{ route('dashboard') }}" class="flex items-center mb-2 space-x-2">
                        <x-text-input type="text" name="search" value="{{ request()->search }}" class="w-full" />
                        <x-primary-button class="dark:bg-slate-500" type="submit">Search</x-primary-button>
                    </form>

                    @if($questions->isEmpty())
                        <div class="flex flex-col justify-center text-center dark:text-gray-300">
                            <div class="mt-8 text-2xl font-bold dark:text-gray-400">
                                Question not found
                            </div>
                            <div class="flex justify-center mx-4">
                                <x-draw.searching width="650"/>
                            </div>

                        </div>
                    @else
                        @foreach ($questions as $item)
                            <x-question :question="$item" />
                        @endforeach

                        {{ $questions->withQueryString()->links() }}
                    @endif
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
