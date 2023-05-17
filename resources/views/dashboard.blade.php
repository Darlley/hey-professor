<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex gap-4 w-full flex-col-reverse md:flex-row box-border">
                <x-question.list :questions="$questions">Todas as perguntas</x-question.list>
                <x-question.container>Nova pergunta</x-question.container>
            </div>
        </div>
    </div>
</x-app-layout>