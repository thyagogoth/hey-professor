<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('My Questions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <div>
                <x-form.form post :action="route('question.store')">

                    <x-form.textarea label="Question" name="question"/>

                    <x-form.button.submit>Save</x-form.button.submit>
                    <x-form.button.cancel>Cancel</x-form.button.cancel>

                </x-form.form>

                <hr class="my-4 border-gray-700">

                {{-- listagem --}}
                <div class="mb-1 font-bold uppercase dar:text-gray-400">
                    My Questions
                </div>

                <div class="space-y-1 dark:text-gray-400">
                    @foreach ($questions as $item)
                        <x-question :question="$item" />
                    @endforeach
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
