<form class="zamer" action="/ajax/send" method="post">
	<div class="content">
		<p class="header">Бесплатный замер в день обращения</p>
		<div class="field">
			<label for="name">Имя <span>*</span></label>
			<input type="text" name="name" autocomplete="off" required />
		</div>
		<div class="field">
			<label for="phone">Телефон <span>*</span></label>
			<input type="text" name="phone" autocomplete="off" data-type="phone" required />
		</div>
		<div class="field">
			<input type="hidden" name="type" value="zamer" />
			<input type="submit" value="Отправить заявку" data-show-msg="" />
		</div>
	</div>
</form>
