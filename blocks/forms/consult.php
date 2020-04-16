<form class="consult" action="/ajax/send" method="post">
	<div class="content">
		<p class="header">Заявка на  бесплатную  консультацию</p>
		<div class="field">
			<label for="name">Имя <span>*</span></label>
			<input type="text" name="name" required />
		</div>
		<div class="field">
			<label for="phone">Телефон <span>*</span></label>
			<input type="text" name="phone" data-type="phone" required />
		</div>
		<div class="field">
			<input type="hidden" name="type" value="consalt" />
			<input type="submit" value="Отправить заявку" data-show-msg="" />
		</div>
	</div>
</form>
