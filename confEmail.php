<?php

	$nome = addslashes($_POST['nome']);
	$email = addslashes($_POST['email']);
	$fone = addslashes($_POST['fone']);
	$mensagem = addslashes($_POST['mensagem']);
	
	require 'PHPMailer\PHPMailerAutoload.php';
	
	//configura��es b�sicas de endere�o e protoloco 
	$mail = new PHPMailer; //faz a inst�ncia do objeto PHPMailer
	//$mail->SMTPDebug = true; //habilita o debug se par�metro for true
	$mail->isSMTP(); //seta o tipo de protocolo
	$mail->Host = 'smtp.gmail.com'; //define o servidor smtp
	$mail->SMTPAuth = true; //habilita a autentica��o via smtp
	$mail->SMTPOptions = [ 'ssl' => [ 'verify_peer' => false ] ];
	$mail->SMTPSecure = 'tls'; //tipo de seguran�a
	$mail->Port = 587; //porta de conex�o
	
	//dados de autentica��o no servidor smtp
	$mail->Username = 'opinowltda@gmail.com'; //usu�rio do smtp (email cadastrado no servidor)
	$mail->Password = 'nilone123456'; //senha ****CUIDADO PARA N�O EXPOR ESSA INFORMA��O NA INTERNET OU NO F�RUM DE D�VIDAS DO CURSO****
	
	//dados de envio de e-mail
	$mail->addAddress('opinowltda@gmail.com', 'opinowltda'); //e-mails que receberam a mesagem
	
	//configura��o da mensagem
	$mail->isHTML(true); //formato da mensagem de e-mail
	$mail->Subject = 'Contato pelo site'; //assunto
	$mail->Body    = '<b> Contato realizado pelo site </b> <br><br>
					  <b> Nome: </b>'.$nome.'
					  <br><b> Email: </b>'.$email.'
					  <br><b> Telefone: </b>'.$fone.'
					  <br><b> Mensagem </b><br>'.$mensagem; //Se o formato da mensagem for HTML voc� poder� utilizar as tags do HTML no corpo do e-mail
	
	//$mail->AltBody = 'Caso n�o seja suportado o HTML, aqui vai a mensagem em texto'; //texto alternativo caso o html n�o seja suportado
	
	//envio e testes
	if(!$mail->send()) { //Neste momento duas a��es s�o feitas, primeiro o send() (envio da mensagem) que retorna true ou false, se retornar false (n�o enviado) juntamente com o operador de nega��o "!" entra no bloco if.
		echo 'A mensagem n�o pode ser enviada, por favor tente mais tarde ou envie um email para  ';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
		echo 'Sua mensagem foi recebida com sucesso, em breve entraremos em contato!';
	}
?>