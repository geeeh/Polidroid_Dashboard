<div class="sidebar">
    <div class="user-details">
      <div class="user-icon">
        <span><img class="icon" src="/imgs/user.svg">{{ Auth::user()->name }}</span>
      </div>
    </div>

  <ul class="dashboard-links">
    <li><a href="{{route('home')}}"><span><img class="list-icon" src="imgs/four-boxes.svg">Dashboard</span></a></li>
    <li><a href="{{route('requests')}}"><img class="list-icon" src="imgs/contact.svg">Requests</a></li>
    <li><a href="{{route('account')}}"><img class="list-icon" src="imgs/account.svg">Account</a></li>
    <li><a href="{{ route('logout') }}"
      onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <img class="list-icon" src="imgs/power.svg">Logout</a>

   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
       @csrf
   </form>
    </li>
  </ul>
</div>
