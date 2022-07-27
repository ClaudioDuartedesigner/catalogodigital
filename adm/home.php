<?php
session_start();
ob_start();
?>

<?php
if(!isset($_SESSION["user"])){
    header("location: ./errologin.php");
}
?>

<!--------------------------------------------
 -------------Início da Página ---------------
 --------------------------------------------->

<body>


    <?php require_once 'config.php';?>

<!--------------------------------------------
 -------------Inclusão do Cabeçalho ---------------
 --------------------------------------------->

<header>
    <?php include_once 'header.php';?>
</header>

<!--------------------------------------------
 -------------Início da Main ---------------
 --------------------------------------------->


<main>
    <section class="container">
        <div class="box-adm-home">
            <a href="./perfil/Update-Perfil.php">
            <img src="./img/perfil.png" class="img-adm"></a>
            <p>Perfil</p>
        </div> 

        <div class="box-adm-home">
            <a href="./categorias/List-Categorias.php">
            <img src="./img/categorias.png" class="img-adm"></a>
            <p>Categorias</p>
        </div> 

        <div class="box-adm-home">
            <a href="./catalogos_categorias/List-Categorias.php">
            <img src="./img/categorias.png" class="img-adm"></a>
            <p>Catalogos</p>
        </div> 
     </section>

   <section class="container">
        <center>
        <?php
        require_once './classes/Conn2.php';
        $contagem = $conn2->query("SELECT * FROM categorias ");
        $total = $contagem->rowCount();
        echo "Você tem ".$total." categoria(s)"."<br><br>";

        $contagem = $conn2->query("SELECT * FROM subcategorias ");
        $total = $contagem->rowCount();
        echo "Você tem ".$total." subcategoria(s)";
        ?>
        </center>
    </section>
    
</main>

<!--------------------------------------------
 -------------Início do Footer ---------------
 --------------------------------------------->

<footer>
    <?php include_once 'footer.php';?>
</footer>

</body>