<?php

	Class Usuario
	{

		private $pdo;

		public function  conectar($nome,$host,$usuario,$senha)
		{

			global $pdo;
			global $msgErro = "";
				try
				{
				$pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
				}catch (PDOException $e){
					 $msgErro = $e->getMessage()
				}
		}

		public function cadastrar($nome,$cpf,$endereco,$cidade,$data_nascimento,$senha,$email)
		{
			global $pdo;

			//verificar se ja exite cadastrado
			$sql = $pdo->prepare("SELECT idCadastro FROM cadastro_Cliente WHERE email = :email");

			$sql->bindValue(":e",$email);
			$sql->execute();

			if($sql->rowCount() > 0)
			{
				return false; //ja esta casastrada
			}else
			{
				$sql = $pdo->prepare("INSERT INTO cadastro_Cliente(idCarrinho,nome,cpf,data_nascimento,endereco,) VALUES(""));

			}




		}


		public function logar($email,$senha)
		{
			global $pdo;

		}
	}





?>