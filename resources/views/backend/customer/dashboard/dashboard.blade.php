<h2>customer dashboard</h2>

<a class="dropdown-item nav-link" href="{{ route('logout') }}"
   onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
    <i class="fa fa-power-off"></i> Logout 
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
