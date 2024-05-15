<?php
	require 'conexao_db.php';
	require 'classe_tarefas.php';
	require 'classe_dbHelper.php';
	
	$acao=(isset($_GET['acao'])) ? $_GET['acao'] : $acao;

	if($acao=='inserir'){
		$tarefa=new Tarefas();
		$tarefa->__set('tarefa', $_POST['tarefa']);
		DbHelper::inserir($tarefa);
		header('Location: nova_tarefa.php?retorno=cadastrado');
	}else if ($acao=='atualizar') {
		$tarefa=new Tarefas();
		$tarefa->__set('id',$_POST['id']);
		$tarefa->__set('tarefa',$_POST['tarefaAtualizada']);
		DbHelper::atualizarTarefa($tarefa);
		if ($_POST['pagina']=='todas_tarefas') {
			header('Location: todas_tarefas.php');
		}else{
			header('Location:../index.php');
		}

	}else if ($acao=='recuperarTudo') {
		$tarefas=DbHelper::lerTudo();
	}else if ($acao=='recuperarPendentes') {
		$tarefas=DbHelper::lerPendentes();
	}else if ($acao=='remover') {
		$tarefa=new Tarefas();
		$tarefa->__set('id', $_GET['id']);
		DbHelper::deletar($tarefa);
		if ($_GET['pagina']=='todas_tarefas') {
			header('Location:todas_tarefas.php');
		}else{
			header('Location:../index.php');
		}
	}else if ($acao=='marcarCumprida') {
		$tarefa=new Tarefas();
		$tarefa->__set('id', $_GET['id']);
		DbHelper::atualizarStatus($tarefa);
		if ($_GET['pagina']=='todas_tarefas') {
			header('Location: Todas_tarefas.php');
		}else{
			header('Location:../index.php');
		}
		
	}
?>