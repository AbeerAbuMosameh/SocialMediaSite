<!doctype html>
<html lang="en" dir="ltr">

<!-- soccer/project/  07 Jan 2020 03:36:49 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" href="favicon.ico" type="image/x-icon"/>

    <title>@yield('title'):: Dashboard</title>

    @include('admin.includes.css')
    @yield('css')
</head>

<body class="font-montserrat">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
    </div>
</div>

<div id="main_content">
    @include('admin.includes.sidebar')
    <div class="page">
        @include('admin.includes.page_top')
        @yield('content')
    </div>
</div>

@include('admin.includes.js')
@yield('js')
</body>

<!-- soccer/project/  07 Jan 2020 03:37:22 GMT -->
</html>
