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
			<p class="site-header__brand-tagline">Magn&eacute;tiseur &ndash; Coupeur de Feu</p>
		</div>
		<div class="site-header__contact">
			<div class="site-header__contact-item">
				<span class="site-header__contact-label">T&eacute;l&eacute;phone</span>
				<a class="site-header__contact-value" href="tel:0695645476">06 95 64 54 76</a>
			</div>
			<div class="site-header__contact-item">
				<span class="site-header__contact-label">E-mail</span>
				<a class="site-header__contact-value" href="mailto:contact@aimerguerir.com">contact@aimerguerir.com</a>
			</div>
			<div class="site-header__contact-item">
				<span class="site-header__contact-label">Adresse</span>
				<span class="site-header__contact-value">24 rue de l'Horloge,<br>Vernon 27200</span>
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
						<a href="<?php echo esc_url(home_url('/prendre-rendez-vous')); ?>">Rendez-vous</a>
					</li>
					<li class="site-nav__item">
						<a href="<?php echo esc_url(home_url('/les-seances/')); ?>">Les s&eacute;ances</a>
					</li>
					<li class="site-nav__item">
						<a href="<?php echo esc_url(home_url('/qui-suis-je/')); ?>">Qui suis-je</a>
					</li>
					<li class="site-nav__item">
						<a href="<?php echo esc_url(home_url('/blog/')); ?>">Articles</a>
					</li>
				</ul>
				<?php
			}
			?>
		</nav>
	</div>
</header>
