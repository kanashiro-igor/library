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

	public static function listBorrowed()
	{

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_books a INNER JOIN tb_borrowed b USING (idbook) ORDER BY idbook");

	}

	public function save() // Calling procedure sp_book_save -> Inserts and then returns array (INSERT INTO... SELECT * FROM ...)
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_book_save(:destitle, :desauthor, :descategory)", array(
			":destitle"=>$this->getdestitle(),
			":desauthor"=>$this->getdesauthor(),
			":descategory"=>$this->getdescategory()
		));

		$this->setData($results[0]);

	}

	public function get($idbook)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_books WHERE idbook = :idbook", array(
			":idbook"=>$idbook
		));

		$this->setData($results[0]);

	}

	public function update() 
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_booksupdate_save(:idbook, :destitle, :desauthor, :descategory)", array(
			":idbook"=>$this->getidbook(),
			":destitle"=>$this->getdestitle(),
			":desauthor"=>$this->getdesauthor(),
			":descategory"=>$this->getdescategory()
		));

		$this->setData($results[0]);

	}
}

?>