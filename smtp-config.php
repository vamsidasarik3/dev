<?php
/**
 * SMTP Mail Configuration
 * Supports environment variables or local override file (smtp-config.local.php)
 */

$defaultConfig = [
    // SMTP Server Settings
    'smtp_host'       => getenv('SMTP_HOST') ?: 'smtp.gmail.com',
    'smtp_port'       => (int)(getenv('SMTP_PORT') ?: 587),
    'smtp_secure'     => getenv('SMTP_SECURE') ?: 'tls', // 'tls' or 'ssl'
    'smtp_auth'       => true,
    'smtp_username'   => getenv('SMTP_USER') ?: '',
    'smtp_password'   => getenv('SMTP_PASS') ?: '',
    
    // Sender & Recipient Configuration
    'from_email'      => getenv('SMTP_FROM_EMAIL') ?: 'vamsi.dasarik2@gmail.com',
    'from_name'       => getenv('SMTP_FROM_NAME') ?: 'Vamsi Krishna (vamsidev.com Contact)',
    'to_email'        => getenv('SMTP_TO_EMAIL') ?: 'vamsi@vamsidev.com',
    'to_name'         => getenv('SMTP_TO_NAME') ?: 'Vamsi Krishna Dasari',
];

// Load local overrides if present
if (file_exists(__DIR__ . '/smtp-config.local.php')) {
    $localConfig = require __DIR__ . '/smtp-config.local.php';
    if (is_array($localConfig)) {
        // Normalize alias keys
        if (isset($localConfig['host']))       $localConfig['smtp_host']     = $localConfig['host'];
        if (isset($localConfig['port']))       $localConfig['smtp_port']     = (int)$localConfig['port'];
        if (isset($localConfig['encryption'])) $localConfig['smtp_secure']   = $localConfig['encryption'];
        if (isset($localConfig['username']))   $localConfig['smtp_username'] = $localConfig['username'];
        if (isset($localConfig['password']))   $localConfig['smtp_password'] = $localConfig['password'];

        $defaultConfig = array_merge($defaultConfig, $localConfig);
    }
}

return $defaultConfig;
