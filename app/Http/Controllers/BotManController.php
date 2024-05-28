<?php
namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use BotMan\BotMan\Messages\Attachments\Image;

class BotManController extends Controller
{
    /**
     * Placez votre logique BotMan ici.
     */
    public function handle()
    {
        $botman = app('botman');

        $botman->hears('{message}', function($botman, $message) {
            if ($message == 'bonjour' || $message == 'hi') {
                $botman->startConversation(new GenreConversation());
            } else {
                $botman->reply('Démarrez une conversation en disant bonjour ou hi !');
            }
        });

        $botman->listen();
    }
}


class GenreConversation extends Conversation
{
    protected $nom;

    public function demandeNom()
    {
        $this->ask('Quel est votre nom ?', function (Answer $answer) {
            $this->nom = $answer->getText();
            $this->run();
        });
    }

    public function run()
    {
        if (empty($this->nom)) {
            $this->demandeNom();
            return; // Arrêter l'exécution pour attendre la réponse à demandeNom
        }

        $this->ask('Ravi de vous rencontrer, ' . $this->nom . '. Êtes-vous un homme ou une femme ?', function (Answer $answer) {
            $genre = strtolower($answer->getText());

            if ($genre == 'homme' || $genre == 'h') {
                $this->saisieSaisonH();
            } elseif ($genre == 'femme' || $genre == 'f') {
                $this->saisieSaisonF();
            } else {
                $this->say('Veuillez saisir "Homme" ou "Femme".');
                $this->run();
            }
        });
    }
    public function saisieSaisonH()
    {
        $this->ask('De quelle saison avez-vous besoin ? (Été ou Hiver)', function (Answer $answer) {
            $saison = strtolower($answer->getText());

            if ($saison == 'été'||$saison == 'ete') {
                $this->saisieVetementsHommeEte('homme', 'été');
            } elseif ($saison == 'hiver') {
                $this->saisieVetementsHommeHiver('homme', 'hiver');
            } else {
                $this->say('Je ne peux recommander que pour l\'été ou l\'hiver.');
                $this->saisieSaisonH();
            }
        });
    }

    public function saisieSaisonF()
    {
        $this->ask('De quelle saison avez-vous besoin ? (Été ou Hiver)', function (Answer $answer) {
            $saison = strtolower($answer->getText());

            if ($saison == 'été'||$saison == 'ete') {
                $this->saisieVetementsFemmeete('femme', 'été');
            } elseif ($saison == 'hiver') {
                $this->saisieVetementsFemmeHiver('femme', 'hiver');
            } else {
                $this->say('Je ne peux recommander que pour l\'été ou l\'hiver.');
                $this->saisieSaisonF();
            }
        });
    }

    public function saisieVetementsFemmeEte($genre, $saison)
    {
        $this->ask('Quel type de vêtements recherchez-vous ? (pulls ou pantalons)', function (Answer $answer) use ($genre, $saison) {
            $typeVetements = strtolower($answer->getText());

            if ($typeVetements == 'pulls') {
                $this->say('Je vous recommande des pulls ' . $saison . ' pour ' . $genre . '.');

                // Envoyer une image de pulls
                $imagePath = 'assets\images\femme_pull\ch.jpg';
                $this->sendImage($imagePath);
            } elseif ($typeVetements == 'pantalons'|| $typeVetements == 'pantalon') {
                $this->say('Je vous recommande des pantalons ' . $saison . ' pour ' . $genre . '.');

                // Envoyer une image de pantalons
                $imagePath = 'assets\images\femme_pantalon\gris.jpg';
                $this->sendImage($imagePath);
                
  
            } else {
                $this->say('Je peux recommander soit des pulls soit des pantalons. Veuillez choisir l\'un d\'entre eux.');
                $this->saisieVetements($genre, $saison);
            }
        });
    }
    

    
    public function saisieVetementsFemmeHiver($genre, $saison)
    {
        $this->ask('Quel type de vêtements recherchez-vous ? (pulls ou pantalons)', function (Answer $answer) use ($genre, $saison) {
            $typeVetements = strtolower($answer->getText());

            if ($typeVetements == 'pulls') {
                $this->say('Je vous recommande des pulls ' . $saison . ' pour ' . $genre . '.');

                // Envoyer une image de pulls
                $imagePath = 'assets\images\femme_pull\capucheBleuMarineF.jpg';
                $this->sendImage($imagePath);
            } elseif ($typeVetements == 'pantalons') {
                $this->say('Je vous recommande des pantalons ' . $saison . ' pour ' . $genre . '.');

                // Envoyer une image de pantalons
                $imagePath = 'assets\images\femme_pantalon\87cbb1537231417ea1e8357be86966e1.jpg';
                $this->sendImage($imagePath);
            } else {
                $this->say('Je peux recommander soit des pulls soit des pantalons. Veuillez choisir l\'un d\'entre eux.');
                $this->saisieVetements($genre, $saison);
            }
        });
    }
    

    public function saisieVetementsHommeHiver($genre, $saison)
    {
        $this->ask('Quel type de vêtements recherchez-vous ? (pulls ou pantalons)', function (Answer $answer) use ($genre, $saison) {
            $typeVetements = strtolower($answer->getText());

            if ($typeVetements == 'pulls') {
                $this->say('Je vous recommande des pulls ' . $saison . ' pour ' . $genre . '.');

                // Envoyer une image de pulls
                $imagePath = 'assets\images\homme_pull\capucheBleuMarine.jpg';
                $this->sendImage($imagePath);
            } elseif ($typeVetements == 'pantalons') {
                $this->say('Je vous recommande des pantalons ' . $saison . ' pour ' . $genre . '.');

                // Envoyer une image de pantalons
                $imagePath = 'assets\images\homme_pantalon\hommePN.jpg';
                $this->sendImage($imagePath);
            } else {
                $this->say('Je peux recommander soit des pulls soit des pantalons. Veuillez choisir l\'un d\'entre eux.');
                $this->saisieVetements($genre, $saison);
            }
        });
    }


    

    public function saisieVetementsHommeEte($genre, $saison)
    {
        $this->ask('Quel type de vêtements recherchez-vous ? (pulls ou pantalons)', function (Answer $answer) use ($genre, $saison) {
            $typeVetements = strtolower($answer->getText());

            if ($typeVetements == 'pulls') {
                $this->say('Je vous recommande des pulls ' . $saison . ' pour ' . $genre . '.');

                // Envoyer une image de pulls
                $imagePath = 'assets\images\homme_pull\a23.jpg';
                $this->sendImage($imagePath);
            } elseif ($typeVetements == 'pantalons') {
                $this->say('Je vous recommande des pantalons ' . $saison . ' pour ' . $genre . '.');

                // Envoyer une image de pantalons
                $imagePath = 'assets\images\homme_pantalon\gris.jpg';
                $this->sendImage($imagePath);
                $this->say('Si vous avez besoin d\'autres recommandations plus personnalisées, essayez notre pack "Twinty" ou "Matchy".');
            } else {
                $this->say('Je peux recommander soit des pulls soit des pantalons. Veuillez choisir l\'un d\'entre eux.');
                $this->saisieVetements($genre, $saison);
            }
        });
    }


    public function sendImage($imagePath)
    {
        $imageUrl = asset($imagePath);

        $attachment = new Image($imageUrl);

        $message = OutgoingMessage::create()->withAttachment($attachment);

        $this->bot->reply($message);
    }


    public function terminerConversation()
{
    $this->say('Si vous avez besoin d\'autres recommandations plus personnalisées, essayez notre pack "Twinty" ou "Matchy".');
    $this->bot->stopConversation();
}


}
