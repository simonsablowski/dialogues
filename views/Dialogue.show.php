<? $this->displayView('components/header.php'); ?>
			<div id="body">
				<div>
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
				</div>
			</div>
<? $this->displayView('components/footer.php'); ?>