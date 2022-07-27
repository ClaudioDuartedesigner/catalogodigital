<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortchu icon" href="./img/favicon.png">
  <meta property="og:image" content="https://cestasfloresesabores.com.br/img/logo.jpg">
  <meta property="og:image:type" content="image/jpg">
  <meta name='description' content='Veja o nosso Catalogo Digital!'>
  <link rel="stylesheet" type="text/css" href="./css/main.css">
  <title>Meu Catalogo Digital</title>
</head>

<?php
require_once './classes/Conn.php';
require_once './classes/User.php';
?>

<section class="container">
  <img src="./img/logo.png" width="50px;">
</section>

<section class="container">
    <form action="" class="dv-form" method="post">
      
      <label>E-mail</label>
      <input type="text" name="email" placeholder="E-mail">
      
      <label>Senha:</label>
      <input type="password" name="senha" placeholder="Senha">
            
      <button type="submit" class="bt-confirm" value="Acessar">Acessar</button>
      <a href="../index.php"><button type="button" class="bt-access" value="Acessar">Sair</button></a>
    
<?php

    if(isset($_POST['email'])){

        $User_Access = new User();
        $User_Access->User_Access();
    } 

?>

    </form>

</section>

<section class="container">
  <a href="https://duartgrafica.com.br/"><img src="./img/claudio-duarte-desinger.png" width="150px;"></a>
</section>

<section class="container">
  <h6><a href="https://duartgrafica.com.br/">Desenvolvido por: Claudio Duarte Designer</a></h6>
</section>