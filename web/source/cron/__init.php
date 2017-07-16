<?php

if($action != 'entry') {
	define('FRAME', 'setting');
	$frames = buildframes(array(FRAME));
	$frames = $frames[FRAME];
}
