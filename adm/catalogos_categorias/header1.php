<?php

require_once './adm/classes/Conn2.php';

$result = $conn2->query("SELECT * FROM perfil");
$line = $result->fetch(PDO::FETCH_ASSOC);

?>

<section class="container">
	<div class="dv-header">	<img src="./img/logo.png" class="img-mini"></div>
	<div class="dv-header"><br><h2> <?php echo "$line[empresa]"  ?> </h2></div>
</section>
