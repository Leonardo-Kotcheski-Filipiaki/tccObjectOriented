<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="includes/templates/css/style.css" alt="">

<nav>
  
    <div class="nav-wrapper blue darken-3">
      <a class="brand-logo" href="index.php" alt=""> 
        <img id="logoimg" src="img/logo.png" alt="">
      </a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><?php
          
          if(!isset($_SESSION['userName'])){
            echo "<a href='loginPage.php'> Iniciar sessão";

          }else{
            echo "<a> ".$_SESSION['userName'];
            } ;

        
        ?></li></a></li>
    </div>
  </nav>
  <ul class="sidenav" style="text-align:center;" id="mobile-demo">
  <div  style="margin-top:3vh; margin-bottom:5vh;"></a></div>
        <li><a href="">Configurações</a></li>
    <li><a>Chats</a></li>
  </ul>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems);
  });
  </script>