<?php

namespace App\Notifications;

use App\Models\Projet;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
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

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }


    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Nouveau projet créé')
            ->greeting('Bonjour DSI,')
            ->line('Un nouveau projet a été ajouté : ' . $this->projets->libProj)
            ->line('Merci de le prendre en compte rapidement.');
            dd($this->projets);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    /**
     * Get the mail representation of the notification.
     */
    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
