<section class="container-duart">
	<?php echo "$line[endereco]"?>
</section>

<section class="container-duart">
	<?php echo "$line[funcionamento]"?>
</section>


<section class="container-duart">
	<?php echo "$line[informacoes]"?>
</section>


<!--
<a href="<?php echo "$line[instagram]" ?>"> <img src="./img/instagram.png" class="img-social"></a>

<a href="<?php echo $facebook ?>"> <img src="./img/facebook.png" class="img-social"></a>

<a href="#"> <img src="./img/local.png" class="img-social"></a>
-->
<center>
        <?php
        require_once '../adm/classes/Conn2.php';
        $contagem = $conn2->query("SELECT * FROM produtos ");
        $total = $contagem->rowCount();
        echo "<h1>".$total."</h1>"." Anunciantes estão aqui, anuncie você também, é Grátis!!!";
        ?>
        </center>

<section class="container-duart">
	<a href="https://duartgrafica.com.br/">
		<p class="creditos-duart">Desenvolvido por: Claudio Duarte Designer - www.duartgrafica.com.br</p>
	</a>
</section>

 <a href="https://api.whatsapp.com/send?phone=<?php echo "$line[whatsapp]"?>&text=Oi,%20preciso%20de%20mais%20informa%C3%A7%C3%B5es" target="_blank">
    <img src="./img/whatsapp.png" class="bt-floating">
    </a>