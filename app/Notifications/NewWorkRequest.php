<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\WorkRequest;

class NewWorkRequest extends Notification implements ShouldQueue
{
    use Queueable;

    protected $workRequest;
    protected $line;

    /**
     * Create a new notification instance.
     *
     * @param WorkRequest $workRequest
     * @param String $line
     */
    public function __construct(WorkRequest $workRequest, String $line)
    {
        $this->workRequest = $workRequest;
        $this->line = $line;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Demande de Travail - ' . now()->toDateTimeString())
            ->greeting("Hey!")
            ->line($this->workRequest->user->name." ".$this->line)
            ->action('Consulter', route("work_requests.show",['work_request'=>$this->workRequest]))
            ->line('Do Not Reply!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
