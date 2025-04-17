<nav style="background-color: #D9D9D9;" class="navbar navbar-expand-sm">
  <a  style="color: #870F96" class="navbar-brand ml-5 font-weight-bold" href="#">Vintage Vogue Vanity</a>

  <ul class="navbar-nav">
    <li class="nav-item">
      <a   class="nav-custom-link" href="{{route('termins.index')}}">Moji termini</a>
    </li>
    @if(Auth::user()->uloga == 'klijent')
      <li class="nav-item">
        <a  class="nav-custom-link" href="{{route('termins.create')}}">Zakaži termin</a>
      </li>
    @elseif(Auth::user()->uloga == 'admin')
      <li class="nav-item">
        <a style="color: #870F96" class="nav-custom-link" href="{{route('users.index')}}">Korisnici</a>
      </li>
    @endif
  </ul>

  <ul class="navbar-nav ml-auto">
  <li class="nav-item dropdown mr-5">
      <a style="color: #870F96" class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
      {{Auth::user()->ime}} {{Auth::user()->prezime}}
      </a>
      <div class="dropdown-menu">
        <a style="color: #870F96" class="dropdown-item" href="{{route('users.show', ['user'=>Auth::user()])}}">Profil</a>
      <form method="POST" action="{{route('logout')}}">
          @csrf

              <button style="color: #870F96" type="submit" class="dropdown-item">Logout</button>   
      </form>
      </div>
    </li>    
  </ul>
</nav>