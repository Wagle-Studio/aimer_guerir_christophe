<?php
$social_instagram = esc_url(get_theme_mod('aimer_guerir_social_instagram', ''));
$social_facebook  = esc_url(get_theme_mod('aimer_guerir_social_facebook', ''));
$social_linkedin  = esc_url(get_theme_mod('aimer_guerir_social_linkedin', ''));

$social_links = array_filter([
    ['url' => $social_facebook,  'name' => 'Facebook',  'icon' => 'icon-facebook'],
    ['url' => $social_instagram, 'name' => 'Instagram', 'icon' => 'icon-instagram'],
    ['url' => $social_linkedin,  'name' => 'LinkedIn',  'icon' => 'icon-linkedin'],
], fn($s) => $s['url'] !== '');
?>
<footer class="site-footer">
	<div class="site-footer__wrapper">
		<div class="site-footer__brand">
			<img class="site-footer__logo" src="<?php echo esc_url(get_theme_file_uri('assets/images/logo_aimer_guerir.png')); ?>" alt="Aimer Gu&eacute;rir">
			<p class="site-footer__tagline"><?php echo esc_html(get_theme_mod('aimer_guerir_contact_tagline', 'Magnétiseur – Coupeur de Feu')); ?></p>
			<a href="/mentions-legales-et-politique-de-confidentialite" class="site-footer__tagline--link">Mentions Légales et Politique de Confidentialité</a>
			<?php if (!empty($social_links)) : ?>
			<div class="site-footer__social">
				<?php foreach ($social_links as $social) : ?>
				<a class="site-footer__social-link" href="<?php echo $social['url']; ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr($social['name']); ?>">
					<?php include get_theme_file_path('assets/icons/' . $social['icon'] . '.php'); ?>
					<span><?php echo esc_html($social['name']); ?></span>
				</a>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
		</div>
		<div class="site-footer__contact">
			<div class="site-footer__contact-item">
				<span class="site-footer__contact-label">T&eacute;l&eacute;phone</span>
				<a class="site-footer__contact-value" href="tel:<?php echo esc_attr(str_replace(' ', '', get_theme_mod('aimer_guerir_contact_phone', '06 95 64 54 76'))); ?>"><?php echo esc_html(get_theme_mod('aimer_guerir_contact_phone', '06 95 64 54 76')); ?></a>
			</div>
			<div class="site-footer__contact-item site-footer__contact-item--email">
				<span class="site-footer__contact-label">E-mail</span>
				<a class="site-footer__contact-value" href="mailto:<?php echo esc_attr(get_theme_mod('aimer_guerir_contact_email', 'contact@aimerguerir.com')); ?>"><?php echo esc_html(get_theme_mod('aimer_guerir_contact_email', 'contact@aimerguerir.com')); ?></a>
			</div>
			<div class="site-footer__contact-item">
				<span class="site-footer__contact-label">Adresse</span>
				<a class="site-footer__contact-value" href="https://www.google.fr/maps/place/Aimer+Gu%C3%A9rir+-+Christophe+Rebours+-+Magn%C3%A9tiseur+Energ%C3%A9ticien/@49.090221,1.4736775,17z/data=!4m15!1m8!3m7!1s0x47e6cbc2d9e0c1bb:0x66a52c1a90689d22!2s24+Rue+de+l'Horloge,+27200+Vernon!3b1!8m2!3d49.0902175!4d1.4762524!16s%2Fg%2F11c12ps144!3m5!1s0x47e6c97507576f15:0x9145d4306984bf61!8m2!3d49.0901809!4d1.4762731!16s%2Fg%2F11lkk2k5nd?hl=fr&entry=ttu&g_ep=EgoyMDI2MDMxMS4wIKXMDSoASAFQAw%3D%3D" target="_blank" rel="noopener noreferrer"><?php echo esc_html(get_theme_mod('aimer_guerir_contact_address_street', "24 rue de l'Horloge")); ?>,<br><?php echo esc_html(get_theme_mod('aimer_guerir_contact_address_city', 'Vernon 27200')); ?></a>
			</div>
		</div>
	</div>
</footer>
