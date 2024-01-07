<?php
	class Conexao{
		

		public static function conectar(){
			$local='localhost';
			$nomeBanco='app_tarefas';
			$usuario='root';
			$senha='';
			try {
				
				$conexao=new PDO("mysql:host=$local; dbname=$nomeBanco",$usuario, $senha);
				

				return $conexao;

			} catch (PDOException $e) {
				return "Erro na conexão com o banco Mensagem = $e";
			}
		}
	}
?>