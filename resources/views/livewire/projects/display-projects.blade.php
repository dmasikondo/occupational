<div>
   @foreach ($projects as $project)
    <div wire:key="project-{{$project->id}}" class="flex border-b border-solid border-grey-light">
        <div class="py-2">
            <a href="#"><img src="{{asset('storage/projects/'.$project->project_image)}}" alt="{{$project->project_title}} image" class="rounded-full size-12" onerror="this.onerror=null;this.src='/storage/images/logo.jpeg'"></a>
        </div>
        <div class="w-full py-2 pl-2">
            <div class="flex justify-between mb-1 text-sm">
                <div>
                    <a href="/projects/{{$project->slug}}" class="font-bold text-black hover:text-gray-500">{{$project->title}}
                        <span class="text-xs font-thin text-gray-400">
                            {{$project->created_at->diffForHumans()}}
                        </span>
                    </a>
                </div>

                <div>
                    <a href="#" class="text-gray-300 hover:text-gray-500">
                        <x-icon name="trash" class="size-4"/>
                    </a>
                </div>
            </div>
            <div>
                <button wire:click="projectEdit('{{$project->slug}}')" class="px-6 py-2 text-xs font-semibold bg-transparent border border-teal-500 rounded-full hover:bg-teal text-teal hover:text-gray-500 hover:border-transparent">
                Edit
            </button>
            </div>
        </div>
    </div>
    @endforeach
                {{-- <div class="flex border-b border-solid border-grey-light"></div> --}}

                    {{-- <div class="text-xs text-grey-dark">Pinned Tweet</div>
                    <div class="flex justify-between">
                        <div>
                            <span class="font-bold"><a href="#" class="text-black">Tailwind CSS</a></span>
                            <span class="text-grey-dark">@tailwindcss</span>
                            <span class="text-grey-dark">&middot;</span>
                            <span class="text-grey-dark">15 Dec 2017</span>
                        </div>
                        <div>
                            <a href="#" class="text-grey-dark hover:text-teal"><i class="fa fa-chevron-down"></i></a>
                        </div>
                    </div>

                    <div>
                        <div class="mb-4">
                            <p class="mb-6">🎉 Tailwind CSS v0.4.0 is out!</p>
                            <p class="mb-6">Makes `apply` more useful when using !important utilities, and includes an improved default color palette:</p>
                            <p class="mb-4"><a href="#" class="text-teal">github.com/tailwindcss/ta...</a></p>
                            <p><a href="#"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/tt_tweet1.jpg" alt="tweet image" class="border border-solid rounded-sm border-grey-light"></a></p>
                        </div>
                    </div> --}}
</div>
