<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta http-equiv="Content-Language" content="en"/>
		<title><? echo $this->localize('Dialogue'); ?></title>
		<link href="<? echo $this->link('web/css/style.css'); ?>" rel="stylesheet" title="Default" type="text/css" />
		<!--link type="image/x-icon" href="img/favicon.ico" rel="shortcut icon"/-->
		<script type="text/javascript" src="<? echo $this->link('web/js/jquery-1.4.2.min.js'); ?>"></script>
		<script type="text/javascript" src="<? echo $this->link('web/js/dialogue.js'); ?>"></script>
	</head>
	<body>
		<div id="document">
			<div id="head">
				<ul id="menu">
					<li class="item">
<? if (isset($User)): ?>
<? if ($User->isTemporary()): ?>
						<a href="#signIn" title="<? echo $this->localize('Sign in'); ?>"><? echo $this->localize('Sign in'); ?></a>
<? else: ?>
						<a href="<? echo $this->link('Authentication/signOut?redirect=Dialogue/index'); ?>" title="<? echo $this->localize('Sign out'); ?>"><? echo $this->localize('Sign out'); ?></a>
<? endif; ?>
<? endif; ?>
					</li>
					<li class="item">
						<a href="#add" title="<? echo $this->localize('Add dialogue'); ?>"><? echo $this->localize('Add dialogue'); ?></a>
					</li>
					<li class="item">
						<a href="#show" title="<? echo $this->localize('Show dialogues'); ?>"><? echo $this->localize('Show dialogues'); ?></a>
					</li>
<? if (isset($User)): ?>
					<li class="item">
						<span<? if ($User->isTemporary()): ?> title="<? echo $this->localize('Temporary user name &ndash; to create a user account, hit \'Sign in\'!'); ?>"<? endif; ?>><? echo $User->getUserName(); ?></span>
					</li>
<? endif; ?>
				</ul>
<? if (isset($message) && !empty($message)): ?>
				<div id="message">
					<? echo $this->localize($message); ?>

				</div>
<? endif; ?>
			</div>
