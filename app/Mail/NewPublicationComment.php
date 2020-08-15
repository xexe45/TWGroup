<?php

namespace App\Mail;

use App\Models\Publication;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewPublicationComment extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $publication;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Publication $publication)
    {
        $this->user = $user;
        $this->publication = $publication;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.comments')->subject('Recibiste un nuevo comentario en una publicacion');
    }
}
