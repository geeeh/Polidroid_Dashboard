<div class="sidebar">
  <div class="user-icon">
    <span><img class="icon" src="/imgs/user.svg">{{ Auth::user()->name }}</span>
  </div>

  <ul class="dashboard-links">
    <li><a href="#"><img class="list-icon" src="imgs/four-boxes.svg">DASHBOARD</a></li>
    <li><a href="#"><img class="list-icon" src="imgs/contact.svg">REQUESTS</a></li>
    <li><a href="#"><img class="list-icon" src="imgs/account.svg">ACCOUNT</a></li>
    <li><a href="{{ route('logout') }}"
      onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <img class="list-icon" src="imgs/power.svg">LOGOUT</a>

   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
       @csrf
   </form>
    </li>
  </ul>
</div>
