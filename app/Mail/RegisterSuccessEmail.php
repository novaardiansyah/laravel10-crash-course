<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RegisterSuccessEmail extends Mailable
{
  use Queueable, SerializesModels;
  private User $user;

  /**
   * Create a new message instance.
   */
  public function __construct(User $user) 
  {
    $this->user = $user;
  }

  /**
   * Get the message envelope.
   */
  public function envelope(): Envelope
  {
    return new Envelope(
      subject: 'Thanks for joining ' . config('app.name', '@novaardiansyah'),
    );
  }

  /**
   * Get the message content definition.
   */
  public function content(): Content
  {
    return new Content(
      view: 'emails.register-success',
      with: [
        'user' => $this->user,
      ]
    );
  }

  /**
   * Get the attachments for the message.
   *
   * @return array<int, \Illuminate\Mail\Mailables\Attachment>
   */
  public function attachments(): array
  {
    return [
      Attachment::fromStorageDisk('public', 'profile/zCb9i8VwUFSKa94M4SApXZ5lOo8awU2mba5Vc9RR.png')
    ];
  }
}
