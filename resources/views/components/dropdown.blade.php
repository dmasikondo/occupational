@props(['title'])
<div x-data="{show: false}" @click.away="show=false">
    {{-- trigger --}}
    <button @click="show=!show" {{$attributes->merge(['class'=>"appearance-none lg:flex py-2 pl-3 pr-9 text-sm font-semibold lg:inline-flex w-full lg:w-40 w-40"])}}>
            {{$title}}
        <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px; z-index: 99;" width="22" 
             height="22" viewBox="0 0 22 22">
            <g fill="none" fill-rule="evenodd">
                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                </path>
                <path fill="#222"
                      d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
            </g>
        </svg>                            
    </button>
    <div x-show="show" {{$attributes->merge(['class'=>"text-left p-2 absolute w-40 mt-2 rounded bg-gradient-to-br from-yellow-50 via-white to-blue-50 border z-50"])}}  style="display: none;">  
             {{$slot}}              
    </div>
</div>