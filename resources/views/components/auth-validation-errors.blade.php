@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="font-medium text-danger">
            <b>{{ __('Whoops! Something went wrong.') }}</b>
        </div>

        <ul class="mt-3 list-disc list-inside text-sm text-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
