<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
<section class="newsletter">
    <div class="newsletter__wrapper">
        <h2 class="newsletter__title">Inscription a la newsletter Aimer Guérir</h2>
        <div class="newsletter__header">
            <p class="newsletter__subtitle">Recevez nos conseils et actualites directement dans votre boite mail.</p>
            <p class="newsletter__subtitle">Un seul email par mois, sans publicite ni communication promotionnelle.</p>
        </div>
        <form class="newsletter__form" action="#" method="post">
            <div class="newsletter__field">
                <label class="newsletter__label" for="newsletter-name">Nom</label>
                <input class="newsletter__input" type="text" id="newsletter-name" name="name" placeholder="Nom" autocomplete="name">
            </div>
            <div class="newsletter__field">
                <label class="newsletter__label" for="newsletter-email">Email</label>
                <input class="newsletter__input" type="email" id="newsletter-email" name="email" placeholder="Email" autocomplete="email">
            </div>
            <div class="newsletter__field">
                <label class="newsletter__label" for="newsletter-phone">Telephone</label>
                <input class="newsletter__input" type="tel" id="newsletter-phone" name="phone" placeholder="Telephone" autocomplete="tel">
            </div>
            <button class="newsletter__btn btn btn--secondary btn--icon" type="submit">
                S'inscrire
                <?php include get_theme_file_path('assets/icons/arrow-right.php'); ?>
            </button>
        </form>
    </div>
</section>