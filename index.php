<?php
const API_URL = "https://whenisthenextmcufilm.com/api";
#Inicializando sesion de curl  ; curl handle 
$ch=curl_init(API_URL);
//INDICAR QUE QUEREMOS RECIBIR EL RESULTADO DE LA PETICION Y NO MOSTRALA EN PANTALLA 
curl_setopt($ch,CURLOPT_RETURNTRANSFER , true) ;
/*Ejecutar la peticion  y guardar el resultado 
*/
$result =curl_exec($ch);
$data = json_decode($result,true);


curl_close($ch);

//var_dump($data)

?>

<head> 
    <meta charset="UTF8"/>
    <title>La Proxima pelicula de marvel es </title>
    <meta name="Description" content="la proxima de pelicula de marvel"/>
    <meta name="viewport" content="widht=device , initial-scale=1.0" />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    />
</head>

<main>
    <section>
        <img src="<?= $data["poster_url"]; ?> " width="300" alt="Poster de <?=$data["title"]; ?>"
        style="border-radius: 16px"/>
    </section>
        <hgroup>
            <h2><?=$data["title"]; ?> se estrena en <?=$data["days_until"];?></h2>
            <p> Fecha de estreno <?=$data["release_date"]; ?></p>
            <p> La siguiente peli es : <?=$data["following_production"]["title"]; ?></p>

        </hgroup>
   
</main>




<style>
    :root {
        color-scheme: light dark;
    }

   body {
        display: grid;
        place-content: center;
   }
   section{
    display: flex;
    justify-content: center;
    text-align: center;
   }
   hgroup {
    display: flex;
    flex-direction: column;
    justify-content: center;
    text-align: center;
   }
   img {
    margin : 0 auto
   }
</style>
