<?php get_header( ); ?>

	<section class="block-one">
		<div class="swiper-container front-page-slider">
			<div class="swiper-wrapper">
<?php $q = new WP_Query('cat=137&posts_per_page=-1');
    if($q->have_posts()) {  while($q->have_posts()){ $q->the_post();
    	if( has_post_thumbnail() ) { $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); 
			$thmb = $thumb[0]; } 
			else {
			$thmb = 'https://picsum.photos/190/310'; }	?>
				<div class="swiper-slide">
					<div class="block-one__image" style="background-image: url(<?php echo $thmb; ?>)">
						<div class="block-one__content">
							<div data-swiper-parallax="-300" class="block-one__content-position">
								<div class="block-one__content__icon d-none d-sm-block">
									<img src="<?php echo get_template_directory_uri(); ?>/images/triangle-logo-grey.svg">
								</div>
								<div class="block-one__content-slogan">
									<h1>
										<?php echo the_field('slogan'); ?>
									</h1>								
								</div>
								<div class="block-one__content-text d-none d-sm-block">
									<?php echo the_field('add-info'); ?>
								</div>
							</div>						
						</div>
					</div>	
				</div>
<?php }}
wp_reset_postdata(); ?>						
			</div>
		</div>
	</section>

	<section class="block-two grey-color">
		<div class="container pt-xl-5 pt-3 pt-lg-4 pb-xl-5 pb-lg-4 pb-3">
			<div class="row justify-content-between">
				<div class="col-sm-3 col-6 p-lg-3 p-2">
					<div class="block-two__item">
						<img src="<?php echo get_template_directory_uri(); ?>/images/gayechniy-kluch.png">						
					</div>
					<div class="block-two__item">
						<div class="block-two__item__text">Надёжность конструкции</div>	
					</div>
				</div>
				<div class="col-sm-3 col-6 p-lg-3 p-2">
					<div class="block-two__item">
						<img src="<?php echo get_template_directory_uri(); ?>/images/shield.png">
					</div>
					<div class="block-two__item">
						<div class="block-two__item__text">Безопасность эксплуатации</div>
					</div>
				</div>
				<div class="col-sm-3 col-6 p-lg-3 p-2">
					<div class="block-two__item">
						<img src="<?php echo get_template_directory_uri(); ?>/images/sand-clock.png">
					</div>
					<div class="block-two__item">
						<div class="block-two__item__text">Долговечность</div>
					</div>
				</div>
				<div class="col-sm-3 col-6 p-lg-3 p-2">
					<div class="block-two__item">
						<img src="<?php echo get_template_directory_uri(); ?>/images/purse.png">
					</div>
					<div class="block-two__item">
						<div class="block-two__item__text">Экономичность</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php
