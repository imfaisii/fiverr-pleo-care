@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="font-medium text-danger">
            <b>{{ __('Whoops! Something went wrong.') }}</b>
        </div>

        <ul class="mt-3 text-sm list-disc list-inside text-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

    <script>
        makeToastr('error', 'Error(s) occured', 'Please fix the error(s) to continue.')
    </script>
@endif
