<?php 


	class PessoaDao{

		function listar(){

			$conn = new PDO("mysql:dbname=cadastro;host=localhost","root","123456");
			$stmt = $conn->prepare("select *from pessoa order by nome"); 
	        $stmt->execute(); 
	        $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
	        return $result; 
		}
	}
 ?>