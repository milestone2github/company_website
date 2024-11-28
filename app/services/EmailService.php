<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Log;
use PHPMailer\PHPMailer\PHPMailer;

class EmailService
{
  /**
   * Send an email.
   *
   * @param array $params
   * @return bool|string
   */
  public function sendEmail(array $params)
  {
    $from = $params['from'] ?? config('mail.from.address');
    $toAddress = $params['toAddress'];
    $subject = $params['subject'];
    $body = $params['body'];
    $attachments = $params['attachments'] ?? null;

    try {

      $mail = new PHPMailer();
      $mail->isSMTP();
      $mail->Host = env('MAIL_HOST');
      $mail->SMTPAuth = true;
      $mail->Username = env('MAIL_USERNAME');
      $mail->Password = env('MAIL_PASSWORD');
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      $mail->Port = env('MAIL_PORT');

      $mail->setFrom('noreply@example.com', 'Test App');
      $mail->addAddress($toAddress);

      $mail->Subject = $subject;
      $mail->Body = $body;

      if ($mail->send()) {
        return true;
      } else {
        throw new Exception($mail->ErrorInfo);
      }
    } catch (\Exception $e) {
      Log::error('MailService Error: ' . $e->getMessage());
      return $e->getMessage();
    }
  }
}
