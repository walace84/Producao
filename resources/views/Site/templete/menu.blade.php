<nav class="navbar navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="{{route('index')}}">Home</a></li>
        <li><a href="{{route('sobrenos')}}">Sobre Nós</a></li>
        <li><a href="{{route('cartao')}}">Cadastre seu cartão</a></li> 
        <li><a href="{{route('contato')}}">Contato</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{route('login')}}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>