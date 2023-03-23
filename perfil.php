<?php
session_start();
if (!isset($_SESSION['loggedIn'])) {
    header("Location: Index.php");
}
include 'config.php';
include DIR_TEMPLATES . '/head.php';
include DIR_TEMPLATES . '/nav.php';

?>
<link rel="stylesheet" href="includes/templates/css/perfil.css" alt="">




<body>


    <div class="row col s12">
        <?php include 'includes/templates/opcoes.php'; ?>
        <div class="card-panel green lighten-2 successNameChange" id='hide'>
            <p class="center">Nome alterado com sucesso!</p>
        </div>

        <div class="col s12 m12 l3 offset-col l9">
            <div id="usuariosAvat">
                <?php
                if ($_SESSION['type'] == "LoggedWithTGE") {
                    echo "<img  height='120' width='150' class = 'circle responsive-img' id='img' src='img/perfimg/icon.png' alt=''/>";
                }
                ?>
                <h1 class="flow-text " id="nomePerfil">
                    <?php echo $_SESSION['userName']; ?>
                </h1>

            </div>

            <div class="col l5 m9 s9" id="descrip">
                <h2 class="flow-text" id="tituloDescr">Descrição</h2>
                <p id="descrition">
            </div>





        </div>
        <div class="col l10 m12 s12" id="jogosFav">
            <h1 class="flow-text">Jogos favoritos</h1>
            <div class="col s10 offset-s1">
                <img src="" class="responsive-img imgFav" alt="">
                <img src="" class="responsive-img imgFav" alt="">
                <img src="" class="responsive-img imgFav" alt="">

            </div>
        </div>
    </div>
    </div>


</body>

</html>



<?php
$value = $_GET['class'];
if ($value == 'successNameChange') {
    if ($_SESSION['modAlreadyNotified'] == false) {
        echo "<script>
            let type = '" . $value . "'
            console.log(type)
            let doc = document.querySelector('.'+type);
            if(type == 'successNameChange'){
                doc.removeAttribute('id');
                setTimeout(() => {
                    doc.setAttribute('id', 'hide');
            
                }, 1000);
            }
            </script>";
        $_SESSION['modAlreadyNotified'] = true;
    }
}
?>