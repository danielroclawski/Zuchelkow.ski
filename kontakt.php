<?php

header('Content-Type: text/html; charset=utf-8');

session_start();

if(!empty($_POST['name']) and !empty($_POST['email']) and !empty($_POST['message']) and !empty($_POST['captcha'])){
	
	if($_POST['captcha']!=$_SESSION['captcha']){
		die('Kod captcha jest nieprawidłowy');
		$input = $_POST;
	}else{
		$email_odbiorcy = 'example@example.com';
		
		$header = 'Reply-To: <'.$_POST['email']."> \r\n"; 
		$header .= "MIME-Version: 1.0 \r\n"; 
		$header .= "Content-Type: text/html; charset=UTF-8"; 
		
		$wiadomosc = "<p>Dostałeś wiadomość od:</p>";
		$wiadomosc .= "<p>Imie i nazwisko: " . $_POST['name'] . "</p>";
		$wiadomosc .= "<p>Email: " . $_POST['email'] . "</p>";
		$wiadomosc .= "<p>Wiadomość: " . $_POST['message'] . "</p>";
		
		$message = '<!doctype html><html lang="pl"><head><meta charset="utf-8">'.$wiadomosc.'</head><body>';

		$subject = 'Wiadomość ze strony...';
		$subject = '=?utf-8?B?'.base64_encode($subject).'?=';
	
		if(mail($email_odbiorcy, $subject, $message, $header)){
			die('Wiadomość została wysłana');
		}else{
			die('Wiadomość nie została wysłana');
		}
	}
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Żuchelkow.ski</title>
        <link rel="stylesheet" href="style.css">
        <link rel="shortcut icon" href="image\minilogo.png">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> 
    </head>
    
<body>
    <div id="kontener">
    <div id="header">
        <div id="logo">
            <img src="image\logo-top.png"  class="obr" >
        </div>
        <div id="menu">
            
                <button class="menu-button"></button>
                <ul id="menu-rozw">
                    <li><a href="index.html#aktualnosci">Strona główna</a></li>
                    <li><a href="index.html#onas">O nas</a></li>
                    <li><a href="galeria.html">Galeria</a></li>
                    <li><a href="index.html#oferta">Oferta</a></li>
                    <li><a href="index.html#sprzet">Sprzęt</a></li>
                    <li><a href="kontakt.php">Kontakt</a></li>
               </ul>  
        <nav class="nav">
            
        <a href="index.html" class="navbar-item">Aktualności</a>
        <a href="index.html#onas" class="navbar-item">O nas</a>
        <a href="galeria.html" class="navbar-item">Galeria</a>
        <a href="index.html#oferta" class="navbar-item">Oferta</a>
        <a href="index.html#sprzet" class="navbar-item">Sprzęt</a>
        <a href="kontakt.php" class="navbar-item">Kontakt</a>
        </nav>
    </div>
    <script src="js/zmianaMenunaBtn.js"></script>
    <script src="js/ukrywanieNavbar.js"></script>
     </div>   
        <div id="kontakt">
           <h2> Zapraszamy do kontaktu od poniedziałku do soboty w godzinach 8:00-20:00, w pozostałych godzinach preferujemy kontakt mailowy/messanger.<br>
            Marcin Żuchelkowski telefon:<a href="tel:+48691210278">+48 691 210 278</a> email: <a href="mailto:marcin@zuchelkow.ski">marcin@zuchelkow.ski</a> messanger: <a href="http://m.me/USERNAME" target="_blank">Messenger</a></h2>
            <h1>Formularz kontakowy</h1>
            <form method="post"  id="formcontact">
                <label for="name">Imię i Nazwisko:</label><br>
                <input type="text" name="name" id="name" class="forms" required><br>
                <label for="email">E-mail:</label><br>
                <input type="text" name="email" id="email" class="forms" required><br>
                <label for="mess">Treść wiadomści:</label><br>
                <textarea name="message" id="message" class="forms" required></textarea><br>
                <label for="captcha">Przepisz kod captcha</label>
                <img src="captcha.php" alt="Captcha">
                <input type="text" name="captcha" id="captcha" required>
                <input type="submit" name="submit" value="Wyślij" class="kontakt-button">
                <!----<button class="kontakt-button">WYŚLIJ</button> --->
            </form>
           
        </div>
        <div id="stopka">
            <hr>
            <h4>Prawa autorskie marcin@zuchelkow.ski 2022</h4>
            <h4>Created and Design by Daniel Rocławski</h4>
        </div>
    </div>

    </body>
</html>