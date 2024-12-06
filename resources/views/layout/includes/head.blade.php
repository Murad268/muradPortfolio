<head>
    <meta charset="UTF-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1, minimum-scale=1, target-densitydpi=device-dpi"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/7.2.3/css/flag-icons.min.css" integrity="sha512-bZBu2H0+FGFz/stDN/L0k8J0G8qVsAL0ht1qg5kTwtAheiXwiRKyCq1frwfbSFSJN3jooR5kauE0YjtPzhZtJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="icon" type="image/png" href="{{$infos->getImage($infos->favicon)}}" />
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome-pro.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/scroll_button.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/plugin.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/spacing.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}" />
    @stack('styles')
    <style>
        .hero_desc {
            height: max-content !important;
        }
        .hero_desc p {
            margin-bottom: 18px !important;
        }

        .page-item.active {


        }
        .page-item.active span {
            border-radius: 100%  ;
            width: 50px ;
            height: 50px ;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .main_menu .navbar-nav .nav-item .nav-link {
            font-size: 13px !important;
        }
        .language-selector {
            position: relative;
            cursor: pointer;
            display: inline-block;
        }

        .selected-language {
            display: flex;
            align-items: center;
            padding: 5px 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }



        .selected-language i {
            margin-left: 5px;
        }

        .language-options {
            position: absolute;
            top: 100%;
            left: 0;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 100%;
            display: none;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .language-options li {
            display: flex;
            align-items: center;
            padding: 5px 10px;
            cursor: pointer;
        }

        .language-options li:hover {
            background-color: #f0f0f0;
        }

        .language-options .fi {
            margin-right: 5px;
        }

        .hero_desc h4 {
            font-size: 16px !important;
            margin-bottom: 10px;
        }
        .tf__banner_text b, .tf__banner_text h1 {
            font-size: 55px;
        }
        .pagination .page-item .page-link {
            border-radius: 100% !important;
            width: 40px !important;
            height: 40px !important;
            display: flex !important;
            justify-content: center !important;
            align-items: center !important;
        }
    </style>
</head>
