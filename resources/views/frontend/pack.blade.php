@extends('layouts.menu')
@section('content')
<!-- ***** Main Banner Area Start ***** -->
<div class="main-banner" id="top">
    <div class="container-fluid">
<!-- ***** Main Banner Area End ***** -->
    <style>
        /* Styles généraux */
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
            padding-top: 50px; /* Ajouter de l'espace en haut */
        }

        .image-menu {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: calc(100% - 50px); /* Réduire la hauteur pour l'espace en haut */
        }

        .image-menu img {
            max-width: 80%;
            max-height: 80%;
            width: auto;
            height: auto;
            transition: transform 1s, opacity 1s;
            position: absolute; /* Pour superposer les images */
        }

        .fade-in {
            opacity: 1;
        }

        .fade-out {
            opacity: 0;
        }
    </style>
</head>
<body>
    <div class="image-menu">
        <img id="image" src="assets/images/offre/1.png" alt="Promotion Image" class="fade-in">
    </div>

    <script>
        const images = [
            "assets/images/offre/1.png",
            "assets/images/offre/2.png",
            "assets/images/offre/3.png"
        ];

        let currentIndex = 0;
        const imgElement = document.getElementById('image');

        function changeImage() {
            imgElement.classList.remove('fade-in');
            imgElement.classList.add('fade-out');

            setTimeout(() => {
                currentIndex = (currentIndex + 1) % images.length;
                imgElement.src = images[currentIndex];
                imgElement.classList.remove('fade-out');
                imgElement.classList.add('fade-in');
            }, 1000); // Délai pour la transition de sortie
        }

        setInterval(changeImage, 3000); // Change image every 3 seconds
    </script>
</body>


