<?php

namespace iks;

use Rain\Tpl;

class Page {

	private $tpl;

	public function __construct(){

		$config = array(
			"tpl_dir"       => $_SERVER["DOCUMENT_ROOT"]."/views/",
			"cache_dir"     => $_SERVER["DOCUMENT_ROOT"]."/views-cache/",
			"debug"         => false // set to false to improve the speed
	   );

		Tpl::configure( $config );

		$this->tpl = new Tpl;

	}

	public function setTpl($name, $data = array(), $returnHTML = false)
	{

		foreach ($data as $key => $value) {
			$this->tpl->assign($key, $value);
		}

		$this->tpl->draw($name, $returnHTML);

	}

}

?>