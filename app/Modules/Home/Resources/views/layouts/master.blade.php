
<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link  href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
    <link  href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/flexslider.min.css">
    <link rel="icon" href="" type="image/svg+xml" sizes="16x16">
    <link href="{{asset('home/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('home/css/checkbox.css')}}" rel="stylesheet">
    <link href="{{asset('home/css/custom.css')}}" rel="stylesheet">
    <link href="{{asset('home/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('home/css/styles.css')}}" rel="stylesheet">
    <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('home/css/miscellaneous.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('home/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('home/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('home/css/owl.theme.default.min.css')}}">

    @inject('settings', '\App\Modules\Setting\Repositories\SettingRepository')
    @php
        $setting = $settings->getdata();
    @endphp
    <link rel="icon" href="{{asset('uploads/setting/'.$setting->company_favicon)}}" type="image/svg+xml" sizes="16x16">

    
    @jquery
    @toastr_css
    @toastr_js

</head>

<body>

    @include('home::includes.header')
    @toastr_render
    @yield('content')

</body>

    @include('home::includes.footer')
    @yield('scripts')
</html>