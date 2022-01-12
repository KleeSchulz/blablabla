<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/StyleSheet1.css" />
    <script src="js/Script1.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Markus Burkard Fahrschule</title>

</head>
<body>

    <div class="bgD"><img src="Bilder/background.jpg" /></div>

    <!-- NavBar -->

    <nav class="navbar">

        <a href="index.html #seite_fahrlehrer"><img id="logo" src="Bilder/Logo Fahrschule.png" /></a>

        <a class="toggle-button">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </a>

        <div class="navbar-links">
            <ul>
                <li><a href="index.html #seite_fahrlehrer">Fahrlehrer</a></li>
                <li><a href="index.html #seite_fuehrerschein">Führerscheinklassen</a></li>
                <li><a href="index.html #seite_standort">Standort</a></li>
                <li><a href="index.html #seite_kontakt">Kontakt</a></li>
                <li><a href="Unterrichte.php">Unterrichte</a></li>
                <li><a href="Job.php">Jobs</a></li>
            </ul>
        </div>
        <div class="social">
            <ul>
                <li><a href="https://instagram.com/fahrschule_burkart?utm_medium=copy_link" target="_blank"><img id="social" src="Bilder/instagram.png" /></a></li>         
                <li><a href="https://www.facebook.com/Fahr-und-Verkehrsschule-Markus-Burkart-1605093176393160/" target="_blank"><img id="social" src="Bilder/facebook.png" /></a></li>
            </ul>
        </div>
    </nav>

    <!-- NavBar Ende -->

    <main role="main">


        <div class="job">
            <h1 class="jobTitle">Jobs</h1>
            <br />
            <br />                              
            <?php
	            function GebeJobText(){
		            $returnJob="";
		            $myfile = "uploads/JobAngebot.txt";
            		if (file_exists($myfile)) {
			            $myfile = "uploads\GebeJobText.txt";
			            if (file_exists($myfile)){
			    
				            $jobfile = fopen("uploads\GebeJobText.txt", "r");
				            $returnJob = fread($jobfile,filesize("uploads\GebeJobText.txt"));
				            fclose($jobfile);
			            }
			            else {
				            $returnJob = "Die Datei GebeJobText.txt konnte nicht gefunden werden! Bitte uploaden - Rechtschreibung beachten";
			            }
            		} else {
                       $myfile = "uploads\KeinJobText.txt";
			            if (file_exists($myfile)){
			    
				            $jobfile = fopen("uploads\KeinJobText.txt", "r");
				            $returnJob = fread($jobfile,filesize("uploads\KeinJobText.txt"));
				            fclose($jobfile);
			            }
			            else {
				            $returnJob = "Die Datei GebeJobText.txt konnte nicht gefunden werden! Bitte uploaden - Rechtschreibung beachten";
			            }
                    }
		            return $returnJob;
	            }

                echo GebeJobText();
            ?>
       
        </div>
        
        <br />
        <div>
            <img class="abschluss" src="Bilder/_MG_1758_mg1.png" />
        </div>

        <div class="footer">
            <div class="footer-links">
                <a href="Datenschutz.html">Datenschutz</a>
                <a href="Impressum.html">Impressum</a>
            </div>
            <div class="footer-social">
                <a href="https://instagram.com/fahrschule_burkart?utm_medium=copy_link" target="_blank"><img id="social" src="Bilder/instagram.png" /></a>
                <a href="https://www.facebook.com/Fahr-und-Verkehrsschule-Markus-Burkart-1605093176393160/" target="_blank"><img id="social" src="Bilder/facebook.png" /></a>
            </div>
        </div>

    </main>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>