@props(['disabled' => false, 'filename'])
<img src="{{asset('/storage/projects/'.$filename)}}" alt="{{$filename}} image" {!! $attributes->merge(['class'=>"rounded-full size-12"]) !!} onerror="this.onerror=null;this.src='/storage/images/logo.jpeg'">
