<?php
session_start();
include 'config.php';
if (isset($_SESSION['userName'])) {
} else {
  Header("Location: index.php");
}
include 'includes/templates/head.php';

$user = $_SESSION['userName'];

if ($_SESSION['type'] == "LoggedWithTGE") {

}


?>

<script src="includes/js/jquery.min.js"></script>
<script src="includes/js/bootstrap.min.js"></script>
<script src="includes/js/croppie.js"></script>
<link rel="stylesheet" href="includes/templates/css/croppie.css" />


</head>

<?php

include 'includes/templates/nav.php';

include 'includes/templates/opcoes.php';

?>
<link rel="stylesheet" href="includes/templates/css/editarperfil.css" alt="" />




<body>
  <div class="row">

    <ul class="col s10 m8 l6 offset-s1 offset-m2 offset-l2 collapsible">

      <li>
        <div class="collapsible-header">
          <p class="editPerf">Alterar nome
          <p>

        </div>
        <div class="collapsible-body">
          <form method="post">
            <h3 class="flow-text">Alterar nome:</h3>
            <input name="alterarNome" class="inputModif" data-ls-module="charCounter" minLength="4"
              maxLength="16"></input>
            <button class="btnSub" type="submit">Confirmar</button>
          </form>
        </div>
      </li>

      <li>
        <div class="collapsible-header">
          <p class="editPerf">Editar descricão
          <p>
        </div>

        <div class="collapsible-body">

          <form method="post">
            <h3 class="flow-text" id="tituDesc">Alterar descrição:</h3>
            <textarea name="descriptionChange" id="textDescr" minLength="1" maxLength="1000"
              style="resize: none; height:22vh; color:black; padding:4px 4px 4px 4px; background-color:aliceblue;"></textarea>
            <button class="btnSub" type="submit">Confirmar</button>
          </form>

        </div>
      </li>
      <li>
        <div class="collapsible-header">
          <p class="editPerf">Mudar jogos favoritos
          <p>
        </div>
        <div class="collapsible-body">

          <form method="post">
            <h3 class="flow-text" id="tituDesc">Escolha seu jogo favorito!</h3>


            <div class="col s12 m11">


              <div class="col s12 m3 offset-m1">
                <select name="jogosFav" class="jogosFav">
                  <option value="" disabled selected>Jogo favorito</option>

                  <option data-icon="img\games\valorant.jpg" class="left" value="valorant.jpg">Valorant</option>
                  <option data-icon="img\games\minecraft.jpg" class="left" value="minecraft.jpg">Minecraft</option>
                  <option data-icon="img\games\gtav.jpg" class="left" value="gtav.jpg">Grand Theft Auto V</option>
                  <option data-icon="img\games\csgo.jpeg" class="left" value="csgo.jpeg">CS:GO</option>
                  <option data-icon="img\games\dk3.jpg" class="left" value="dk3.jpg">Dark Souls 3</option>
                  <option data-icon="img\games\genshin.jpg" class="left" value="genshin.jpg">Genshin Impact</option>
                  <option data-icon="img\games\lol.jpg" class="left" value="lol.jpg">League of Legends</option>
                  <option data-icon="img\games\tft.jpg" class="left" value="tft.jpg">Teamfight Tactics</option>
                  <option data-icon="img\games\mk11.jpg" class="left" value="mk11.jpg">Mortal Kombat 11</option>
                  <option data-icon="img\games\fortnite.jpg" class="left" value="fortnite.jpg">Fortnite</option>
                  <option data-icon="img\games\eldenring.jpg" class="left" value="eldenring.jpg">Elden Ring</option>
                  <option data-icon="img\games\apex.jpg" class="left" value="apex.jpg">Apex Legends</option>
                  <option data-icon="img\games\wow.jpg" class="left" value="wow.jpg">World of Warcraft</option>
                  <option data-icon="img\games\codwz.jpg" class="left" value="codwz.jpg">Call of Duty: Warzone</option>
                  <option data-icon="img\games\roblox.jpg" class="left" value="roblox.jpg">Roblox</option>

                </select>

              </div>
              <div class="col s12 m3 offset-m1" id="meioFav">
                <select name="jogosFav2" class="jogosFav">
                  <option value="" disabled selected>Jogo favorito</option>


                  <option data-icon="img\games\valorant.jpg" class="left" value="valorant.jpg">Valorant</option>
                  <option data-icon="img\games\minecraft.jpg" class="left" value="minecraft.jpg">Minecraft</option>
                  <option data-icon="img\games\gtav.jpg" class="left" value="gtav.jpg">Grand Theft Auto V</option>
                  <option data-icon="img\games\csgo.jpeg" class="left" value="csgo.jpeg">CS:GO</option>
                  <option data-icon="img\games\dk3.jpg" class="left" value="dk3.jpg">Dark Souls 3</option>
                  <option data-icon="img\games\genshin.jpg" class="left" value="genshin.jpg">Genshin Impact</option>
                  <option data-icon="img\games\lol.jpg" class="left" value="lol.jpg">League of Legends</option>
                  <option data-icon="img\games\tft.jpg" class="left" value="tft.jpg">Teamfight Tactics</option>
                  <option data-icon="img\games\mk11.jpg" class="left" value="mk11.jpg">Mortal Kombat 11</option>
                  <option data-icon="img\games\fortnite.jpg" class="left" value="fortnite.jpg">Fortnite</option>
                  <option data-icon="img\games\eldenring.jpg" class="left" value="eldenring.jpg">Elden Ring</option>
                  <option data-icon="img\games\apex.jpg" class="left" value="apex.jpg">Apex Legends</option>
                  <option data-icon="img\games\wow.jpg" class="left" value="wow.jpg">World of Warcraft</option>
                  <option data-icon="img\games\codwz.jpg" class="left" value="codwz.jpg">Call of Duty: Warzone</option>
                  <option data-icon="img\games\roblox.jpg" class="left" value="roblox.jpg">Roblox</option>

                </select>
              </div>
              <div class="col s12 m3 offset-m1">
                <select name="jogosFav3" class="jogosFav">
                  <option value="" disabled selected>Jogo favorito</option>

                  <option data-icon="img\games\valorant.jpg" class="left" value="valorant.jpg">Valorant</option>
                  <option data-icon="img\games\minecraft.jpg" class="left" value="minecraft.jpg">Minecraft</option>
                  <option data-icon="img\games\gtav.jpg" class="left" value="gtav.jpg">Grand Theft Auto V</option>
                  <option data-icon="img\games\csgo.jpeg" class="left" value="csgo.jpeg">CS:GO</option>
                  <option data-icon="img\games\dk3.jpg" class="left" value="dk3.jpg">Dark Souls 3</option>
                  <option data-icon="img\games\genshin.jpg" class="left" value="genshin.jpg">Genshin Impact</option>
                  <option data-icon="img\games\lol.jpg" class="left" value="lol.jpg">League of Legends</option>
                  <option data-icon="img\games\tft.jpg" class="left" value="tft.jpg">Teamfight Tactics</option>
                  <option data-icon="img\games\mk11.jpg" class="left" value="mk11.jpg">Mortal Kombat 11</option>
                  <option data-icon="img\games\fortnite.jpg" class="left" value="fortnite.jpg">Fortnite</option>
                  <option data-icon="img\games\eldenring.jpg" class="left" value="eldenring.jpg">Elden Ring</option>
                  <option data-icon="img\games\apex.jpg" class="left" value="apex.jpg">Apex Legends</option>
                  <option data-icon="img\games\wow.jpg" class="left" value="wow.jpg">World of Warcraft</option>
                  <option data-icon="img\games\codwz.jpg" class="left" value="codwz.jpg">Call of Duty: Warzone</option>
                  <option data-icon="img\games\roblox.jpg" class="left" value="roblox.jpg">Roblox</option>
                </select>
              </div>
            </div>

            <button class="btnSub" type="submit">Confirmar</button>
          </form>

        </div>
      </li>
    </ul>


    <script>
      $(document).ready(function () {
        $('select').formSelect();
      });

    </script>

    <script>
      $(document).ready(function () {

        $('.collapsible').collapsible();
      })
    </script>





</body>