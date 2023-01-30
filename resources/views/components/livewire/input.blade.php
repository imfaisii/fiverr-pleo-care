@props(['property'])

<input wire:model.lazy="{{ $property }}" class="form-control @error($property) is-invalid @enderror"
    wire:loading.attr="disabled" wire:target="{{ $property }}" {{ $attributes }}>
@error($property)
    <span class="text-danger">{{ $message }}</span>
@enderror
