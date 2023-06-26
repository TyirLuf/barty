<?php
    /*
		Título da função que exibe o título da página caso a página tenha a variável $pageTitle,
		e exibe o título padrão para outras páginas.
	*/
	function getTitle()
	{
		global $pageTitle;
		if(isset($pageTitle))
			echo $pageTitle." | Barbershop Website";
		else
			echo "Barbershop Website";
	}

	/*
		Essa função retorna o número de itens em uma determinada tabela.
	*/

    function countItems($item, $table)
	{
		global $conn;
		$query = "SELECT COUNT($item) FROM $table";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_array($result);
		$count = $row[0];
		
		return $count;
	}

    /*
	
	** Função de verificação de itens
	** Função para verificar um item no banco de dados [Função com parâmetros]
	** $select = o item a ser selecionado [Exemplo: usuário, item, categoria]
	** $from = a tabela a ser selecionada [Exemplo: usuários, itens, categorias]
	** $value = o valor do item a ser selecionado [Exemplo: Ossama, Box, Electronics]

	*/
	function checkItem($select, $from, $value)
	{
		global $conn;
		$query = "SELECT $select FROM $from WHERE $select = ? ";
		$statement = mysqli_prepare($conn, $query);
		mysqli_stmt_bind_param($statement, "s", $value);
		mysqli_stmt_execute($statement);
		mysqli_stmt_store_result($statement);
		$count = mysqli_stmt_num_rows($statement);
		
		return $count;
	}

  	/*
    	==============================================
    	FUNÇÃO DE TESTE DE INPUT, USADA PARA SANITIZAR ENTRADAS DO USUÁRIO
    	E REMOVER CARACTERES SUSPEITOS E ESPAÇOS EXTRAS
    	==============================================
	*/

  	function test_input($data) 
  	{
      	$data = trim($data);
      	$data = stripslashes($data);
      	$data = htmlspecialchars($data);
      	return $data;
  	}

?>
