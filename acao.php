<?php

	include_once("conexao.php");
	require("classes.class.php");
	
	$titulo     = $_POST['titulo'];
	$descricao  = $_POST['descricao'];
	$datainicio = $_POST['datainicio'];
	$datafinal  = $_POST['datafinal'];
    $enviar1    = $_POST['enviar1'];
	
	$excluir    = $_POST['excluir'];
    $enviar2    = $_POST['enviar2'];
	
	if($_POST["enviar1"]=="ADICIONAR")
	{	
		echo "estou aqui";
		(new FuncUser)->adincionaTerefa($titulo, $descricao, $datainicio, $datafinal, $conn);
	}
	
	if($_POST["enviar2"]=="EXCLUIR")
	{	
		$sql = "SELECT * FROM `agenda_tarefas` WHERE id = $excluir;";
		$result = (new Conexao)->conect($conn, $sql);
		$vali = (new FuncUser)->verificaValidade($result);
		
		(new FuncUser)->excluiTarefa($excluir, $conn, $vali);
	}