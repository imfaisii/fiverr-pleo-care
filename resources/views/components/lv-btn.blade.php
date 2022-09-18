@props(['functionName', 'btnText'])

<button {{ $attributes }} wire:click="{{ $functionName }}" wire:loading.attr='disabled' class="btn btn-primary" type="button">
    <span>
        <div wire:loading wire:target="{{ $functionName }}">
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>&nbsp;
        </div>
        <span>{{ $btnText ?? 'Save Changes' }}</span>
    </span>
</button>
