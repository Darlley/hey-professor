<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Questions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex gap-4 flex-col-reverse md:flex-row">
                <x-question.list :questions="$questions">Minhas perguntas</x-question.list>
                <div class="flex flex-col mx-4">
                    <x-question.container>Nova pergunta</x-question.container>
                    @if($questions->where('draft',1)->count() > 0)
                    <x-question.drafts :questions="$questions->where('draft',1)">Drafts</x-question.drafts>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>