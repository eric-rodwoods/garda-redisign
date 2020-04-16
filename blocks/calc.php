<section id="block-calc"></section>

<?php if ($calc->enabled()) {
	    echo $calc->getCalc('#block-calc');
		/*if ($calc->textExist()) {
			echo '<section id="block-calc-text">'. $calc->getText() .'<div class="gradient" style="display: block;"><img src="/wp-content/themes/garda/img/arrow-2.png"/></div></section>';
		}*/
	} ?>


