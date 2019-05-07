<?php

namespace App\Mail\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EventPushed extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email_message = "سيتم اعطاء المستخدمين رصيد مجاني ";
        $intro = "    سيرفر ومجتمع هاتون هو الاول في العالم العربي لتزويد خدمات السوشيال ميديا حيث اننا لا نقدم اي نوع من انوع الخدمات الوهمية كل الخدمات التي تحصل عليها هي خدمات حقيقية100%  من متابعين ومشاركات وتعليقات ولايكات مع الاستهداف الكامل الذي تريده";


        return $this->subject("رصيد مجاني للمشتركين الجدد ")->replyTo("'no-reply@hatoon.com'")->from('no-reply@hatoon.com',"Hatoon Comunity")->view('Emails.BackEnd.event_pushed',compact("intro","email_message"));
    }
}
