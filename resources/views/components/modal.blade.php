<div class="fixed inset-0 z-40 px-4 py-6 overflow-y-auto md:py-24" x-data="{show: @entangle($attributes->wire('model'))}"
		x-show="show"
		x-on:keydown.escape.window="show=false"
	>
    <div  style="display: none;" class="fixed inset-0 transform" x-show="show" x-on:click="show=false" x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0">
    	<div class="absolute inset-0 bg-gray-500 opacity-75">

    	</div>
    </div>

    <div style="display: none;" x-show="show" class="max-w-3xl p-4 overflow-hidden transform bg-white rounded-lg sm:w-full sm:mx-auto"
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
    >

            <!-- Title / Close-->
        <div class="flex items-center justify-between">
            <h5 class="mb-3 mr-3 text-black border-b-4 border-yellow-500 max-w-none">{{--{{$title}} --}}
            </h5>

            <button type="button" class="z-50 text-red-600 cursor-pointer" @click="show = false">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    	{{$slot}}
    </div>

</div>
