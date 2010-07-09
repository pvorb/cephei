<?php
/**
 * Controller class of <code>static_item</code>.
 *
 * @author Paul Vorbach <p.vorbach@gmail.com>
 * @package org.genitis.cms.mod.static_item
 */

require_once DIR_MOD.'controller.def.php';
require_once 'static_item.model.php';
require_once 'static_item.frontend.view.php';

class static_item_frontend_controller implements controller {

	static function display($request) {
		if (is_array($request)) {

		} else {
			$res = static_item_model::get_entry(intval($request));
			$row = $res->fetch(PDO::FETCH_ASSOC);

			$v = new static_item_frontend_view();
			foreach ($row as $key => $value) {
				switch ($key) {
					case 'language':
						$key = 'lang';
						$value = substr($value, 0, 2); // no break needed
					default:
						$v->assign_ref($key, $value);
				}
			}

			$v->assign('years', '2007 - 2010');
			$v->assign_ref('rel_path', rel_path($row['level']));
			$v->assign('stylesheet_url', 'all');
			$v->assign('l10n_search', 'Suche');
			$v->assign('info', NULL);
		}

		$v->loadTemplate();
	}
}
