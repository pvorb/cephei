<?php

interface view {
	function assign_ref($key, &$value);
	function assign($key, $value);
	function loadTemplate();
}
