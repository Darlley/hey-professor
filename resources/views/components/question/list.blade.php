@props([
    'questions'
])
<div class="p-4 text-gray-900 dark:text-gray-100 md:w-6/12 m-4 md:m-0 rounded-lg bg-white">
    <div class="mb-4">
        <h1 class="font-bold text-xl">{{ $slot }}</h1>
    </div>
    <ul class="flex flex-col w-full box-content bg-white">
        @foreach($questions as $key => $question)
        <li class="w-full flex flex-wrap">
            <span class="w-full break-all">{{ $key + 1 . ' - ' . $question->question }}</span>
        </li>
        @endforeach
    </ul>
</div>