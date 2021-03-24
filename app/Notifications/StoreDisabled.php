<?php

namespace App\Notifications;

use App\Models\Store;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StoreDisabled extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($moderation = null)
    {
        $this->moderation = $moderation;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Votre commerce est hors ligne')
            ->greeting('Bonjour !')
            ->line('Vous recevez cet e-mail car notre équipe de modération a désactivé votre commerce "'.$this->moderation->store->name.'". Celui-ci est désormais hors ligne, ce qui signifie qu\'il n\'apparaît pas sur la carte.')
            ->line('Voici la raison de cette action :')
            ->line('"'.$this->moderation->comment.'"')
            ->line('Vous pouvez dès à présent modifier les informations de votre commerce et soumettre celui-ci à une nouvelle modération.')
            ->action('Modifier mon commerce', url('dashboard/'.$this->moderation->store->id))
            ->line('N\'hésitez pas à nous contacter en cas de problème, nous restons à votre entière disposition.')
            ->salutation('L\'équipe MAC-YO');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
