<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\User;
class NewZoom extends Notification
{ 
    use Queueable;
    protected $user;
    protected $join_url;
    protected $prof;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user,String $join_url, User $prof)
    {
        $this->user = $user;
        $this->join_url = $join_url;
        $this->prof = $prof;

      
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'user_id' => $this->user->id,
            'user_name' => $this->user->name,
            'join_url' => $this->join_url,
            'prof_id' => $this->prof->id,
             'prof_name' => $this->prof->name,

        ];
    }
}
