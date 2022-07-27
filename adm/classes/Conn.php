<?php
/*Duart#2159#cestas*/
abstract class Conn
{
	public $db = "mysql";
	public $host = "localhost";
	public $user = "root";
	public $pass = "";
	public $dbname = "catalogonamaov2";
	public $port = 3306;
	public $connect;

    public function connect()
	{
			
		try{
            $this->connect = new PDO($this->db . ':host=' . $this->host . ';port=' . $this->port . ';dbname=' . $this->dbname, $this->user, $this->pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
			return $this->connect;

			} catch (Exception $ex) {
				Die ('Erro no acesso, entre em contato com o administrador');
		}			
	}
}

?>