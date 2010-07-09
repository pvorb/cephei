<?php
/**
 * Frontend view of <code>static_item</code>.
 *
 * @author Paul Vorbach <p.vorbach@gmail.com>
 * @package org.genitis.cms.mod.static_item
 */

require_once DIR_MOD.'view.def.php';

class static_item_frontend_view implements view {
	private $template;
	private $_ = array();

	function __construct($template = 'static_item') {
		if (!is_string($template) || !$template)
			throw new ErrorException('Parameter "$template" must be of type string and not empty', 0, 1, __FILE__, __LINE__);
		$this->template = $template;
	}

	function assign_ref($key, &$value) {
		$this->_[$key] = $value;
	}

	function assign($key, $value) {
		$this->_[$key] = $value;
	}

	function loadTemplate() {
		require_once DIR_TPL.$this->template.'.tpl.php';
	}
}
