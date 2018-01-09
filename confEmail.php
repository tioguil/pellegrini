<?php

	$nome = addslashes($_POST['nome']);
	$email = addslashes($_POST['email']);
	$fone = addslashes($_POST['fone']);
	$mensagem = addslashes($_POST['mensagem']);
	
	require 'PHPMailer\PHPMailerAutoload.php';
	
	//configurações básicas de endereço e protoloco 
	$mail = new PHPMailer; //faz a instância do objeto PHPMailer
	//$mail->SMTPDebug = true; //habilita o debug se parâmetro for true
	$mail->isSMTP(); //seta o tipo de protocolo
	$mail->Host = 'smtp.gmail.com'; //define o servidor smtp
	$mail->SMTPAuth = true; //habilita a autenticação via smtp
	$mail->SMTPOptions = [ 'ssl' => [ 'verify_peer' => false ] ];
	$mail->SMTPSecure = 'tls'; //tipo de segurança
	$mail->Port = 587; //porta de conexão
	
	//dados de autenticação no servidor smtp
	$mail->Username = 'opinowltda@gmail.com'; //usuário do smtp (email cadastrado no servidor)
	$mail->Password = 'nilone123456'; //senha ****CUIDADO PARA NÃO EXPOR ESSA INFORMAÇÃO NA INTERNET OU NO FÓRUM DE DÚVIDAS DO CURSO****
	
	//dados de envio de e-mail
	$mail->addAddress('opinowltda@gmail.com', 'opinowltda'); //e-mails que receberam a mesagem
	
	//configuração da mensagem
	$mail->isHTML(true); //formato da mensagem de e-mail
	$mail->Subject = 'Contato pelo site'; //assunto
	$mail->Body    = '<b> Contato realizado pelo site </b> <br><br>
					  <b> Nome: </b>'.$nome.'
					  <br><b> Email: </b>'.$email.'
					  <br><b> Telefone: </b>'.$fone.'
					  <br><b> Mensagem </b><br>'.$mensagem; //Se o formato da mensagem for HTML você poderá utilizar as tags do HTML no corpo do e-mail
	
	//$mail->AltBody = 'Caso não seja suportado o HTML, aqui vai a mensagem em texto'; //texto alternativo caso o html não seja suportado
	
	//envio e testes
	if(!$mail->send()) { //Neste momento duas ações são feitas, primeiro o send() (envio da mensagem) que retorna true ou false, se retornar false (não enviado) juntamente com o operador de negação "!" entra no bloco if.
		echo 'A mensagem não pode ser enviada, por favor tente mais tarde ou envie um email para  ';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
		echo 'Sua mensagem foi recebida com sucesso, em breve entraremos em contato!';
	}
?>