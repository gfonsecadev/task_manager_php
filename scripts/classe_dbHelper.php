<?php

	class DbHelper{
		public static function inserir(Tarefas $tarefa){
			$conexao=Conexao::conectar();
			if ($conexao) {

				$query="INSERT INTO tb_tarefas(tarefa)Values(:tarefa)";
				$statement=$conexao->prepare($query);
				$statement->bindValue(':tarefa', $tarefa->__get('tarefa'));
				$statement->execute();
			}
		}

		public static function atualizarTarefa(Tarefas $tarefa){
			$conexao=Conexao::conectar();
			if ($conexao) {

				$query="UPDATE tb_tarefas SET tarefa=:tarefa WHERE id=:id";
				$statement=$conexao->prepare($query);
				$statement->bindValue(':tarefa', $tarefa->__get('tarefa'));
				$statement->bindValue(':id', $tarefa->__get('id'));
				$statement->execute();
			}
		}

		public static function atualizarStatus(Tarefas $tarefa){
			$conexao=Conexao::conectar();
			if ($conexao) {

				$query="UPDATE tb_tarefas SET id_status=2 WHERE id=:id";
				$statement=$conexao->prepare($query);
				$statement->bindValue(':id', $tarefa->__get('id'));
				$statement->execute();
			}
		}


		public static function lerTudo(){
			$conexao=Conexao::conectar();
			if ($conexao) {

				$query="SELECT A.id, A.tarefa, S.status FROM `tb_tarefas` AS A LEFT JOIN tb_status AS S ON(A.id_status=S.id)";
				$statement=$conexao->prepare($query);
				$statement->execute();
				return $statement->fetchAll(PDO::FETCH_OBJ);

			}
		}

		public static function lerPendentes(){
			$conexao=Conexao::conectar();
			if ($conexao) {

				$query="SELECT A.id, A.tarefa, S.status FROM `tb_tarefas` AS A LEFT JOIN tb_status AS S ON(A.id_status=S.id) WHERE A.id_status=1";
				$statement=$conexao->prepare($query);
				$statement->execute();
				return $statement->fetchAll(PDO::FETCH_OBJ);

			}
		}

		public static function deletar(Tarefas $tarefa){
			$conexao=Conexao::conectar();
			if ($conexao) {

				$query="DELETE FROM tb_tarefas WHERE id=:id";
				$statement=$conexao->prepare($query);
				$statement->bindValue(':id', $tarefa->__get('id'));
				$statement->execute();
			}
		}


	}

?>