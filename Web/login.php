<?php include './header.php';?>

<?php
include './UserClass.php';
$user = new UserClass();
if(isset($_POST['username'])){
   $signup =  $user->login($_POST['username'] ,$_POST['password']);
  
}
?>
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
<link rel="stylesheet" href="style.css">
<style>
* {box-sizing: border-box}

/* Full-width input fields */
  input[type=text], input[type=password] {
  width:80%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
.button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
  width:80%;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}
label{
color:white;}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}
a header{color:blue;}
a{
margin-botoom:30px;}
/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
    width: 100%;
    
  }
}

</style>

<form action="" method="post">
<h3>Login</h3>
    <div><input type="text" placeholder="Username"name="username"></div>
    <div><input type="password" placeholder="Password"name="password"></div>
    <input type="submit" class="button"value="Login">
</form>
<?php include './header.php';?>
