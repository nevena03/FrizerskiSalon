<nav style="background-color: #D9D9D9;" class="navbar navbar-expand-sm">
  @if(Auth::user()->uloga == 'klijent')
  <a  style="color: #870F96" class="navbar-brand ml-5 font-weight-bold" href="#">Vintage Vogue Vanity</a>

  <ul class="navbar-nav">
    <li class="nav-item">
      <a style=" color: #870F96"  class="nav-custom-link" href="{{route('termins.index')}}">Moji termini</a>
    </li>
    <li class="nav-item">
      <a style=" color: #870F96" class="nav-custom-link" href="{{route('termins.create')}}">Zakaži termin</a>
    </li> 
  </ul>
  @elseif(Auth::user()->uloga == 'frizer')
  <a  style="color: #870F96" class="navbar-brand ml-5 font-weight-bold" href="#">Vintage Vogue Vanity</a>
  <ul class="navbar-nav">
    <li class="nav-item">
      <a style=" color: #870F96"  class="nav-custom-link" href="{{route('termins.index')}}">Moji termini</a>
    </li>
   
  </ul>
  @else
  <a  style="color: #870F96" class="navbar-brand ml-5 font-weight-bold" href="#">Vintage Vogue Vanity</a>
  <ul class="navbar-nav">
    <li class="nav-item">
      <a style=" color: #870F96"  class="nav-custom-link" href="{{route('termins.index')}}">Svi termini</a>
    </li>
    <li class="nav-item">
      <a style=" color: #870F96"  class="nav-custom-link" href="{{route('uslugas.index')}}">Usluge</a>
    </li>
    <li class="nav-item">
      <a style=" color: #870F96"  class="nav-custom-link" href="{{route('racuns.index')}}">Računi</a>
    </li>
    <li class="nav-item">
      <a style=" color: #870F96"  class="nav-custom-link" href="{{route('users.index')}}">Korisnici</a>
    </li>
  </ul>
  @endif

  <ul class="navbar-nav ml-auto">
  <li class="nav-item dropdown mr-5">
      <a style=" color: #870F96" class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
      {{Auth::user()->ime}} {{Auth::user()->prezime}}
      </a>
      <div class="dropdown-menu">
        <a style=" color: #870F96" class="dropdown-item" href="#">Profil</a>
      <form method="POST" action="{{route('logout')}}">
          @csrf

              <button style="color: #870F96" type="submit" class="dropdown-item">Logout</button>   
      </form>
      </div>
    </li>    
  </ul>
</nav>