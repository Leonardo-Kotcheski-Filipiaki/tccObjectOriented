<?php
session_start();
include 'C:\\xampp\\htdocs\\tccOO\\config.php';
include DIR_TEMPLATES . "/head.php";
include DIR_TEMPLATES . "/nav.php";



?>

</head>
<body>
        <div class="black" id="rainbow" >
            <div class="col s5">
            <span id="bemvindo" class="flow-text center-align" >Seja bem vindo à nossa comunidade!</span>
            </div>
        </div>
        <?php
        if(!isset($_SESSION['userName'])){
        echo '<div class="row">
        <div class="col s12 ">
        <h3 class="flow-text center-align" id="regist" >Ainda não possui uma conta?</h3>
        </div>
 
   

        <div id="div_registro" class="row">
        <div class="col s6 m4 l2 offset-s3 offset-m4 offset-l5 light-green accent-2 " id="registrar"> 
            <a href="registroPage.php">
           <h2 class="flow-text center-align" id="btnreg">Crie uma!</h2>
           </a>
        </div>
    </div>';
   }else{
    echo '<div class="container" style="margin-top:10vh;">
        <div class="col s12 ">
        <h3 class="flow-text center-align" id="regist" >Escolha seu chat!</h3>
        </div>
        </div>
   ';}
?>


        <div class="row" id="carossel"  >
        <div class="col s12" style="text-align:center;">
        <img  class=" img responsive-img" src="img/games/apex.jpg" alt=""></a>
        <img  class=" img responsive-img" src="img/games/codwz.jpg" alt=""></a>
        <img  class=" img responsive-img" src="img/games/csgo.jpeg" alt=""></a>
        <img  class=" img responsive-img" src="img/games/dk3.jpg" alt=""></a>
        <img  class=" img responsive-img" src="img/games/roblox.jpg" alt=""></a>
        <img  class=" img responsive-img" src="img/games/eldenring.jpg" alt=""></a>
        <img  class=" img responsive-img" src="img/games/fortnite.jpg" alt=""></a>
        <img  class=" img responsive-img" src="img/games/lol.jpg" alt=""></a>
        <img  class=" img responsive-img" src="img/games/minecraft.jpg" alt=""></a>
        <img  class=" img responsive-img" src="img/games/genshin.jpg" alt=""></a>
        <img  class=" img responsive-img" src="img/games/valorant.jpg" alt=""></a>
        <img  class=" responsive-img img" src="img/games/wow.jpg" alt=""></a>
      

        
        </div>
        </div>
      
        
    
    
</body>