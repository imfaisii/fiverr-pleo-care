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
<script src="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.js"
    integrity="sha512-bUg5gaqBVaXIJNuebamJ6uex//mjxPk8kljQTdM1SwkNrQD7pjS+PerntUSD+QRWPNJ0tq54/x4zRV8bLrLhZg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.css"
    integrity="sha512-DanfxWBasQtq+RtkNAEDTdX4Q6BPCJQ/kexi/RftcP0BcA4NIJPSi7i31Vl+Yl5OCfgZkdJmCqz+byTOIIRboQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .w-auto .form-select {
        margin-right: 20px;
    }
</style>

@vite(['resources/js/app.js'])

<!-- livewire -->
@livewireStyles
@livewireScripts