//importProducts(get_template_directory() . '/json/allproducts.json');
?>
	<section class="block-three" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/garda-logotip.png);">
		<div class="container">
			<div class="row">
				<div class="col-xl-7 col-md-6 col-12">
					<div class="block-three__content">
						<div class="block-three__content__part-one block-three__content-padding">10 ЛЕТ</div>
						<div class="block-three__content__part-two block-three__content-padding">БЕЗУПРЕЧНОЙ РАБОТЫ</div>
						<div class="block-three__content__part-three block-three__content-padding">
							<img src="<?php echo get_template_directory_uri(); ?>/images/triangle-logo.svg">
							<span>ЗА ЭТО ВРЕМЯ НАМИ БЫЛО РЕАЛИЗОВАНО БОЛЕЕ 3000 ПРОЕКТОВ</span>
						</div>
						<div class="block-three__content__part-four">
							На нашем счету более 5000 успешно сданных объектов, находящихся в различных российских регионах. Наши заказчики, как частные клиенты, так и крупные предприятия. В том числе гипермаркеты сетей «Магнит» и «X5 Retail Group»,  Нововоронежская АЭС, корпорация «Гринн»,  Производственный центр "ОБО Беттерманн Производство",Завод по производству отопительного оборудования "Фондиталь", VIRBACauto,  и ряд других. Мы поставляем только качественное и надежное оборудование. Монтаж осуществляют  сертифицированные специалисты, готовые обеспечить стабильно высокое качество услуг.
						</div>
					</div>
				</div>
				<div class="col-xl-5 col-md-6 col-12 d-md-block d-none">
					<div class="block-three__slider">
						<div class="swiper-container slide-height main-slider">
						    <div class="swiper-wrapper">
						        <div class="swiper-slide">
						        	<img src="<?php echo get_template_directory_uri(); ?>/images/certificate.png">
						        </div>
						        <div class="swiper-slide">
						        	<img src="<?php echo get_template_directory_uri(); ?>/images/certificate.png">
						        </div>
						        <div class="swiper-slide">
						        	<img src="<?php echo get_template_directory_uri(); ?>/images/certificate.png">
						        </div>
						    </div>
						    <div class="swiper-pagination"></div>
						</div>
					</div>
				</div>
			</div>
		</div>		
	</section>	
	<section class="block-nine d-none d-sm-block">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4 col-sm-6 col-12 p-0">
					<div class="block-nine__item">
						<img src="<?php echo get_template_directory_uri(); ?>/images/block9-2.png">
						<div class="block-nine__item__text item-one__text__position">
							ВОРОТА «АЛЮТЕХ» ОТ ОФИЦИАЛЬНОГО ДИЛЕРА
						</div>
						<div class="block-four__item__hover block-nine__hover__text">
							<div class="block-nine__item__text block-nine__heading__color">
								ВОРОТА «АЛЮТЕХ» ОТ ОФИЦИАЛЬНОГО ДИЛЕРА
							</div>
							Ворота «Алютех» получили репутацию высококачественной надежной конструкции с объемной сферой применения – от частных владений и гаражей, паркингов до автосервисов или автомоек и промышленных организаций. В архитектуру они вписываются гармонично, служа ее дополнением и эстетически приятным акцентом.
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 col-12 p-0">
					<div class="block-nine__item">
						<img src="<?php echo get_template_directory_uri(); ?>/images/control.png">
						<div class="block-nine__item__text">
							СПОСОБЫ<br>УПРАВЛЕНИЯ
						</div>
						<div class="block-four__item__hover block-nine__hover__text">
							<div class="block-nine__item__text block-nine__heading__color">
								СПОСОБЫ УПРАВЛЕНИЯ
							</div>
							Есть ручной вариант управления секционными воротами «Алютех» и электроприводный — посредством пульта (дистанционного или стационарного).<br>
							Можно выполнить автоматизацию и уже готовых ворот – по желанию клиента. В случае если электричество будет отключено, можно разблокировать электропривод предусмотренным для этого механизмом.
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 col-12 p-0">
					<div class="block-nine__item">
						<img src="<?php echo get_template_directory_uri(); ?>/images/block9-3.png">
						<div class="block-nine__item__text item-three__text__position">
							БЕЗОПАСНОСТЬ
						</div>
						<div class="block-four__item__hover block-nine__hover__text">
							<div class="block-nine__item__text block-nine__heading__color">
								БЕЗОПАСНОСТЬ
							</div>
							Безопасности продукции в компании «Алютех» уделяется особенное внимание.<br>
							Сама форма панелей и шарниров не допускает возможности попадания между ними или между другими механизмами пальцев.<br>
							Применение современного оборудования, ведущие разработки конструкторов, неизменный контроль качества – все это «Алютех». Воронеж уже сегодня может получить продукцию, соответствующую мировым стандартам, обратившись в нашу компанию.
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 col-12 p-0">
					<div class="block-nine__item">
						<img src="<?php echo get_template_directory_uri(); ?>/images/block9-6.png">
						<div class="block-nine__item__text item-four__text__position">
							ДОЛГОВЕЧНОСТЬ
						</div>
						<div class="block-four__item__hover block-nine__hover__text">
							<div class="block-nine__item__text block-nine__heading__color">
								ДОЛГОВЕЧНОСТЬ
							</div>
							Секционные ворота «Алютех» имеют гарантийный ресурс на 25000 циклов подъем-опускание. Например, если воротами пользоваться до семи раз в сутки, он истечет через 10 лет. Далее срок эксплуатации можно увеличить, произведя замену пружины. Также можно ставить пружины на сто тысяч циклов.
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 col-12 p-0">
					<div class="block-nine__item">
						<img src="<?php echo get_template_directory_uri(); ?>/images/block9-5.png">
						<div class="block-nine__item__text">
							КОНСТРУКЦИЯ
						</div>
						<div class="block-four__item__hover block-nine__hover__text">
							<div class="block-nine__item__text block-nine__heading__color">
								КОНСТРУКЦИЯ
							</div>
							По конструкции секционные ворота «Алютех» — соединенные петлями сэндвич-панели, произведенные из специально обработанной и выдерживающей воздействия внешней среды листовой стали. Они перемещаются по направляющим их шинам, которые вместе с резиновыми уплотнителями отвечают за качественную герметизацию. При раскрытии ворот панели оказываются под потолком, то есть для этой операции много пространства не требуется.
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 col-12 p-0">
					<div class="block-nine__item">
						<img src="<?php echo get_template_directory_uri(); ?>/images/block9-4.png">
						<div class="block-nine__item__text item-six__text__position">
							АССОРТИМЕНТ
						</div>
						<div class="block-four__item__hover block-nine__hover__text">
							<div class="block-nine__item__text block-nine__heading__color">
								АССОРТИМЕНТ
							</div>
							Ассортимент продукции «Алютех» на сайте представлен в полной мере. Благодаря разнообразной палитре цветов вы сможете сохранить задуманный стиль дома или территории промышленной организации. Возможно окрашивание ворот в выбранный клиентом цвет, который можно сопоставить со шкалой RAL, панели могут иметь рисунок в виде микроволны, филенки, горизонтального гофра. Возможна поставка ворот с боковой дверью или калиткой, выполненными в общем стиле.
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="block-form">

		<div class="container-fluid">
			<div class="row">
				<div class="block-eight__container">
					<div class="block-eight__content block-eight__content__height">
						<div class="block-eight__content__logo">
							<img src="<?php echo get_template_directory_uri(); ?>/images/triangle-logo.svg">
						</div>
						<div class="block-eight__content__heading">
							<div class="block-eight__content__heading__text">
								заказать консультацию
							</div>
						</div>	
						<?php echo do_shortcode('[contact-form-7 id="1416" title="Контактная форма 1"]'); ?>			
					</div>
				</div>	
			</div>
		</div>
	</section>
	<section class="block-five">
		<div class="container-fluid">
			<div class="row">
				<div class="block-five__column d-sm-block d-none order-2 order-md-1">
					<div class="block-five__column__item" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/block5-4.png);">
						<div class="block-five__column__item__cover justify">
							<div class="block-five__column__item__text">
								<div class="block-five__column__item__logo">
									<img src="<?php echo get_template_directory_uri(); ?>/images/triangle-logo.svg">
								</div>
								СЕКЦИОННЫЕ ВОРОТА
							</div>
						</div>
					</div>
					<div class="block-five__column__item" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/block5-3.png);">
						<div class="block-five__column__item__cover  justify">
							<div class="block-five__column__item__text">
								<div class="block-five__column__item__logo">
									<img src="<?php echo get_template_directory_uri(); ?>/images/triangle-logo.svg">
								</div>
								РОЛЛЕТНЫЕ ВОРОТА
							</div>
						</div>
					</div>
				</div>

				<div class="block-five__content order-1 order-md-2">	
					<div class="block-five__content__logo">
						<img src="<?php echo get_template_directory_uri(); ?>/images/garda-vert-logo.svg">
					</div>
					<div class="block-five__content__text">
						Продукция выпускается в соответствии с национальными и международными требованиями к качеству и безопасности. Поддерживать изготовление ворот, роллет и алюминиевых профилей «АЛЮТЕХ» на высоком уровне позволяет применение качественного сырья, материалов и технологий. Завершающим этапом изготовления становятся испытания качества. Так, во время производства роллет «АЛЮТЕХ» отслеживает свыше 50 параметров, применяя более 40 контрольных методов. Благодаря такому подходу изделия отличаются совершенной конструкцией и долгим сроком службы.
						<div class="block-five__content__text-strong">Продукция поставляется в 65 стран и признана во всем мире.</div>
					</div>
				</div>

				<div class="block-five__column d-sm-block d-none order-3">
					<div class="block-five__column__item" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/block5-2.png);">
						<div class="block-five__column__item__cover">
							<div class="block-five__column__item__text">
								<div class="block-five__column__item__logo">
									<img src="<?php echo get_template_directory_uri(); ?>/images/triangle-logo.svg">
								</div>
								РОЛЬСТАВНИ
							</div>
						</div>
					</div>
					<div class="block-five__column__item" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/block5-1.png);">
						<div class="block-five__column__item__cover">
							<div class="block-five__column__item__text">
								<div class="block-five__column__item__logo">
									<img src="<?php echo get_template_directory_uri(); ?>/images/triangle-logo.svg">
								</div>
								АВТОМАТИКА
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>		
	</section>
	<section class="block-six">
		<div class="container-fluid">
			<div class="row">
				<div class="block-six__background kenburns-top" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/glavnaya-pict-2.png)">					
				</div>
				<div class="block-six__items__background">						
					<div class="block-six__heading">
						РАБОТАЕМ БЫСТРО! ДАЁМ ГАРАНТИЮ НАДОЛГО!
					</div>
					<div class="block-six__items__row">
						<div class="block-six__item">
							<div class="block-six__item__icon">
								<img src="<?php echo get_template_directory_uri(); ?>/images/triangle-logo.svg">
							</div>
							<div class="block-six__item__text">
								ВЫЕЗД СПЕЦИАЛИСТА НА ЗАМЕР
							</div>
							<div class="block-six__item__note">
								В день обращения
							</div>
						</div>							

						<div class="block-six__item">
							<div class="block-six__item__icon">
								<img src="<?php echo get_template_directory_uri(); ?>/images/triangle-logo.svg">
							</div>
							<div class="block-six__item__text">
								РАСЧЕТ И ПРОЕКТИРОВАНИЕ
							</div>
							<div class="block-six__item__note">
								1 рабочий день
							</div>
						</div>							

						<div class="block-six__item">
							<div class="block-six__item__icon">
								<img src="<?php echo get_template_directory_uri(); ?>/images/triangle-logo.svg">
							</div>
							<div class="block-six__item__text">
								ПОСТАВКА<br>И МОНТАЖ
							</div>
							<div class="block-six__item__note">
								От 1 до 14 дней
							</div>
						</div>							

						<div class="block-six__item">
							<div class="block-six__item__icon">
								<img src="<?php echo get_template_directory_uri(); ?>/images/triangle-logo.svg">
							</div>
							<div class="block-six__item__text">
								ГАРАНТИЙНОЕ ОБСЛУЖИВАНИЕ
							</div>
							<div class="block-six__item__note">
								1095 дней
							</div>
						</div>							

						<div class="block-six__item">
							<div class="block-six__item__icon">
								<img src="<?php echo get_template_directory_uri(); ?>/images/triangle-logo.svg">
							</div>
							<div class="block-six__item__text">
								ПОСЛЕГАРАНТИЙНОЕ ОБСЛУЖИВАНИЕ
							</div>
							<div class="block-six__item__note">
								Вечно
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>		
	</section>
	<section class="block-seven">
		<div class="container-fluid">			
			<div class="row">
				<div class="block-seven__content" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/video-bacground.png);">
			<?php if(sizeof(Data::getVideoProduct($post->ID)) > 0) { ?>
					<div class="block-video-main">

				        <iframe id="video" src=""></iframe>
						<div class="slider-video d-none">
		            <?php foreach (Data::getVideoProduct($post->ID) as $video) { ?>
					 
		                	<div class="embed" data-embed="<?= $video['embed']; ?>" data-title='<?= $video['title']; ?>'>
		                    	<img style="background-image: url(<?= $video['img']; ?>);" alt=""/>
		                	</div>
	                
		            <?php } ?>
				        </div>
						
					</div>
			<?php  } ?>

					<!-- <a class="block-seven__button" href="https://youtu.be/M005847RddY">
						<div >СМОТРЕТЬ ВИДЕО</div>						
					</a> -->					
				</div>
			</div>
		</div>
	</section>	
	<section class="block-four d-none d-sm-block">
		<div class="container-fluid pt-5">
			<div class="row justify-content-center">
				<div class="col-12 pb-3">
					<div class="block-four-prom__item__heading center-text">
						НАШИ ПОСТАВЩИКИ
					</div>
					<div class="red-line__main"></div>
				</div>
				<div class="col-lg-4 col-md-6 col-8 p-0">
					<div class="block-four__item">
						<img src="<?php echo get_template_directory_uri(); ?>/images/irbis.jpg">
						<div class="block-four__item__hover">
							Холодильные, маятниковые и технологические двери. Холодильные камеры. Камеры шоковой заморозки. Завод «Ирбис" является лидером на рынке промышленных дверей для холодильных камер, складов, мясоперерабатывающих и пищевых производств.
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-8 p-0">
					<div class="block-four__item">
						<img src="<?php echo get_template_directory_uri(); ?>/images/dynaco-logo.png">
						<div class="block-four__item__hover">
							Энергосберегающие скоростные ворота для склада, производства, ритейла, паркинга.<br>Технология PUSH-PULL
							<ul>
								<li>Скорость работы — до 2,7 м/с</li>
								<li>Длительный срок службы — до 3,5 млн циклов</li>
								<li>Большая ветровая нагрузка — до 140 км/ч</li>
								<li>Устойчивость к повреждениям</li>
								<li>Автоматическое самовосстановление</li>
								<li>Высокая интенсивность до 6 000 циклов в день</li>
								<li>Исключительная герметичность</li>
								<li>Абсолютная безопасность</li>
								<li>Минимальный сервис</li>
								<li>Соответствие требованиям современного производства</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-8 p-0">
					<div class="block-four__item">
						<img src="<?php echo get_template_directory_uri(); ?>/images/tormax.png">
						<div class="block-four__item__hover">
							Лучшие автоматические двери:
							<br>Распашные
							<br>Раздвижные
							<br>Револьверные
							<br>Складывающиеся
							<br><b>TORMAX – качество для требовательных клиентов</b>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-8 p-0">
					<div class="block-four__item">
						<img src="<?php echo get_template_directory_uri(); ?>/images/stall.png">
						<div class="block-four__item__hover">
							Доступные двери которые соответствуют всем требованиям технических регламентов пожарной безопасности:
							<ul>
								<li>
									сохраняют целостность несущей конструкции под воздействием высокой температуры
								</li>
								<li>
									блокируют выход огня и дыма из помещения, где находится источник возгорания
								</li>
								<li>
									обеспечивают герметичность сквозных щелей
								</li>
								<li>
									обеспечивают возможность быстрой и безопасной эвакуации людей из зданий и помещений
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-8 p-0">
					<div class="block-four__item">
						<img src="<?php echo get_template_directory_uri(); ?>/images/doormaster.png">
						<div class="block-four__item__hover">
							Противопожарные шторы и преграды российского производителя.
							<br>Высокое качество продукции, гарантирующее безотказную работу в экстремальных условиях. Соответствие российским регламентам пожарной безопасности. Запатентованная конструкция.
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-8 p-0">
					<div class="block-four__item">
						<img src="<?php echo get_template_directory_uri(); ?>/images/orman.png">
						<div class="block-four__item__hover">
							Офисные и интерьерные перегородки «Орман» - современные конструкции из алюминия и стекла, позволяющие стильно и эргономично произвести планировку офисных, частных и общественных помещений. Мы предлагаем широкий ассортимент офисных дверей, перегородок, стекла и фурнитуры для магазинов, торговых центров, офисов, частных домов.
						</div>
					</div>
				</div>
			</div>
		</div><!-- gsfgf -->
	</section>



<?php get_footer( ); ?>