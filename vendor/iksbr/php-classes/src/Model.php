<?php

namespace iks;

use iks\DB\Sql;

class Model {

	private $values = [];

	public function __call($name, $args = array()) // Setting getters and setters dynamically
	{

		$method = substr($name, 0, 3);
		$fieldname = substr($name, 3, strlen($name));

		switch ($method)
		{

			case "get":
				return $this->values[$fieldname];
			break;

			case "set":
				$this->values[$fieldname] = $args[0];
			break;

		}

	}

	public function setData($data = array())
	{

		foreach ($data as $key => $value) {
			
			$this->{"set".$key}($value);

		}

	}

	public function getValues()
	{

		return $this->values;

	}

	public function get($idbook)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_books WHERE idbook = :idbook", array(
			":idbook"=>$idbook
		));

		$this->setData($results[0]);

	}

}

?>