<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="{{ asset('images/favicon.ico') }}">

<title>{{ config('app.name') }} - {{ ucwords(last(request()->segments())) }} </title>

<!-- Vendors Style-->
<link rel="stylesheet" href="{{ asset('src/css/vendors_css.css') }}">

<!-- Style-->
<link rel="stylesheet" href="{{ asset('src/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('src/css/skin_color.css') }}">

<!-- livewire -->
@livewireStyles
@livewireScripts
