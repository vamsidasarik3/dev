<?php
/**
 * AJAX Contact Form Endpoint with PHPMailer SMTP Support
 * Safely processes website review and fix inquiries.
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

header('Content-Type: text/plain; charset=utf-8');

// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo 'error';
    exit;
}

// Anti-bot honeypot check (hidden form field)
if (!empty($_POST['b_contact_hp'])) {
    // Silently succeed for bots
    echo 'success';
    exit;
}

// Sanitize inputs
$name        = isset($_POST['name']) ? trim(strip_tags($_POST['name'])) : '';
$email       = isset($_POST['email']) ? trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)) : '';
$websiteUrl  = isset($_POST['website_url']) ? trim(strip_tags($_POST['website_url'])) : '';
$message     = isset($_POST['message']) ? trim(strip_tags($_POST['message'])) : '';
$submittedAt = date('Y-m-d H:i:s T');
$clientIp    = $_SERVER['REMOTE_ADDR'] ?? 'Unknown';

if (empty($message) && !empty($websiteUrl)) {
    $message = "Please review my website: " . $websiteUrl;
}

// Validate mandatory fields
if (empty($name) || empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo 'error';
    exit;
}

// Always record lead to a secure local log file so no inquiry is ever lost
$logEntry = sprintf(
    "[%s] IP: %s | Name: %s | Email: %s | URL: %s | Message: %s\n",
    $submittedAt,
    $clientIp,
    $name,
    $email,
    $websiteUrl ?: 'N/A',
    str_replace(["\r", "\n"], ' ', $message)
);
@file_put_contents(__DIR__ . '/leads.log', $logEntry, FILE_APPEND | LOCK_EX);

// Load PHPMailer if installed
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
}

// Load SMTP Configuration
$smtpConfig = file_exists(__DIR__ . '/smtp-config.php') ? require __DIR__ . '/smtp-config.php' : [];

$toEmail   = $smtpConfig['to_email'] ?? 'vamsi@vamsidev.com';
$toName    = $smtpConfig['to_name'] ?? 'Vamsi Krishna Dasari';
$fromEmail = $smtpConfig['from_email'] ?? 'vamsi@vamsidev.com';
$fromName  = $smtpConfig['from_name'] ?? 'VamsiDev Inquiry Form';

$domainHost = !empty($websiteUrl) ? parse_url($websiteUrl, PHP_URL_HOST) : '';
$subject    = "Website Review Request from " . $name . (!empty($domainHost) ? " [" . $domainHost . "]" : "");

// Build Clean HTML Email Body
$htmlUrl = !empty($websiteUrl) ? '<a href="' . htmlspecialchars($websiteUrl) . '" target="_blank" style="color: #34d399; text-decoration: underline; font-weight: 600;">' . htmlspecialchars($websiteUrl) . '</a>' : '<span style="color: #71717a;">Not provided</span>';
$htmlMessage = nl2br(htmlspecialchars($message));
$safeName = htmlspecialchars($name);
$safeEmail = htmlspecialchars($email);

$htmlBody = <<<HTML
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>New Website Review Request</title>
</head>
<body style="margin: 0; padding: 20px; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; background-color: #0f0f12; color: #f4f4f5;">
  <div style="max-width: 600px; margin: 0 auto; background: #16161b; border: 1px solid rgba(255,255,255,0.1); border-radius: 12px; overflow: hidden;">
    <div style="background: linear-gradient(135deg, #6366f1, #a855f7); padding: 20px 24px; color: #ffffff;">
      <h2 style="margin: 0; font-size: 20px; font-weight: 700;">New Website Review Request</h2>
      <p style="margin: 4px 0 0 0; font-size: 13px; opacity: 0.9;">Received via vamsidev.com contact form</p>
    </div>
    
    <div style="padding: 24px;">
      <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
        <tr>
          <td style="padding: 8px 0; color: #a1a1aa; font-size: 14px; width: 130px;">Client Name:</td>
          <td style="padding: 8px 0; color: #ffffff; font-size: 15px; font-weight: 600;">{$safeName}</td>
        </tr>
        <tr>
          <td style="padding: 8px 0; color: #a1a1aa; font-size: 14px;">Email Address:</td>
          <td style="padding: 8px 0; font-size: 15px;"><a href="mailto:{$safeEmail}" style="color: #818cf8; text-decoration: none;">{$safeEmail}</a></td>
        </tr>
        <tr>
          <td style="padding: 8px 0; color: #a1a1aa; font-size: 14px;">Website URL:</td>
          <td style="padding: 8px 0; font-size: 15px;">{$htmlUrl}</td>
        </tr>
        <tr>
          <td style="padding: 8px 0; color: #a1a1aa; font-size: 14px;">Submitted On:</td>
          <td style="padding: 8px 0; color: #a1a1aa; font-size: 13px;">{$submittedAt}</td>
        </tr>
        <tr>
          <td style="padding: 8px 0; color: #a1a1aa; font-size: 14px;">Sender IP:</td>
          <td style="padding: 8px 0; color: #a1a1aa; font-size: 13px;">{$clientIp}</td>
        </tr>
      </table>

      <div style="background: #09090b; border: 1px solid rgba(255,255,255,0.06); border-radius: 8px; padding: 16px; margin-top: 10px;">
        <h4 style="margin: 0 0 8px 0; color: #818cf8; font-size: 13px; text-transform: uppercase; letter-spacing: 0.05em;">Project Details / Needs Help With:</h4>
        <p style="margin: 0; color: #f4f4f5; font-size: 14px; line-height: 1.6;">{$htmlMessage}</p>
      </div>

      <div style="margin-top: 24px; text-align: center;">
        <a href="mailto:{$safeEmail}?subject=Re:%20Website%20Review%20for%20{$safeName}" style="display: inline-block; background: #6366f1; color: #ffffff; padding: 10px 20px; border-radius: 6px; text-decoration: none; font-weight: 600; font-size: 14px;">Reply to {$safeName}</a>
      </div>
    </div>
  </div>
</body>
</html>
HTML;

// Plain text fallback body
$plainBody = "You have received a new website review / fix request via vamsidev.com\n\n";
$plainBody .= "--------------------------------------------------\n";
$plainBody .= "Name:         " . $name . "\n";
$plainBody .= "Email:        " . $email . "\n";
if (!empty($websiteUrl)) {
    $plainBody .= "Website URL:  " . $websiteUrl . "\n";
}
$plainBody .= "Submitted on: " . $submittedAt . "\n";
$plainBody .= "User IP:      " . $clientIp . "\n";
$plainBody .= "--------------------------------------------------\n\n";
$plainBody .= "Details / Needs Help With:\n" . $message . "\n\n";
$plainBody .= "--------------------------------------------------\n";

$sentSuccessfully = false;

// Attempt delivery via PHPMailer SMTP if configured
if (class_exists('PHPMailer\PHPMailer\PHPMailer') && !empty($smtpConfig['smtp_username']) && !empty($smtpConfig['smtp_password'])) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = $smtpConfig['smtp_host'] ?? 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = $smtpConfig['smtp_username'];
        $mail->Password   = $smtpConfig['smtp_password'];
        $mail->SMTPSecure = ($smtpConfig['smtp_secure'] === 'ssl') ? PHPMailer::ENCRYPTION_SMTPS : PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = (int)($smtpConfig['smtp_port'] ?? 587);
        $mail->Timeout    = 10;

        // Identity
        $mail->setFrom($fromEmail, $fromName);
        $mail->addAddress($toEmail, $toName);
        $mail->addReplyTo($email, $name);

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $htmlBody;
        $mail->AltBody = $plainBody;

        $mail->send();
        $sentSuccessfully = true;
    } catch (Exception $e) {
        error_log("PHPMailer SMTP Error: " . $mail->ErrorInfo);
        $sentSuccessfully = false;
    }
}

// Fallback to native PHP mail() if SMTP was not configured or encountered an issue
if (!$sentSuccessfully) {
    $headers   = array();
    $headers[] = 'From: ' . $fromName . ' <' . $fromEmail . '>';
    $headers[] = 'Reply-To: ' . $name . ' <' . $email . '>';
    $headers[] = 'X-Mailer: PHP/' . phpversion();
    $headers[] = 'Content-Type: text/plain; charset=UTF-8';

    @mail($toEmail, $subject, $plainBody, implode("\r\n", $headers));
}

// Return success so frontend user interface shows confirmation
echo 'success';
