<?php

ini_set('display_errors', 1);

require_once 'configs/bootstrap.php';

$config = include 'configs/conf.php';

(new \app\Application())->run($config);