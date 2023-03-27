<?php
session_start();

include 'config.php';
require __DIR__ . '/vendor/autoload.php';

use \App\user\updateClass;
use \App\siteFunctions\gamesChoose;

include 'includes/templates/head.php';

$try = new gamesChoose();
$result = $try->findGames();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['name'])) {
    $type = 'name';
    $value = $_POST['name'];
    if ($value == '') {
      $_SESSION['errorAlreadyNotified'] = false;
      header("Location: modificar?msg=emptyN");
      exit;
    }
    $table = $_SESSION['type'];
    $oldName = $_SESSION['userName'];
    $try = new updateClass();
    $result = $try->update($type, $value, $table, $oldName);
    if ($result) {
      $_SESSION['userName'] = $_POST['name'];
      $_SESSION['modAlreadyNotified'] = false;
      header("Location: user?msg=successNameChange");
      exit;
    }
  } else if (isset($_POST['descriptionChange'])) {
    $type = 'descriptionChange';
    $value = $_POST['descriptionChange'];
    $str = preg_replace('/\s\s+/', ' ', $value);
    if ($str == '' || $str == ' ') {
      $_SESSION['errorAlreadyNotified'] = false;
      header("Location: modificar?msg=emptyD");
      exit;
    }
    $table = $_SESSION['type'];
    $name = $_SESSION['userName'];
    $try = new updateClass();
    $result = $try->update($type, $value, $table, $name);
    if ($result) {
      $_SESSION['desc'] = $_POST['descriptionChange'];
      $_SESSION['modAlreadyNotified'] = false;
      header("Location: user?msg=successDescChange");
      exit;
    }
  } else if (isset($_POST['jogosFav'])) {

    $type = 'favGameChange';
    $value = [$_POST['jogosFav'][0], $_POST['jogosFav'][1], $_POST['jogosFav'][2]];
    if ($value[2] == '' || $value[2] == null) {
      $_SESSION['errorAlreadyNotified'] = false;
      header("Location: modificar?msg=emptyJ");
      exit;
    }
    $table = $_SESSION['type'];
    $name = $_SESSION['userName'];
    $try = new updateClass();
    $result = $try->update($type, $value, $table, $name);
    if ($result) {
      $_SESSION['favGames'] = $value;
      $_SESSION['modAlreadyNotified'] = false;
      header("Location: user?msg=successGameChange");
      exit;
    }
  }
}
?>
<script src="includes/js/jquery.min.js"></script>
<script src="includes/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.0.0-rc.4/dist/js/tom-select.complete.min.js"></script>

<script src="includes/js/croppie.js"></script>
<link rel="stylesheet" href="includes/templates/css/croppie.css" />


</head>

<?php

include 'includes/templates/nav.php';

include 'includes/templates/opcoes.php';

?>
<link rel="stylesheet" href="includes/templates/css/editarperfil.css" alt="" />




<body>
  <!-- Alteração de nome de exibição e login -->

  <div class="card-panel red lighten-2 emptyN" id='hide'>
    <p class="center">Nome não pode ser vazio!</p>
  </div>
  <div class="card-panel red lighten-2 emptyJ" id='hide'>
    <p class="center">Selecione 3 jogos por favor!</p>
  </div>
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
            <input name="name" type="text" class="inputModif" data-ls-module="charCounter" minLength="6" maxLength="16"
              required></input>
            <button class="btnSub" type="submit">Confirmar</button>
          </form>
        </div>
      </li>

      <!-- Alteração de descrição -->

      <li>
        <div class="collapsible-header">
          <p class="editPerf">Editar descricão</p>
        </div>

        <div class="collapsible-body">

          <form method="post">
            <h3 class="flow-text" id="tituDesc">Alterar descrição:</h3>
            <textarea name="descriptionChange" id="textDescr" maxlength="500" minlength="1" required
              style="resize: none; height:22vh; color:black; padding:4px 4px 4px 4px; background-color:aliceblue; white-space: pre-wrap;"></textarea>
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
            <h3 class="flow-text" id="tituDesc">Escolha seus jogos favoritos!</h3>
            <div class="col s12 m11">
              <div class="col s12 m6 offset-m1" style="margin-left:12vw;">
                <label for="jogosFav">Escolha até 3 jogos</label>
                <select name="jogosFav[]" class="jogosFav" multiple>
                  <?php
                  foreach ($result as $value) {
                    echo "<option value='" . $value['nameImg'] . "'>" . $value['name'] . "</option>";
                  }
                  ?>
                </select>
              </div>

            </div>
            <button class="btnSub">Confirmar</button>
          </form>

        </div>
      </li>
    </ul>


    <script>
      $(document).ready(function () {
        $('select').formSelect();
      });

      $(document).ready(function () {

        $('.collapsible').collapsible();
      })
    </script>

    <script src="includes/js/SelectLimit.js"></script>
</body>

</html>


<?php
if (isset($_GET['msg']) == 'emptyN') {
  if ($_SESSION['errorAlreadyNotified'] == false) {
    $value = $_GET['msg'];
    echo "<script>
        let type = '" . $value . "'
        console.log(type)
        let doc = document.querySelector('.emptyN');
        if(type == 'emptyN'){
            doc.removeAttribute('id');
            setTimeout(() => {
                doc.setAttribute('id', 'hide'); 
            }, 1250);
        }
        </script>";
    $_SESSION['errorAlreadyNotified'] = true;
  }
}
?>

<script>
  let unsuccess = document.querySelector('.emptyJ');
  let code = "<?php echo $_GET['msg']; ?>"
  console.log(code);
  if(code == 'emptyJ'){
    unsuccess.removeAttribute('id');
    setTimeout(() => {
      unsuccess.setAttribute("id", "hide")
    }, 1250);
  }



</script>

<script src="includes/js/SelectLimit.js"></script>