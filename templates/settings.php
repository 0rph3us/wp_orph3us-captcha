<div class="wrap">
    <h2>WP 0rph3us Captcha Plugin</h2>
    <form method="post" action="options.php"> 
        <?php @settings_fields('wp_orph3us-captcha-group'); ?>
        <?php @do_settings_fields('wp_orph3us-captcha-group'); ?>

        <?php do_settings_sections('wp_orph3us-captcha'); ?>

        <?php @submit_button(); ?>
    </form>
</div>
