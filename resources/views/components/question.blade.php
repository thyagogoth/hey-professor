@props(
    ['question']
)

<div class="flex items-center justify-between p-3 mb-2 text-black rounded shadow-sm dark:text-gray-400 dark:bg-gray-800/50 shadow-blue-800/50">
    <span>
        {{ $question->question }}
    </span>
    <span class="flex flex-wrap items-center justify-between">
        <x-form.form :action="route('question.like', $question)">
            <button type="submit" href="{{ route('question.like', $question) }}" class="flex items-start mr-2 space-x-1">
                <x-icons.thumbs-up class="w-5 h-5 text-green-500 cursor-pointer hover:text-green-300" id="thumbs-up" />
                <span>{{ $question->likes }}</span>
            </button>
        </x-form>

        <x-form.form :action="route('question.unlike', $question)">
            <button type="submit" class="flex items-center space-x-1">
                <x-icons.thumbs-down class="w-5 h-5 text-red-500 cursor-pointer hover:text-red-300" id="thumbs-up" />
                <span>{{ $question->unlikes }}</span>
            </button>
        </x-form>

    </span>
</div>
