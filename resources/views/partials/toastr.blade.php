@push('extended-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor_plugins/toastr/css/toastr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor_plugins/toastr/css/ext.css') }}">
@endpush

@push('extended-js')
    <script src="{{ asset('assets/vendor_plugins/toastr/js/toastr.min.js') }}"></script>
    <script>
        function makeToastr(type, heading = "Notification", message) {
            toastr[type](
                message,
                heading, {
                    closeButton: true,
                    tapToDismiss: false,
                    progressBar: true,
                }
            );
        }
    </script>
@endpush
