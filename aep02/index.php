<?php
	require_once('pessoa.php');

	$p1 = new Pessoa('Carlos',175,57,'1999','999.999.999.99');

	echo "<pre>";
	echo var_dump($p1);
	echo "</pre>";

	echo "<br> imc = " . $p1->calcula_imc();
	echo "<br> idade = " . $p1->calcula_idade();
	
	$p1->valida_cpf();

	echo "<pre>";
	echo var_dump($p1);
	echo "</pre>";

?>