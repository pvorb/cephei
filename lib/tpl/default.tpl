<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>{$title} | {$site_name}</title>
		<link rel="icon" href="{$base}favicon.ico" />
		<link type="text/css" rel="stylesheet" charset="utf-8" href="{$base}res/css/default.css" media="all" />
		<meta name="author" content="{$author}" />
	</head>
	<body>
		<div id="intro">
			<div id="title"><span>{$site_name}</span></div>
			{$nav}
		</div>
		<div id="container">
			<h1>{$title_long}</h1>
			{$content}
			{$info}
		</div>
		<div id="about">
			<p id="copyright">&copy; {$year} Paul Vorbach</p>
		</div>
	</body>
</html>