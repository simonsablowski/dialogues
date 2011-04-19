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
<? if ($User->isTemporary()): ?>
						<a href="#signIn" title="<? echo $this->localize('Sign in'); ?>"><? echo $this->localize('Sign in'); ?></a>
<? else: ?>
						<a href="<? echo $this->link('Authentication/signOut?redirect=Dialogue/index'); ?>" title="<? echo $this->localize('Sign out'); ?>"><? echo $this->localize('Sign out'); ?></a>
<? endif; ?>
					</li>
					<li class="item">
						<a href="#add" title="<? echo $this->localize('Add dialogue'); ?>"><? echo $this->localize('Add dialogue'); ?></a>
					</li>
					<li class="item">
						<a href="#show" title="<? echo $this->localize('Show dialogues'); ?>"><? echo $this->localize('Show dialogues'); ?></a>
					</li>
					<li class="item">
						<span<? if ($User->isTemporary()): ?> title="<? echo $this->localize('Temporary user name &ndash; to create a user account, hit \'Sign in\'!'); ?>"<? endif; ?>><? echo $User->getUserName(); ?></span>
					</li>
				</ul>
<? if (isset($message) && !empty($message)): ?>
				<div id="message">
					<? echo $this->localize($message); ?>

				</div>
<? endif; ?>
			</div>
			<div id="body">
				<div id="show" class="page">
					<h2>
						<? echo $this->localize('Show dialogues'); ?>

					</h2>
<? foreach ($Dialogues as $n => $Dialogue): ?>
					<div class="dialogue">
						<h3>
							<? echo $Dialogue->getTitle(); ?>

						</h3>
						<ul>
<? $messages = ($messages = $Dialogue->getBody()) && $Dialogue->anonymize() ? Anonymizer::apply($messages) : $messages; ?>
<? $messages = $messages && $Dialogue->interpret() ? Interpreter::apply($messages) : $messages; ?>
<? foreach ($messages as $message): ?>
							<li>
								<div class="message">
									<p class="date time">
										<? echo strftime('%X', $message['time']); ?>

									</p>
									<p class="author">
										<? echo $this->localize($message['author']); ?>

									</p>
									<p class="body">
										<? echo nl2br($message['body']); ?>

									</p>
								</div>
							</li>
<? endforeach; ?>
						</ul>
						<p class="date">
							<? echo strftime('%x, %X', strtotime($Dialogue->getCreated())); ?>

						</p>
					</div>
<? endforeach; ?>
				</div>
				<div id="add" class="page">
					<h2>
						<? echo $this->localize('Add dialogue'); ?>

					</h2>
					<form action="<? echo $this->link('Dialogue/add'); ?>" method="post">
						<p>
							<input type="text" name="title" value=""/>
						</p>
						<p>
							<textarea name="body"></textarea>
						</p>
						<p>
							<input type="submit" name="submit" value="<? echo $this->localize('Submit'); ?>"/>
						</p>
					</form>
				</div>
				<div id="signIn" class="page">
					<h2>
						<? echo $this->localize('Sign in'); ?>

					</h2>
					<form action="<? echo $this->link('Authentication/signIn?redirect=Dialogue/index'); ?>" method="post">
						<p>
							<input type="text" name="userName" value=""/>
						</p>
						<p>
							<input type="submit" name="submit" value="<? echo $this->localize('Submit'); ?>"/>
						</p>
					</form>
				</div>
			</div>
		</div>
		<div id="foot">
			<p id="copyright">
				&copy; 2011 <a href="http://www.simsab.de" title="simsab">simsab</a>
			</p>
		</div>
	</body>
</html>