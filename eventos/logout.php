<?php
session_start();

//Destroi as sessões
unset($_SESSION['id']);
unset($_SESSION['nome']);
unset($_SESSION['cpf']);
unset($_SESSION['email']);
unset($_SESSION['endereco']);

session_destroy();

//REDIRECIONA PARA A TELA DE LOGIN
header("Location: login.php");
