<?php

namespace iks\Model;

use \iks\DB\Sql;
use \iks\Model;


class Book extends Model {

	public static function listAll()
	{

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_books ORDER BY idbook");

	}

	public function save() // Calling procedure sp_book_save -> Inserts and then returns array (INSERT INTO... SELECT * FROM ...)
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_book_save(:destitle, :desauthor, :descategory)", array(
			":destitle"=>$this->getdestitle(),
			":desauthor"=>$this->getdesauthor(),
			":descategory"=>$this->getdescategory()
		));

		$this->setData($results[0]); // sets insert into $values in case data will be used next

	}

	public function update() 
	{

		$sql = new Sql();

		$sql->query("UPDATE tb_books SET idbook = :idbook, destitle = :destitle, desauthor = :desauthor, descategory = :descategory WHERE idbook = :idbook", array(
			":idbook"=>$this->getidbook(),
			":destitle"=>$this->getdestitle(),
			":desauthor"=>$this->getdesauthor(),
			":descategory"=>$this->getdescategory()
		));

	}

	public function delete()
	{

		$sql = new Sql();

		$sql->query("DELETE FROM tb_books WHERE idbook = :idbook", array(
			":idbook"=>$this->getidbook()
		));

	}
}

?>