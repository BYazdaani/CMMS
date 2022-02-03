<div class="header-top-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="logo-area">
                    <a href="#"><img src="{{asset('../theme/img/logo/vitalcare.png')}}" style="height: 30px"
                                     alt=""/></a>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="header-top-menu">
                    <ul class="nav navbar-nav notika-top-nav">
                        <li class="nav-item dropdown">
                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                               class="nav-link dropdown-toggle"><span><i
                                        class="notika-icon notika-search"></i></span></a>
                            <div role="menu" class="dropdown-menu search-dd animated flipInX">
                                <div class="search-input">
                                    <i class="notika-icon notika-left-arrow"></i>
                                    <input type="text"/>
                                </div>
                            </div>
                        </li>
                        @if(!auth()->user()->hasRole('Client'))
                            <li class="nav-item dropdown">
                                <a href="#" data-toggle="dropdown" role="button"
                                   aria-expanded="false" class="nav-link dropdown-toggle"><span><i
                                            class="notika-icon notika-alarm"></i></span>
                                </a>
                                <div role="menu" class="dropdown-menu message-dd notification-dd animated zoomIn">
                                    <div class="hd-mg-tt">
                                        <h2>Notification</h2>
                                    </div>
                                    @include("layouts.alerts")
                                </div>
                            </li>
                        @endif
                        <li class="nav-item dropdown">
                            @if(!auth()->user()->hasRole('Client'))
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                                   class="nav-link dropdown-toggle"><span><i
                                            class="notika-icon notika-settings"></i></span>
                                    <div class="spinner4 spinner-4"></div>
                                    <div class="ntd-ctn"><span>{{$alertsCount}}</span></div>
                                </a>
                            @endif
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                               data-toggle="dropdown" role="button" aria-expanded="false"
                               class="nav-link dropdown-toggle">
                                <span>
                                    <i class="fa fa-sign-out"></i>
                                </span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
