<?php 

	$nome = $_POST['nome']; 
    $nasc = $_POST['dtNascimento'];
    $rg = $_POST['rg'];
    $cpf = $_POST['cpf'];
    $tel = $_POST['telefone'];
    $email = $_POST['email'];

    try {
    	$conn = new PDO("mysql:dbname=cadastro;host=localhost","root","123456");
    } catch (Exception $e) {
    	echo "Erro de conexão com o Banco";
    	
    }

	if(isset($_POST['salvar'])){
        $stmt = $conn->prepare("insert into pessoa(nome,nascimento,rg,cpf,telefone,email)
                                    values (:NOME,:NASC,:RG,:CPF,:TEL,:EMAIL)"); 
        $stmt->bindParam(":NOME",$nome); 
        $stmt->bindParam(":NASC",$nasc); 
        $stmt->bindParam(":RG",$rg);
        $stmt->bindParam(":CPF",$cpf);
        $stmt->bindParam(":TEL",$tel);
        $stmt->bindParam(":EMAIL",$email);

        if($stmt->execute()){
            echo "Dados inseridos com sucesso";
        }
        else {
            echo "Erro na inserção"; 
         } 
	}

    else if (isset($_POST['listar'])) {
    	$stmt = $conn->prepare("select *from pessoa order by nome"); 

        $stmt->execute(); 
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 

        foreach ($result as $row) {
            echo "<br/>"; 
            foreach ($row as $key => $value) {
               echo "<b>".$key .": </b>".$value ."<br/>"; 
            }
            
            echo "==============================================="; 
        }
    }


    function listar(){

        $stmt = $conn->prepare("select *from pessoa order by nome"); 

        $stmt->execute(); 
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 

        foreach ($result as $row) {
            echo "<br/>"; 
            foreach ($row as $key => $value) {
               echo "<b>".$key .": </b>".$value ."<br/>"; 
            }
            
            echo "==============================================="; 
        }
    }
    
 ?>