<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Notice;

class ExamNotice extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
    public function toArray($notifiable)
    {
        $notice = Notice::find($notifiable->notice_id);
        $data = [
            'notice_id' => $notifiable->notice_id,
            'notice_type' => 'Exam Notice',
            'notice_sub_type' => $notifiable->notice_sub_type,
            'notice_name' => $notice->noticeType->notice_name,
            'details' => $notice->details,
            'department' => $notice->department->course_for,
            'department_id' => $notice->department_id,
            'semester' => $notice->semester,
            // 'course' => $notice->course_id,
            'start_date' => $notice->start_date,
            'end_date' => $notice->exp_date,
        ];
        return $data;

    }
}
