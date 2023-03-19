<?php
session_start();

if(!isset($_SESSION['userName'])){
  
}else{
  header('Location: default.php');
}
require __DIR__. '/vendor/autoload.php';
include 'config.php';

use \App\user\regFunc;




?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
         
        <link href="includes/templates/css/StyleR.css" rel="stylesheet">
  <title>Registro</title>
</head>
<body>

<div class="container">
<div class="row col s12 hide-on-small-only" id="fundo">
<div class="row col s12 ">
<h1 id="titulo">Registre-se</h1>
</div class="col s12">    

    <form class="col s12"  method="POST">

     <div class="row col s12">
        <div class="input-field col s12 inputs">
          <input id="first_name" type="text" class="validate" name="user" data-ls-module="charCounter" maxLength="16" placeholder="">
          <label for="first_name">Nome de exibição</label>
        </div>
</div>

    <div class="row col s12 inputs">
        <div class="input-field col s12">
          <input id="email" type="email" class="validate" name="email" placeholder="">
          <label for="email">Email</label>
        </div>
      </div>
     
      <div class="row col s12 inputs">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate"  name="pass" data-ls-module="charCounter" minLength="8" placeholder="">
          <label for="password">Senha</label>
        </div>
      </div>
    
      <div class="row col s12 inputs">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate"  name="pass_repeat" placeholder="">
          <label for="password">Confirme a senha</label>
        </div>
      </div>



      <div class="row col s12">
         <button type="submit"
           class="btn">Registrar</button>
          </div>
       <p class="frase col s12 flow-text">Já possui uma conta? <a href="loginPage.php" class="frase col s12 flow-text"><u>Clique aqui e entre!</u></a></p>

    </form>

    
  </div>

</div>

<div class="row" id="fundo">
<div class="row col s12 show-on-small hide-on-med-and-up">
<h1 id="titulo">Registre-se</h1>
</div class="col s12">    

<form class="col s12 show-on-small hide-on-med-and-up"  method="POST">



<div class="row col s12">
   <div class="input-field col s12">
     <input id="first_name" type="text" class="validate" name="user" placeholder="">
     <label for="first_name">Nome de exibição</label>
   </div>
</div>

<div class="row col s12">
   <div class="input-field col s12">
     <input id="email" type="email" class="validate" name="email" placeholder="">
     <label for="email">Email</label>
   </div>
 </div>

 <div class="row col s12">
   <div class="input-field col s12">
     <input id="password" type="password" class="validate"  name="pass" placeholder="">
     <label for="password">Senha</label>
   </div>
 </div>

 <div class="row col s12">
   <div class="input-field col s12">
     <input id="password" type="password" class="validate"  name="pass_repeat" placeholder="">
     <label for="password">Confirme a senha</label>
   </div>
 </div>



 <div class="row col s12">
    <button type="submit"
      class="btn">Registrar</button>
     </div>
  <p class="frase col s12 flow-text">Já possui uma conta? <a href="loginPage.php" class="frase col s12 flow-text"><u>Clique aqui e entre!</u></a></p>

</form>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


  
</body>
</html>

         
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $user = $_POST['user'];
  $mail = $_POST['email'];
  $pass = $_POST['pass'];
  $oPass = $_POST['pass_repeat'];

  if($pass != $oPass){
    header('Location: registroPage.php?msg=noEqPass');
    } else {
      $try = new regFunc();
      $result = $try->register($user, $mail, $pass);
      if ($result) {
          session_destroy();
          session_start();
          $_SESSION['userName'] = $user;
          header('Location: default.php?check=registered');
          exit;
        
    }
  }

  }
  
?>

