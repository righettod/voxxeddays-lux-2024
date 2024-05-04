<?php
/* Handle the issuing of the HTTP response security headers */

// Use a single variable for the policy to show the different iteration over the CSP policy easier.

//CSP option A
$policy = "Content-Security-Policy-Report-Only: default-src 'self'; script-src 'self' 'unsafe-inline'; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com https://fonts.gstatic.com; img-src 'self' data: blob:; font-src 'self' https://fonts.googleapis.com https://fonts.gstatic.com; report-uri /csp-notification-listener.php";


//CSP option B - step 1
$policy = "Content-Security-Policy: default-src 'self'; script-src 'self' 'unsafe-inline'; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com https://fonts.gstatic.com; img-src 'self' data: blob:; font-src 'self' https://fonts.googleapis.com https://fonts.gstatic.com;";

//CSP option B - step 2
$policy = "Content-Security-Policy: default-src 'self'; script-src 'self' 'unsafe-inline'; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com https://fonts.gstatic.com; img-src 'self' data: blob:; font-src 'self' https://fonts.googleapis.com https://fonts.gstatic.com; form-action 'self'";

//CSP option B - step 3
$policy = "Content-Security-Policy: default-src 'self'; script-src 'self'; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com https://fonts.gstatic.com; img-src 'self' data: blob:; font-src 'self' https://fonts.googleapis.com https://fonts.gstatic.com; form-action 'self'";

//CSP option B - step 4
$policy = "Content-Security-Policy: default-src 'self'; script-src 'self'; script-src-attr 'unsafe-inline'; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com https://fonts.gstatic.com; img-src 'self' data: blob:; font-src 'self' https://fonts.googleapis.com https://fonts.gstatic.com; form-action 'self'";

//CSP option B - step 5
$policy = "Content-Security-Policy: default-src 'self'; script-src 'self'; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com https://fonts.gstatic.com; img-src 'self' data: blob:; font-src 'self' https://fonts.googleapis.com https://fonts.gstatic.com; form-action 'self'";


//Set CSP policy and caching policy
header($policy, true);
header("Cache-Control: no-store", true);
