<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;

class BotManController extends Controller
{
    /**
     * Placez votre logique BotMan ici.
     */
    public function handle()
    {
        $botman = app('botman');

        $botman->hears('{message}', function($botman, $message) {
            if ($message == 'bonjour') {
                $this->demanderNom($botman);
            } else if ($message == 'recommandation') {
                $this->recommanderVetements($botman);
            } else {
                $botman->reply("Démarrez une conversation en disant bonjour ou demandez une recommandation.");
            }
        });

        $botman->listen();
    }

    /**
     * Demander le nom de l'utilisateur.
     */
    public function demanderNom($botman)
    {
        $botman->ask('Bonjour ! Quel est votre nom ?', function(Answer $answer) {
            $nom = $answer->getText();
            $this->say('Enchanté, '.$nom);
        });
    }

    /**
     * Recommander des vêtements (pulls ou pantalons).
     */
    public function recommanderVetements($botman)
    {
        $botman->ask('Quel type de vêtements recherchez-vous ? (pulls ou pantalons)', function(Answer $answer) {
            $typeVetements = $answer->getText();

            if ($typeVetements == 'pulls') {
                $this->say('Je vous recommande un pull douillet pour cette saison.');
            } else if ($typeVetements == 'pantalons') {
                $this->say('Je vous recommande un pantalon confortable pour un look décontracté.');
            } else {
                $this->say('Je peux recommander soit des pulls soit des pantalons. Veuillez choisir l\'un d\'entre eux.');
            }
        });
    }
}  