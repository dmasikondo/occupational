<div>
    <x-slot name="main">
        {{-- form side --}}
            <div class="block">
                    <div class="flex items-center justify-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                        <img class="w-8 h-8 mr-2" src="{{url('/storage/images/logo.jpeg')}}" alt="Occupational Logo">
                        Upload Project Details
                    </div>
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
                    </x-forms.fieldset>

            <div class="flex items-center justify-center w-full my-6">
                <label for="dropzone-file" class="flex flex-col items-center justify-center w-1/2 h-32 p-4 border-gray-300 border-dashed rounded-lg cursor-pointer border-purple-50 bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                    </div>
                    <input id="dropzone-file" type="file" class="hidden" accept="image/png, image/jpeg, image/jpg, image/svg, image/gif" wire:model='project_image' />
                </label>

                @error('project_image')
                <p class="text-xs italic text-red-500">{{$message}}</p>
                @enderror
            </div>

            <div class="block w-full my-6">
                @if ($project_image)
                    <img src="{{ $project_image->temporaryUrl() }}" class="size-24">
                @endif

            </div>
            <!-- Progress Bar -->
            <div x-show="uploading" class="block w-full" style="display: none">
                <progress max="100" x-bind:value="progress"></progress>
                <span>Image Uploading...</span>
            </div>

                        <div class="">
                            <x-forms.submit-button type="submit">Submit Project</x-forms.submit-button>
                        </div>
                    </div>
                </form>
            </x-slot>

        {{-- display side --}}
<x-slot name="aside">
           <div>
            <span class="text-lg font-bold">Latest Projects</span>
            <span>&middot;</span>
            <span><button class="text-xs text-teal-700" >Refresh</button></span>
            <span>&middot;</span>
            <span><a href="#" class="text-xs text-teal-700">View All</a></span>
           </div>
            <hr class="h-px bg-transparent border-t-0 opacity-25 bg-gradient-to-r from-transparent via-neutral-500 to-transparent dark:via-neutral-400" />
            <livewire:projects.display-projects/>
</x-slot>
        {{-- end of side diplay --}}





<div class="sticky top-0">
							<livewire:member.create-member/>
                <x-forms.dropdown>
                    <x-slot name="trigger">
                        <x-icon name="dots-horizontal"/>
                    </x-slot>
                    <x-forms.dropdown-item wire:loading.class="animate-pulse" wire:click="edit(1) ">
                        <x-icon name="edit"/>
                            <span wire:loading.remove wire:target="edit(1)">
                                Edit Member
                            </span>
                            <span wire:loading wire:target="edit(1)">
                            Editing ...
                            </span>
                    </x-forms.dropdown-item>
                    <x-forms.dropdown-item onclick="confirm('All the details of the member will be lost, Are you sure you want to delete the member and all the associated files?') || event.stopImmediatePropagation()"  wire:click="delete(1}})" wire:loading.class="animate-pulse">
                            <x-icon name="user-remove" class="text-red-700"/>
                                <span wire:loading.remove wire:target="delete(1 }})">
                                    Delete Member
                                </span>
                                <span wire:loading wire:target="delete(1)">
                                Deleting ...
                                </span>
                    </x-forms.dropdown-item>
                </x-forms.dropdown>
