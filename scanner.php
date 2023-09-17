<?php
require_once('config.php');
require_once('functions.php');

// Check if the target URL is provided
if (empty($_POST['target_url'])) {
    die('Target URL is required.');
}

// Sanitize the target URL
$targetUrl = sanitizeInput($_POST['target_url']);

// Perform SQL injection check
$isSQLInjection = checkSQLInjection($targetUrl);

// Perform XSS check
$isXSS = checkXSS($targetUrl);

// Generate a CSRF token
$csrfToken = generateCSRFToken();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Scan Results</title>
</head>
<body>
    <h1>Scan Results</h1>
    <p>Target URL: <?php echo $targetUrl; ?></p>
    <p>SQL Injection Detected: <?php echo $isSQLInjection ? 'Yes' : 'No'; ?></p>
    <p>XSS Detected: <?php echo $isXSS ? 'Yes' : 'No'; ?></p>
    <p>CSRF Token: <?php echo $csrfToken; ?></p>
</body>
</html>

