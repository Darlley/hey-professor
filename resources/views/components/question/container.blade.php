<div class="text-gray-900 dark:text-gray-100 w-full">
    
    <div class="flex items-start md:m-0 flex-col gap-4">
        <div class="flex gap-4 items-center w-full">
            <img class="inline-block h-10 w-10 rounded-full" src="https://avatars.githubusercontent.com/u/37590954?v=4" alt="">
            <h1 class="font-bold text-xl">{{ $slot }}</h1>
        </div>

        <div class="flex-1 w-full">
            <x-question.form post :action="route('question.store')">
                <x-text-area />
                <div class="absolute inset-x-0 bottom-0 flex justify-end py-2 pl-3 pr-2">
                    <div class="flex-shrink-0">
                        <x-btn.submit>Perguntar</x-btn.submit>
                    </div>
                </div>
            </x-question.form>

            <div class="mt-4">
                @error('question')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>                        

    </div>
</div>