<div class="main-menu-area mg-tb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                    <li class="{{request()->routeIs('dashboard*') ? 'active' : ""}}">
                        <a data-toggle="tab" href="#dashboard"><i class="notika-icon"></i>Dashboard</a>
                    </li>
                    @can("user_access")
                        <li class="{{request()->routeIs('users*') || request()->routeIs('logs*') ? 'active' : ""}}">
                            <a data-toggle="tab" href="#users"><i class="notika-icon "></i> Utilisateurs</a>
                        </li>
                    @endcan
                    @can("support_access")
                        <li class="{{request()->routeIs('supports*') ? 'active' : ""}}">
                            <a data-toggle="tab" href="#support"><i class="notika-icon"></i> Tickets</a>
                        </li>
                    @endcan
                </ul>
                <div class="tab-content custom-menu-content">
                    <div id="dashboard"
                         class="tab-pane {{request()->routeIs('dashboard*') ? 'active' : ""}} notika-tab-menu-bg animated flipInX">
                        <ul class="notika-main-menu-dropdown">
                            <li><a href="{{route('dashboard')}}">Dashboard One</a>
                            </li>
                        </ul>
                    </div>
                    <div id="users" class="tab-pane {{ request()->routeIs('users*') || request()->routeIs('logs*') ? 'active' : ""}} notika-tab-menu-bg animated flipInX">
                        <ul class="notika-main-menu-dropdown">
                            @can('user_create')
                                <li><a href="{{route('users.create')}}">Ajouter Utilisateur</a>
                                </li>
                            @endcan
                            <li><a href="{{route('users.index')}}">Comptes Utilisateurs</a>
                            </li>
                            @can('user_management_access')
                            <li><a href="{{route('logs.index')}}">Log Des activités</a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                    @can("support_access")
                    <div id="support" class="tab-pane {{request()->routeIs('supports*') ? 'active' : ""}} notika-tab-menu-bg animated flipInX">
                        <ul class="notika-main-menu-dropdown">
                            <li><a href="contact.html">Contact</a>
                            </li>
                        </ul>
                    </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
