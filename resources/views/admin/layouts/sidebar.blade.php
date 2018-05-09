
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <div class="sidebar-brand">
                    <a href="#">{!! config('app.name') !!}</a>
                </div>
                <div class="sidebar-header">
                    <div class="user-pic">
                        <img class="img-responsive img-rounded" src="https://azouaoui-med.github.io/pro-sidebar-template/bootstrap3/assets/img/user.jpg" alt="">
                    </div>
                    <div class="user-info">
                        <span class="user-name">{!! Auth::getUser()->name !!}</span>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul>
                        <li class="sidebar-dropdown">
                            <a href="{!! route('admin.dashboard') !!}">
                                <span>{!! Icon::dashboard() !!}&nbsp;&nbsp;Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="{!! route('admin.users.index') !!}">
                                <span>{!! Icon::user() !!}&nbsp;&nbsp;Usuários</span>
                            </a>
                        </li>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="{!! route('admin.news.index') !!}">
                                <span>{!! Icon::comment() !!}&nbsp;&nbsp;Notícias</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="sidebar-footer">
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                >
                    {!! Icon::off() !!}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </nav>
