@props(['trigger'])
	<div x-data="{show: false}"  @click.away="show=false" {{$attributes(['class'=>"relative grid justify-items-stretch"])}}>
		{{-- trigger --}}
		<button @click="show=!show" x-on:keydown.escape.window="show=false" {{$attributes(['class'=>"justify-self-end z-10 hover:w-6 hover:h-6 hover:bg-gray-100 hover:rounded-full border-none"])}}>
			{{$trigger}}
		</button>
		{{-- links --}}
		<ul x-show="show" class="absolute bg-white shadow-lg border-2 sm:rounded-lg justify-self-end m-4 p-2 space-y-2 z-0" style="display: none;">
			{{$slot}}
		</ul>
	</div>
