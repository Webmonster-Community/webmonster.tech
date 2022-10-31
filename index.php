<?php
function dateToFrench($date, $format)
{
    $english_days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
    $french_days = array('lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche');
    $english_months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    $french_months = array('janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
    return str_replace($english_months, $french_months, str_replace($english_days, $french_days, date($format, strtotime($date))));
}
$url = "https://discord.com/api/guilds/980538474543337542/widget.json";
$json = file_get_contents($url);
$obj = json_decode($json);
$discord_invite =  $obj->instant_invite;
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/pimentcss.min.css?<?=time();?>">
    <title>Webmonster Community</title>
    <script src="https://kit.fontawesome.com/45fd93cb0d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/icons/favicon-16x16.png">
    <link rel="manifest" href="/assets/icons/site.webmanifest">
    <style>
        html {
            color: #2e2e2e;
            font-size: 100%;
            box-sizing: inherit;
            scroll-behavior: smooth;
            height: -webkit-fill-available;
        }

        .font-light {
            font-weight: 400;
        }

        .font-bold {
            font-weight: 700;
        }

        dd {
            font-weight: 400;
        }

        address {
            display: block;
            font-style: normal;
            font-size: x-large;
        }

        a {
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        #burger-menu {
            position: fixed;
            right: 1rem;
            cursor: pointer;
            height: 27px;
            width: 27px;
            margin: 30px;
            overflow: visible;
            z-index: 2;
        }

        #burger-menu span,
        #burger-menu span:before,
        #burger-menu span:after {
            background: #e9473e;
            display: block;
            height: 4px;
            opacity: 1;
            position: absolute;
            transition: 0.3s ease-in-out;
        }

        #burger-menu span:before,
        #burger-menu span:after {
            content: "";
        }

        #burger-menu span {
            right: 0;
            top: 13px;
            width: 27px;
        }

        #burger-menu span:before {
            left: 0;
            top: -10px;
            width: 16px;
        }

        #burger-menu span:after {
            left: 0;
            top: 10px;
            width: 20px;
        }

        #burger-menu.close span {
            transform: rotate(-45deg);
            top: 13px;
            width: 27px;
        }

        #burger-menu.close span:before {
            top: 0;
            transform: rotate(90deg);
            width: 27px;
        }

        #burger-menu.close span:after {
            top: 0;
            left: 0;
            transform: rotate(90deg);
            opacity: 0;
            width: 0;
        }

        #menu {
            z-index: 1;
            min-width: 100%;
            min-height: 100%;
            position: fixed;
            top: 0;
            height: 0;
            visibility: hidden;
            opacity: 0;
            text-align: center;
            padding-top: 0;
            transition: all 0.3s ease-in-out;
        }

        #menu.overlay {
            visibility: visible;
            opacity: 1;
            background: rgba(255, 255, 255, 0.5);
        }

        nav {
            position: fixed;
            display: flex;
            flex-flow: column;
            padding: 4rem 2rem;
            background-color: white;
            min-width: 100%;
            height: 100vh;
            overflow: hidden;
        }

        nav a {
            font-size: clamp(1.8rem, 1rem + 1vw, 2.2rem);
            margin-right: 1rem;
        }

        .block {
            margin-top: 2rem;
            background: #fff;
            padding: 28px;
            border-radius: 2px;
            background-clip: padding-box;
            box-shadow: 0 1.6px 3.6px 0 rgba(0, 0, 0, .132), 0 0.3px 0.9px 0 rgba(0, 0, 0, .108);
            position: relative;
            opacity: 1;
            transition: opacity .3s cubic-bezier(.1, .9, .2, 1) 50ms, -webkit-transform .3s cubic-bezier(.1, .9, .2, 1);
            transition: transform .3s cubic-bezier(.1, .9, .2, 1), opacity .3s cubic-bezier(.1, .9, .2, 1) 50ms;
            transition: transform .3s cubic-bezier(.1, .9, .2, 1), opacity .3s cubic-bezier(.1, .9, .2, 1) 50ms, -webkit-transform .3s cubic-bezier(.1, .9, .2, 1);
        }

        .block:hover, .block:focus {
            box-shadow: 0 1.6px 10px 0 rgba(0, 0, 0, .132), 0 0.3px 0.9px 0 rgba(0, 0, 0, .108);
        }

        select.select {
            border-top: 0;
            border-left: 0;
            border-right: 0;
            font-size: 2.2652rem;
        }

        .timeline {
            position: relative;
            max-width: 1200px;
            margin: 0 auto;
        }

        .timeline::after {
            content: '';
            position: absolute;
            width: 6px;
            background-color: #0f0ff5;
            top: 0;
            bottom: 0;
            left: 50%;
            margin-left: -3px;
        }

        .container-timeline {
            padding: 10px 40px;
            position: relative;
            background-color: inherit;
            width: 50%;
        }

        .container-timeline::after {
            content: '';
            position: absolute;
            width: 30px;
            height: 30px;
            right: 5px;
            background-color: #0f0ff5;
            border: 4px solid #0f0ff5;
            top: 15px;
            border-radius: 50%;
            z-index: 1;
        }

        .left {
            left: 20px;
        }

        .right {
            left: 50%;
        }

        .left::before {
            content: " ";
            height: 0;
            position: absolute;
            top: 22px;
            width: 0;
            z-index: 1;
            right: 30px;
            border: medium solid white;
            border-width: 10px 0 10px 10px;
            border-color: transparent transparent transparent white;
        }

        .right::before {
            content: " ";
            height: 0;
            position: absolute;
            top: 22px;
            width: 0;
            z-index: 1;
            left: 30px;
            border: medium solid white;
            border-width: 10px 10px 10px 0;
            border-color: transparent white transparent transparent;
        }

        .right::after {
            left: -16px;
        }

        .content {
            padding: 20px 30px;
            background-color: white;
            position: relative;
            border-radius: 6px;
            box-shadow: 0 1.6px 3.6px 0 rgba(0, 0, 0, .132), 0 0.3px 0.9px 0 rgba(0, 0, 0, .108);
            overflow: hidden;
        }

        .content .dt {
            font-size: 1rem;
            padding-bottom: .2rem;
            border-bottom: 1px solid #2632FF;
        }

        @media screen and (max-width: 600px) {
            .timeline::after {
                left: 22px;
            }

            .container-timeline {
                width: 100%;
                padding-left: 0;
                padding-right: 15px;
            }

            .container-timeline::before {
                left: 15px;
                border: medium solid white;
                border-width: 10px 10px 10px 0;
                border-color: transparent white transparent transparent;
            }

            .left::after, .right::after {
                left: -45px;
            }

            .right {
                left: 6%;
            }
        }

        ul.nostyle {
            z-index: 8;
            margin: 0;
            padding: 0;
            display: inline-flex;
            gap: 0.5rem;
            list-style: none;
            padding-top: .4rem;
            padding-bottom: .2rem;
            border-top: 1px solid #2632FF;
        }

        ul.nostyle > li {
            font-size: 1rem;
        }

        ul.nostyle > li:not(:last-child):after {
            content: ', ';
        }
    </style>
