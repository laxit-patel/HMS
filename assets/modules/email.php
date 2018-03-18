<?php// using SendGrid's PHP Library
// https://github.com/sendgrid/sendgrid-php
// If you are using Composer (recommended)
//require 'vendor/autoload.php';
// If you are not using Composer

function email($receiver,$content,$subject)
{
    require("sendgrid-php/sendgrid-php.php");
    $from = new SendGrid\Email("Rudani Hospital", "patellaxit8@gmail.com");
    $subject = $subject;
    $to = new SendGrid\Email("", "$receiver");
    $content = new SendGrid\Content("text/plain", "$content");
    $mail = new SendGrid\Mail($from, $subject, $to, $content);
    $apiKey = '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';
    $sg = new \SendGrid($apiKey);
    $response = $sg->client->mail()->send()->post($mail);
   if($response->statusCode() == 202)
	{
		return true;
	}
	else
	{
		return false;
	}


}

?>