<?php 
	
	require_once("vendor/autoload.php"); 
	include('pessoadao.php'); 

	$app = new \Slim\Slim();
	 

	$app->get('/',function() {
		echo "<h1><b>Olá, seja bem vindo.</b></h1>";
		echo "<br/>";
		echo "<h2>Acessando:  </h2><br/>"; 
		echo "<h3>rodrigoform.dx.am ou rodrigoform.dx.am/index.php, vocé acessará o arquivo Rest. <br/>"; 
		echo "rodrigoform.dx.am/listar, acessa o caminho do Rest para listar os dados do Banco.<br/>"; 
		echo "rodrigoform.dx.am/cadastro.php, acessa a aplicação que cadastra e lista os dados do Banco</h3>"; 

		
	}); 

	$app->get('/listar', function () {
	    
		$pessoadao = new PessoaDao(); 
	    $result = $pessoadao->listar(); 

        print_r(json_encode($result)); 
        echo "<br/><br>";
        echo var_dump($result);

	});


	$app->run();
 ?>