</head>
<body>
<header class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="logo d-flex gap-2 mt-4">
                <a href="/">
                    <svg width="90" height="90" fill="#0f0ff5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
                    <path id="face" class="emblem" d="M50,3.3C24.2,3.3,3.3,24.2,3.3,50S24.2,96.7,50,96.7S96.7,75.8,96.7,50S75.8,3.3,50,3.3z M56.1,26.3
                    c4.2,0,7.7,3.4,7.7,7.7s-3.4,7.7-7.7,7.7c-4.2,0-7.7-3.4-7.7-7.7S51.8,26.3,56.1,26.3z M40.2,29.5c2.8,0,5.1,2.3,5.1,5.1
                    c0,2.8-2.3,5.1-5.1,5.1c-2.8,0-5.1-2.3-5.1-5.1C35.2,31.8,37.4,29.5,40.2,29.5z M74.7,58.3c-0.2,0.8-0.5,1.5-0.9,2.3
                    c-2.3,5.2-5.2,8.4-8.5,10.3c-1.1,0.6-2.2,1.1-3.3,1.5c-3.6,1.2-7.6,1.4-12,1.4c-4.2,0-8.5-0.8-12.3-2.3c-1.2-0.5-2.4-1-3.5-1.6
                    c-4.1-2.1-7.5-5.1-9.1-8.5c-0.4-0.8-0.7-1.5-1-2.3c-2.4-6.6-1.8-13.2,0.4-15.8c0.9-1.1,2.7-1.2,5-0.8c1.1,0.2,2.4,0.6,3.7,1
                    c5.1,1.5,11.4,4,16.8,3.8c5.3-0.1,10.9-2.3,15.2-3.4c1.3-0.3,2.6-0.6,3.6-0.7c0.6,0,1.2,0,1.7,0.1C74.1,44.4,77,50.8,74.7,58.3z"></path>
                        <circle id="oeil-gauche" class="emblem" cx="42.2" cy="35" r="2"></circle>
                        <circle id="oeil-droit" class="emblem" cx="52.7" cy="35" r="2.9"></circle>
                    </svg>
                </a>
                <h1 class="text-blue text-red">Webmonster</h1>
            </div>
        </div>
    </div>
