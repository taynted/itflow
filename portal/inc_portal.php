<?php
/*
 * Client Portal
 * Includes for all pages (except login)
 */

require_once('../config.php');
require_once('../functions.php');
require_once('check_login.php');
require_once('portal_functions.php');

if (!isset($_SESSION)) {
    // HTTP Only cookies
    ini_set("session.cookie_httponly", true);
    if ($config_https_only) {
        // Tell client to only send cookie(s) over HTTPS
        ini_set("session.cookie_secure", true);
    }
    session_start();
}

require_once("portal_header.php");