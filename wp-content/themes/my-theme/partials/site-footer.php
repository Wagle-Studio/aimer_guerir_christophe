<footer class="site-footer">
	<div class="site-footer__wrapper">
		<div class="site-footer__brand">
			<img class="site-footer__logo" src="<?php echo esc_url(get_theme_file_uri('assets/images/logo_aimer_guerir.png')); ?>" alt="Aimer Gu&eacute;rir">
			<p class="site-footer__tagline"><?php echo esc_html(get_theme_mod('my_theme_contact_tagline', 'Magnétiseur – Coupeur de Feu')); ?></p>
		</div>
		<div class="site-footer__contact">
			<div class="site-footer__contact-item">
				<span class="site-footer__contact-label">T&eacute;l&eacute;phone</span>
				<a class="site-footer__contact-value" href="tel:<?php echo esc_attr(str_replace(' ', '', get_theme_mod('my_theme_contact_phone', '06 95 64 54 76'))); ?>"><?php echo esc_html(get_theme_mod('my_theme_contact_phone', '06 95 64 54 76')); ?></a>
			</div>
			<div class="site-footer__contact-item">
				<span class="site-footer__contact-label">E-mail</span>
				<a class="site-footer__contact-value" href="mailto:<?php echo esc_attr(get_theme_mod('my_theme_contact_email', 'contact@aimerguerir.com')); ?>"><?php echo esc_html(get_theme_mod('my_theme_contact_email', 'contact@aimerguerir.com')); ?></a>
			</div>
			<div class="site-footer__contact-item">
				<span class="site-footer__contact-label">Adresse</span>
				<span class="site-footer__contact-value"><?php echo esc_html(get_theme_mod('my_theme_contact_address_street', "24 rue de l'Horloge")); ?>,<br><?php echo esc_html(get_theme_mod('my_theme_contact_address_city', 'Vernon 27200')); ?></span>
			</div>
		</div>
	</div>
</footer>
