<?php
	class Tarefas{
		private $id;
		private $status;
		private $tarefa;
		private $data;


		public function __get($atributo){
			return $this->$atributo;
		}

		public function __set($atributo,$valor){
			$this->$atributo=$valor;
		}
	}

?>