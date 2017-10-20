@if(Auth::check() and Auth::user()->user_type=='employee')
    <li>{{ link_to('profile', 'Profile') }}</li>
    <li>{{ link_to('available-jobs', 'Available Jobs') }}</li>
    <li>{{ link_to_route('register', 'Your Orders') }}</li>
    <li>{{ link_to_route('login', 'Account') }}</li>
    <li>{{ link_to('working', 'Ratings') }}</li>
    <li>
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
            Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </li>
@endif

@if(Auth::check() and Auth::user()->user_type=='employer')
    <li>{{ link_to('profile', 'Profile') }}</li>
    <li>{{ link_to('orders', 'Your Orders') }}</li>
    <li>{{ link_to('payments', 'Payment Methods') }}</li>
    <li>{{ link_to('complains', 'Complains') }}</li>
    <li>
        <a href="{{ route('logout') }}" 
           onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </li>
@endif

@if(Auth::check() and Auth::user()->user_type=='admin')
    <li>{{ link_to('members/employee', 'Free-Lancers') }}</li>
    <li>{{ link_to('members/client', 'Clients') }}</li>
    <li>{{ link_to('categories', 'Categories') }}</li>
     <li>{{ link_to('faqs', 'FAQS') }}</li>
     <li>
      <a href="{{ route('logout') }}"
           onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
            Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </li>
@endif