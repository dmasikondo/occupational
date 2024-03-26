<div class="lg:flex">
    <div id="main-content" class="w-full lg:w-9/12">
        <div class="flex items-center justify-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
            <img class="w-8 h-8 mr-2" src="{{url('/storage/images/logo.jpeg')}}" alt="Occupational Logo">
            Upload Project Details
        </div>
        <div class="my-8">
            <x-forms.error-message>
                <x-slot name="title">
                    Whoooooops!
                </x-slot>
                <x-slot name="body">
                    Something is not right
                </x-slot>
                <x-slot name="footer">
                    check form inputs
                </x-slot>
            </x-forms.error-message>
        </div>

        <div class="my-6">
            <x-forms.success-message/>
        </div>
        <form wire:submit='save'>
            <div
                x-data="{ uploading: false, progress: 0 }"
                x-on:livewire-upload-start="uploading = true"
                x-on:livewire-upload-finish="uploading = false"
                x-on:livewire-upload-cancel="uploading = false"
                x-on:livewire-upload-error="uploading = false"
                x-on:livewire-upload-progress="progress = $event.detail.progress"
            >
                <x-forms.fieldset title="Project Name">
                    <div class="my-6">
                        <x-forms.label for="title">Your Project Title</x-forms.label>
                        <x-forms.input type="text"  id="title" placeholder="Project Title" wire:model.live='title' @class(['border-yellow-500' => $is_editing])/>
                        @error('title')
                        <p class="text-xs italic text-red-500">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="my-6">
                        <x-forms.label for="description">Project Description</x-forms.label>
                        <x-forms.textarea id="description" placeholder="More details on this project...." required="" rows="4" wire:model.live='description' @class(['border-yellow-500' => $is_editing]) ></x-forms.textarea>
                        @error('description')
                        <p class="text-xs italic text-red-500">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="flex my-6">
                        <div class="w-full">
                            <x-forms.label for="start_date">Project Start Date</x-forms.label>
                            <x-forms.input type="date"  id="start_date" placeholder="dd/mm/yyyy" required="" wire:model='start_date' value="{{$this->currentDate}}" @class(['border-yellow-500' => $is_editing])/>
                            @error('start_date')
                            <p class="text-xs italic text-red-500">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="w-full ml-2">
                            <x-forms.label for="end_date">Project End Date</x-forms.label>
                            <x-forms.input type="date"  id="end_date" placeholder="dd/mm/yyyy" required="" wire:model='end_date' @class(['border-yellow-500' => $is_editing])/>
                            @error('end_date')
                            <p class="text-xs italic text-red-500">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                                <div class="flex items-center h-5">
                                    <x-forms.checkbox id="completed" aria-describedby="completed" wire:model='completed' :checked="$completed"/>
                                    {{-- This is checked {{$completed}} --}}
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="completed" class="text-gray-500 dark:text-gray-300">Project Completed?</label>
                                </div>
                        </div>
                    </div>
                </x-forms.fieldset>
                <x-forms.fieldset title="Project Location">
                    <div class="my-6">
                        <x-forms.label for="street">Street Address / Village Name</x-forms.label>
                        <x-forms.input id="street" type="text" required wire:model='street' @class(['border-yellow-500' => $is_editing])/>
                        @error('street')
                            <p class="text-xs italic text-red-500">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="my-6">
                        <x-forms.label for="suburb">Suburb / Chief</x-forms.label>
                        <x-forms.input id="suburb" type="text" required wire:model='suburb' @class(['border-yellow-500' => $is_editing])/>
                        @error('suburb')
                            <p class="text-xs italic text-red-500">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="my-6">
                        <x-forms.label for="towns">Town / City</x-forms.label>
                        <x-forms.select id="towns" wire:model='town' @class(['border-yellow-500' => $is_editing])>
                            <option >Select a Town</option>
                            @include('includes.towns')
                        </x-forms.select>
                        @error('town')
                            <p class="text-xs italic text-red-500">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="">
                        <x-forms.submit-button type="submit">Submit Project</x-forms.submit-button>
                    </div>
                </x-forms.fieldset>

            </div>
        </form>

    </div>
    {{-- aside --}}
    <div id="aside" class="w-full p-4 ml-2 lg:w-3/12 bg-gradient-to-r from-purple-50 to-indigo-50 shadow-slate-50">
        <div>
            <span class="text-lg font-bold">Latest Projects</span>
            <span>&middot;</span>
            <span><button class="text-xs text-teal-700" @click="$dispatch('project-created')">Refresh</button></span>
            <span>&middot;</span>
            <span><a href="#" class="text-xs text-teal-700">View All</a></span>
        </div>
        <hr class="h-px bg-transparent border-t-0 opacity-25 bg-gradient-to-r from-transparent via-neutral-500 to-transparent dark:via-neutral-400" />
        <livewire:projects.display-projects/>
    </div>
        {{-- end of aside --}}


</div>
