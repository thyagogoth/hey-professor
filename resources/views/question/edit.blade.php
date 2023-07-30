<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Edit Question') }} :: {{ $question->question }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <div>
                <x-form.form post :action="route('question.update', $question->id)">

                    <x-form.textarea label="Question" name="question" required="required" :value="$question->question"/>

                    <x-form.button.submit>Save</x-form.button.submit>
                    <x-form.button.cancel>Cancel</x-form.button.cancel>

                </x-form.form>

            </div>

        </div>
    </div>
</x-app-layout>
