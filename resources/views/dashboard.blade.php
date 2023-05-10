<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex gap-4 w-full">
                <div class="p-6 text-gray-900 dark:text-gray-100 w-6/12 bg-white rounded-lg">
                    <div class="mb-6">
                        <h1 class="font-bold text-xl">Todas as perguntas</h1>
                    </div>
                    <ul>
                        <li>Aqui vai estar uma pergunta ja feita</li>
                    </ul>
                </div>

                <div class="p-6 text-gray-900 dark:text-gray-100 flex-1">
                    <div class="mb-6">
                        <h1 class="font-bold text-xl">Nova pergunta</h1>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <img class="inline-block h-10 w-10 rounded-full"
                                src="https://avatars.githubusercontent.com/u/37590954?v=4"
                                alt="">
                        </div>
                        <div class="min-w-0 flex-1">
                            <form action="{{ route('question.store') }}" class="relative" method="POST">
                                @csrf
                                <div
                                    class="overflow-hidden rounded-lg shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-indigo-600">
                                    <textarea rows="3" name="question" id="question"
                                        class="block w-full resize-none border-0 bg-transparent py-1.5 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                        placeholder="Faça uma nova pergunta...">{{ old('question') }}</textarea>
                
                                    <!-- Spacer element to match the height of the toolbar -->
                                    <div class="py-2" aria-hidden="true">
                                        <!-- Matches height of button in toolbar (1px border + 36px content height) -->
                                        <div class="py-px">
                                            <div class="h-9"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="absolute inset-x-0 bottom-0 flex justify-end py-2 pl-3 pr-2">
                                    <div class="flex-shrink-0">
                                        <button type="submit"
                                            class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Perguntar</button>
                                    </div>
                                </div>
                            </form>
                            <div class="mt-4">
                                @error('question')
                                <p class="text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>