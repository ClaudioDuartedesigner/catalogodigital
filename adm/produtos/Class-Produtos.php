<?php 

class produtos extends Conn
{
	public $conn;

/***********************************************************/
/*****************CREATE CATEGORIAS  **********************/
/***********************************************************/

	public function createprodutos()
	{
		$this->conn = $this->connect();

		$salvar = filter_input(INPUT_POST, 'salvar', FILTER_SANITIZE_STRING);

		//verificar se clicou no botão
		if($salvar) {

			$get_titulo = $_GET['get_titulo'];
			$id_subcategoria = filter_input(INPUT_POST, 'id_subcategoria', FILTER_SANITIZE_STRING);
			$titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
			$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
			$local = filter_input(INPUT_POST, 'local', FILTER_SANITIZE_STRING);
			$imagem = $_FILES['imagem']['name'];	
			$local = filter_input(INPUT_POST, 'local', FILTER_SANITIZE_STRING);
			$whatsapp = filter_input(INPUT_POST, 'whatsapp', FILTER_SANITIZE_STRING);
			$link_catalogo = filter_input(INPUT_POST, 'link_catalogo', FILTER_SANITIZE_STRING);
			
			
			$sql = $this->connect->prepare("INSERT INTO produtos (titulo, descricao, imagem, local, id_subcategoria, whatsapp, link_catalogo) VALUES (:titulo, :descricao, :imagem, :local, :id_subcategoria, :whatsapp, :link_catalogo)");
			$sql->bindValue(":titulo",$titulo);
			$sql->bindValue(":descricao",$descricao);
			$sql->bindValue(":imagem",$imagem);
			$sql->bindValue(":local",$local);
			$sql->bindValue(":id_subcategoria",$id_subcategoria);
			$sql->bindValue(":whatsapp",$whatsapp);
			$sql->bindValue(":link_catalogo",$link_catalogo);
			if ($sql->execute()) {
				//pegar o ultimo registro
				$ultimo_id = $this->connect->lastInsertId();

				$diretorio = "../../img/categorias/subcategorias/produtos/" . $ultimo_id .'/';

				//criar uma pasta
				mkdir($diretorio, 0755);

				if(move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$imagem)){

					header("location: ./List-Produtos.php?id=$id_subcategoria&get_titulo=$get_titulo");

				}else{

					header("location: ./List-Produtos.php?id=$id_subcategoria&get_titulo=$get_titulo");
				}
			}
		}
	
		return true;
	}



/***********************************************************/
/***************** UPDATE CATEGORIAS  **********************/
/***********************************************************/

	public function updateProdutos(){

		//fazer a conexão com a classe do banco de dados
	
		$this->conn = $this->connect();

		$id_get=$_GET['id'];
		$get_titulo=$_GET['get_titulo'];
		$get_cat=$_GET['get_cat'];
		//pegar o id que vem do GET e outros campos que estão no formulário
		$id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
		$titulo = addslashes($_POST['titulo']);
		$descricao = addslashes($_POST['descricao']);
		$local = addslashes($_POST['local']);
		$whatsapp = addslashes($_POST['whatsapp']);
		$link_catalogo = addslashes($_POST['link_catalogo']);

		
		$sql = $this->connect->prepare("UPDATE produtos SET id = :id, titulo = :titulo, descricao = :descricao, local = :local, whatsapp = :whatsapp, link_catalogo = :link_catalogo WHERE (id = :id)");
		
		$sql->bindValue(":id",$id);
		$sql->bindValue(":titulo",$titulo);
		$sql->bindValue(":descricao",$descricao);
		$sql->bindValue(":local",$local);
		$sql->bindValue(":whatsapp",$whatsapp);
		$sql->bindValue(":link_catalogo",$link_catalogo);

		$sql->execute();
		header("location: ./List-Produtos.php?id=$get_cat&get_titulo=$get_titulo");
		return true;
		
		}

	public function updateProdutoImagem(){

		$this->conn = $this->connect();

		$get_titulo = $_GET['get_titulo'];
		$get_cat = $_GET['get_cat'];

		$id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
		$imagem = addslashes($_FILES['imagem']['name']);
		$id_subcategoria = addslashes($_POST['id_subcategoria']);

		$sql = $this->connect->prepare("UPDATE produtos SET id = :id, imagem = :imagem WHERE (id = :id)");
		
		$sql->bindValue(":id",$id);
		$sql->bindValue(":imagem",$imagem);
		$sql->execute();
		header("location: ./List-Produtos.php?id=$get_cat&get_titulo=$get_titulo&get_cat=$get_cat");
		return true;

	}



/***********************************************************/
/*****************LIST SUBCATEGORIAS  **********************/
/***********************************************************/

	public function listSubCategorias(){

		$this->conn = $this->connect();

		$query = "SELECT * FROM subcategorias";
		$result = $this->connect->prepare($query);
		$result->execute();
		return $result->fetchAll();
	}

	public function listProdutosId(){

		$id_get = $_GET['id'];

		$this->conn = $this->connect();

		$query = "SELECT * FROM produtos WHERE id_subcategoria='$id_get'";
		$result = $this->connect->prepare($query);
		$result->execute();
		return $result->fetchAll();
	}
	
	
	
	public function listProdutosIdUp(){

		$id_get = $_GET['id'];

		$this->conn = $this->connect();

		$query = "SELECT * FROM produtos WHERE id='$id_get'";
		$result = $this->connect->prepare($query);
		$result->execute();
		return $result->fetchAll();
	}

/***********************************************************/
/*****************LIST CATEGORIAS  **********************/
/***********************************************************/

	public function deleteProduto(){

		$this->conn = $this->connect();
		$get_titulo = $_GET['get_titulo'];
		$get_cat = $_GET['get_cat'];

		$id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);

		$id_categoria = addslashes($_POST['id_subcategoria']);
		
		$sql = $this->connect->prepare("DELETE FROM produtos WHERE (id = :id)");
		
		$sql->bindValue(":id",$id);
		$sql->execute();
		header("location: ./List-Produtos.php?id=$get_cat&get_titulo=$get_titulo");
		return true;
	}


}

?>