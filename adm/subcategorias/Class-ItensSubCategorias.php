<?php 

class itemSubCategorias extends Conn
{
	public $conn;

/***********************************************************/
/*****************CREATE CATEGORIAS  **********************/
/***********************************************************/

	public function createItemSubCategoria()
	{
		$this->conn = $this->connect();

		$salvar = filter_input(INPUT_POST, 'salvar', FILTER_SANITIZE_STRING);

		//verificar se clicou no botão
		if($salvar) {
			$id_subcategoria = filter_input(INPUT_POST, 'id_subcategoria', FILTER_SANITIZE_STRING);
			$item = filter_input(INPUT_POST, 'item', FILTER_SANITIZE_STRING);
			
			$sql = $this->connect->prepare("INSERT INTO itens_subcategorias (item, id_subcategoria) VALUES (:item, :id_subcategoria)");
			$sql->bindValue(":item",$item);
			$sql->bindValue(":id_subcategoria",$id_subcategoria);
			$sql->execute();
			
		}
	
		return true;
	}




/***********************************************************/
/***************** UPDATE CATEGORIAS  **********************/
/***********************************************************/

	public function updateItemSubCategoria(){

		//fazer a conexão com a classe do banco de dados
		$this->conn = $this->connect();

		//pegar o id que vem do GET e outros campos que estão no formulário
	
		$id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
		$id_subcategoria = filter_var($_POST['id_subcategoria']);
		$ordem = filter_var($_POST['ordem']);
		$item = filter_var($_POST['item']);

		$sql = $this->connect->prepare("UPDATE itens_subcategorias SET ordem = :ordem, item = :item WHERE id = $id");

		$sql->bindParam(':ordem', $ordem);
		$sql->bindParam(':item', $item);
		$sql->execute();

		header("location: ./Update-ItensSubCategoria.php?id=$id_subcategoria");
		return true;
		
		}

	
/***********************************************************/
/*****************LIST SUBCATEGORIAS  **********************/
/***********************************************************/

	public function listItemSubCategorias(){

		$this->conn = $this->connect();

		$query = "SELECT * FROM subcategorias";
		$result = $this->connect->prepare($query);
		$result->execute();
		return $result->fetchAll();
	}

	public function listItemSubCategoriasId(){

		$this->conn = $this->connect();

		$id_get = $_GET['id'];

		$query = "SELECT * FROM itens_subcategorias WHERE id_subcategoria='$id_get' ORDER BY ordem";
		$result = $this->connect->prepare($query);
		$result->execute();
		return $result->fetchAll();
	}

	public function listItemSubCategoriasIdList(){

		$this->conn = $this->connect();

		$id_get = $_GET['id'];

		$query = "SELECT * FROM itens_subcategorias WHERE id_subcategoria='$id_get' ORDER BY ordem";
		$result = $this->connect->prepare($query);
		$result->execute();
		return $result->fetchAll();
	}

	
	
/***********************************************************/
/*****************LIST CATEGORIAS  **********************/
/***********************************************************/

	public function deleteItemSubCategoria(){

		$this->conn = $this->connect();

		$id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);

		$id_categoria = addslashes($_POST['id_categoria']);
		
		$sql = $this->connect->prepare("DELETE FROM itens_subcategorias WHERE (id = :id)");
		
		$sql->bindValue(":id",$id);
		$sql->execute();
		header("location: ./List-SubCategorias.php?id=$id_categoria");
		return true;
	}


}

