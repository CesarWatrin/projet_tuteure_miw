<?php

namespace App\Notifications;

use App\Models\Store;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StoreEnabled extends Notification
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
            ->subject('Votre commerce est en ligne')
            ->greeting('Bonjour !')
            ->line('Vous recevez cet e-mail car notre équipe de modération a validé votre commerce "'.$this->moderation->store->name.'". Celui-ci est désormais en ligne, ce qui signifie qu\'il apparaît sur la carte.')
            ->line('Si vous le souhaitez, vous pouvez dès à présent jeter un coup d\'œil à votre commerce sur la carte.')
            ->action('Voir mon commerce sur la carte', url('map?lat='.$this->moderation->store->lat.'&lon='.$this->moderation->store->lon))
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