</header>
<main class="container">
    <div class="row gap-2">
        <div class="col-xs-12 col-md-12">
            <h3>Tu es en Martinique, Guadeloupe ou Guyane et tu travailles dans l'informatique, tu apprends à coder ?</h3>
            <p>Le collectif Webmonster représente aujourd'hui une communauté de 282 développeurs, designers, chefs d'entreprises et autres profils, originaires principalement de #Martinique, #Guadeloupe et #Guyane.</p>
            <p>
                <a class="btn-outlined-blue" href="<?=$discord_invite;?>" target="_blank" rel="noopener nofollow">
                    <i class="fa-brands fa-discord"></i> Nous rejoindre sur Discord
                </a>
            </p>

            <div class="row mb-3 gap-2">
                <div class="col-xs-12 col-md-6">
                    <div class="block mb-2 bg-dark">
                        <h4 class="text-orange">
                            <svg width="24" height="24" fill="#fb8618" id="logo-techmonster" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
                                    <path id="face" class="emblem" d="M50,3.3C24.2,3.3,3.3,24.2,3.3,50S24.2,96.7,50,96.7S96.7,75.8,96.7,50S75.8,3.3,50,3.3z M56.1,26.3
                                    c4.2,0,7.7,3.4,7.7,7.7s-3.4,7.7-7.7,7.7c-4.2,0-7.7-3.4-7.7-7.7S51.8,26.3,56.1,26.3z M40.2,29.5c2.8,0,5.1,2.3,5.1,5.1
                                    c0,2.8-2.3,5.1-5.1,5.1c-2.8,0-5.1-2.3-5.1-5.1C35.2,31.8,37.4,29.5,40.2,29.5z M74.7,58.3c-0.2,0.8-0.5,1.5-0.9,2.3
                                    c-2.3,5.2-5.2,8.4-8.5,10.3c-1.1,0.6-2.2,1.1-3.3,1.5c-3.6,1.2-7.6,1.4-12,1.4c-4.2,0-8.5-0.8-12.3-2.3c-1.2-0.5-2.4-1-3.5-1.6
                                    c-4.1-2.1-7.5-5.1-9.1-8.5c-0.4-0.8-0.7-1.5-1-2.3c-2.4-6.6-1.8-13.2,0.4-15.8c0.9-1.1,2.7-1.2,5-0.8c1.1,0.2,2.4,0.6,3.7,1
                                    c5.1,1.5,11.4,4,16.8,3.8c5.3-0.1,10.9-2.3,15.2-3.4c1.3-0.3,2.6-0.6,3.6-0.7c0.6,0,1.2,0,1.7,0.1C74.1,44.4,77,50.8,74.7,58.3z"></path>
                                <circle id="oeil-gauche" class="emblem" cx="42.2" cy="35" r="2"></circle>
                                <circle id="oeil-droit" class="emblem" cx="52.7" cy="35" r="2.9"></circle>
                            </svg>
                            Le Club
                        </h4>
                        <p class="text-orange">Retrouver les artisans du web et de la tech qui composent notre communauté.</p>
                        <a href="https://club.webmonster.tech/" class="option-orange">
                            <span class="circle" aria-hidden="true"><span class="icon arrow"></span></span>
                            <span class="button-text">Le site</span>
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="block mb-2 bg-red">
                        <h4 class="text-white">
                            <svg width="24" height="24" viewBox="0 0 100 55">
                                <path fill="#ffffff" stroke="#ffffff" stroke-width="4.7131" stroke-linejoin="round" d="M6.34,27.7l1.09,0.32
                                l1.64,1.09l2.04,1.21l2.02,1l1.84,0.78l2.21,0.77l3.15,1l2.74,0.5l2.58,0.48l1.6,0.21l1.79,0.06l2.61,0.15l2.23-0.22l2.57-0.27
                                l2.37-0.33l2.88-0.82l2.93-0.94l2.75-1.17l2.5-1.2l2.57-1.48l3.21-2l2.73-1.76l2.47-1.7l2.95-1.94l3.26-2.12l2.25-1.22l2.2-1.1
                                l1.85-0.85l1.84-0.59l1.73-0.41l1.77-0.16l1.72-0.01l2.03,0.28l1.71,0.51l1.27,0.59l1.04,0.77l1,0.78l0.79,0.8l0.97,1.2l0.59,0.91
                                l0.59,1.19c0,0,0.17,1.05,0.21,1.16c0.04,0.11,0.18,1.13,0.18,1.27c0,0.14-0.02,1.48-0.02,1.48l-0.15,1.39l-0.35,1.56l-0.52,1.55
                                l-0.49,1.07l-0.71,1.25l-0.81,1.34l-0.84,1.16l-0.99,1.26l-1.04,1.16l-1.38,1.4l-1.09,1l-1.59,1.18l-1.4,0.99l-1.79,1.14l-1.53,1.01
                                l-1.37,0.86l-2.05,1.1l-2,0.85l-2.03,0.88l-2.2,0.82l-2.19,0.75l-2.11,0.64l-3.21,0.79l-2.36,0.44l-3.21,0.48l-1.89,0.18l-2.52,0.14
                                l-1.87,0.07l-1.88-0.06l-2.15-0.07l-2.55-0.28l-2.08-0.3l-2.67-0.5l-1.81-0.43l-2.05-0.54l-2.4-0.66l-1.44-0.56l-1.57-0.65
                                l-2.33-1.06l-1.96-0.99l-2.7-1.55l-1.82-1.16l-2.54-2.16l-1.97-1.66l-1.14-1.17l-1.24-1.4l-1.18-1.59l-0.85-1.29l-1.15-1.87
                                l-0.98-1.7l-0.41-1.31l-0.02-1.28L6.34,27.7z"></path>
                                <path fill="#53AF32" stroke="#53AF32" stroke-width="2.1423" stroke-linecap="round" stroke-linejoin="round" d="M84.43,19.55l0.46,1.36l0.66,1.47l0.66,1.28l0.77,0.96l0.93,0.68"></path>
                                <path fill="#53AF32" d="M85.86,22.02l1-1c0,0,0.88-0.82,1.25-1.2c0.37-0.38,1.28-1.26,1.6-1.71
                                c0.32-0.45,1.08-1.59,1.23-1.83c0.15-0.23,0.99-1.33,1.05-1.45c0.05-0.12,0.69-0.97,0.82-1.23s0.95-1.94,0.95-1.94l0.36-1.09
                                l0.33-1.51l0.06-1.14c0,0-0.03-1.3-0.06-1.38s-0.3-1.16-0.3-1.16l-0.44-1l-0.56-1.2l-0.21-0.63c0,0,0.08-0.78,0.22-0.93
                                c0.14-0.15,0.67-0.47,0.77-0.63s0.85-0.16,0.85-0.16l0.77,0.21l0.42,0.52l0.5,0.95l0.48,1.01l0.44,1.34l0.13,1.14l0.05,1.32
                                L97.54,8.6l-0.27,1.2l-0.47,1.47l-0.5,1.2l-0.56,1.17l-0.51,1.09l-0.64,0.89l-0.81,1l-0.71,1.03l-1.03,1.1l-0.98,1.02l-4.35,3.52
                                l-0.6,0L85.86,22.02z"></path>
                            </svg>
                            Piment CSS
                        </h4>
                        <p class="text-white">Piment CSS est un micro-framework css réalisé par la communauté Webmonster.</p>
                        <a href="https://github.com/freepiment/Piment-Css" class="option-dark">
                            <span class="circle" aria-hidden="true"><span class="icon arrow"></span></span>
                            <span class="button-text">Github</span>
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="block mb-2 bg-blue">
                        <h4 class="text-white">
                            <svg width="24" height="24" fill="#ffffff" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
                                <path id="face" class="emblem" d="M50,3.3C24.2,3.3,3.3,24.2,3.3,50S24.2,96.7,50,96.7S96.7,75.8,96.7,50S75.8,3.3,50,3.3z M56.1,26.3
                                c4.2,0,7.7,3.4,7.7,7.7s-3.4,7.7-7.7,7.7c-4.2,0-7.7-3.4-7.7-7.7S51.8,26.3,56.1,26.3z M40.2,29.5c2.8,0,5.1,2.3,5.1,5.1
                                c0,2.8-2.3,5.1-5.1,5.1c-2.8,0-5.1-2.3-5.1-5.1C35.2,31.8,37.4,29.5,40.2,29.5z M74.7,58.3c-0.2,0.8-0.5,1.5-0.9,2.3
                                c-2.3,5.2-5.2,8.4-8.5,10.3c-1.1,0.6-2.2,1.1-3.3,1.5c-3.6,1.2-7.6,1.4-12,1.4c-4.2,0-8.5-0.8-12.3-2.3c-1.2-0.5-2.4-1-3.5-1.6
                                c-4.1-2.1-7.5-5.1-9.1-8.5c-0.4-0.8-0.7-1.5-1-2.3c-2.4-6.6-1.8-13.2,0.4-15.8c0.9-1.1,2.7-1.2,5-0.8c1.1,0.2,2.4,0.6,3.7,1
                                c5.1,1.5,11.4,4,16.8,3.8c5.3-0.1,10.9-2.3,15.2-3.4c1.3-0.3,2.6-0.6,3.6-0.7c0.6,0,1.2,0,1.7,0.1C74.1,44.4,77,50.8,74.7,58.3z"></path>
                                <circle id="oeil-gauche" class="emblem" cx="42.2" cy="35" r="2"></circle>
                                <circle id="oeil-droit" class="emblem" cx="52.7" cy="35" r="2.9"></circle>
                            </svg>
                            Webmonster community
                        </h4>
                        <p class="text-white">Github de la communauté Webmonster.</p>
                        <a href="https://github.com/Webmonster-Community" class="option-orange">
                            <span class="circle" aria-hidden="true"><span class="icon arrow"></span></span>
                            <span class="button-text">Github</span>
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="block mb-2 bg-blue-light-1">
                        <h4 class="text-green">
                            <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 97.7 108.6" style="enable-background:new 0 0 97.7 108.6;" xml:space="preserve">
                                <path fill="#1ef671" d="M89.5,5.9c0,2.4,0,4.6,0,6.8c0,0.3-0.5,0.8-0.9,0.9c-0.5,0.2-1,0.1-1.6,0.1c-21.1,0-42.1,0-63.2,0
                                c-0.9,0-1.9,0-2.8,0.1c-2.2,0.3-3.7,2-3.6,4.2c0.1,2.2,1.6,3.9,3.8,4.1c0.6,0.1,1.1,0,1.7,0c21.5,0,43,0,64.5,0c0.7,0,1.3,0,2.1,0
                                c0,27.4,0,54.6,0,82c-0.6,0-1.1,0-1.7,0c-22.5,0-45.1,0-67.6,0c-7.3,0-12.6-5.4-12.7-12.7c0-24.4,0-48.7,0-73.1
                                c0-7.3,5.1-12.6,12.3-12.6c22.8-0.1,45.6,0,68.4,0C88.6,5.8,88.9,5.8,89.5,5.9z M70.3,53.5c0-2.3,0-4.6,0-6.9c0-2.9,0-2.9-2.7-3.9
                                c-4.4-1.7-9-2.3-13.6-2.7c-8.4-0.6-16.4,0.4-23.7,4.9C16.6,53.1,14.5,70.3,25.9,81c5.5,5.1,12.2,7.3,19.6,7.6
                                c6.6,0.2,12.7-1.4,17.7-5.9c1.8-1.6,3.2-3.8,4.8-5.7c0,2.9,0,5.8,0,8.8c0,0.5,0.4,1.3,0.6,1.3c2.5,0.1,5,0.1,7.5,0.1
                                c0-8.8,0-17.2,0-25.8c-6.7,0-13.4,0-20,0c0,2.6,0,5,0,7.7c4,0,7.9,0,11.9,0c-0.1,0.7-0.1,1.3-0.3,1.8c-1.1,3.9-4.1,6.1-7.5,7.7
                                c-4.8,2.2-9.9,2.6-15,2.1c-4.4-0.4-8.6-1.8-12.1-4.6c-4.7-3.8-7-8.7-5.6-14.8c1.2-5.2,4.8-8.7,9.6-10.7
                                C48.4,45.6,59.4,47.2,70.3,53.5z"></path>
                            </svg>
                            Guides du·de la développeur·euse
                        </h4>
                        <p class="text-green">Pour débuter son apprentissage du métier de développeur·euse en Martinique il est important de comprendre en quoi il consiste, comment il évolue et ses différents aspects...</p>
                        <a href="https://guides.techmonster.info/" class="option-green">
                            <span class="circle" aria-hidden="true"><span class="icon arrow"></span></span>
                            <span class="button-text">Voir le guide</span>
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="block mb-2">
                        <h4 class="text-dark"><i class="fa-brands fa-github"></i> Liste en agences Web & Marketing</h4>
                        <p>Liste des agences web et marketing en Martinique, Guadeloupe et Guyane disponible dans différents formats.</p>
                        <div class="block">
                            <a href="https://github.com/Webmonster-Community/liste-agence-web-marketing-martinique" class="option-dark">
                                <span class="circle" aria-hidden="true"><span class="icon arrow"></span></span>
                                <span class="button-text">Martinique</span>
                            </a>
                        </div>
                        <div class="block">
                            <a href="https://github.com/Webmonster-Community/liste-agence-web-marketing-guadeloupe" class="option-dark">
                                <span class="circle" aria-hidden="true"><span class="icon arrow"></span></span>
                                <span class="button-text">Guadeloupe</span>
                            </a>
                        </div>
                        <div class="block">
                            <a href="https://github.com/Webmonster-Community/liste-agence-web-marketing-guyane" class="option-dark">
                                <span class="circle" aria-hidden="true"><span class="icon arrow"></span></span>
                                <span class="button-text">Guyane</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="block mb-2 bg-graylight">
                        <h4 class="text-dark">
                            <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M21.628 15.306l2.372 1.379-12.668 7.315-11.332-6.584 2.372-1.368 8.957 5.206 10.299-5.948zm-10.487-11.438l.017-.003.175.182-.017.003c-.119.023-.216.06-.302.108-.102.06-.125.119-.063.155.062.037.153.023.369-.036.302-.075.518-.069.688.03.181.105.254.3-.111.51-.148.086-.325.142-.422.158l-.017.003-.186-.181.022-.007c.131-.023.273-.072.371-.128.108-.062.137-.125.063-.168-.068-.039-.159-.033-.352.02-.302.089-.541.083-.705-.013-.22-.128-.186-.326.094-.487.119-.07.245-.116.376-.146zm.015 1.357l-.314.181-.964-.382.639.569-.319.185-1.514-.544.318-.184 1.004.405-.678-.592.308-.178.987.395-.679-.573.307-.178.905.896zm-2.326.213l-.468.27.221.128.445-.256.25.145-.445.256.255.149.496-.286.25.145-.799.461-1.224-.712.77-.444.249.144zm-.001 1.13l-.308.178-1.271-.231.833.484-.28.161-1.223-.711.342-.198 1.158.205-.754-.438.279-.161 1.224.711zm6.338-2.183l-7.6 4.389-.629-.366 7.601-4.389.628.366zm1.263.735l-1.898 1.096-.629-.365 1.899-1.097.628.366zm-1.273 2.192l-2.538 1.465-1.887-1.096 2.538-1.465 1.887 1.096zm-4.428 1.1l-1.899 1.096-.629-.366 1.899-1.096.629.366zm6.959-2.561l-1.898 1.096-.629-.366 1.899-1.096.628.366zm-5.702 3.291l-1.899 1.097-.629-.366 1.899-1.096.629.365zm8.225-3.291l-7.551-4.389-10.138 5.853 7.552 4.389 10.137-5.853zm3.789.733l-12.671 7.315-11.329-6.584 12.668-7.315 11.332 6.584zm-11.671 9.047l-1.003.58-1.001-.583-7.968-4.631-2.357 1.36 11.332 6.584 12.668-7.315-2.359-1.372-9.312 5.377z"></path>
                            </svg>
                            Le Journal
                        </h4>
                        <p>Webmonster Community vous propose de découvrir son histoire pas à pas.</p>
                        <a href="https://journal.webmonster.tech/" class="option-dark">
                            <span class="circle" aria-hidden="true"><span class="icon arrow"></span></span>
                            <span class="button-text">Voir le journal</span>
                        </a>
                    </div>
                </div>
            </div>

            <p>Merci à vous tous pour votre participation.</p>
            <p>Pour toute remarque ou pour nous signaler un dysfonctionnement, contactez nous via : <a href="mailto:hello@webmonster.tech">hello@webmonster.tech</a>.</p>
        </div>
    </div>
