<?php
session_start();

//criando o recurso cURL
$cr = curl_init();

//definindo a url de busca
$params = "email=". $_POST['email'] . "&senha=" . $_POST['senha'] ;
curl_setopt($cr, CURLOPT_URL, 'http://localhost/api-eventos/api/usuario/login.php'.'?'.$params);

//definindo a url de busca
curl_setopt($cr, CURLOPT_RETURNTRANSFER, true);

//definindo uma variável para receber o conteúdo da página...
$retorno = curl_exec($cr);
$retorno = json_decode($retorno);

//fechando-o para liberação do sistema.
curl_close($cr); //fechamos o recurso e liberamos o sistema...

if($retorno->message == "Usuário inválido"){
    exit(header("location:login.php?loginFailed=true"));
}

//gravando informações nas variáveis para uso posterior
$_SESSION['id'] = $retorno->id;
$_SESSION['nome'] = $retorno->nome;
$_SESSION['cpf'] = $retorno->cpf;
$_SESSION['email'] = $retorno->email;
$_SESSION['endereco'] = $retorno->endereco;

//Redireciona para painel
header("Location: index.php");