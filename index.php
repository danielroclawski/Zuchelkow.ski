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
        <div id="aktualnosci">
            <!--<h2>Zdjęcia z ostatniej pracy</h2>-->
          
              
            </div>
               
        
        <div id="onas">
          <h1>O nas</h1> 
            <h2>Zajmujemy się usługami związanymi z utrzymaniem porządku terenów zielonych, ogrodów. Oferujemy usługi rębakiem, pilarką, wycinaniem zarośli i małych drzew, oczyszczaniem terenu pod inwestycje itp. Pełen zakres usług znajdziecie Państwo w części Oferta. W wykonywaniu powierzonych zadań kierujemy się dobrymi praktykami oraz wartością dla klienta, istnieje duża szansa że usłyszałeś o nas właśnie z polecenia. Działamy na terenie miasta Bydgoszczy oraz województwa Kujawsko-Pomorskiego.</h2>
        </div>
        <div id="oferta">
            <h1>Oferta</h1>
            <h2>Głównym przedmiotem działaności dla nas są usługi skierowane do osób prywatnych jak i przedsiębiorstw:
                - porządkowanie terenów zielonych, usługi ogrodnicze, sprzątanie połamanych drzew i gałęzi po wichurach,
                - usługi pilarką spalinową, wycinanie małych drzew i krzewów, likwidacja sadów,
                - usługi kosą spalinową i kosiarką, koszenie trawy, wycinanie małych drzew i krzewów, zarośli,
                - usługi rębakiem spalinowym (rozdrabiniamy gałęzie i małe drzewa do 15cm średnicy pnia), możliwość odbioru zrębki,
                - produkcja, sortowanie, suszenie i pakowanie zrębki na opał/na podsypkę pod rośliny,
                
                Zapraszamy do kontaktu po darmową wycenę!
                </h2>
        </div>
        <div id="sprzet">
            <h1>Sprzęt</h1>
            <h2>Do wykonywania pracy używamy sprzęt marek Stihl, Karcher, Fiskars, DeWalt, Lumag, Dji oraz sprzęt ochronny 3M. Wierzymy we właściwą konserwację oraz użytkowanie narzędzi zgodnie z ich przeznaczeniem co skutkuje tym że narzędzia zapewniają nam długą i bezawaryjną pracę.</h2>
                <video controls><source src="image\video.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'></video>
                <img src="image\narz1.jpg" class="obrSprzet">
                <img src="image\narz2.jpg" class="obrSprzet">
                <img src="image\narz3.jpg" class="obrSprzet">
           
        </div>
        <div class="Slider">
            <h2>Poniżej znajduje się galeria zdjęć z trwania pracy.</h2>      
          <img src="image/slider1.jpg" alt="aa" class="SliderZdjecia">
          <img src="image/slider2.jpg" alt="aa" class="SliderZdjecia">
          <img src="image/slider3.jpg" alt="aa" class="SliderZdjecia">
          <button class="obr-button obr-black obr-display-left" onclick="plusDivs(-1)">&#10094;</button>
          <button class="obr-button obr-black obr-display-right" onclick="plusDivs(1)">&#10095;</button>
        </div>
        <script src="js/sliderZdjec.js"></script>
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