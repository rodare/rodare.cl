<?php

header("Content-Type: text/html; charset=utf-8");

if(isset($_POST['email'])) {
     
    // CHANGE THE TWO LINES BELOW
    $email_to = "rodare.cl@gmail.com";
     
    $email_subject = "Contacto de CI";
     
     
    function died($error) {
        // your error code can go here
        echo "Lo sentimos, pero se encontraron uno o más errores en el formulario que envió.";
        echo "Los errores aparecen abajo.<br /><br />";
        echo $error."<br /><br />";
        echo "Por favor regrese y arregle los errores.<br /><br />";
        die();
    }
     
    // validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['comments'])) {
        died('Lo sentimos, pero parece haber un problema con el formulario que envió.');       
    }
     
    $first_name = $_POST['first_name']; // required
    $last_name = $_POST['last_name']; // required
    $email_from = $_POST['email']; // required
    $telephone = $_POST['telephone']; // not required
    $comments = $_POST['comments']; // required
     
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'La dirección e e-mail que ingresó parece no ser válida.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'El nombre que escribió parece no ser válido.<br />';
  }
  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'El apellido que escribió parece no ser válido.<br />';
  }
  if(strlen($comments) < 2) {
    $error_message .= 'Los comentarios que escribió parecen no ser válidos.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Los detalles del formulario abajo.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    $email_message .= "First Name: ".clean_string($first_name)."\n";
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";
     
     
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- place your own success html below -->
 
<!doctype html>
	<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>CCI</title>
	<link rel="stylesheet" href="css/style.css"/>
</head>

<body>
<div class="wrap">
  <header>
	<div class="texto">
	<h1><a href="index.html">Curso de<br> Comercio<br> Internacional</a></h1>
	</div>
	<div class="elheader"></div>
	<div id="logo"><a href="index.html"><img src="img/logo3.png" alt="Curso de Comercio Internacional"/></a></div>
	
	
 <div class="navigation">
	<ul>
	<li><a href="index.html">Inicio</a></li>
	<li><a href="unidades.html">Unidades</a></li>
	<li><a href="curriculum.html">Currículum</a></li>
	<li><a href="http://rodare.cl/ci/contacto.html">Contacto</a></li>
	</ul>
</div>	
  </header>

 <div class="content">
  <h2>Contacto</h2>

 <p>Gracias por contactarse conmigo. Le responderé lo antes posible.<br> Cordialmente,<br><br> Rodrigo Arenas C.</p>

 </div>	

<aside>
	<ul>
		<li><a href="index.html">Inicio</a></li>
		<li><a href="avisos.html">Avisos</a></li>
		<li><a href="programa.html">Programa</a></li>
		<li><a href="http://rodare.cl/ci/contacto.html">Contacto</a></li>
	</ul>
</aside>
</div>
</body>
</html>
 
<?php

exit;
}


?>