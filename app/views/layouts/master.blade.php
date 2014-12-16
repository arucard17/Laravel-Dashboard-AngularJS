<!DOCTYPE html>
<html lang="en" ng-app="Dashboard">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <title>{{ $title }}</title>

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/font-awesome.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/dashboard.css">

        @yield('css-top')

        <!-- Javascript TOP -->
        @yield('js-top')
    </head>
    <body>
        @yield('content')

        <!-- Javascript Bottom -->
        @yield('js-bot')

    </body>
</html>