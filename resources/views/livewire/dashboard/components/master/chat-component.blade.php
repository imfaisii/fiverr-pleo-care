@push('extended-css')
    <style>
        .blur-me {
            -webkit-filter: blur(5px);
            -moz-filter: blur(5px);
            -o-filter: blur(5px);
            -ms-filter: blur(5px);
            filter: blur(5px);
            height: 50vh;
            width: 100%;
            background-image: url('/images/chat.png')
        }
    </style>
@endpush
<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="row blur-me"></div>
</div>
