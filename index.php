<?php 
	
	require_once("vendor/autoload.php"); 
	include('pessoadao.php'); 

	$app = new \Slim\Slim();
	 

	$app->get('/',function() {
		echo "Olá seja bem vindo";
		
	}); 

	$app->get('/listar', function () {
	    
		$pessoadao = new PessoaDao(); 
	    $result = $pessoadao->listar(); 

        print_r(json_encode($result)); 

	});


	$app->run();
 ?>