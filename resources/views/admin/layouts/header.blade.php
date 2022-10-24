<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic - Bootstrap 5 HTML, VueJS, React, Angular & Laravel panel Dashboard Theme
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="tr">
<head>
    <title>{{__('Kodtic Admin Paneli')}} | {{__('Hızlı, kolay ve teknolojik')}} </title>
    <meta charset="utf-8" />
    <meta name="description"
        content="Kodpilot işini seven yazılımcılardan oluşan, e-ticaret, web sitesi, mobil programlama, özel yazılımlar ve dijital reklam hizmetleri veren bir teknoloji ve yazılım şirketidir." />
    <meta name="keywords"
        content="Kodpilot işini seven yazılımcılardan oluşan, e-ticaret, web sitesi, mobil programlama, özel yazılımlar ve dijital reklam hizmetleri veren bir teknoloji ve yazılım şirketidir." />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:locale" content="tr_TR" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Kodpilot Admin Paneli" />
    <meta property="og:url" content="https://kodpilot.com" />
    <meta property="og:site_name" content="KODPİLOT | ADMİN PANEL" />
    <link rel="shortcut icon" href="https://kodpilot.com/assets/images/logos/favicon.ico" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Vendor Stylesheets(used by this page)-->
    <link href="{{ url('panel/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('panel/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <!--end::Page Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ url('panel/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('panel/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('panel/assets/css/kodpilot.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <!--Begin::Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&amp;l=' + l : '';
            j.async = true;
            j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5FS8GGP');
    </script>
    <!--End::Google Tag Manager -->
    @toastr_css
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-extended header-fixed header-tablet-and-mobile-fixed">
    <!--Begin::Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!--End::Google Tag Manager (noscript) -->
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <!--begin::Header-->
                <div id="kt_header" class="header">
                    <!--begin::Header top-->
                    <div class="header-top d-flex align-items-stretch flex-grow-1">
                        <!--begin::Container-->
                        <div class="d-flex container-xxl w-100">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack align-items-stretch w-100">
                                <!--begin::Brand-->
                                <div class="d-flex align-items-center align-items-lg-stretch me-5">
                                    <!--begin::Heaeder navs toggle-->
                                    <button
                                        class="d-lg-none btn btn-icon btn-color-white bg-hover-white bg-hover-opacity-10 w-35px h-35px h-md-40px w-md-40px ms-n2 me-2"
                                        id="kt_header_navs_toggle">
                                        <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                                                    fill="black" />
                                                <path opacity="0.3"
                                                    d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                                                    fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </button>
                                    <!--end::Heaeder navs toggle-->
                                    <!--begin::Logo-->
                                    <a href="{{ route('index') }}" class="d-flex align-items-center">
                                        <img alt="Logo" src="{{ url('panel/assets/media/logos/kodpilot_logo.svg') }}"
                                            class="h-25px h-lg-40px" />
                                    </a>
                                    <!--end::Logo-->
                                    <div class="align-self-end" id="kt_brand_tabs">
                                        <!--begin::Header tabs-->
                                        <div class="header-tabs overflow-auto mx-4 ms-lg-5 mb-5 mb-lg-0"
                                            id="kt_header_tabs" data-kt-swapper="true" data-kt-swapper-mode="prepend"
                                            data-kt-swapper-parent="{default: '#kt_header_navs_wrapper', lg: '#kt_brand_tabs'}">
                                            <ul class="nav flex-nowrap">
                                                @foreach (panelMenus() as $menu)
                                                    @if (menuPermission($menu->id))
                                                        <li class="nav-item">
                                                            <a style="font-size:13px"
                                                                class="nav-link {{ request()->is($menu->link . '*') ? 'active' : null }} "
                                                                data-bs-toggle="tab"
                                                                href="#tab_menu_{{ $menu->id }}">{{ __($menu->name) }}</a>
                                                        </li>
                                                    @endif
                                                @endforeach

                                            </ul>
                                        </div>
                                        <!--end::Header tabs-->
                                    </div>
                                </div>
                                <!--end::Brand-->
                                <!--begin::Topbar-->
                                <div class="d-flex align-items-center flex-shrink-0">
                                    <!--begin::Site Link-->
                                    <div class="d-flex align-items-center ms-1">
                                        <!--begin::Menu wrapper-->
                                        <div
                                            class="btn btn-icon btn-color-white bg-hover-white bg-hover-opacity-10 w-35px h-35px h-md-40px w-md-40px position-relative">
                                            <a href="{{ route('index') }}" target="_blank" title="{{__('Siteye Git')}}">
                                                <!--begin::Svg Icon | path: icons/duotune/communication/com012.svg-->
                                                <span class="svg-icon svg-icon-2x">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <path opacity="0.3"
                                                            d="M4.05424 15.1982C8.34524 7.76818 13.5782 3.26318 20.9282 2.01418C21.0729 1.98837 21.2216 1.99789 21.3618 2.04193C21.502 2.08597 21.6294 2.16323 21.7333 2.26712C21.8372 2.37101
                                                            21.9144 2.49846 21.9585 2.63863C22.0025 2.7788 22.012 2.92754 21.9862 3.07218C20.7372 10.4222 16.2322 15.6552 8.80224
                                                            19.9462L4.05424 15.1982ZM3.81924 17.3372L2.63324 20.4482C2.58427 20.5765 2.5735 20.7163 2.6022 20.8507C2.63091 20.9851
                                                            2.69788 21.1082 2.79503 21.2054C2.89218 21.3025 3.01536 21.3695 3.14972 21.3982C3.28408 21.4269 3.42387 21.4161 3.55224
                                                            21.3672L6.66524 20.1802L3.81924 17.3372ZM16.5002 5.99818C16.2036 5.99818 15.9136 6.08615 15.6669 6.25097C15.4202 6.41579 15.228 6.65006
                                                            15.1144 6.92415C15.0009 7.19824 14.9712 7.49984 15.0291 7.79081C15.0869 8.08178 15.2298 8.34906
                                                            15.4396 8.55884C15.6494 8.76862 15.9166 8.91148 16.2076 8.96935C16.4986 9.02723 16.8002 8.99753 17.0743 8.884C17.3484 8.77046 17.5826
                                                            8.5782 17.7474 8.33153C17.9123 8.08486 18.0002 7.79485 18.0002 7.49818C18.0002 7.10035 17.8422 6.71882 17.5609 6.43752C17.2796 6.15621 16.8981 5.99818 16.5002 5.99818Z"
                                                            fill="black" />
                                                        <path
                                                            d="M4.05423 15.1982L2.24723 13.3912C2.15505 13.299 2.08547 13.1867 2.04395 13.0632C2.00243 12.9396 1.9901 12.8081 2.00793 12.679C2.02575 12.5498 2.07325 12.4266 2.14669 12.3189C2.22013
                                                            12.2112 2.31752 12.1219 2.43123 12.0582L9.15323 8.28918C7.17353 10.3717 5.4607 12.6926 4.05423 15.1982ZM8.80023 19.9442L10.6072 21.7512C10.6994 21.8434
                                                            10.8117 21.9129 10.9352 21.9545C11.0588 21.996 11.1903 22.0083 11.3195 21.9905C11.4486 21.9727 11.5718 21.9252 11.6795 21.8517C11.7872 21.7783 11.8765
                                                            21.6809 11.9402 21.5672L15.7092 14.8442C13.6269 16.8245 11.3061 18.5377 8.80023 19.9442ZM7.04023 18.1832L12.5832 12.6402C12.7381 12.4759 12.8228 12.2577
                                                            12.8195 12.032C12.8161 11.8063 12.725 11.5907 12.5653 11.4311C12.4057 11.2714 12.1901 11.1803 11.9644 11.1769C11.7387 11.1736 11.5205 11.2583 11.3562 11.4132L5.81323 16.9562L7.04023 18.1832Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </a>

                                        </div>
                                        <!--end::Menu wrapper-->
                                    </div>
                                    <!--end::Site Link-->
                                    <!--begin::User-->
                                    <div class="d-flex align-items-center ms-1" id="kt_header_user_menu_toggle">
                                        <!--begin::User info-->
                                        <div class="btn btn-flex align-items-center bg-hover-white bg-hover-opacity-10 py-2 px-2 px-md-3"
                                            data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                                            data-kt-menu-placement="bottom-end">
                                            <!--begin::Name-->
                                            <div
                                                class="d-none d-md-flex flex-column align-items-end justify-content-center me-2 me-md-4">
                                                <span
                                                    class="text-white opacity-75 fs-8 fw-bold lh-1 mb-1">{{ Auth::user()->email }}</span>
                                                <span
                                                    class="text-white fs-8 fw-bolder lh-1">{{ __(getRole()) }}</span>
                                            </div>
                                            <!--end::Name-->
                                        </div>
                                        <!--end::User info-->
                                        <!--begin::Robot-->
                                        <div class="d-flex align-items-center ms-1">
                                            <!--begin::Menu wrapper-->
                                            <div class="btn btn-icon btn-color-white bg-hover-white bg-hover-opacity-10 w-35px h-35px h-md-40px w-md-40px position-relative"
                                                id="kt_drawer_chat_toggle">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-40px symbol-md-50px">
                                                    <img src="{{ url('panel/assets/media/svg/avatars/pilot.svg') }}"
                                                        alt="Kodpilot Robotu" />
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Notification animation-->
                                                <span
                                                    class="bullet bullet-dot bg-success h-6px w-6px position-absolute translate-middle top-0 start-0 animation-blink"></span>
                                                <!--end::Notification animation-->
                                            </div>
                                            <!--end::Menu wrapper-->
                                        </div>
                                        <!--end::Robot-->
                                        <!--begin::User account menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
                                            data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <div class="menu-content d-flex align-items-center px-3">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-50px me-5">
                                                        @if (strlen(Auth::user()->file)>1)
                                                        <img alt="Logo"
                                                        src="{{ url('/assets/images/users/'.Auth::user()->file) }}" />
                                                        @else
                                                        <img alt="Logo"
                                                        src="{{ url('/assets/images/users/profile.png') }}" />
                                                        @endif
                                                        
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Username-->
                                                    <div class="d-flex flex-column">
                                                        <div class="fw-bolder d-flex align-items-center fs-5">{{Auth::user()->name}}
                                                        </div>
                                                        <a href="#"
                                                            class="fw-bold text-muted text-hover-primary fs-7">{{Auth::user()->email}}</a>
                                                    </div>
                                                    <!--end::Username-->
                                                </div>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu separator-->
                                            <div class="separator my-2"></div>
                                            <!--end::Menu separator-->
                                            <!--begin::Menu item-->
                                            {{-- <div class="menu-item px-5">
                                                <a href="{{route('profile.index')}}" class="menu-link px-5">{{__('Profilim')}}</a>
                                            </div> --}}
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            {{-- <div class="menu-item px-5">
                                                <a href="{{route('profile.orders')}}" class="menu-link px-5">
                                                    <span class="menu-text">{{__('Siparişlerim')}}</span>
                                                    <span class="menu-badge">
                                                    </span>
                                                </a>
                                            </div> --}}
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            {{-- <div class="menu-item px-5">
                                                <a href="{{route('profile.carts')}}" class="menu-link px-5">{{__('Sepetim')}}</a>
                                            </div> --}}
                                            <!--end::Menu item-->
                                            <!--begin::Menu separator-->
                                            <div class="separator my-2"></div>
                                            <!--end::Menu separator-->
                                            <!--begin::Menu item-->
                                            {{-- <div class="menu-item px-5 my-1">
                                                <a href="{{route('profile.editProfile')}}" class="menu-link px-5">{{__('Hesap Ayarları')}}</a>
                                            </div> --}}
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-5">
                                                <a onclick="logoutForm.submit()" class="menu-link px-5">{{__('Çıkış Yap')}}</a>
                                            </div>
                                            <form id="logoutForm" class="menu-item px-5"
                                                action="{{ route('logout') }}" method="POST">
                                                @csrf

                                            </form>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::User account menu-->
                                    </div>
                                    <!--end::User -->
                                    <!--begin::Heaeder menu toggle-->
                                    <!--end::Heaeder menu toggle-->
                                </div>
                                <!--end::Topbar-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Header top-->
                    <!--begin::Header navs-->
                    <div class="header-navs d-flex align-items-stretch flex-stack h-lg-70px w-100 py-5 py-lg-0"
                        id="kt_header_navs" data-kt-drawer="true" data-kt-drawer-name="header-menu"
                        data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                        data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
                        data-kt-drawer-toggle="#kt_header_navs_toggle" data-kt-swapper="true"
                        data-kt-swapper-mode="append" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header'}">
                        <!--begin::Container-->
                        <div class="d-lg-flex container-xxl w-100">
                            <!--begin::Wrapper-->
                            <div class="d-lg-flex flex-column justify-content-lg-center w-100"
                                id="kt_header_navs_wrapper">
                                <!--begin::Header tab content-->
                                <div class="tab-content" data-kt-scroll="true"
                                    data-kt-scroll-activate="{default: true, lg: false}" data-kt-scroll-height="auto"
                                    data-kt-scroll-offset="70px">
                                    @foreach (panelMenus() as $menu)
                                        <!--begin::Tab panel-->
                                        <div class="tab-pane fade  {{ request()->is($menu->link . '*') ? 'active show' : null }}"
                                            id="tab_menu_{{ $menu->id }}">
                                            <!--begin::Wrapper-->
                                            <div
                                                class="d-flex flex-column flex-lg-row flex-lg-stack flex-wrap gap-2 px-4 px-lg-0">
                                                <div class="d-flex flex-column flex-lg-row gap-2">
                                                    @foreach (subPanelMenus($menu->id) as $subMenu)
                                                    @if (subMenuPermission($subMenu->id))
                                                        @if (checkHaveSub($subMenu->id)->count() == 0)
                                                        <a class="btn bg-hover-light-primary text-hover-primary btn-sm fw-bolder btn-hover-rise {{ request()->is($subMenu->link.'*' ) ? 'bg-light-primary text-primary' : 'bg-light text-gray-600' }}  "
                                                            href="{{ route($subMenu->route) }}">{{ __($subMenu->name) }}</a>
                                                        @else
                                                        <div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold align-items-stretch flex-grow-1" id="#kt_header_menu" data-kt-menu="true">
                                                            <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" class="menu-item here  menu-lg-down-accordion me-lg-1">
                                                                <span class="menu-link py-3">
                                                                    <span class="menu-title">{{ __($subMenu->name) }}</span>
                                                                    <span class="menu-arrow d-lg-none"></span>
                                                                </span>
                                                                <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">
                                                                    @foreach (checkHaveSub($subMenu->id) as $sub)
                                                                        <div class="menu-item">
                                                                            <a class="menu-link {{ request()->is($sub->link ) ? 'active' : '' }} py-3" href="{{route($sub->route)}}">
                                                                                <span class="menu-bullet">
                                                                                    <span class="bullet bullet-dot"></span>
                                                                                </span>
                                                                                <span class="menu-title">{{__($sub->name)}}</span>
                                                                            </a>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endif
                                                        
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Tab panel-->

                                    @endforeach
                                    

                                </div>
                                
                                <!--end::Header tab content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Header navs-->
                </div>
                <!--end::Header-->
                <!--begin::Toolbar-->
                <div class="toolbar mb-n1 pt-3 mb-lg-n3 pt-lg-6" id="kt_toolbar">
                    <!--begin::Container-->
                    <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap gap-2">
                        <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
                            <!--begin::Title-->
                            <h1 class="d-flex text-dark fw-bolder m-0 fs-3">@yield('mainTitle')</h1>
                            <!--end::Title-->
                            <!--begin::Breadcrumb-->
                            <ul class="breadcrumb breadcrumb-dot fw-bold text-gray-600 fs-7">

                                @hasSection('path1')
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-gray-600">
                                        <a href="{{ route('admin.index') }}"
                                            class="text-gray-600 text-hover-primary">@yield('path1')</a>
                                    </li>
                                    <!--end::Item-->
                                @endif

                                @hasSection('path2')
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-gray-600">
                                        <a href="@yield('path2Link')"
                                            class="text-gray-600 text-hover-primary">@yield('path2')</a>
                                    </li>
                                    <!--end::Item-->
                                @endif

                                @hasSection('path3')
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-gray-600">
                                        <a href="@yield('path3Link')"
                                            class="text-gray-600 text-hover-primary">@yield('path3')</a>
                                    </li>
                                    <!--end::Item-->
                                @endif


                                <!--begin::Item-->
                                <li class="breadcrumb-item text-gray-600">@yield('mainTitle')</li>
                                <!--end::Item-->

                            </ul>
                            <!--end::Breadcrumb-->
                        </div>
                    
                        <!--begin::Actions-->
                        <div class="d-flex align-items-center">
                            @hasSection('addModal')
                            <!--begin::Add user-->
                            <a href="{{ route('product.add') }}" class="btn btn-color-primary "  data-bs-toggle="modal" data-bs-target="#addModal" title="{{__('Hızlı Ekle')}}">
                                
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
                                        <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
                                            transform="rotate(-90 11.364 20.364)" fill="black" />
                                        <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon--> {{__('Hızlı Ekle')}}
                            </a>
                            <!--end::Add user-->
                        </a>
                        <!--end::Button-->
                            @endif
                            @hasSection('exportPDF')
                            <!--begin::Button-->
                            @yield('exportPDF') 
                                <img class="w-35px" src="{{ url('panel/assets/media/svg/files/pdf.svg') }}" alt="">
                            </a>
                            <!--end::Button-->
                            @endif
                        
                            @hasSection('exportXLSX')
                            <!--begin::Button-->
                            @yield('exportXLSX') 
                            
                                <!--begin::Svg Icon | path: icons/duotune/general/gen005.svg-->
                                <img class="w-30px" src="{{ url('panel/assets/media/svg/files/xlsx.svg') }}" alt="">
                                <!--end::Svg Icon-->
                            </a>
                            <!--end::Button-->
                            @endif

                            @hasSection('exportXML')
                            <!--begin::Button-->
                            @yield('exportXML') 
                                <!--begin::Svg Icon | path: icons/duotune/general/gen005.svg-->
                                <img class="w-30px" src="{{ url('panel/assets/media/svg/files/xml.svg') }}" alt="">
                                <!--end::Svg Icon-->
                            </a>
                            <!--end::Button-->
                            @endif
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Toolbar-->
                
