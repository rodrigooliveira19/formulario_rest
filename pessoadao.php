<?php 


	class PessoaDao{

		function listar(){

			try {
				$conn = new PDO("mysql:dbname=cadastro;host=localhost","root","123456");
			} catch (Exception $e) {
				echo "Erro de conexão com o Banco";
				
			}
			$stmt = $conn->prepare("select *from pessoa order by nome"); 
	        $stmt->execute(); 
	        $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
	        return $result; 
		}
	}
 ?>