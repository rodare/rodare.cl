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
  <!-- GTranslate: https://gtranslate.io/ -->
  <a href="#" onclick="doGTranslate('es|en');return false;" title="English" class="gflag nturl" style="background-position:-0px -0px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="English" /></a><a href="#" onclick="doGTranslate('es|fr');return false;" title="French" class="gflag nturl" style="background-position:-200px -100px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="French" /></a><a href="#" onclick="doGTranslate('es|de');return false;" title="German" class="gflag nturl" style="background-position:-300px -100px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="German" /></a><a href="#" onclick="doGTranslate('es|it');return false;" title="Italian" class="gflag nturl" style="background-position:-600px -100px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Italian" /></a><a href="#" onclick="doGTranslate('es|ja');return false;" title="Japanese" class="gflag nturl" style="background-position:-700px -100px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Japanese" /></a><a href="#" onclick="doGTranslate('es|pl');return false;" title="Polish" class="gflag nturl" style="background-position:-200px -200px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Polish" /></a><a href="#" onclick="doGTranslate('es|pt');return false;" title="Portuguese" class="gflag nturl" style="background-position:-300px -200px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Portuguese" /></a><a href="#" onclick="doGTranslate('es|ru');return false;" title="Russian" class="gflag nturl" style="background-position:-500px -200px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Russian" /></a><a href="#" onclick="doGTranslate('es|es');return false;" title="Spanish" class="gflag nturl" style="background-position:-600px -200px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Spanish" /></a>

  <style type="text/css">
  <!--
  a.gflag {vertical-align:middle;font-size:16px;padding:1px 0;background-repeat:no-repeat;background-image:url(//gtranslate.net/flags/16.png);}
  a.gflag img {border:0;}
  a.gflag:hover {background-image:url(//gtranslate.net/flags/16a.png);}
  #goog-gt-tt {display:none !important;}
  .goog-te-banner-frame {display:none !important;}
  .goog-te-menu-value:hover {text-decoration:none !important;}
  body {top:0 !important;}
  #google_translate_element2 {display:none!important;}
  -->
  </style>

  <br /><select onchange="doGTranslate(this);"><option value="">Select Language</option><option value="es|af">Afrikaans</option><option value="es|sq">Albanian</option><option value="es|ar">Arabic</option><option value="es|hy">Armenian</option><option value="es|az">Azerbaijani</option><option value="es|eu">Basque</option><option value="es|be">Belarusian</option><option value="es|bg">Bulgarian</option><option value="es|ca">Catalan</option><option value="es|zh-CN">Chinese (Simplified)</option><option value="es|zh-TW">Chinese (Traditional)</option><option value="es|hr">Croatian</option><option value="es|cs">Czech</option><option value="es|da">Danish</option><option value="es|nl">Dutch</option><option value="es|en">English</option><option value="es|et">Estonian</option><option value="es|tl">Filipino</option><option value="es|fi">Finnish</option><option value="es|fr">French</option><option value="es|gl">Galician</option><option value="es|ka">Georgian</option><option value="es|de">German</option><option value="es|el">Greek</option><option value="es|ht">Haitian Creole</option><option value="es|iw">Hebrew</option><option value="es|hi">Hindi</option><option value="es|hu">Hungarian</option><option value="es|is">Icelandic</option><option value="es|id">Indonesian</option><option value="es|ga">Irish</option><option value="es|it">Italian</option><option value="es|ja">Japanese</option><option value="es|ko">Korean</option><option value="es|lv">Latvian</option><option value="es|lt">Lithuanian</option><option value="es|mk">Macedonian</option><option value="es|ms">Malay</option><option value="es|mt">Maltese</option><option value="es|no">Norwegian</option><option value="es|fa">Persian</option><option value="es|pl">Polish</option><option value="es|pt">Portuguese</option><option value="es|ro">Romanian</option><option value="es|ru">Russian</option><option value="es|sr">Serbian</option><option value="es|sk">Slovak</option><option value="es|sl">Slovenian</option><option value="es|es">Spanish</option><option value="es|sw">Swahili</option><option value="es|sv">Swedish</option><option value="es|th">Thai</option><option value="es|tr">Turkish</option><option value="es|uk">Ukrainian</option><option value="es|ur">Urdu</option><option value="es|vi">Vietnamese</option><option value="es|cy">Welsh</option><option value="es|yi">Yiddish</option></select><div id="google_translate_element2"></div>
  <script type="text/javascript">
  function googleTranslateElementInit2() {new google.translate.TranslateElement({pageLanguage: 'es',autoDisplay: false}, 'google_translate_element2');}
  </script><script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>


  <script type="text/javascript">
  /* <![CDATA[ */
  eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}',43,43,'||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'),0,{}))
  /* ]]> */
  </script>

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