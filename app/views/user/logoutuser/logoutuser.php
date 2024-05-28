<?php
session_destroy();
header('Location: ' . BASEURL . '/?controller=LandingPage');
exit();

