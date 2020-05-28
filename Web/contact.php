<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_FILES) && (bool) $_FILES) {

    $allowedExtensions = array("pdf", "doc", "docx", "gif", "jpeg", "jpg", "png", "txt","mp3");

    $files = array();
    foreach ($_FILES as $name => $file) {
        $file_name = $file['name'];
        $temp_name = $file['tmp_name'];
        $file_type = $file['type'];
        $path_parts = pathinfo($file_name);
        $ext = $path_parts['extension'];
        if (!in_array($ext, $allowedExtensions)) {
            die("File $file_name has the extensions $ext which is not allowed");
        }
        array_push($files, $file);
    }
$mailfrom=$_POST['email'];

    $mailto="yamen.hamid_662006@hotmail.com";
    $subject = $_POST['names'];
    $message = $_POST['msg'];
    $headers="from: ".$mailfrom;

    $semi_rand = md5(time());
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";



        $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";
    $message = "This is a multi-part message in MIME format.\n\n" . "--{$mime_boundary}\n" . "Content-Type: text/plain; charset=\"iso-8859-1\"\n" . "Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n";
    $message .= "--{$mime_boundary}\n";


     
     // preparing attachments
    for ($x = 0; $x < count($files); $x++) {
        $file = fopen($files[$x]['tmp_name'], "rb");
        $data = fread($file, filesize($files[$x]['tmp_name']));
        fclose($file);
        $data = chunk_split(base64_encode($data));
        $name = $files[$x]['name'];
        $message .= "Content-Type: {\"application/octet-stream\"};\n" . " name=\"$name\"\n" .
                "Content-Disposition: attachment;\n" . " filename=\"$name\"\n" .
                "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
        $message .= "--{$mime_boundary}\n";
    }
    
    // send

    $ok = mail($mailto, $subject, $message,$headers);
    if ($ok) {
        echo "<p style='tex-align:center'>mail has ben  sent to Yamen Hamid</p>";
    } else {
        echo "<p>mail could not be sent!</p>";
    }
}
?>

<html>
    <head>
    <style>
img[alt="www.000webhost.com"]{display:none;}
</style>
      <title>Contact | Yamen Hamid</title>
          <link href="style.css" rel="stylesheet" type="text/css"/>
    </head>
    <header>
 
           <div id="logo">
               <a href="#contact">
<img src="img/logo.png" alt=logo>
               </a>
           </div>
           <script type="text/javascript">
jQuery(document).ready(function(){
    jQuery(window).scroll(function(){
        if(jQuery(this).scrollTop()>=50){
        jQuery('#zp-logo').attr('style','background-size:60% !important;');
            jQuery('.zp-logo-block').attr('style','top:0px;');
    }   
        else if (jQuery(this).scrollTop()<50) {
        jQuery('#zp-logo').attr('style','background-size:100% !important')
            jQuery('.zp-logo-block').attr('style','top:50;');
        }
    })
})
</script>
           <div class="black">
           <img src="https://img.icons8.com/android/24/000000/menu.png"/></div>
              <nav id="main-nav">
              <div class="hamburger">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
      </div>
                  <ul>
                    <li><a href="https://yamenhamid.tk/#home">home</a></li>
                    <li><a href="https://yamenhamid.tk/#about">about</a></li>
                     <li><a href="https://yamenhamid.tk/Signup.html">Sign up</li>
                     <li><a href="https://yamenhamid.tk/login.html">Login</a></li>
                    <li><a href="https://yamenhamid.tk/work.html">Work</a></li>
                    <li><a href="https://yamenhamid.tk/contact.php">contact</a></li>

                  </ul>
              </nav>
    </header>

    <body>
        <form method="post" action="" enctype="multipart/form-data" class="attachment-form">
<h3>contact me </h3>
            <input type="email" name="email" placeholder="email"/><br>
            <input type="names" name="names" placeholder="name"/><br>
            <textarea name="msg" placeholder="Message"></textarea><br>
            attach file<br>
            <input type="file" name="attach1"/><br>
            <input class="button"type="submit" value="Send"/>
        </form>
                    <a href="https://yamenhamid.tk">Go back to our home page</a>  

    </body>
</html>