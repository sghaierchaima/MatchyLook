@extends('layouts.menu')
@section('content')


<head>
    <meta charset="UTF-8" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Document</title>
    <style>

        html,
        body,
        .frame {
            
            width: 1080px;
            height: 800px;
            margin: 0 auto;
            font-family: -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Oxygen, Ubuntu, Cantarell, Fira Sans,
                Droid Sans, Helvetica Neue, sans-serif;
            padding: 20px;
            font-size: 14px;
            border: none;
        }

        .warning {
            background-color: #e9eeee;
            padding: 3px;
            border-radius: 5px;
            color: rgb(43, 42, 42);
            padding: 0;
            margin: 10px auto;
        }
        input[type="button"] {
            background-color: #1e1f1f;
            color: #c1fafee6;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: color 0.3s ease;
            display: block;
            padding: 10 px;
            margin: 20px auto;
        }
        li{
            margin: 10px auto;

        }

        /* Style pour le survol */
        input[type="button"]:hover {
            color: #110643;
            background-color: #80f2e9;
        }
        .scroll-text {
            background: #80f2e9;
            color: #333;
            font-size: 24px;
            position: relative; /* Position relative pour déplacer le texte */
            overflow: hidden; /* Masquer tout dépassement de texte */
            height: 50px; /* Hauteur du conteneur du texte */
            line-height: 50px; /* Hauteur de ligne égale à la hauteur du conteneur */
        }

        .scroll-text span {
            position: absolute; /* Position absolue pour déplacer le texte */
            width: auto; /* Largeur automatique */
            height: auto;
            margin: 0;
            padding: 0;
            right: 100%; /* Déplacer le texte à droite */
            animation: scroll 10s linear infinite; /* Animation de défilement */
        }

        @keyframes scroll {
            from {
                right: 100%; /* Début de l'animation : complètement à droite */
            }
            to {
                right: -100%; /* Fin de l'animation : complètement à gauche */
            }
        }
        
    </style>
</head>

<body>
</br> 
</br> 

</br>
<div class="scroll-text">
    <span>Bienvenue dans votre espace d'essayage Virtuel</span>
</div>

    <ul align=center> 
    <li> <B>1- </B>Cliquez sur le bouton "Essayer".</li> 
    <li><B>2- </B>Créez un avatar et cliquez sur le bouton "Terminé" une fois la personnalisation terminée.</li> 
</ul> 
    <p class="warning"  align=center>
        Si vous rencontrez un problème, n'hésitez pas à nous <a href="{{route('about')}}"> Contacter</a>    </p>

    <input type="button" value="Essayer" onClick="displayIframe()" />

    <iframe id="frame" class="frame" allow="camera *; microphone *; clipboard-write" hidden></iframe>

    <script>
        const subdomain = 'demo'; // Replace with your custom subdomain
        const frame = document.getElementById('frame');

        frame.src = `https://${subdomain}.readyplayer.me/avatar?frameApi`;

        window.addEventListener('message', subscribe);
        document.addEventListener('message', subscribe);

        function subscribe(event) {
            const json = parse(event);

            if (json?.source !== 'readyplayerme') {
                return;
            }

            // Susbribe to all events sent from Ready Player Me once frame is ready
            if (json.eventName === 'v1.frame.ready') {
                frame.contentWindow.postMessage(
                    JSON.stringify({
                        target: 'readyplayerme',
                        type: 'subscribe',
                        eventName: 'v1.**'
                    }),
                    '*'
                );
            }

            // Get avatar GLB URL
            if (json.eventName === 'v1.avatar.exported') {
                console.log(`Avatar URL: ${json.data.url}`);
                document.getElementById('avatarUrl').innerHTML = `Avatar URL: ${json.data.url}`;
                document.getElementById('frame').hidden = true;
            }

            // Get user id
            if (json.eventName === 'v1.user.set') {
                console.log(`User with id ${json.data.id} set: ${JSON.stringify(json)}`);
            }
        }

        function parse(event) {
            try {
                return JSON.parse(event.data);
            } catch (error) {
                return null;
            }
        }

        function displayIframe() {
            document.getElementById('frame').hidden = false;
        }
    </script>
</body>

@endsection