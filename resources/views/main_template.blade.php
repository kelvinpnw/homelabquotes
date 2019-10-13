<!doctype html>
<html lang="en">
<head>
    <!--
         _                          _       _                       _
        | |                        | |     | |                     | |
        | |__   ___  _ __ ___   ___| | __ _| |__   __ _ _   _  ___ | |_ ___  ___
        | '_ \ / _ \| '_ ` _ \ / _ \ |/ _` | '_ \ / _` | | | |/ _ \| __/ _ \/ __|
        | | | | (_) | | | | | |  __/ | (_| | |_) | (_| | |_| | (_) | ||  __/\__ \
        |_| |_|\___/|_| |_| |_|\___|_|\__,_|_.__/ \__, |\__,_|\___/ \__\___||___/
                                                     | |
                                                     |_|
    -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta property="og:title" content="@yield('title') – {{ config("app.name")}}"/>
    <meta property="og:url" content="{{ config("app.url")}}"/>
    <meta property="og:image" content="/favicon-large.png"/>
    <meta property="og:description" content="quotes from the homelab discord!">
    <meta name="description" content="Homelab Quotes - Quotes from the Homelab Discord!"/>
    <meta name="theme-color" content="#017BC0"> <!-- color of the homelab logo :) -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/fontawesome.css">
    @yield('page_specific_css')
    <title>@yield('title') – {{ config("app.name")}}</title>
</head>
<body>
@include('common/nav')
<div class="container">

    @yield('body')

</div>
<br>
<hr class="footerhr">
<div class="footer">
    <p>
        <small>have a homelab quote? submit it <a href="{{env('QUOTE_SUBMIT_FORM')}}"><u>here</u></a>.</small>

    </p>
    <p>
        <small>domain name <a href="https://homelabquotes.com">homelabquotes.com</a> and site code are provided by <a
                href="https://kelvin.pw">kelvinpw</a> from homelab discord
        </small>
    </p>
    <p>
        <small>some quotes are provided by chong601 from the homelab discord
        </small>
    </p>
    <p>
        <small>website is hosted by april and kelvinpw from the homelab discord. join the homelab discord at <a href="https://discord.gg/homelab">https://discord.gg/homelab</a>!
        </small>
    </p>
    <p>
        <small>graphic design provided by <a href="http://zbk.design">zbk</a> of <a
                href="http://zbk.design">zbkdesign</a></small>
    </p>
    <img src="/static/credit.png" alt="chong601 gets credit">


</div>
@guest
    <span><a id="secrethackerbutton" href="{{route('DiscordLogin')}}">π</a></span>
@endguest
<script src="/js/jquery-3.3.1.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
@yield('page_specific_js')

</body>
