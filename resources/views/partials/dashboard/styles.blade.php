<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="{{ asset('images/favicon.ico') }}">

<title>{{ config('app.name') }} - {{ ucwords(last(request()->segments())) }} </title>

<!-- fontawesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
    integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- Vendors Style-->
<link rel="stylesheet" href="{{ asset('src/css/vendors_css.css') }}">

<!-- Style-->
<link rel="stylesheet" href="{{ asset('src/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('src/css/skin_color.css') }}">

<style>
    .w-auto .form-select {
        margin-right: 20px;
    }
</style>

<!-- livewire -->
@livewireStyles
@livewireScripts
