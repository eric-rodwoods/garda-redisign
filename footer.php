<?php $prefix = Contact::getInstance()->getParam('phone_prefix');
$address = Contact::getInstance()->getParam('address');
$phone = Contact::getInstance()->getParam('number_phone');
$fax = Contact::getInstance()->getParam('number_fax');
$email = Contact::getInstance()->getParam('email') ?>
	<footer id="footer-anchor">
		<div class="container-fluid">
			<div class="row">
				<div class="block-eight__container">
					<div class="block-eight__content">
						<div class="block-eight__content__logo">
							<img src="<?php echo get_template_directory_uri(); ?>/images/triangle-logo.svg">
						</div>
						<div class="block-eight__content__heading">
							<div class="block-eight__content__heading__text">
								ОСТАЛИСЬ ВОПРОСЫ?
							</div>
							<div class="block-eight__content__heading__note">
								Получите бесплатную консультацию
							</div>
						</div>	
						<?php echo do_shortcode('[contact-form-7 id="1416" title="Контактная форма 1"]'); ?>				
					</div>
				</div>	
			</div>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="footer__main">
					<div class="footer__main__block">
						<div class="footer__main__block__text">
							Тел.: <?= $prefix ?> <?= $phone ?>
						</div>
						<div class="footer__main__block__text">
							Факс: <?= $prefix ?> <?= $fax ?>
						</div>
						<div class="footer__main__block__text">
							Почта: <a href="mailto:<?= $email ?>"><?= $email ?></a>
						</div>
					</div>
					<div class="footer__main__block">
						<div class="footer__main__block__text">
						<?= $address ?>
						</div>						
					</div>
				</div>
			</div>
			<div class="row">
				<div class="footer__copyrights">
					<div class="footer__copyrights__block">
					&COPY; ООО "Гарда", <?= date(Y);?>
					</div>
					<div class="footer__copyrights__block">
						Разработка сайта
					</div>
					
				</div>
			</div>
		</div>
	</footer>
		<script type="text/javascript" src="/wp-content/themes/garda/js/smooth-scroll.min.js"></script>
		<script type="text/javascript" src="/wp-content/themes/garda/js/swiper.min.js"></script>
		<script type="text/javascript" src="/wp-content/themes/garda/js/main.js"></script>
		<script type="text/javascript" src="/wp-content/themes/garda/js/index.js"></script>
		<!-- Yandex.Metrika counter -->
		<script type="text/javascript">
			if (!(/\.local$/).test(window.location.host)) {
				(function (d, w, c) {
					(w[c] = w[c] || []).push(function() {
						try {
							w.yaCounter33274459 = new Ya.Metrika({id:33274459,
									webvisor:true,
									clickmap:true,
									trackLinks:true,
									accurateTrackBounce:true});
						} catch(e) { }
					});

					var n = d.getElementsByTagName("script")[0],
						s = d.createElement("script"),
						f = function () { n.parentNode.insertBefore(s, n); };
					s.type = "text/javascript";
					s.async = true;
					s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

					if (w.opera == "[object Opera]") {
						d.addEventListener("DOMContentLoaded", f, false);
					} else { f(); }
				})(document, window, "yandex_metrika_callbacks");
				function yaMetrics(target) {
					yaCounter33274459.reachGoal(target);
					return true;
				}
			}
	</script>
	<noscript><div><img src="//mc.yandex.ru/watch/33274459" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
	<!-- /Yandex.Metrika counter -->
	
    </body>
</html>
