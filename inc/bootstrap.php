<?php

spl_autoload_register('my_loader');

function my_loader($class) {
	require '../class/'.$class.'.php';
}