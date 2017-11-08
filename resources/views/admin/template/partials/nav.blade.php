<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ route('admin.index') }}">
        <span class="glyphicon glyphicon-fire" aria-hidden="true">PhotoUp</span>
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      @if(Auth::user())
        @if(Auth::user()->type == "admin")
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuarios <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="{{ route('admin.users.index') }}">Listar</a></li>
              <li><a href="{{ route('admin.users.create') }}">Crear</a></li>
            </ul>
          </li>
        </ul>
        @endif
      <ul class="nav navbar-nav">
          <li class="dropdown">
            @if(Auth::user()->type == "admin")
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Albumes<span class="caret"></span></a>
            <ul class="dropdown-menu">
            @else
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mis Albumes<span class="caret"></span></a>
            <ul class="dropdown-menu">
            @endif
              <li><a href="{{ route('admin.albumes.index') }}">Listar</a></li>
              <li><a href="{{ route('admin.albumes.create') }}">Crear</a></li>
            </ul>
          </li>
        </ul>  
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <!--<li><a href="#">Action</a></li>
            <li role="separator" class="divider"></li>-->
            <li><a href="{{ route('auth.logout') }}">Salir</a></li>
          </ul>
        </li>
        <!--<li><a class="navbar-brand" href="#"><img alt="..." src="imagen.jpg"></a></li>-->
      </ul>
      @endif
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>