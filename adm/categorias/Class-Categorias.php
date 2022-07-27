<?php 

class Categorias extends Conn
{
	public $conn;

/***********************************************************/
/*****************CREATE CATEGORIAS  **********************/
/***********************************************************/

	public function createCategoria()
	{
		$this->conn = $this->connect();

		$salvar = filter_input(INPUT_POST, 'salvar', FILTER_SANITIZE_STRING);

		//verificar se clicou no botão
		if($salvar) {
			$titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
			$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
			$imagem = $_FILES['imagem']['name'];	

			
			$sql = $this->connect->prepare("INSERT INTO categorias (titulo, descricao, imagem) VALUES (:titulo, :descricao, :imagem)");
			$sql->bindValue(":titulo",$titulo);
			$sql->bindValue(":descricao",$descricao);
			$sql->bindValue(":imagem",$imagem);

			if ($sql->execute()) {
				//pegar o ultimo registro
				$ultimo_id = $this->connect->lastInsertId();

				$diretorio = "../../img/categorias/" . $ultimo_id .'/';

				//criar uma pasta
				mkdir($diretorio, 0755);

				if(move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$imagem)){

					header("location: ./List-Categorias.php");

				}else{

					header("location: ./List-Categorias.php");
				}
			}
		}
	
		return true;
	}



/***********************************************************/
/***************** UPDATE CATEGORIAS  **********************/
/***********************************************************/

	public function updateCategoria(){

		//fazer a conexão com a classe do banco de dados
		$this->conn = $this->connect();

		//pegar o id que vem do GET e outros campos que estão no formulário
		$id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
		$titulo = addslashes($_POST['titulo']);
		$descricao = addslashes($_POST['descricao']);
		
		$sql = $this->connect->prepare("UPDATE categorias SET id = :id, titulo = :titulo, descricao = :descricao WHERE (id = :id)");
		
		$sql->bindValue(":id",$id);
		$sql->bindValue(":titulo",$titulo);
		$sql->bindValue(":descricao",$descricao);
		$sql->execute();
		header("location: ./List-Categorias.php");
		return true;
		
		}

	public function updateCategoriaImagem(){

		$this->conn = $this->connect();

		$id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
		$imagem = addslashes($_FILES['imagem']['name']);

		$sql = $this->connect->prepare("UPDATE categorias SET id = :id, imagem = :imagem WHERE (id = :id)");
		
		$sql->bindValue(":id",$id);
		$sql->bindValue(":imagem",$imagem);
		$sql->execute();
		header("location: ./List-Categorias.php");
		return true;

	}



/***********************************************************/
/*****************LIST CATEGORIAS  **********************/
/***********************************************************/

	public function listCategorias(){

		$this->conn = $this->connect();

		$query = "SELECT * FROM categorias";
		$result = $this->connect->prepare($query);
		$result->execute();
		return $result->fetchAll();
	}

	public function listCategoriasId(){

		$id_get = $_GET['id'];

		$this->conn = $this->connect();

		$query = "SELECT * FROM categorias WHERE id='$id_get'";
		$result = $this->connect->prepare($query);
		$result->execute();
		return $result->fetchAll();
	}

	
/***********************************************************/
/*****************LIST CATEGORIAS  **********************/
/***********************************************************/

	public function deleteCategoria(){

		$this->conn = $this->connect();

		$id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
		
		$sql = $this->connect->prepare("DELETE FROM categorias WHERE (id = :id)");
		
		$sql->bindValue(":id",$id);
		$sql->execute();
		header("location: ./List-Categorias.php");
		return true;
	}


}

