@props([
    'questions'
])
<div class="p-6 text-gray-900 dark:text-gray-100 md:w-6/12 m-4 md:m-0 rounded-lg bg-white">
    <div class="mb-2">
        <h1 class="font-bold text-xl dark:text-gray-900">{{ $slot }}</h1>
    </div>
    <ul class="flex flex-col w-full box-content bg-white divide-y divide-gray-100">
        @foreach($questions as $key => $question)
        <li class="flex flex-wrap items-center justify-between gap-x-6 gap-y-4 py-5 sm:flex-nowrap">
            <div>
                <p class="text-sm font-semibold leading-6 text-gray-900">
                <a href="#" class="hover:underline">{{ $question->question }}</a>
                </p>
                <div class="mt-1 flex items-center gap-x-2 text-xs leading-5 text-gray-500">
                <p>
                    <a href="#" class="hover:underline">{{ auth()->user()->name }}</a>
                </p>
                <svg viewBox="0 0 2 2" class="h-0.5 w-0.5 fill-current">
                    <circle cx="1" cy="1" r="1" />
                </svg>
                <p><time datetime="2023-01-23T22:34Z">{{ $question->created_at }}</time></p>
                </div>
            </div>
            <dl class="flex w-full flex-none justify-between gap-x-8 sm:w-auto">
                <div class="flex -space-x-0.5 flex-col w-full">
                    <dt class="flex gap-2 justify-between w-full">
                        <div class="flex gap-2">
                            <x-question.form :action="route('question.like', $question)">
                                <button type="submit" class="text-blue-700 hover:text-blue-500 flex flex-col justify-center items-center gap-1">
                                    <x-icons.like class="w-5 h-5" fill="none" />
                                    <span class="text-xs">{{ $question->votes_sum_like ?: 0 }}</span>
                                </button>
                            </x-question.form>
                            
                            <x-question.form :action="route('question.unlike', $question)">
                                <button type="submit" class="text-blue-700 hover:text-blue-500 flex flex-col justify-center items-center gap-1">
                                    <x-icons.unlike class="w-5 h-5" fill="none" />
                                    <span class="text-xs">{{ $question->votes_sum_unlike ?: 0 }}</span>
                                </button>
                            </x-question.form>
                        </div>

                        
                    </dt>
                </div>
            </dl>
        </li>
        @endforeach
    </ul>
</div>