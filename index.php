<?php

require 'vendor/autoload.php';
require 'config.php';

// front controller - app entry point
(new Controller\FormController($_POST))->dispatch();
