<?php

namespace App\Notifications;

use App\Models\Projet;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NouveauProjetCree extends Notification
{
    use Queueable;

    public $projets;

    public function __construct(Projet $projets)
    {
        $this->projets = $projets;
    }

    /**
     * Détermine les canaux de notification : email + base de données.
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Contenu de l’email envoyé.
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Nouveau projet créé')
            ->greeting('Bonjour DSI,')
            ->line('Un nouveau projet a été ajouté : ' . $this->projets->libProj)
            ->line('Merci de le prendre en compte rapidement.');
    }

    /**
     * Contenu stocké dans la base de données (table `notifications`).
     */
    public function toArray($notifiable): array
    {
        return [
            'message' => 'Un nouveau projet a été créé : ' . $this->projets->libProj,
            'projet_id' => $this->projets->id,
            'created_at' => now()->toDateTimeString(),
        ];
    }
}
