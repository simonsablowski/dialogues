<? $this->displayView('components/header.php'); ?>
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
<? $this->displayView('components/footer.php'); ?>