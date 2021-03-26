<?php
session_start();
require_once("vendor/autoload.php");

use \Slim\Slim;
use \iks\Page;
use \iks\Model\User;
use \iks\Model\Book;

$app = new Slim();

$app->config('debug', true);

$app->get('/', function(){ // Login Screen

	$page = new Page();

	$page->setTpl("index");

});

$app->post('/', function(){ // Login Screen Check

	User::login($_POST["login"], $_POST["password"]);

	header("Location: /menu");
	exit;

});

$app->get('/menu', function() { // Menu listing books

	User::verifyLogin();

	$books = Book::listAll();

	$page = new Page();

	$page->setTpl("menu", array(
		"books"=>$books
	));

});

$app->get('/menu/logout', function(){ // Logout out button
	
	User::logout();

	header("Location: /");
	exit;

});

$app->get("/menu/register-update/:idbook", function($idbook){ // Edit a book

	User::verifyLogin();

	$books = new Book();

	$books->get((int)$idbook);

	$page = new Page();

	$page->setTpl("register-update", array(
		"books"=>$books->getValues()
	));
});

$app->post("/menu/register-update/:idbook", function($idbook){ // Updating a book !! VER POR QUE ESTA MUDANDO TODOS REGISTROS !!

	User::verifyLogin();

	$books = new Book();

	$books->get((int)$idbook);

	$books->setData($_POST);

	$books->update();

	header("Location: /menu");
	exit;

});

$app->post("/menu/register", function(){ // Creating a new book

	User::verifyLogin();

	$book = new Book();

	$book->setData($_POST);

	$book->save();

	header("Location: /menu");
	exit;

});

$app->get("/menu/register", function(){ // Register new book

	User::verifyLogin();

	$page = new Page();

	$page->setTpl("register");

});

$app->get('/menu/borrowed', function(){ // Register new borrowed book

	User::verifyLogin();

	$page = new Page();

	$page->setTpl("borrowed");

});

$app->post("/menu/borrowed", function(){ // Creating a new borrowed book

	User::verifyLogin();

	$book = new Book();

	$book->setData($_POST);

	var_dump($book); // --> criar e chamar metodo criacao livros emprestados com condicionais


});

$app->get('/menu/list', function(){ // Lists all borrowed books

	User::verifyLogin();

	$borrowed = Book::listBorrowed();

	$page = new Page();

	$page->setTpl("list", array(
		"borrowed"=>$borrowed
	));

});

$app->get('/menu/list-update/:idbook', function($idbook){ // Edit a borrowed book

	User::verifyLogin();

	$page = new Page();

	$page->setTpl('list-update');

});

$app->post("/menu/list-update/:idbook", function($idbook){

	User::verifyLogin();

	$books = new Book();

	$books->getBorrowed((int)$idbook);

	$books->setData($_POST);

	$books->updateBorrowed();

	header("Location: menu/list");
	exit;

});

$app->run();

?>
