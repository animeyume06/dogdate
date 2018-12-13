<?php
require_once '../../core/includes.php';

$d = new Dog;

$d->delete();
header("Location: /dogs/");
exit();
