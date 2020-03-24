<?php

session_start();

class Conexao 
{

	public function conect($conn, $sql) 
	{
		$array = mysqli_query($conn, $sql) or die("Deu Ruim");
		$array = mysqli_fetch_array($array);

		return $array;
	}	
}

class FuncUser extends Conexao
{	
	public function verificaValidade($array) 
	{
		if ($array['0'] == null)
			//nao tem registro
		{
			return 0;
		}
		else
		{
			//tem registro
			return 1;
		}
	}
	
	public function adincionaTerefa($titulo, $descricao, $datainicio, $datafinal, $conn) 
	{
		$sql = "INSERT INTO `agenda_tarefas`(`titulo`, `descricao`, `data_inicio`, `data_final`) VALUES ('$titulo' ,'$descricao' ,'$datainicio' ,'$datafinal');";
		$result = (new Conexao)->conect($conn, $sql);
		echo"<script language='javascript' type='text/javascript'> alert('Sua tarfa foi adicionada com sucesso');window.location.href='index.php';</script>";
	}
	
	public function excluiTarefa($codigo, $conn, $vali) 
	{
		if ($vali == 0)
		{
			echo"<script language='javascript' type='text/javascript'> alert('livro nao encontrado');window.location.href='index.php';</script>";	
		}
		else
		{	
			$sql = "DELETE FROM `agenda_tarefas` WHERE `id` = $codigo;";
			$result = (new Conexao)->conect($conn, $sql);
			echo"<script language='javascript' type='text/javascript'> alert('Tarefa excluida com sucesso');window.location.href='index.php';</script>";
		}
	}
}