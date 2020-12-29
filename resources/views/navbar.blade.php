<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/navstyle.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
</head>
<body>
  <div class="dropdown">
      <nav>
        <a class="navbar-brand">
          <div class="logo-image">
                <img src="images/logo" class="img-fluid">
          </div>
        </a>
        <ul>
          <li><b><a href="{{url('/rubriquelist')}}">Acceuil</a></b></li>
          <li><a href="#"><b>Rubrique </b> <i class="fas fa-caret-down"></i></a>
            <ul>
              <li><a href="{{url('/create')}}"><b>Ajouter une rubrique</b> </a></li>
              <li><a href="{{url('/rubriquelist')}}"><b>Afficher tout</b> </a></li>
            </ul>
          </li>

          <li><a href=""><b>Fournisseur</b><i class="fas fa-caret-down"></i></a>
            <ul>
              <li><a href="{{url('/createFournisseur')}}"><b>Ajouter un fournisseur</b> </a></li>
              <li><a href="{{url('/fournisseurviews/fournisseurlist')}}"><b>Afficher tout</b> </a></li>
            </ul>
          </li>

          <li><a href=""><b>Engagement</b><i class="fas fa-caret-down"></i></a>
            <ul>
              <li><a href="{{url('/createFacture')}}"><b>Ajouter un engagement</b> </a></li>
              <li><a href="{{url('/factureviews/facturelist')}}"><b>Afficher tout</b> </a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <b><a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Se déconnecter') }}
                  </a>
                </b>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
        </ul>
      </nav>
  </div>
</body>
</html>
