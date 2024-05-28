<?php
if (!isset($_SESSION['id_pemilik'])) {
    error_log("Session not set, redirecting to login.");
    header('location: ' . BASEURL . '/?controller=LandingPage');
    exit();
}
