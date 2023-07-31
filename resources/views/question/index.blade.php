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

                    <x-form.textarea label="Question" name="question" />

                    <x-form.button.submit>Save</x-form.button.submit>
                    <x-form.button.cancel>Cancel</x-form.button.cancel>

                </x-form.form>

                <hr class="my-4 border-gray-700">

                {{-- listagem --}}

                <div class="mb-1 font-bold uppercase dark:text-gray-400">
                    Drafts
                </div>
                <div class="mb-4 space-y-4 dark:text-gray-400">
                    <x-tables.table>
                        <x-tables.thead>
                            <tr>
                                <x-tables.th>Question</x-tables.th>
                                <x-tables.th>Created at</x-tables.th>
                                <x-tables.th>Updated at</x-tables.th>
                                <x-tables.th>Action</x-tables.th>
                            </tr>
                        </x-tables.thead>
                        <tbody>
                            @foreach ($questions->where('draft', true) as $item)
                                <x-tables.tr>
                                    <x-tables.td>{{ $item->question }}</x-tables.td>
                                    <x-tables.td>{{ $item->created_at->format('d/m/Y H:i') }}</x-tables.td>
                                    <x-tables.td>{{ $item->updated_at->format('d/m/Y H:i') }}</x-tables.td>

                                    <x-tables.td class="flex flex-wrap items-center justify-between">
                                        <span class="flex flex-wrap items-center justify-between">
                                            <a href="{{ route('question.edit', $item->id)}}" class="px-2 py-1 mb-2 mr-2 text-sm font-medium text-white bg-orange-500 rounded-sm hover:bg-orange-800 focus:ring-4 focus:ring-orange-300 dark:bg-orange-500 dark:hover:bg-orange-700 focus:outline-none dark:focus:ring-orange-800">
                                                Editar
                                            </a>

                                            <x-form.form :action="route('question.publish', $item->id)" put>
                                                <button type="submit" class="px-2 py-1 mb-2 mr-2 text-sm font-medium text-white bg-green-500 rounded-sm hover:bg-green-800 focus:ring-4 focus:ring-green-300 dark:bg-green-500 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">
                                                    Publish
                                                </button>
                                            </x-form.form>

                                            <x-form.form :action="route('question.archive', $item->id)" patch>
                                                <button type="submit" class="px-2 py-1 mb-2 mr-2 text-sm font-medium text-white bg-yellow-500 rounded-sm hover:bg-yellow-800 focus:ring-4 focus:ring-yellow-300 dark:bg-yellow-500 dark:hover:bg-yellow-700 focus:outline-none dark:focus:ring-yellow-800">
                                                    Archive
                                                </button>
                                            </x-form.form>

                                            <x-form.form :action="route('question.destroy', $item->id)" delete onsubmit="return confirm('Confirmar essa operação?')">
                                                <button type="submit" class="px-2 py-1 mb-2 mr-2 text-sm font-medium text-white bg-red-500 rounded-sm hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">
                                                    Remove
                                                </button>
                                            </x-form.form>
                                        </span>
                                    </x-tables.td>
                                </x-tables.tr>
                            @endforeach

                        </tbody>
                    </x-tables.table>
                </div>

                <div class="mb-1 font-bold uppercase dark:text-gray-400">
                    My Published Questions
                </div>
                <div class="mb-4 space-y-4 dark:text-gray-400">
                    <x-tables.table>
                        <x-tables.thead>
                            <tr>
                                <x-tables.th>Question</x-tables.th>
                                <x-tables.th>Created at</x-tables.th>
                                <x-tables.th>Action</x-tables.th>
                            </tr>
                        </x-tables.thead>
                        <tbody>
                            @foreach ($questions->where('draft', false) as $item)
                                <x-tables.tr>
                                    <x-tables.td>{{ $item->question }}</x-tables.td>
                                    <x-tables.td>{{ $item->created_at->format('d/m/Y H:i') }}</x-tables.td>
                                    <x-tables.td class="flex flex-wrap items-center justify-between">
                                        <span class="flex flex-wrap items-center justify-between">
                                            <x-form.form :action="route('question.archive', $item->id)" patch>
                                                <button type="submit" class="px-2 py-1 mb-2 mr-2 text-sm font-medium text-white bg-yellow-500 rounded-sm hover:bg-yellow-800 focus:ring-4 focus:ring-yellow-300 dark:bg-yellow-500 dark:hover:bg-yellow-700 focus:outline-none dark:focus:ring-yellow-800">
                                                    Archive
                                                </button>
                                            </x-form.form>

                                            <x-form.form :action="route('question.destroy', $item->id)" delete onsubmit="return confirm('Confirmar essa operação?')">
                                                <button type="submit" class="px-2 py-1 mb-2 mr-2 text-sm font-medium text-white bg-red-500 rounded-sm hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">
                                                    Remove
                                                </button>
                                            </x-form.form>
                                        </span>
                                    </x-tables.td>
                                </x-tables.tr>
                            @endforeach
                        </tbody>
                    </x-tables.table>
                </div>

                <div class="mb-1 font-bold uppercase dark:text-gray-400">
                    Archived Questions
                </div>
                <div class="space-y-4 dark:text-gray-400">
                    <x-tables.table>
                        <x-tables.thead>
                            <tr>
                                <x-tables.th>Question</x-tables.th>
                                <x-tables.th>Created at</x-tables.th>
                                <x-tables.th>Action</x-tables.th>
                            </tr>
                        </x-tables.thead>
                        <tbody>
                            @foreach ($archivedQuestions->where('draft', false) as $item)
                                <x-tables.tr>
                                    <x-tables.td>{{ $item->question }}</x-tables.td>
                                    <x-tables.td>{{ $item->created_at->format('d/m/Y H:i') }}</x-tables.td>
                                    <x-tables.td class="flex flex-wrap items-center justify-between">
                                        <span class="flex flex-wrap items-center justify-between">
                                            <x-form.form :action="route('question.restore', $item->id)" patch>
                                                <button type="submit" class="px-2 py-1 mb-2 mr-2 text-sm font-medium text-white bg-green-500 rounded-sm hover:bg-green-800 focus:ring-4 focus:ring-green-300 dark:bg-green-500 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">
                                                    Restore
                                                </button>
                                            </x-form.form>

                                            <x-form.form :action="route('question.destroy', $item->id)" delete onsubmit="return confirm('Confirmar essa operação?')">
                                                <button type="submit" class="px-2 py-1 mb-2 mr-2 text-sm font-medium text-white bg-red-500 rounded-sm hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">
                                                    Remove
                                                </button>
                                            </x-form.form>
                                        </span>
                                    </x-tables.td>
                                </x-tables.tr>
                            @endforeach
                        </tbody>
                    </x-tables.table>
                </div>


            </div>

        </div>
    </div>
</x-app-layout>