</main>
<footer class="container mb-4 mt-4">
    <div class="row">
        <section class="col-sm-12 text-center">
            <svg width="50" height="50" fill="#0f0ff5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
                    <path id="face" class="emblem" d="M50,3.3C24.2,3.3,3.3,24.2,3.3,50S24.2,96.7,50,96.7S96.7,75.8,96.7,50S75.8,3.3,50,3.3z M56.1,26.3
                    c4.2,0,7.7,3.4,7.7,7.7s-3.4,7.7-7.7,7.7c-4.2,0-7.7-3.4-7.7-7.7S51.8,26.3,56.1,26.3z M40.2,29.5c2.8,0,5.1,2.3,5.1,5.1
                    c0,2.8-2.3,5.1-5.1,5.1c-2.8,0-5.1-2.3-5.1-5.1C35.2,31.8,37.4,29.5,40.2,29.5z M74.7,58.3c-0.2,0.8-0.5,1.5-0.9,2.3
                    c-2.3,5.2-5.2,8.4-8.5,10.3c-1.1,0.6-2.2,1.1-3.3,1.5c-3.6,1.2-7.6,1.4-12,1.4c-4.2,0-8.5-0.8-12.3-2.3c-1.2-0.5-2.4-1-3.5-1.6
                    c-4.1-2.1-7.5-5.1-9.1-8.5c-0.4-0.8-0.7-1.5-1-2.3c-2.4-6.6-1.8-13.2,0.4-15.8c0.9-1.1,2.7-1.2,5-0.8c1.1,0.2,2.4,0.6,3.7,1
                    c5.1,1.5,11.4,4,16.8,3.8c5.3-0.1,10.9-2.3,15.2-3.4c1.3-0.3,2.6-0.6,3.6-0.7c0.6,0,1.2,0,1.7,0.1C74.1,44.4,77,50.8,74.7,58.3z"></path>
                <circle id="oeil-gauche" class="emblem" cx="42.2" cy="35" r="2"></circle>
                <circle id="oeil-droit" class="emblem" cx="52.7" cy="35" r="2.9"></circle>
            </svg>
            <br>
            <p>Version <span class="text-success font-bold">1.0.0</span><br>Tous droits réservés &copy; 2022 <a class="text-blue text-hover-dark" href="https://webmonster.tech/" target="_blank" rel="noopener nofollow">Webmonster Community</a><br>
                <small>Made with <a class="text-blue text-hover-dark" href="https://github.com/WebmonsterA/Piment-Css" target="_blank" rel="noopener nofollow">Piment CSS</a></small>
            </p>
        </section>
    </div>
</footer>
</body>
</html>