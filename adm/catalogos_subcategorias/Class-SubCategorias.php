<?php 

class subCategorias extends Conn
{
	public $conn;

/***********************************************************/
/*****************CREATE CATEGORIAS  **********************/
/***********************************************************/

	public function createSubCategoria()
	{
		$this->conn = $this->connect();

		$salvar = filter_input(INPUT_POST, 'salvar', FILTER_SANITIZE_STRING);

		//verificar se clicou no botão
		if($salvar) {

			$get_titulo = $_GET['get_titulo'];
			$id_categoria = filter_input(INPUT_POST, 'id_categoria', FILTER_SANITIZE_STRING);
			$titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
			$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
			$valor = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_STRING);
			$imagem = $_FILES['imagem']['name'];	
			$valor = str_replace(',', '.', $valor);
			
			$sql = $this->connect->prepare("INSERT INTO catalogos_subcategorias (titulo, descricao, imagem, valor, id_categoria) VALUES (:titulo, :descricao, :imagem, :valor, :id_categoria)");
			$sql->bindValue(":titulo",$titulo);
			$sql->bindValue(":descricao",$descricao);
			$sql->bindValue(":imagem",$imagem);
			$sql->bindValue(":valor",$valor);
			$sql->bindValue(":id_categoria",$id_categoria);
			
			if ($sql->execute()) {
				//pegar o ultimo registro
				$ultimo_id = $this->connect->lastInsertId();

				$diretorio = "../../img/catalogos_categorias/subcategorias/" . $ultimo_id .'/';

				//criar uma pasta
				mkdir($diretorio, 0755);

				if(move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$imagem)){

					header("location: ./List-SubCategorias.php?id=$id_categoria&get_titulo=$get_titulo");

				}else{

					header("location: ./List-SubCategorias.php?id=$id_categoria&get_titulo=$get_titulo");
				}
			}
		}
	
		return true;
	}



/***********************************************************/
/***************** UPDATE CATEGORIAS  **********************/
/***********************************************************/

	public function updateSubCategoria(){

		//fazer a conexão com a classe do banco de dados
	
		$this->conn = $this->connect();

		$id_get=$_GET['id'];
		$get_titulo=$_GET['get_titulo'];
		$get_cat=$_GET['get_cat'];
		//pegar o id que vem do GET e outros campos que estão no formulário
		$id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
		$titulo = addslashes($_POST['titulo']);
		$descricao = addslashes($_POST['descricao']);
		$valor = addslashes($_POST['valor']);
		$id_categoria = addslashes($_POST['id_categoria']);
		
		$sql = $this->connect->prepare("UPDATE catalogos_subcategorias SET id = :id, titulo = :titulo, descricao = :descricao, valor = :valor WHERE (id = :id)");
		
		$sql->bindValue(":id",$id);
		$sql->bindValue(":titulo",$titulo);
		$sql->bindValue(":descricao",$descricao);
		$sql->bindValue(":valor",$valor);
		$sql->execute();
		header("location: ../subcategorias/List-SubCategorias.php?id=$get_cat&get_titulo=$get_titulo");
		return true;
		
		}

	public function updateSubCategoriaImagem(){

		$this->conn = $this->connect();

		$get_titulo = $_GET['get_titulo'];
		$get_cat = $_GET['get_cat'];

		$id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
		$imagem = addslashes($_FILES['imagem']['name']);
		$id_categoria = addslashes($_POST['id_categoria']);

		$sql = $this->connect->prepare("UPDATE catalogos_subcategorias SET id = :id, imagem = :imagem WHERE (id = :id)");
		
		$sql->bindValue(":id",$id);
		$sql->bindValue(":imagem",$imagem);
		$sql->execute();
		header("location: ./List-SubCategorias.php?id=$get_cat&get_titulo=$get_titulo&get_cat=$get_cat");
		return true;

	}



/***********************************************************/
/*****************LIST SUBCATEGORIAS  **********************/
/***********************************************************/

	public function listSubCategorias(){

		$this->conn = $this->connect();

		$query = "SELECT * FROM catalogos_subcategorias";
		$result = $this->connect->prepare($query);
		$result->execute();
		return $result->fetchAll();
	}

	public function listSubCategoriasId(){

		$id_get = $_GET['id'];

		$this->conn = $this->connect();

		$query = "SELECT * FROM catalogos_subcategorias WHERE id_categoria='$id_get'";
		$result = $this->connect->prepare($query);
		$result->execute();
		return $result->fetchAll();
	}
	
	
	
	public function listSubCategoriasIdUp(){

		$id_get = $_GET['id'];

		$this->conn = $this->connect();

		$query = "SELECT * FROM catalogos_subcategorias WHERE id='$id_get'";
		$result = $this->connect->prepare($query);
		$result->execute();
		return $result->fetchAll();
	}

    
/***********************************************************/
/*****************LIST CATEGORIAS  **********************/
/***********************************************************/

	public function deleteSubCategoria(){

		$this->conn = $this->connect();

		$id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);

		$id_categoria = addslashes($_POST['id_categoria']);
		
		$sql = $this->connect->prepare("DELETE FROM catalogos_subcategorias WHERE (id = :id)");
		
		$sql->bindValue(":id",$id);
		$sql->execute();
		header("location: ./List-SubCategorias.php?id=$id_categoria");
		return true;
	}


}

?>