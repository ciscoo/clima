<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="assets/css/semantic.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
<div class="ui inverted menu">
    <div class="ui container">
        <a href="#" class="header item">
            <img src="assets/images/logo.svg" class="logo">
        </a>
        <a href="#" class="item">Home</a>
        <div class="ui simple dropdown item">
            Dropdown <i class="dropdown icon"></i>
            <div class="menu">
                <a class="item" href="#">Link Item</a>
                <a class="item" href="#">Link Item</a>
                <div class="divider"></div>
                <div class="header">Header Item</div>
                <div class="item">
                    <i class="dropdown icon"></i>
                    Sub Menu
                    <div class="menu">
                        <a class="item" href="#">Link Item</a>
                        <a class="item" href="#">Link Item</a>
                    </div>
                </div>
                <a class="item" href="#">Link Item</a>
            </div>
        </div>
    </div>
</div>
<div class="pusher">
    <div class="ui main text container">
        @yield('content')
    </div>
    <div class="ui inverted vertical footer segment">
        <div class="ui center aligned container">
            <div class="ui stackable inverted divided grid">
                <div class="seven wide centered column">
                    <h4 class="ui inverted header">Powered by</h4>
                    <img src="assets/images/wunderground_logo.svg" class="wunderground-logo">
                </div>
            </div>
        </div>
    </div>
</div>
<script src="assets/js/jquery-3.1.1.min.js"></script>
<script src="assets/js/semantic.min.js"></script>
</body>
</html>