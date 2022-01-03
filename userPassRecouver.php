<?php



if(isset($_POST['forgotSubmit'])){
    //check whether email is empty
    if(!empty($_POST['email'])){
        //check whether user exists in the database
        $prevCon['where'] = array('email'=>$_POST['email']);
	}
}

include('lib/DB.php');
$sql = "SELECT nome, usuario, email, senha FROM admin_inventario.inventario_usuario where email = '" . $_POST['email'] . "'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$nome    = $row[nome];
		$usuario = $row[usuario];
		$email   = $row[email];
		$senha   = $row[senha];
	}
	
	require_once("PHPMailer_5.2.4/class.phpmailer.php");
	$mail = new PHPMailer();
	$mail->IsHTML(true);
	$mail->IsSMTP();
	$mail->CharSet = 'ISO-8859-1';
	$mail->Host       = "abjinfo.com.br";          // SMTP server example
	$mail->SMTPDebug  = 0;                         // enables SMTP debug information (for testing)
	$mail->SMTPAuth   = true;                      // enable SMTP authentication
	$mail->Port       = 587;                       // set the SMTP port for the GMAIL server
	$mail->Username   = "alberto@abjinfo.com.br";  // SMTP account username example
	$mail->Password   = "ABJ01035913031240";               // SMTP account password example
	$mail->SetFrom('sac@abjinfo.com.br');
	$mail->Subject = 'Solicitacao de Recuperacao de Senha';
	$mail->Body = "Solicita&ccedil;&atilde;o de Recupera&ccedil;&atilde;o de Senha<br>";
	$mail->Body .= "Ol&aacute; " . $nome . "<br><br>";
	$mail->Body .= "email = " . $email . "<br>";
	$mail->Body .= "usuario = " . $usuario . "<br>";
	$mail->Body .= "senha = " . $senha . "<br>";
	$mail->AddAddress($email);
	if(!$mail->Send()){
		echo "ERRO:" . $mail->ErrorInfo;
		//header("Location: login.php");
	}
	else{
		header("Location: login.php");
	}
}











?>
