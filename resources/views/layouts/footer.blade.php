<div>
    <div class="pull-left">

        <div class="pull-left" style="padding-right: 15px;">
            <i class="fa fa-home"> </i>
            <a href="{{ url('/') }}">
                {{ config('app.name', 'Home') }}
            </a>
            <div class="small"><i class="fa fa-code-branch"></i> v 1.01.18</div>
        </div>
        <div class="pull-right">
            <!-- Authentication Links -->
            <!-- Branding Image -->
            @guest
                <div><i class="fa fa-sign-in">  <a href="{{ route('login') }}">Login</a></i></div>
                <div><i class="fa fa-user-plus"> <a href="{{ route('register') }}">Register</a></i></div>
            @else
                <div>
                    <i class="fa fa-sign-out-alt"></i>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            @endguest
        </div>
    </div>
    <div class="pull-right view-container-pad-t">
        <h6>Copy right <i class="fa fa-copyright"></i> IT Link USA</h6>
    </div>
</div>