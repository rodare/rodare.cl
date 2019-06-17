<?php

header("Content-Type: text/html; charset=utf-8");

if(isset($_POST['email'])) {
     
    // CHANGE THE TWO LINES BELOW
    $email_to = "rodare.cl@gmail.com";
     
    $email_subject = "Contacto de RODARE";
     
     
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
 
<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head><!-- Created by Artisteer v4.0.0.58475 -->
    <meta charset="utf-8">
    <title>Contacto</title>

    <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="style.css" media="screen">
    <!--[if lte IE 7]><link rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->


    <script src="jquery.js"></script>
    <script src="script.js"></script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-60445910-1', 'auto');
  ga('send', 'pageview');

</script>





</head>
<body>
<div id="main">
    <div class="sheet clearfix">
<header class="header clearfix">


    <div class="shapes">
<h1 class="headline" data-left="2.05%">
    <a href="http://rodare.cl/">Rodare</a>
</h1>



<div class="searchBox">
<table border="0" width="100%">
<TR>
<td><p align="left">Búsqueda dentro de Rodare</p>
</td>
</TR>
<TR> 
    <td>
<script>
  (function() {
    var cx = '015198527025211913374:5ttjzgycxcc';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
        '//www.google.com/cse/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:searchbox linktarget="_parent"></gcse:searchbox>
</table>
</td>
</TR>
</div>




            </div>

<nav class="nav">
    <ul class="hmenu"><li><a href="cursos.html" class="">Cursos</a><ul class=""><li><a href="cursos/iea.html" class="">IEA</a><ul class=""><li><a href="cursos/iea/unidad-i.html" class="">Unidad I</a></li><li><a href="cursos/iea/unidad-ii.html" class="">Unidad II</a></li><li><a href="cursos/iea/unidad-iii.html" class="">Unidad III</a></li><li><a href="cursos/iea/unidad-iv.html" class="">Unidad IV</a></li></ul></li><li><a href="cursos/fda.html" class="">FDA</a><ul class=""><li><a href="cursos/fda/unidad-i.html" class="">Unidad I</a></li><li><a href="cursos/fda/unidad-ii.html" class="">Unidad II</a></li></ul></li></ul></li><li><a href="http://rodare.cl/blog" class="">Blog</a></li><li><a href="curriculum.html" class="">Currículum</a></li><li><a href="articulos.html" class="">Artículos</a></li><li><a href="contacto.html" class="active">Contacto</a></li></ul> 
    </nav>

                    
</header>
<div class="layout-wrapper clearfix">
                <div class="content-layout">
                    <div class="content-layout-row">
                        <div class="layout-cell sidebar1 clearfix"><div class="vmenublock clearfix">
        <div class="vmenublockheader">
            <h3 class="t">Actividad Académica</h3>
        </div>
        <div class="vmenublockcontent">
<ul class="vmenu"><li><a href="rodare.html" class="">Rodare</a></li><li><a href="cursos.html" class="">Cursos</a><ul class=""><li><a href="cursos/iea.html" class="">IEA</a><ul class=""><li><a href="cursos/iea/unidad-i.html" class="">Unidad I</a></li><li><a href="cursos/iea/unidad-ii.html" class="">Unidad II</a></li><li><a href="cursos/iea/unidad-iii.html" class="">Unidad III</a></li><li><a href="cursos/iea/unidad-iv.html" class="">Unidad IV</a></li></ul></li><li><a href="cursos/fda.html" class="">FDA</a><ul class=""><li><a href="cursos/fda/unidad-i.html" class="">Unidad I</a></li><li><a href="cursos/fda/unidad-ii.html" class="">Unidad II</a></li></ul></li></ul></li><li><a href="http://rodare.cl/blog" class="">Blog</a></li><li><a href="curriculum.html" class="">Currículum</a></li><li><a href="articulos.html" class="">Artículos</a></li><li><a href="contacto.html" class="active">Contacto</a></li></ul>
                
        </div>
</div></div>
                        <div class="layout-cell content clearfix">

<gcse:searchresults linktarget="_parent"></gcse:searchresults>

<article class="post article">
                                <h2 class="postheader">Contacto</h2>
                                <div class="postcontent postcontent-0 clearfix"> <p>Gracias por contactarse conmigo. Le responderé lo antes posible.<br> Cordialmente,<br><br> Rodrigo Arenas C.</p></div>
</article></div>
                    </div>
                </div>
            </div><footer class="footer clearfix">
<p><a href="#"><span style="color: rgb(255, 255, 255);">Link1</span></a> <span style="color: #FFFFFF;">|</span> <a href="#"><span style="color: rgb(255, 255, 255);">Link2</span></a> <span style="color: #FFFFFF;">|</span> <a href="#"><span style="color: rgb(255, 255, 255);">Link3</span></a></p>
<p><br></p>
</footer>

    </div>
</div>


</body>
</html>
 
<?php

exit;
}


?>