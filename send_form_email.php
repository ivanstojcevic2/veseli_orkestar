<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "veseliorkestar@gmail.com";
    $email_subject = "Upitnik";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['comments'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $first_name = $_POST['first_name']; // required
    $last_name = $_POST['last_name']; // required
    $email_from = $_POST['email']; // required
    $comments = $_POST['comments']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'Email koji ste unesli nije ispravan.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'Ime koje ste unesli nije ispravno.<br />';
  }
 
  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'Prezime koje ste unesli nije ispravno.<br />';
  }
 
  if(strlen($comments) < 2) {
    $error_message .= 'Poruka koju ste unesli nije ispravna.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "First Name: ".clean_string($first_name)."\n";
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here -->
<html>
<head>
	<title>Upit poslan</title>
	<link rel="stylesheet" href="./style/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Rubik+Doodle+Shadow&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Alkatra:wght@600&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Nunito&display=swap"
      rel="stylesheet"
    />
	<style>
		body {
			margin: 0;
			background-image: url(./images/veseli_orkestar_naslovnica_bg.png);
			backdrop-filter: blur(10px);
			color: #DCDCDC;
			font-family: Arial;
			font-size: 30;
			text-align: center;
		}
		#mobile-navbar-wrapper-php {
			background-color: rgba(256, 256, 256, 0.2);
		}
		#shopping-bag-icon {
    		width: 20px;
    		display: inline-block;
    		padding-top: 12px;
    		padding-bottom: 12px;
    		vertical-align: middle;
  		}

  		h1 {
    		font-size: 36pt;
    		display: block;
  		}

  		p {
    		margin-left: 2%;
    		margin-right: 2%;
    		font-size: 20pt;
  		}

  		#mobile-navbar-wrapper-php {
    		width: 100%;
    		text-align: center;
    		padding-top: 2%;
    		padding-bottom: 2%;
  		}

  		#mobile-navbar-container-php {
    		text-align: center;
    		width: 100%;
  		}

  		#mobile-navbar-container-php a {
    		text-decoration: none;
  		}

  		.mobile-nav-button-php {
    		width: 25%;
			margin-left: 1%;
			margin-right: 1%;
    		display: inline-block;
    		border-radius: 50px;
    		background-color: rgb(20, 34, 63);
    		font-family: Alkatra, sans-serif;
			-webkit-transition: all 0.25s ease;
  			-moz-transition: all 0.25s ease;
  			-o-transition: all 0.25s ease;
  			-ms-transition: all 0.25s ease;
  			transition: all 0.25s ease;
  		}
		.mobile-nav-button-php:hover {
    		transform: scale(1.05);
  		}

  		.mobile-nav-button-php p {
    		font-size: 10pt;
    		color: white;
  		}
	</style>
</head>
<body>
<p style="padding-top: 5%;">
Hvala što ste nam se javili,<br>
odgovorit ćemo Vam uskoro.<br>
<br>
Vratite se na:<br>
</p>
	<div id="mobile-navbar-wrapper-php">
        <div id="mobile-navbar-container-php">
          <a href="index.html" class="mobile-nav-button-php"><p>NASLOVNICA</p></a>
          <a href="./kontakt.html" class="mobile-nav-button-php"><p>KONTAKT</p></a>
          <a href="./kontakt.html" class="mobile-nav-button-php"><img src="images/icons/shopping_bag_white.png" id="shopping-bag-icon"></a>
        </div>
      </div>

</body> 	
</html>



 
<?php
 
}
?>