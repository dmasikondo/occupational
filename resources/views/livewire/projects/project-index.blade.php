<div class="lg:flex">
    <div id="show-allcontent" class="w-full lg:w-9/12">
        <div class="flex justify-between my-4 font-bold">
            <p>{{$this->projects->count()}} Projects</p>
            <p>
                <a href="/projects/create" title="Add Project">
                    <span>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="inline w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </span> Projects
                </a>
            </p>
        </div>
    @foreach ($this->projects as $project)

        <div class="p-3 text-lg font-bold border-b border-solid border-grey-light" wire:key="project-{{$project->id}}">
            {{-- <a x-data="{}" wire:click="showModal" href="#" class="mr-6 text-black no-underline hover-underline hover:text-indigo-500 hover:bg-white hover:border-1 hover:border-indigo-500">Photos

                </span>
            </a> --}}


            {{-- <button x-data="{}" wire:click="showModal" class="p-2 text-white bg-indigo-500 rounded-lg hover:text-indigo-500 hover:bg-white hover:border-4 hover:border-indigo-500">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="inline w-6 h-6">
				  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
				</svg>

            </button> --}}
            @livewire('projects.upload-image')
            <a href="#" class="mr-6 text-teal-500 no-underline hover:underline">Accidents &amp; Near Misses</a>
            <a href="#" class="text-teal-500 no-underline hover:underline">Contractors</a>
        </div>
        <div class="my-2">
            {{-- Sticky action dots horizontal --}}
            <div class="sticky top-0 text-xs text-gray-400">
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
                        <div wire:loading>
                        <div class="flex space-x-4 animate-pulse">
                            <div class="w-10 h-10 rounded-full bg-slate-200"></div>
                            <div class="flex-1 py-1 space-y-6">
                            <div class="h-2 rounded bg-slate-200"></div>
                            <div class="space-y-3">
                                <div class="grid grid-cols-3 gap-4">
                                <div class="h-2 col-span-2 rounded bg-slate-200"></div>
                                <div class="h-2 col-span-1 rounded bg-slate-200"></div>
                                </div>
                                <div class="h-2 rounded bg-slate-200"></div>
                            </div>
                            </div>
                        </div>
                        </div>

                        <x-icon name="trash" class="text-red-700 size-6"
                        wire:click="projectDelete"
                        wire:confirm.prompt="Are you sure you want to delete the project? You will not be able to retrieve it back. \n\nType DELETE to confirm your deleting action|DELETE"
                        />
                        <div wire:loading>
                            deleting..
                        </div>


                     </x-forms.dropdown-item>
                </x-forms.dropdown>
            </div>
            {{-- ./ Sticky action dots horizontal --}}
        </div>
        <div class="flex border-b border-solid border-grey-light">
            <div class="pt-3 pl-3 text-right">
                <div>
                    {{-- The profile pic is {{$this->profilePic}} --}}
                    {{-- <x-image :filename="$this->profilePic" class="w-12 h-12 mr-2" /> --}}
                    <img src="
                        @foreach ($project->files as $file)
                            @if($file->is_profile)
                                {{asset('storage/projects/'.$file['url'])}}"
                            @endif
                        @endforeach

                        alt="{{$project->project_title}} image" class="rounded-full size-12" onerror="this.onerror=null;this.src='/storage/images/logo.jpeg'">
                </div>
            </div>
            <div class="w-full p-3 pl-0">
                <div class="text-xs text-gray-400">Showing Project</div>
                <div class="flex justify-between space-x-3">
                    <div class="font-bold text-black hover:text-teal-500 hover:underline">
                        <a href="/projects/{{$project->slug}}">{{$project->title}}</a>
                    </div>
                    <div class="text-xs text-gray-400">{{$project->created_at->diffForHumans()}}</div>
                    <div class="text-xs text-gray-400">{{$project->created_at->format('d M Y')}} </div>
                </div>

                <div>
                    <div class="my-6">
                        <x-forms.success-message/>
                    </div>
                    <div class="mb-4">
                        <p class="mb-6">🎉 Created by: {{$project->user->first_name}} {{$project->user->surname}}</p>
                    </div>
                    <div class="flex justify-between my-4 gap-x-2">
                        <div class="flex gap-x-2">
                            <div class="flex items-center">
                                <x-icon name="calendar" class="text-teal-500 size-6" />
                            </div>
                            <div class="text-sm">
                                <p>Project Start Date</p>
                                <p>{{$project->start_date->format('d M Y')}}</p>
                            </div>
                        </div>
                        <div class="flex gap-x-2">
                            <div class="flex items-center">
                                <x-icon name="location-marker" class="text-teal-500 size-6" />
                            </div>
                            <div class="text-sm">
                                <p>
                                    <span>
                                    {{$project->street}}, {{$project->suburb}}
                                    </span>
                                </p>
                                <p>{{$project->city}}</p>

                                <p @class([ 'text-orange-500 font-semibold' => $project->is_complete])>Status: {{$project->iscomplete? 'Completed': 'Work in Progress' }}</p>
                            </div>

                        </div>
                        <div class="flex gap-x-2">
                            <div class="flex items-center">
                                <x-icon name="calendar" class="text-teal-500 size-6" />
                            </div>
                            <div class="text-sm">
                                <p>Estimated End Date</p>
                                <p>{{$project->end_date->format('d M Y')}}</p>
                                <p>{{$project->end_date->diffForHumans()}}</p>

                            </div>
                        </div>
                    </div>
                    <div>
                        <hr class="h-px bg-transparent border-t-0 opacity-25 bg-gradient-to-r from-transparent via-neutral-500 to-transparent dark:via-neutral-400" />
                    </div>
                    <div class="flex justify-between my-2">

                    </div>
                        {{-- <div class="my-2"  x-data="{ truncated: false }">
                            <div  x-text="truncated ? '{{ Str::limit($project->description, 50, "...") }}' : '{{$project->description}}'">
                            </div>
                              <button x-show="!truncated" @click="truncated = !truncated">Show More</button>

                        </div> --}}
                        <div>{{$project->description}}</div>



                        <p class="mb-4"><a href="#" class="text-teal"></a></p>
                        {{-- @if($this->project->project_image!='')
                        <div class="my-2">
                            <x-image :filename="$this->project->project_image" class="w-full h-64 rounded-none" />
                        </div>
                        @endif --}}
                </div>

                <div class="flex justify-between my-4 border-top-1">
                    <div class="flex items-center">
                        <div class="font-bold text-gray-400">
                            <p>
                                <x-icon name="bolt-slash" class="size-6" />
                            </p>
                            <p>{{$project->files->count()}}</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="font-bold text-gray-400">
                            <p title="eye">
                                <x-icon name="eye" class="size-6" />
                            </p>
                            <p>{{$project->files->count()}}</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
{{-- <div class="my-2">
   @foreach ($project->files as $file)
    <x-image filename="{{$file->url}}" class="w-full h-auto rounded-lg min-h-80"/>
    <p class="my-2">{{$file->title}}</p>
   @endforeach
</div> --}}

@endforeach

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
