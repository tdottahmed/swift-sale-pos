@push('css')
        <style>
            ::-webkit-scrollbar {
                width: 5px;
            }

            ::-webkit-scrollbar-track {
                background: #f1f1f1;
            }

            ::-webkit-scrollbar-thumb {
                background: #888;
                border-radius: 6px;
            }

            ::-webkit-scrollbar-thumb:hover {
                background: #555;
            }

            .bill-section {
                max-height: 75vh;
                overflow-y: auto;
            }

            .counter-container {
                display: flex;
                align-items: center;
                border-radius: 50px;
                overflow: hidden;
            }

            .counter-button {
                background: rgb(0, 105, 92);
                color: #fff;
                border: none;
                padding: 10px 16px;
                cursor: pointer;
                font-size: 10px;
                border-radius: 50%;
            }

            .counter-button:hover {
                background: linear-gradient(135deg, #0056b3, #003a75);
            }

            .quantity {
                width: 50px;
                height: 30px;
                text-align: center;
                border: none;
                font-size: 10px;
                font-weight: bold;
                border-radius: 10px;
                box-shadow: inset 0 0 5px rgb(0, 105, 92);
            }

            .quantity-total {
                width: 100px;
                height: 30px;
                text-align: center;
                border: none;
                font-size: 10px;
                font-weight: bold;
                margin: 5px;
                border-radius: 10px;
                box-shadow: inset 0 0 5px rgb(0, 105, 92);
            }

            .quantity:focus {
                outline: none;
                box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            }

            .card-payment {
                cursor: pointer;
                border-radius: 15%;
            }

            .card-body-payment {
                padding: 1rem;
            }

            input[type="radio"]:checked+label {
                border-width: 2px;
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
                background-color: #95afc0;
                color: #130f40;
            }
            .card{
                padding:15px;
            }
        </style>
    @endpush
<div class="navbar navbar-expand-md navbar-light fixed-top">
    <!-- Header with logos -->
    <div class="navbar-header bg-white-800 sidebar-light d-none d-md-flex align-items-md-center">
        <div class="navbar-brand navbar-brand-md">
            <a href="index.html">					
                <img src="{{ asset('logo/logo-no-background.png') }}" >
            </a>
        </div>
    </div>
    <!-- /header with logos -->

    <!-- Navbar content -->
    <div class="collapse navbar-collapse d-flex justify-content-between">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="{{route('pos.index')}}" class="btn btn-sm bg-blue-800"><i class="icon icon-list2 mr-2"></i>Pos List</a>
            </li>
            <li class="nav-item">
                <button class="btn btn-sm bg-indigo-800 mx-2" data-toggle="modal" data-target="#createExpense"><i
                    class="icon icon-plus2 mr-2"></i>Expense</button>
            </li>
            <li class="nav-item">
                <button class="btn btn-sm bg-indigo-800 mx-2" data-toggle="modal" data-target="#createRepair"><i
                    class="icon icon-plus2 mr-2"></i>Repair</button>
            </li>
            <li class="nav-item">
                <a href="{{route('returned.list')}}" class="btn btn-sm bg-danger-800 mx-2"><i class="icon icon-reset mr-2"></i>Return</a>
            </li>            
            <li class="nav-item">
                <x-pos.recent-sales/>
            </li>            
        </ul>

        <ul class="navbar-nav justify-content-end">
            <li class="nav-item dropdown mt-2">
                <button type="button" class="btn btn-sm bg-primary-800 mx-2" data-toggle="modal" data-target="#calculatorModal"><i class="icon icon-calculator mr-2" ></i>Calculator</button>
            </li>
           
            <li class="nav-item dropdown">
                {{-- <a href="#" class="navbar-nav-link dropdown-toggle caret-0" data-toggle="dropdown">
                    <i class="icon-bubbles4"></i>
                    <span class="d-md-none ml-2">Messages</span>
                    <span class="badge badge-mark border-pink-400 ml-auto ml-md-0"></span>
                </a> --}}
                
                <div class="dropdown-menu dropdown-menu-right dropdown-content wmin-md-350">
                    <div class="dropdown-content-header">
                        <span class="font-weight-semibold">Messages</span>
                        <a href="#" class="text-default"><i class="icon-compose"></i></a>
                    </div>

                    <div class="dropdown-content-body dropdown-scrollable">
                        <ul class="media-list">
                            <li class="media">
                                <div class="mr-3 position-relative">
                                    <img src="{{avatar()}}" width="36" height="36" class="rounded-circle" alt="">
                                </div>

                                <div class="media-body">
                                    <div class="media-title">
                                        <a href="#">
                                            <span class="font-weight-semibold text-white">James Alexander</span>
                                            <span class="text-muted float-right font-size-sm">04:58</span>
                                        </a>
                                    </div>

                                    <span class="text-muted">who knows, maybe that would be the best thing for me...</span>
                                </div>
                            </li>

                            <li class="media">
                                <div class="mr-3 position-relative">
                                    <img src="{{avatar()}}" width="36" height="36" class="rounded-circle" alt="">
                                </div>

                                <div class="media-body">
                                    <div class="media-title">
                                        <a href="#">
                                            <span class="font-weight-semibold text-white">Margo Baker</span>
                                            <span class="text-muted float-right font-size-sm">12:16</span>
                                        </a>
                                    </div>

                                    <span class="text-muted">That was something he was unable to do because...</span>
                                </div>
                            </li>

                            <li class="media">
                                <div class="mr-3">
                                    <img src="{{avatar()}}" width="36" height="36" class="rounded-circle" alt="">
                                </div>
                                <div class="media-body">
                                    <div class="media-title">
                                        <a href="#">
                                            <span class="font-weight-semibold text-white">Jeremy Victorino</span>
                                            <span class="text-muted float-right font-size-sm">22:48</span>
                                        </a>
                                    </div>

                                    <span class="text-muted">But that would be extremely strained and suspicious...</span>
                                </div>
                            </li>

                            <li class="media">
                                <div class="mr-3">
                                    <img src="{{avatar()}}" width="36" height="36" class="rounded-circle" alt="">
                                </div>
                                <div class="media-body">
                                    <div class="media-title">
                                        <a href="#">
                                            <span class="font-weight-semibold text-white">Beatrix Diaz</span>
                                            <span class="text-muted float-right font-size-sm">Tue</span>
                                        </a>
                                    </div>

                                    <span class="text-muted">What a strenuous career it is that I've chosen...</span>
                                </div>
                            </li>

                            <li class="media">
                                <div class="mr-3">
                                    <img src="{{avatar()}}" width="36" height="36" class="rounded-circle" alt="">
                                </div>
                                <div class="media-body">
                                    <div class="media-title">
                                        <a href="#">
                                            <span class="font-weight-semibold text-white">Richard Vango</span>
                                            <span class="text-muted float-right font-size-sm">Mon</span>
                                        </a>
                                    </div>
                                    
                                    <span class="text-muted">Other travelling salesmen live a life of luxury...</span>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="dropdown-content-footer">
                        <a href="#" class="text-white mr-auto">All messages</a>
                        <div>
                            <a href="#" class="text-white" data-popup="tooltip" title="Mark all as read"><i class="icon-radio-unchecked"></i></a>
                            <a href="#" class="text-white ml-2" data-popup="tooltip" title="Settings"><i class="icon-cog3"></i></a>
                        </div>
                    </div>
                </div>
            </li>

            <li class="nav-item dropdown dropdown-user">
                <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
                    <img src="{{avatar()}}" class="rounded-circle mr-2" height="34" alt="">
                    <span>{{auth()->user()->name ?? ''}}</span>

                    {{-- <img src="{{ url(auth()->user()->image ?? '') }}" class="user-image img-profil"
                        alt="User Image">
                    <span class="hidden-xs">{{ auth()->user()->name }}</span> --}}
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    <a href="{{route('profile.show')}}" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
                    <a href="#" class="dropdown-item"><i class="icon-coins"></i> My balance</a>
                    <a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Messages <span class="badge badge-pill bg-indigo-400 ml-auto">58</span></a>
                    <div class="dropdown-divider"></div>
                    <a href="{{route('profile.edit')}}" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a>
                    <form  action="{{route('logout')}}" method="POST"> 
                        @csrf
                        <button class="dropdown-item"><i class="icon-switch2"></i> Logout
                        </button> 
                    </form>


                    @if (auth()->user()->personalizeSettings?->theme=='default' ?? 'default')							
                        <form  action="{{route('theme.update')}}" method="POST"> 
                            @csrf
                            <input type="hidden" value="dark" name="theme">
                            <button class="dropdown-item"><i class="icon-enter2"></i> Switch Dark Mode
                            </button> 
                        </form>
                        @else
                        <form  action="{{route('theme.update')}}" method="POST"> 
                            @csrf
                            <input type="hidden" value="default" name="theme">
                            <button class="dropdown-item"><i class="icon-enter2"></i> Switch Light Mode
                            </button> 
                        </form>
                    @endif
                </div>
            </li>
        </ul>
    </div>
    <!-- /navbar content -->
    
</div>