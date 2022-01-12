<!doctyp html>
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
<body >

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

    <div class="page-content">

        <div class="contant-wrap">


                <div class="unterrichtTitel">
                    <h1>Unterricht</h1>
                </div>
                <div class="auswahl">
                    <h3>Wähle deine Kategorie für Sonderunterrichte aus</h3>
                </div>
        
                <form class="Monate" method="post">
                    <input class="monat" type="submit" name="G" value="Grundlektionen"/>
                    <input class="monat" type="submit" name="B" value="Auto"/>
                    <input class="monat" type="submit" name="A" value="Motorrad"/>
                    <input class="monat" type="submit" name="C" value="LKW"/>
                    <input class="monat" type="submit" name="T" value="Traktor"/>
                    <input class="monat" type="submit" name="Ladung" value="Ladungssicherung"/>
                </form>            
        
                <div class="unterricht">            
                    <h2 class="schrift">Klasse</h2>
                    <h2 class="schrift">Ort</h2>
                    <h2 class="schrift">Datum</h2>
                    <h2 class="schrift">Uhrzeit</h2>
                    <h2 class="schrift">Lektion</h2>
            
                        <?php

                            if(array_key_exists('G', $_POST)) {
                                GebeAus('J');
                            } else if (array_key_exists('B', $_POST)) {
                                GebeAus('B');
                            } else if (array_key_exists('A', $_POST)) {
                                GebeAus('A');
                            } else if (array_key_exists('C', $_POST)) {
                                GebeAus('C');
                            } else if (array_key_exists('T', $_POST)) {
                                GebeAus('T');
                                GebeAus('L');
                            } else if (array_key_exists('Ladung', $_POST)) {
                                GebeAus('Ladung');
                            } else {
                                GebeAus('J');
                            }
       
                            #Lese CSV-Datei ohne KOPF ein - Return array
                                function LeseDateiEin(){
                                    $rows   = array_map('str_getcsv', file('uploads\termine.csv'));
                                    $header = array_shift($rows);
                                    $csv    = array();
                                    foreach($rows as $row) {
                                        $csv[] = array_combine($header, $row);
                                    }
                                    return $csv;
                                }

                            #Filtert alle Termine -> nurnoch gültige Angezeigt
                                function GebeAktuelleTermine() {
                                    $csv = array();
                                    $csv = LeseDateiEin();
                                    $array = array();
                                    $num = count($csv);
                                    $akt_str;
                                    $akt_datum = date('y-m-d',time());
                                    #echo $akt_datum;
                                    for ($i=0;$i<$num;$i++){                
                                        $akt_str=implode("|", $csv[$i]);
                                        $akt_str=explode(";", $akt_str);
                                        $vor_datum=date('y-m-d',strtotime($akt_str[2]));
                                        if ($vor_datum>$akt_datum){
                                            $array[]=$csv[$i];
                                        }
                                    }
                                    return $array;
                                }

                            #Gebe alle mit einem Bestimmten Type zurück CSV-Datei (Spalte1) - benötigt Array -> am besten GebeAktuelleTermine
                                function GebeTypeZurueck($arraymit,$type){ #A,B,C,M,L
                                    $type1=strtoupper($type);
                                    $csv = array();
                                    $csv = $arraymit;
                                    $array = array();
                                    $num = count($csv);
                                    for ($i=0;$i<$num;$i++){                
                                        $str=implode("|", $csv[$i]);
                                        #echo $str;
                                        $mystr=explode(";", $str);
                                        if (strpos(strtoupper($mystr[0]), $type1)!==false){
                                            $array[]=$csv[$i];
                                        }
                                    }
                                    return $array;
                                }
                            ##Gibt dir das Array zurück - $csv ist das array print_r zeichnet es
                                function GebeAus($typ) {
                                    $csv=GebeTypeZurueck(GebeAktuelleTermine(),$typ);
                                    $num=count($csv);
                                    if($num != 0) {
                                        for($i=0;$i<$num;$i++) {			                    
			                                $test = implode('|', $csv[$i]);
			                                $testest = explode(";",$test);                                
			                                echo "<h3 class='klasse'>".($testest[0])."</h3>";			                    
			                                echo "<h3 class='ort'>".($testest[1])."</h3>";			                    
			                                echo "<h3 class='datum'>".($testest[2])."</h3>";			                    
			                                echo "<h3 class='uhrzeit'>".($testest[3])."</h3>";			                    
			                                echo "<h3 class='lektion'>".($testest[4])."</h3>";		        	            
		                                }
                                    } else {
                                        echo "<h4 class='plan'>In nächster Zeit sind keine Stunden geplant</h4>";
                                    }
	                            }
	        
                            ?>                           
                </div>
            </div>
        <div class="abschlussU">
            <img  src="Bilder/_MG_1758_mg1.png" />        
            <div class="footerU">
                <div class="footerU-links">
                    <a href="Datenschutz.html">Datenschutz</a>
                    <a href="Impressum.html">Impressum</a>
                </div>
                <div class="footerU-social">
                    <a href="https://instagram.com/fahrschule_burkart?utm_medium=copy_link" target="_blank"><img id="social" src="Bilder/instagram.png" /></a>
                    <a href="https://www.facebook.com/Fahr-und-Verkehrsschule-Markus-Burkart-1605093176393160/" target="_blank"><img id="social" src="Bilder/facebook.png" /></a>
                </div>
            </div>
        </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>