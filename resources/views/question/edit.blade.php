<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ "Edit Question " . $question->id }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex flex-col-reverse gap-4 md:flex-row">
                <div class="flex flex-col w-full mx-4">
                    <x-question.container>{{ $question->question }}</x-question.container>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>