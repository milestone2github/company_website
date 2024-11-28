<?php

use Illuminate\Support\Facades\Http;

class WhatsappService
{
  public function sendWATemplateMessage($whatsappNumber, $parameters, $templateName, $broadcastName)
  {
    if (!$whatsappNumber) {
      throw new InvalidArgumentException('Please provide a valid whatsapp number');
    }

    if (strlen($whatsappNumber) === 10) {
      $whatsappNumber = "+91" . $whatsappNumber;
    }

    $url = "https://live-mt-server.wati.io/302180/api/v1/sendTemplateMessage?whatsappNumber=" . $whatsappNumber;

    $options = [
      'headers' => [
        "content-type" => "application/json",
        "Authorization" => "Bearer " . env('WATI_BEARER_TOKEN'),
      ],
      'json' => [
        'parameters' => $parameters,
        'template_name' => $templateName,
        'broadcast_name' => $broadcastName,
      ],
    ];

    try {
      $response = Http::withHeaders($options['headers'])->post($url, $options['json']);

      $responseData = $response->json();

      if (!isset($responseData['result'])) {
        throw new Exception('Error sending Whatsapp message');
      }

      if (isset($responseData['validWhatsAppNumber']) && !$responseData['validWhatsAppNumber']) {
        throw new InvalidArgumentException("Provided Whatsapp number {$whatsappNumber} is not valid");
      }

      return true;
    } catch (Exception $error) {
      throw new Exception($error->getMessage());
    }
  }
}
