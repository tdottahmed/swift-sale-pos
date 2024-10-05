<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-light bg-body navbar-static">

    <!-- Header with logos -->
    <div class="navbar-header bg-white-800 sidebar-light d-none d-md-flex align-items-md-center">
        <div class="navbar-brand navbar-brand-md">
            <a href="/">
                <img src="{{ asset('logo/logo-no-background.png') }}">
            </a>
        </div>

        <div class="navbar-brand navbar-brand-xs">
            <a href="/" class="d-inline-block">
                <img src="{{ asset('shopping.png') }}" style="margin-left: 0px !important" alt="">
            </a>
        </div>
    </div>
    <!-- /header with logos -->


    <!-- Mobile controls -->
    <div class="d-flex flex-1 d-md-none">
        <div class="navbar-brand mr-auto">
            <a href="index.html" class="d-inline-block">
                <img src="{{ asset('logo/logo-no-background.png') }}" alt="">
            </a>
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-tree5"></i>
        </button>

        <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
            <i class="icon-paragraph-justify3"></i>
        </button>
    </div>
    <!-- /mobile controls -->


    <!-- Navbar content -->
    <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                    <i class="icon-paragraph-justify3"></i>
                </a>
            </li>
        </ul>

        <span class="badge bg-pink-400 badge-pill my-3 my-md-0 ml-md-3 mr-md-auto">Wellcome Mr
            {{ auth()->user()->name }}</span>

        <ul class="navbar-nav">
            <li class="nav-item dropdown mt-2">
                <button type="button" class="btn btn-sm bg-primary-800 mx-2" data-toggle="modal"
                    data-target="#calculatorModal"><i class="icon icon-calculator mr-2"></i>Calculator</button>
            </li>

            <li class="nav-item dropdown dropdown-user">
                <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle"
                    data-toggle="dropdown">
                    <img src="{{ avatar() }}" class="rounded-circle mr-2" height="34" alt="">
                    <span>{{ auth()->user()->name ?? '' }}</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    <a href="{{ route('profile.show') }}" class="dropdown-item"><i class="icon-user-plus"></i> My
                        profile</a>
                    <a href="#" class="dropdown-item"><i class="icon-coins"></i> My balance</a>
                    <a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Messages <span
                            class="badge badge-pill bg-indigo-400 ml-auto">58</span></a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item"><i class="icon-cog5"></i> Account
                        settings</a>
                    @if (auth()->user()->personalizeSettings?->theme == 'default' ?? 'default')
                        <form action="{{ route('theme.update') }}" method="POST">
                            @csrf
                            <input type="hidden" value="dark" name="theme">
                            <button class="dropdown-item"><i class="icon-enter2"></i> Switch Dark Mode
                            </button>
                        </form>
                    @else
                        <form action="{{ route('theme.update') }}" method="POST">
                            @csrf
                            <input type="hidden" value="default" name="theme">
                            <button class="dropdown-item"><i class="icon-enter2"></i> Switch Light Mode
                            </button>
                        </form>
                    @endif
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="dropdown-item"><i class="icon-switch2"></i> Logout
                        </button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
    <!-- /navbar content -->

</div>
<!-- /main navbar -->
