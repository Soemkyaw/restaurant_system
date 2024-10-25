@props(['name'])
@error($name)
    <div class=" text-sm text-red-600">{{ $message }}</div>
@enderror
