<?php
function dateToFrench($date, $format)
{
    $english_days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
    $french_days = array('lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche');
    $english_months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    $french_months = array('janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
    return str_replace($english_months, $french_months, str_replace($english_days, $french_days, date($format, strtotime($date))));
}

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/pimentcss.min.css">
    <title>Webmonster Community</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
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
            <div class="logo mt-4">
                <a href="/">
                    <svg width="90" height="90" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                         viewBox="0 0 24 24">
                        <path d="M21.628 15.306l2.372 1.379-12.668 7.315-11.332-6.584 2.372-1.368 8.957 5.206 10.299-5.948zm-10.487-11.438l.017-.003.175.182-.017.003c-.119.023-.216.06-.302.108-.102.06-.125.119-.063.155.062.037.153.023.369-.036.302-.075.518-.069.688.03.181.105.254.3-.111.51-.148.086-.325.142-.422.158l-.017.003-.186-.181.022-.007c.131-.023.273-.072.371-.128.108-.062.137-.125.063-.168-.068-.039-.159-.033-.352.02-.302.089-.541.083-.705-.013-.22-.128-.186-.326.094-.487.119-.07.245-.116.376-.146zm.015 1.357l-.314.181-.964-.382.639.569-.319.185-1.514-.544.318-.184 1.004.405-.678-.592.308-.178.987.395-.679-.573.307-.178.905.896zm-2.326.213l-.468.27.221.128.445-.256.25.145-.445.256.255.149.496-.286.25.145-.799.461-1.224-.712.77-.444.249.144zm-.001 1.13l-.308.178-1.271-.231.833.484-.28.161-1.223-.711.342-.198 1.158.205-.754-.438.279-.161 1.224.711zm6.338-2.183l-7.6 4.389-.629-.366 7.601-4.389.628.366zm1.263.735l-1.898 1.096-.629-.365 1.899-1.097.628.366zm-1.273 2.192l-2.538 1.465-1.887-1.096 2.538-1.465 1.887 1.096zm-4.428 1.1l-1.899 1.096-.629-.366 1.899-1.096.629.366zm6.959-2.561l-1.898 1.096-.629-.366 1.899-1.096.628.366zm-5.702 3.291l-1.899 1.097-.629-.366 1.899-1.096.629.365zm8.225-3.291l-7.551-4.389-10.138 5.853 7.552 4.389 10.137-5.853zm3.789.733l-12.671 7.315-11.329-6.584 12.668-7.315 11.332 6.584zm-11.671 9.047l-1.003.58-1.001-.583-7.968-4.631-2.357 1.36 11.332 6.584 12.668-7.315-2.359-1.372-9.312 5.377z"/>
                    </svg>
                </a>
                <h1 class="text-blue text-red">Webmonster</h1>
            </div>
            <p>Webmonster Community vous propose de découvrir son histoire pas à pas.</p>
        </div>
    </div>
</header>
<main class="container">
    <div class="row gap-2">
        <div class="col-xs-12">
            <h2 class="text-gray">
                <svg width="50" height="50" fill="#6d6d6d" id="logo-webmonster" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                     viewBox="0 0 24 24">
                    <path d="M21.628 15.306l2.372 1.379-12.668 7.315-11.332-6.584 2.372-1.368 8.957 5.206 10.299-5.948zm-10.487-11.438l.017-.003.175.182-.017.003c-.119.023-.216.06-.302.108-.102.06-.125.119-.063.155.062.037.153.023.369-.036.302-.075.518-.069.688.03.181.105.254.3-.111.51-.148.086-.325.142-.422.158l-.017.003-.186-.181.022-.007c.131-.023.273-.072.371-.128.108-.062.137-.125.063-.168-.068-.039-.159-.033-.352.02-.302.089-.541.083-.705-.013-.22-.128-.186-.326.094-.487.119-.07.245-.116.376-.146zm.015 1.357l-.314.181-.964-.382.639.569-.319.185-1.514-.544.318-.184 1.004.405-.678-.592.308-.178.987.395-.679-.573.307-.178.905.896zm-2.326.213l-.468.27.221.128.445-.256.25.145-.445.256.255.149.496-.286.25.145-.799.461-1.224-.712.77-.444.249.144zm-.001 1.13l-.308.178-1.271-.231.833.484-.28.161-1.223-.711.342-.198 1.158.205-.754-.438.279-.161 1.224.711zm6.338-2.183l-7.6 4.389-.629-.366 7.601-4.389.628.366zm1.263.735l-1.898 1.096-.629-.365 1.899-1.097.628.366zm-1.273 2.192l-2.538 1.465-1.887-1.096 2.538-1.465 1.887 1.096zm-4.428 1.1l-1.899 1.096-.629-.366 1.899-1.096.629.366zm6.959-2.561l-1.898 1.096-.629-.366 1.899-1.096.628.366zm-5.702 3.291l-1.899 1.097-.629-.366 1.899-1.096.629.365zm8.225-3.291l-7.551-4.389-10.138 5.853 7.552 4.389 10.137-5.853zm3.789.733l-12.671 7.315-11.329-6.584 12.668-7.315 11.332 6.584zm-11.671 9.047l-1.003.58-1.001-.583-7.968-4.631-2.357 1.36 11.332 6.584 12.668-7.315-2.359-1.372-9.312 5.377z"/>
                </svg>
                Bienvenue sur Webmonster!
            </h2>
        </div>
        <div class="col-xs-12 col-md-12">
            <h2>Tu es en Martinique et tu travailles dans l'informatique, tu apprends à coder ?</h2>
            <p>Le collectif Webmonster représente aujourd'hui une communauté de 282 développeurs, designers, chefs d'entreprises et autres profils, originaires principalement de #Martinique, #Guadeloupe et #Guyane.</p>
        </div>
    </div>
</main>
<footer class="container mb-4 mt-4">
    <div class="row">
        <section class="col-sm-12 text-center">
            <svg width="50" height="50" id="logo-techmonster" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                 viewBox="0 0 24 24">
                <path d="M21.628 15.306l2.372 1.379-12.668 7.315-11.332-6.584 2.372-1.368 8.957 5.206 10.299-5.948zm-10.487-11.438l.017-.003.175.182-.017.003c-.119.023-.216.06-.302.108-.102.06-.125.119-.063.155.062.037.153.023.369-.036.302-.075.518-.069.688.03.181.105.254.3-.111.51-.148.086-.325.142-.422.158l-.017.003-.186-.181.022-.007c.131-.023.273-.072.371-.128.108-.062.137-.125.063-.168-.068-.039-.159-.033-.352.02-.302.089-.541.083-.705-.013-.22-.128-.186-.326.094-.487.119-.07.245-.116.376-.146zm.015 1.357l-.314.181-.964-.382.639.569-.319.185-1.514-.544.318-.184 1.004.405-.678-.592.308-.178.987.395-.679-.573.307-.178.905.896zm-2.326.213l-.468.27.221.128.445-.256.25.145-.445.256.255.149.496-.286.25.145-.799.461-1.224-.712.77-.444.249.144zm-.001 1.13l-.308.178-1.271-.231.833.484-.28.161-1.223-.711.342-.198 1.158.205-.754-.438.279-.161 1.224.711zm6.338-2.183l-7.6 4.389-.629-.366 7.601-4.389.628.366zm1.263.735l-1.898 1.096-.629-.365 1.899-1.097.628.366zm-1.273 2.192l-2.538 1.465-1.887-1.096 2.538-1.465 1.887 1.096zm-4.428 1.1l-1.899 1.096-.629-.366 1.899-1.096.629.366zm6.959-2.561l-1.898 1.096-.629-.366 1.899-1.096.628.366zm-5.702 3.291l-1.899 1.097-.629-.366 1.899-1.096.629.365zm8.225-3.291l-7.551-4.389-10.138 5.853 7.552 4.389 10.137-5.853zm3.789.733l-12.671 7.315-11.329-6.584 12.668-7.315 11.332 6.584zm-11.671 9.047l-1.003.58-1.001-.583-7.968-4.631-2.357 1.36 11.332 6.584 12.668-7.315-2.359-1.372-9.312 5.377z"/>
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