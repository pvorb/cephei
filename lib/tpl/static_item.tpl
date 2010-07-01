<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="{$lang}" lang="{$lang}">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>{$title}</title>
		<link rel="stylesheet" href="{$stylesheet_url}" />
		<link rel="shortcut icon" href="{$res}favicon.ico" />
	</head>
	<body>
		<div id="title"><span>Genitis</span></div>
		<ul class="nav">
			<li class="active"><a href="">Startseite</a></li>
			<li><a href="">Blog</a></li>
			<li><a href="">Projekte</a></li>
		</ul>
		<form class="nav extra" id="sf" action="">
			<fieldset>
				<legend>Suche</legend>
				<input name="q" type="text" />
			</fieldset>
		</form>
		<div id="container">
			<h1>{$long_title}</h1>
			<div class="sec-1" id="content">
				{$content}
			</div>
			<div class="sec-2">
				<p>Diese Sektion kann als zusätzliche Beschreibung des Textes dienen. Alternativ dazu kann sie auch weitere Infos oder ganz andere Inhalte beschreiben.</p>
			</div>
		</div>
{textformat indent=2 indent_char="\t"}{include file="../lib/tpl/about.tpl"}{/textformat}
	</body>
</html>