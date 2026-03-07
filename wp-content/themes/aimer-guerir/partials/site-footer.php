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
				<span class="site-footer__contact-value"><?php echo esc_html(get_theme_mod('aimer_guerir_contact_address_street', "24 rue de l'Horloge")); ?>,<br><?php echo esc_html(get_theme_mod('aimer_guerir_contact_address_city', 'Vernon 27200')); ?></span>
			</div>
		</div>
	</div>
</footer>
