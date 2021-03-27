<?php

namespace iks\Model;

use \iks\DB\Sql;
use \iks\Model;

class bookBorrowed extends Model {

	public static function listBorrowed()
	{

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_books a INNER JOIN tb_borrowed b USING (idbook) ORDER BY idbook");

	}

	public function saveBorrowed()
	{

		$sql = new Sql();

		$results = $sql->select("SELECT idbook FROM tb_books WHERE idbook = :idbook", array(
			":idbook"=>$this->getidbook()
		));

		if (!count($results) == 0) {

			$sql->query("CALL sp_borrowed_save (:idbook, :desname, :dtreturn)", array(
				":idbook"=>$this->getidbook(),
				":desname"=>$this->getdesname(),
				":dtreturn"=>$this->getdtreturn()
			));

		}
			
		else {
			throw new \Exception("Book ID does not exist!");
		}
			
	}

	public function updateBorrowed()
	{

		$sql = new Sql();

		$sql->query("UPDATE tb_borrowed SET desname = :desname, dtreturn = :dtreturn WHERE idbook = :idbook", array(
			":idbook"=>$this->getidbook(),
			":desname"=>$this->getdesname(),
			":dtreturn"=>$this->getdtreturn()
		));

	}

	public function deleteBorrowed()
	{

		$sql = new Sql();

		$sql->query("CALL sp_delete_borrowed (:idbook)", array(
			":idbook"=>$this->getidbook()
		));

	}

	public function getBorrowed($idbook)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_borrowed WHERE idbook = :idbook", array(
			":idbook"=>$idbook
		));

		$this->setData($results[0]);

	}

}

?>