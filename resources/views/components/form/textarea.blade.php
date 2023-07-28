@props([
    'label',
    'name'
])

<label
    for="{{ $name }}"
    class="block mb-2 font-medium text-gray-900 value-sm dark:text-white">
    {{ $label }}
</label>

<textarea
    name="{{ $name}}"
    id="{{ $name}}"
    rows="4"
    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300
    focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600
    dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2"
    placeholder="Ask me anything...">{{ old($name) }}</textarea>
    @error('question')
        <div class="p-4 mt-2 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <span class="font-medium">Hey!</span> {{ $message }}
        </div>
    @enderror
