<?php

namespace App\Notifications;

use App\Models\WorkOrder;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewWorkOrder extends Notification
{
    use Queueable;

    protected $workOrder;
    protected $line;

    /**
     * Create a new notification instance.
     *
     * @param WorkOrder $workOrder
     * @param String $line
     */
    public function __construct(WorkOrder $workOrder, string $line)
    {
        $this->workOrder = $workOrder;
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
            ->subject('Ordre de Travail - ' . now()->toDateTimeString())
            ->greeting("Hey!")
            ->line($this->line)
            ->action('Consulter', route("work_orders.show", ['work_order' => $this->workOrder]))
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
