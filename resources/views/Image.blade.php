@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>selva</title>
    <script src="https://aframe.io/releases/1.0.4/aframe.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <section class="fh5co-blog-content">
        <div class="blog-content-bckg">
          <div class="blog-content-inner">
                <div class="container-fluid">
                    <header class="video1" >
                        <div class="video1-video">
                        <video src="assets/img/sierra.mp4" type="video/mp4" controls autoplay muted></video><!---->
                        </div> 
                        
                        <div class="video1-overlay"></div>
                        <div class="video1-content">
                        <h1><b>"SELVA"</b></h1>
                        <p id="frase"><b>Encontraras lo mas maravilloso de la vida, un lugar para soñar</b></p>
                        </div>
                    
                    </header> 
                    <a-scene>
                        <a-sky src="assets/img/plazalamerced 360 1.jpg" ></a-sky>
                    </a-scene>
                    
                </div>
          </div>
        </div>
</body>
</html>