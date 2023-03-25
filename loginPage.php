<?php
session_start();
if(!isset($_SESSION['loggedIn'])){
  
}else{
  header('Location: home');
}


require __DIR__. '/vendor/autoload.php';
include 'config.php';

use \App\user\loginFunc;

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
       
    <link href="includes/templates/css/styleL.css" rel="stylesheet">
    <title>Login</title>
</head>



<body>

<div class="container">

<div class="row col s12 m6 l6 offset-m3 offset-l3" id="fundo">

<div class="row col s12 hide-on-small-only">
<h1 id="titulo">Faça seu login</h1>
<div class="red lighten-1 warning" id="hide">
  <p>Usuario ou senha estão errados.</p>
</div>
</div class="col s12">

    <form class="col s12 hide-on-small-only" method="POST">
      
    <div class="row col s12">
        <div class="input-field col s12">
          <input id="user" type="text" class="validate" name="user" placeholder="">
          <label for="user">Email</label>
        </div>
      </div>
     
      <div class="row col s12">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate"  name="pass" placeholder="">
          <label for="password">Senha</label>
        </div>
      </div>
    
      <div class="row col s12">
         <button type="submit"
           class="btn">Login
        </button>
        <br>
          <a >
          <img src='img/logins/discord.png' class="responsive-img discord"  alt="">
          </a>
    

          <a>
            <img src="img/logins/steam.png" class='responsive-img discord'  alt="">
          </a>
      </div>
     
      
       <p class="frase col s12 flow-text">Ainda não possui uma conta? <a href="registrar" class="frase col s12 flow-text"><u>Clique aqui e crie uma!</u></a></p>
         
    </form>
    </div>
   </div>
   </div>
   </div>
 
 
   

  
<div class="row" id="fundo">
<div class="row col s12 show-on-small hide-on-med-and-up">
<h1 id="titulo">Faça seu login</h1>
<div class="red lighten-1 warning" id="hide">
  <p>Usuario ou senha estão errados.</p>
</div> 
</div class="col s12">    

<form class="col s12 show-on-small hide-on-med-and-up" method="POST">
    <div class="row col s12">
        <div class="input-field col s12">
          <input id="user" type="text" class="validate" name="user" placeholder="">
          <label for="user">usuario</label>
        </div>
      </div>
     
      <div class="row col s12">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate" name="pass" placeholder="">
          <label for="password">Senha</label>
        </div>
      </div>
      

      <div class="row col s12">
         <button type="submit"
           class="btn">Login</button>
          </div>
          <a href="loginDiscordProcess/discord-oauth.php">
          <img src='img/logins/discord.png' class="responsive-img discord"  alt="">
          </a>
          
      
      
        <a href="LoginSteamProcess/LoginSteam.php">
          <img src="img/logins/steam.png" class='responsive-img discord'  alt="">
        </a>
          
      </div>
      
      <p class="frase col s12 flow-text hide">Ainda não possui uma conta? <a href="registrar" class="frase col s12 flow-text"><u>Clique aqui e crie uma!</u></a></p>
      </form>
      
         <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

         </body>
         </html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $user = $_POST['user'];
  $pass = $_POST['pass'];
  $try = new loginFunc();
  $result = $try->login($user, $pass);
  if ($result) {
      session_destroy();
      session_start();
      $_SESSION['loggedIn'] = true;
      $_SESSION['type'] = 'LoggedWithTGE';
      $_SESSION['userName'] = $result['usuario'];
      $_SESSION['imgPerf'] = $result['imgPerf'];
      $_SESSION['desc'] = $result['descricao'];
      $_SESSION['favGames'] = [$result['jogoFav1'], $result['jogoFav2'], $result['jogoFav3']];
      header('Location: home?check=success');
      exit;
  } else {
      header('Location: login?check=unsuccess');
      exit;
  }
}

?>

<script>
  let unsuccess = document.querySelector('.warning');
  let code = "<?php echo $_GET['check']; ?>"
  console.log(code);
  if(code == 'unsuccess'){
    unsuccess.removeAttribute('id');
  }



</script>



