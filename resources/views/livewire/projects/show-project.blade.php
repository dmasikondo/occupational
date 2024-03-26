<div class="lg:flex">
    <div id="show-content" class="w-full lg:w-9/12">

        <div class="p-3 text-lg font-bold border-b border-solid border-grey-light">
            <a href="#" class="mr-6 text-black no-underline hover-underline">Photos</a>
            <button x-data="{}" wire:click="showModal" class="p-2 rounded-lg bg-indigo-500 text-white hover:text-indigo-500 hover:bg-white hover:border-4 hover:border-indigo-500">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="inline h-6 w-6">
				  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
				</svg>
            	Add New Photo
            </button>
            @livewire('projects.upload-image')
            <a href="#" class="mr-6 text-teal-500 no-underline hover:underline">Accidents &amp; Near Misses</a>
            <a href="#" class="text-teal-500 no-underline hover:underline">Contractors</a>
        </div>
        <div class="my-2">
            {{-- Sticky action dots horizontal --}}
            <div class="sticky top-0 text-gray-400 text-xs">
                <x-forms.dropdown>
                    <x-slot name="trigger">
                        <x-icon name="dots-horizontal" class="size-6"/>
                    </x-slot>
                    <x-forms.dropdown-item wire:loading.class="animate-pulse">
                        <x-icon name="edit" class="size-6"/>

                        {{-- <span >
                        Editing ...
                        </span> --}}
                    </x-forms.dropdown-item>
                    <x-forms.dropdown-item  wire:loading.class="animate-pulse">
                        <x-icon name="trash" class="size-6 text-red-700"
                        wire:click="projectDelete"
                        wire:confirm.prompt="Are you sure you want to delete the project?\n\nType DELETE to confirm|DELETE"
                        />

                       
                     </x-forms.dropdown-item>
                </x-forms.dropdown>
            </div>
            {{-- ./ Sticky action dots horizontal --}}
        </div>
        <div class="flex border-b border-solid border-grey-light">
            <div class="pt-3 pl-3 text-right">
                <div>
                    {{-- The profile pic is {{$this->profilePic}} --}}
                    <x-image :filename="$this->profilePic" class="w-12 h-12 mr-2" />
                </div>
            </div>
            <div class="w-full p-3 pl-0">
                <div class="text-xs text-gray-400">Showing Project</div>
                <div class="flex justify-between space-x-3">
                    <div class="font-bold text-black">{{$this->project->title}}</div>
                    <div class="text-xs text-gray-400">{{$this->project->created_at->diffForHumans()}}</div>
                    <div class="text-xs text-gray-400">{{$this->project->created_at->format('d M Y')}} </div>
                </div>

                <div>
                    <div class="my-6">
                        <x-forms.success-message/>
                    </div>
                    <div class="mb-4">
                        <p class="mb-6">🎉 Created by: {{$this->project->user->first_name}} {{$this->project->user->surname}}</p>
                    </div>
                    <div class="flex justify-between my-4 gap-x-2">
                        <div class="flex gap-x-2">
                            <div class="flex items-center">
                                <x-icon name="calendar" class="text-teal-500 size-6" />
                            </div>
                            <div class="text-sm">
                                <p>Project Start Date</p>
                                <p>{{$this->project->start_date->format('d M Y')}}</p>
                            </div>
                        </div>
                        <div class="flex gap-x-2">
                            <div class="flex items-center">
                                <x-icon name="location-marker" class="text-teal-500 size-6" />
                            </div>
                            <div class="text-sm">
                                <p>
                                    <span>
                                    {{$this->project->street}}, {{$this->project->suburb}}
                                    </span>
                                </p>
                                <p>{{$this->project->city}}</p>
                                <p @class([ 'text-orange-500 font-semibold' => $this->project->is_complete])>Status: {{$this->projectStatus}}</p>
                            </div>

                        </div>
                        <div class="flex gap-x-2">
                            <div class="flex items-center">
                                <x-icon name="calendar" class="text-teal-500 size-6" />
                            </div>
                            <div class="text-sm">
                                <p>Estimated End Date</p>
                                <p>{{$this->project->end_date->format('d M Y')}}</p>
                                <p>{{$this->project->end_date->diffForHumans()}}</p>

                            </div>
                        </div>
                    </div>
                    <div>
                        <hr class="h-px bg-transparent border-t-0 opacity-25 bg-gradient-to-r from-transparent via-neutral-500 to-transparent dark:via-neutral-400" />
                    </div>
                    <div class="flex justify-between my-2">

                    </div>
                        <div class="my-2">
                            {{$this->project->description}}
                        </div>
                        <p class="mb-4"><a href="#" class="text-teal">
                        {{-- @if($this->project->project_image!='')
                        <div class="my-2">
                            <x-image :filename="$this->project->project_image" class="w-full h-64 rounded-none" />
                        </div>
                        @endif --}}
                </div>

            </div>
        </div>
<div class="my-2">
   @foreach ($this->project->files as $file)
    <x-image filename="{{$file->url}}" class="rounded-lg min-h-80 h-auto w-full"/>
    <p class="my-2">{{$file->title}}</p>
   @endforeach
</div>

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
