<?php
    #Datei Upload
    $f = 'JobAngebot.txt';	 
	#(file_exists($f)) {
    #    echo "Aktuell gibt es Jobs!";
    #}

    if (!empty($_FILES)) {
        // horizontale Linie
        
        $datei_name = basename(urlencode($_FILES["datei"]["name"]));
        // Speichern des Bildes im Dateisystem
        if($datei_name == 'Job.pdf') {
            if (move_uploaded_file($_FILES["datei"]["tmp_name"], "../$datei_name")) {
                echo "Datei wurde erfolgreich hochgeladen.";
            } else {
                echo "Fehler beim Hochladen der Datei.";
            }
        } else {
            if (move_uploaded_file($_FILES["datei"]["tmp_name"], $datei_name)) {
                echo "Datei wurde erfolgreich hochgeladen.";
            } else {
                echo "Fehler beim Hochladen der Datei.";
            }
        }        
    }

    if (isset($_GET['loescheJob'])) {
    	loescheJob();
  	}

  	if (isset($_GET['legeJobAn'])) {
    	legeJobAn();
  	}


	#Lege Job an 
    function legeJobAn(){
		$datei = fopen("JobAngebot.txt","w");
		#echo fwrite($datei, "Aktuell werden Jobs gesucht!");
		fclose($datei);
		#echo "<script>alert('Die Jobs werden nun wieder angezeigt');</script>";
	}

	#Loesche JOB - Standardtext
	function loescheJob(){
     #   echo "<body style='background-color:pink'>";
		$f = 'JobAngebot.txt';	 
		$string ="";
		if (file_exists($f)) {
		   unlink($f);
		   $str= "Aktuelle Jobs wurden gelöscht";
		} else {
		   $str =  'Datei kann nicht gefunden werden - Es gibt aktuelle keine Jobs';
		}
	#	echo "<script>alert('$str');</script>";
	}

?>

<html>    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="StyleSheetBackend.css" />
        <script src="js/Script1.js" defer></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <title>Backend</title>
        
    </head>
    <body>        
        <div class="bgD"><img src="background.jpg" /></div>
        
        <div class="Download">
            <h1>Upload der Dateien für </h1>
            
            <h4>termine.csv -- Hier stehen die Termine drin 
                <button class="submitButton" type="submit" onclick="window.open('termine.csv')">Download Termine.csv</button>
            </h4>
            
            <h4>GebeJobText.txt  -- Hier steht der Text für das Jobangebot drin 
                <button class="submitButton" type="submit" onclick="window.open('GebeJobText.txt')">Download GebeJobText.txt</button>
            </h4>
            
            <h4>KeinJobText.txt  -- Hier steht der Text wenn es kein Jobangebot gibt
                <button class="submitButton" type="submit" onclick="window.open('KeinJobText.txt')">Download KeinJobText.txt</button>
            </h4>

            <h4>Job.pdf -- Hier muss eine PDF-Datei mit dem Jobangebot sein 
                <button class="submitButton" type="submit" onclick="window.open('../Job.pdf')">Download Job.pdf</button>
            </h4>
        </div>

        <div class="upload">        
            <form  method="POST" enctype="multipart/form-data">
                <label>
                    <h4>Bitte Uploade eine der Oben gennanten Dateien</h4>
                </label>
                <input class="submitButton" name="datei" type="file" value="" accept=".txt,.csv,.pdf" />
                <input class="submitButton" type="submit" value="Datei hochladen" />
            </form>
        </div>
        
        <div class="anzeige">
            <button id="keineJobs">
                <a href='dateiupload.php?loescheJob=true'>Keine Jobs mehr Anzeigen!</a>
            </button>             
            <button id= "mehrJobs">
                <a href='dateiupload.php?legeJobAn=true'>Jobanzeige erstellen</a>
            </button>
        </div>

        <div>
            <img class="abschluss" src="_MG_1758_mg1.jpg" />
        </div>

    </body>
</html>


	




