<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Strings</title>
</head>
<body>

<?php
  /* inserisco in una variabile il testo che avrà la parola da censurare */
  $testo = "Ricorda per sempre il 5 novembre, il giorno della congiura delle polveri contro il parlamento. Non vedo perché di questo complotto, nel tempo il ricordo andrebbe interrotto. Ma l'uomo? So che il suo nome era Guy Fawkes e so che nel 1605 tentò di far esplodere il parlamento inglese. Ma chi era realmente? Che tipo d'uomo era? Ci insegnano a ricordare le idee e non l'uomo, perché l'uomo può fallire. L'uomo può essere catturato, può essere ucciso e dimenticato. Ma 400 anni dopo ancora una volta un'idea può cambiare il mondo. Io sono testimone diretto della forza delle idee, ho visto gente uccidere per conto e per nome delle idee, li ho visti morire per difenderle… Ma non si può baciare un'idea, non puoi toccarla né abbracciarla; le idee non sanguinano, non provano dolore... le idee non amano. Non è di un'idea che sento la mancanza ma di un uomo, un uomo che mi ha riportato alla mente il 5 novembre: un uomo che non dimenticherò mai.";

  /* parola in input dall'url */
  $parola = $_GET['parola'];
  
  echo $parola;

  /* variabile utilizzata per salvare il carattere di censura da sostituire alla parola inserita */
  $censura = "****";

  /* variabile di lavoro che salverà il risultato della funzione str_replace */
  $testoCensurato = str_replace($parola, $censura, $testo); /* sostituisce la variabile parola con la variabile censura se essa è contenuta nella variabile testo */

  $controlloSullaCensura = false; /* variabile che uso per vedere se la parola inserita è contenuta nel testo oppure no */

  $censura =""; /* variabile di appoggio per un testo */

  /* if che assegna alla variabile controlloSullaCensura il valore true se la parola è contenuta nel testo */
  if(strpos($testo, $parola)!==false){
    $controlloSullaCensura = true;
    $censura = " verrà censurato";
    /*! ottimizzazione if di sotto $censura = "il testo verrà censurato"; */
  }else{
    $controlloSullaCensura = false;
    $censura = " non verrà censurato perchè non contiene la parola inserita";
    /*!ottimizzazione if di sotto $censura = "il testo non verrà censurato perchè non contiene la parola inserita"; */
  }

  

  /* if che assegna una determinata frase se sul testo è possibile fare la censura oppure no*/
  /*
  !! ottimizzato nell'if di sopra
  if($controlloSullaCensura === true){
    $censura = "il testo verrà censurato";
  }else{
    $censura = "il testo non verrà censurato perchè non contiene la parola inserita";
  }
 */
?>

  <p>il testo è : <?php echo $testo ?></p> <!-- stampo il testo -->
  <p>la parola inserita da censurare è: <?php echo $parola ?></p> <!-- stampo la parola inserita -->


  <p>il testo <?php 
    echo $censura
  ?></p>

  <h1>testo censurato <?php 
    if($controlloSullaCensura === true){
      echo ": SI "; /* visualizza il si se è censurato */
    }else{
      echo ": NO"; /* visualizza no se non è stato censurato */
    }
  ?></h1>

  <hr>

  <p> <?php echo $testoCensurato ?> </p>  <!-- stampo il testo censurato -->

  <p>lunghezza testo censurato: <?php echo strlen($testoCensurato) ?></p>