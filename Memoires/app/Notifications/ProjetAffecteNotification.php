<?php

namespace App\Notifications;

use App\Models\Projet;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProjetAffecteNotification extends Notification
{
    use Queueable;

    protected $projet;

    public function __construct(Projet $projet)
    {
        $this->projet = $projet;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Nouveau projet affecté')
            ->greeting('Bonjour ' . $notifiable->name . ',')
            ->line('Un nouveau projet vous a été affecté : ' . $this->projet->libProj)
            ->action('Voir les projets', url(route('projets_parchef', $notifiable->id)))
            ->line('Merci de votre engagement.');
    }

    public function toArray($notifiable)
    {
        return [
            'message' => 'Le projet "' . $this->projet->libProj . '" vous a été affecté.',
            'projet_id' => $this->projet->id,
            'created_at' => now()->toDateTimeString(),

        ];
    }
}
