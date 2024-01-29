<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Painel Administrativo - {{ config('app.name', 'Neway') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url('assets/media/image/favicon.png') }}"/>

    <!-- Plugin styles -->
    <link rel="stylesheet" href="{{ url('vendors/bundle.css') }}" type="text/css">

    @yield('head')

    <!-- App styles -->
    <link rel="stylesheet" href="{{ url('assets/css/app.min.css') }}" type="text/css">
</head>
<body @if (trim($__env->yieldContent('bodyClass'))) class="@yield('bodyClass')" @endif>

<!-- begin::preloader-->
<div class="preloader">
    <div class="preloader-icon"></div>
</div>
<!-- end::preloader -->

<!-- BEGIN: Sidebar Group -->
<div class="sidebar-group">

    <!-- BEGIN: User Menu -->
    <div class="sidebar" id="user-menu">
        <div class="py-4 text-center" >
            <figure class="avatar avatar-lg mb-3 border-0">
                <img src="{{ url('assets/media/image/user/women_avatar1.jpg') }}" class="rounded-circle" alt="image">
            </figure>
            <h5 class="d-flex align-items-center justify-content-center">{{ auth()->user()->name }}</h5>
            <div>
                <strong> </strong>
            </div>
        </div>
        <div class="card mb-0 card-body ">
            <div class="mb-4">
                <div class="list-group list-group-flush">

                    @if (auth()->user()->isAdministratorUser())
                        @component('components.head_adm')
                        @endcomponent
                    @endif

                    @if (auth()->user()->isCustomerUser())
                        @component('components.head_ctm')
                        @endcomponent
                    @endif

                    <a class="list-group-item p-l-r-0 d-flex" href="{{ route('profile_view') }}">Alterar Informações</a>

                    <a class="list-group-item p-l-r-0 d-flex" href="{{ route('password_view') }}">Alterar Senha</a>

                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                       class="list-group-item p-l-r-0 text-danger">
                        Encerrar Sessão
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>

            <div class="mb-4">
                <h6>Estamos nas redes :)</h6>
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a href="https://web.facebook.com/orbitautomacao" class="btn btn-sm btn-floating btn-facebook">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.instagram.com/orbitautomacao/" class="btn btn-sm btn-floating btn-instagram">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.orbitautomacao.com.br/" class="btn btn-sm btn-floating btn-dribbble">
                            <i class="fa fa-dribbble"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://api.whatsapp.com/send?phone=5598988846360&text=olá, estou usando o app Neway Dashboard." class="btn btn-sm btn-floating btn-whatsapp">
                            <i class="fa fa-whatsapp"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>


</div>
<!-- END: Sidebar Group -->

<!-- begin::main -->
<div class="layout-wrapper">
    <meta name="_token" content="{{ csrf_token() }}">

    <!-- begin::header -->
    <div class="header d-print-none">

        <div class="header-left">
            <div class="navigation-toggler">
                <a href="#" data-action="navigation-toggler">
                    <i data-feather="menu"></i>
                </a>
            </div>
            <div class="header-logo">
                <a href="{{ url('/') }}">
                    <img class="logo" src="{{ url('assets/media/image/logo.png') }}" alt="logo">
                </a>
            </div>
        </div>

        <div class="header-body">

            <div class="header-body-left">
                <div class="page-title">
                    <h4>@yield('pageTitle')</h4>
                </div>
            </div>
            <div class="header-body-right">

                <ul class="navbar-nav">

                    <!-- begin::header fullscreen -->
                    <li  class="nav-item dropdown">
                        <a href="#" class="nav-link" title="Fullscreen" data-toggle="fullscreen">
                            <i class="maximize" data-feather="maximize"></i>
                            <i class="minimize" data-feather="minimize"></i>
                        </a>
                    </li>
                    <!-- end::header fullscreen -->



                    <!-- begin::user menu -->
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" title="User menu" data-sidebar-target="#user-menu">
                            <span class="mr-2 d-sm-inline d-none">{{ auth()->user()->name }}</span>
                            <figure class="avatar avatar-sm">
                                <img src="{{ url('assets/media/image/user/women_avatar1.jpg') }}" class="rounded-circle"
                                     alt="avatar">
                            </figure>
                        </a>
                    </li>
                    <!-- end::user menu -->

                </ul>

                <!-- begin::mobile header toggler -->
                <ul class="navbar-nav d-flex align-items-center">
                    <li class="nav-item header-toggler">
                        <a href="#" class="nav-link">
                            <i data-feather="arrow-down"></i>
                        </a>
                    </li>
                </ul>
                <!-- end::mobile header toggler -->
            </div>
        </div>

    </div>
    <!-- end::header -->

    <div class="content-wrapper">
        <!-- begin::navigation -->
        <div class="navigation">
            <div class="navigation-menu-body">
                <div class="navigation-menu-group">
                    <div id="ecommerce" style="padding-top:20px;">
                        @if (auth()->user()->isAdministratorUser())
                            @if ($show ?? false)
                                @component('components.menu_customer_adm', ['payload' => $payload, 'demonstrative' => $demonstrative, 'enterprise' => $enterprise])
                                @endcomponent
                            @else
                                @component('components.menu_adm')
                                @endcomponent
                            @endif
                        @endif

                        @if (auth()->user()->isCustomerUser())
                            @if ($show ?? false)
                                @component('components.menu_enterprise_ctm', ['payload' => $payload, 'demonstrative' => $demonstrative, 'enterprise' => $enterprise])
                                @endcomponent
                            @else
                                @component('components.menu_ctm')
                                @endcomponent
                            @endif
                        @endif
                    </div>

                </div>
            </div>
        </div>
        <!-- end::navigation -->

        <div class="content-body">

            <div class="content">

                @if(session()->has('SUCCESS'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Sucesso!</strong> {!! session()->get('SUCCESS') !!}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if(session()->has('ERROR'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> {!! session()->get('ERROR') !!}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                @if(session()->has('WARN'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Atenção</strong> {!! session()->get('WARN') !!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                @endif

                @yield('content')

            </div>

            <!-- begin::footer -->
            <footer class="content-footer">
                <div>© {{ date('Y') }} Orbit Automação  - <a target="_blank">Tecnologia</a></div>
                <div>
                    <nav class="nav">
                        <a href="https://www.orbitautomacao.com.br/" class="nav-link">Fale conosco</a>
                        <a href="https://www.orbitautomacao.com.br/" class="nav-link">Precisa de ajuda ?</a>
                    </nav>
                </div>
            </footer>
            <!-- end::footer -->

        </div>

    </div>

</div>
<!-- end::main -->

<!-- Plugin scripts -->
<script src="{{ url('vendors/bundle.js') }}"></script>

<!-- App scripts -->
<script src="{{ url('assets/js/app.min.js') }}"></script>
<script src="{{ url('assets/js/functions.js') }}"></script>
<script src="{{ url('assets/js/moment.min.js') }}"></script>

@yield('script')

</body>
</html>
