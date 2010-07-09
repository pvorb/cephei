<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->_['lang']; ?>" lang="<?php echo $this->_['lang']; ?>">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title><?php echo $this->_['title'] ?></title>
		<link rel="stylesheet" href="<?php echo $this->_['rel_path'].'res/css/'.$this->_['stylesheet_url'].'.css'; ?>" />
		<link rel="shortcut icon" href="<?php echo $this->_['rel_path']; ?>res/favicon.ico" />
	</head>
	<body>
		<div id="title"><span>Genitis</span></div>
<?php include 'nav.tpl.php'; ?>
<?php include 'search_form.tpl.php'; ?>
		<h1><span><?php echo $this->_['title_long']; ?></span></h1>
		<div id="container">
			<div class="sec-1" id="content">
<?php str_indent($this->_['content'], 4); ?>
			</div>
<?php if ($this->_['info']): ?>
			<div class="sec-2">
<?php str_indent($this->_['info'], 4); ?>
			</div>
<?php endif; ?>
		</div>
<?php include 'about.tpl.php' ?>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<script type="text/javascript">
			$('#sf legend').click(function(){$('#sf input').hide();});
		</script>
	</body>
</html>