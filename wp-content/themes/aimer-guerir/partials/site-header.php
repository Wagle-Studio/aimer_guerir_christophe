<header class="site-header">
	<div class="site-header__top">
		<div class="site-header__brand">
			<?php
			if (has_custom_logo()) {
				the_custom_logo();
			} else {
			?>
				<a class="site-header__brand-link" href="<?php echo esc_url(home_url('/')); ?>">
					<img class="site-header__logo" src="<?php echo esc_url(get_theme_file_uri('assets/images/logo_aimer_guerir.png')); ?>" alt="Aimer Gu&eacute;rir">
				</a>
			<?php
			}
			?>
			<p class="site-header__brand-tagline"><?php echo esc_html(get_theme_mod('aimer_guerir_contact_tagline', 'Magnétiseur – Coupeur de Feu')); ?></p>
		</div>
		<div class="site-header__contact">
			<div class="site-header__contact-item">
				<span class="site-header__contact-label">T&eacute;l&eacute;phone</span>
				<a class="site-header__contact-value" href="tel:<?php echo esc_attr(str_replace(' ', '', get_theme_mod('aimer_guerir_contact_phone', '06 95 64 54 76'))); ?>"><?php echo esc_html(get_theme_mod('aimer_guerir_contact_phone', '06 95 64 54 76')); ?></a>
			</div>
			<div class="site-header__contact-item site-header__contact-item--email">
				<span class="site-header__contact-label">E-mail</span>
				<a class="site-header__contact-value" href="mailto:<?php echo esc_attr(get_theme_mod('aimer_guerir_contact_email', 'contact@aimerguerir.com')); ?>"><?php echo esc_html(get_theme_mod('aimer_guerir_contact_email', 'contact@aimerguerir.com')); ?></a>
			</div>
			<div class="site-header__contact-item">
				<span class="site-header__contact-label">Adresse</span>
				<a class="site-header__contact-value" href="https://www.google.fr/maps/place/Aimer+Gu%C3%A9rir+-+Christophe+Rebours+-+Magn%C3%A9tiseur+Energ%C3%A9ticien/@49.090221,1.4736775,17z/data=!4m15!1m8!3m7!1s0x47e6cbc2d9e0c1bb:0x66a52c1a90689d22!2s24+Rue+de+l'Horloge,+27200+Vernon!3b1!8m2!3d49.0902175!4d1.4762524!16s%2Fg%2F11c12ps144!3m5!1s0x47e6c97507576f15:0x9145d4306984bf61!8m2!3d49.0901809!4d1.4762731!16s%2Fg%2F11lkk2k5nd?hl=fr&entry=ttu&g_ep=EgoyMDI2MDMxMS4wIKXMDSoASAFQAw%3D%3D" target="_blank" rel="noopener noreferrer"><?php echo esc_html(get_theme_mod('aimer_guerir_contact_address_street', "24 rue de l'Horloge")); ?>,<br><?php echo esc_html(get_theme_mod('aimer_guerir_contact_address_city', 'Vernon 27200')); ?></a>
			</div>
		</div>
	</div>
	<div class="site-nav">
		<button class="site-nav__toggle" type="button" aria-controls="site-nav-menu" aria-expanded="false">
			<span class="site-nav__toggle-icon" aria-hidden="true"></span>
			<span class="site-nav__toggle-label">Menu</span>
		</button>
		<nav class="site-nav__menu" id="site-nav-menu" aria-label="Menu principal">
			<?php
			if (has_nav_menu('primary')) {
				wp_nav_menu([
					'theme_location' => 'primary',
					'menu_class' => 'site-nav__list',
					'container' => false,
					'fallback_cb' => false,
				]);
			} else {
			?>
				<ul class="site-nav__list">
					<li class="site-nav__item">
						<a href="<?php echo esc_url(home_url('/')); ?>">Accueil</a>
					</li>
					<li class="site-nav__item">
						<a href="<?php echo esc_url(home_url('/qui-je-suis/')); ?>">Qui je suis</a>
					</li>
					<li class="site-nav__item">
						<a href="<?php echo esc_url(home_url('/prendre-rendez-vous')); ?>">Prendre rendez-vous</a>
					</li>
					<li class="site-nav__item">
						<a href="<?php echo esc_url(home_url('/articles-et-temoignages/')); ?>">Articles et témoignages</a>
					</li>
				</ul>
			<?php
			}
			?>
		</nav>
	</div>
</header>