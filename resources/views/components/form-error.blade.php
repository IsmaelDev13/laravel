@props(['name'])

@error($name)
<p {{$attributes}}class="text-xs text-red-500 font-semibold">

{{$message}}
</p> 
@enderror