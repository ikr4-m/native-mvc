<?php

// Require all file in core folder
$files = glob('./app/core/*.php');
foreach ($files as $file) {
    require $file;
}
