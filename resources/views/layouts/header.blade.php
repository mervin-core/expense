<nav class="navbar fixed-top" id="nav-main">
    
    <input type="hidden" id="userId" value="{{ Auth::user()->id }}">
    <div class="width-95 inline-b">
        
        <button class="logout" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-power-off" aria-hidden="true"></i>
        </button>
        <p class="text-right">Welcome to Expense Manager</p>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
         @csrf
        </form>
    </div>
</nav>