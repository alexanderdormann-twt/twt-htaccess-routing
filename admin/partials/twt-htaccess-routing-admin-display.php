<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    TWT_Htaccess_Routing
 * @subpackage TWT_Htaccess_Routing/admin/partials
 */

/**
 * Include context helper for IDE autocompletion
 *
 * @var $plugin TWT_Htaccess_Routing_Admin
 */
$plugin = $this;
?>
<div class="wrap">
    <h2><?php echo __('.htaccess-based Routing', $plugin->get_text_domain()); ?></h2>

    <div class="stuffbox">
        <h3>
            <span>Headline</span>
        </h3>
        <div class="inside">
            inside
        </div>
    </div>

    <footer class="twt-plugin-footer">
        <img src="<?php echo plugin_dir_url( __FILE__ ) . '../img/twt-logo.png'; ?>" alt="TWT" />
        <p class="twt-copy">
            &copy; 2015 TWT Interactive GmbH &mdash; creating digital success since 1995

            <span class="twt-apply-now">
                Interested in an awesome position as WordPress developer?
                <a href="http://www.twt.de/karriere.html" target="_blank">Join our team of experts!</a>
            </span>
        </p>
    </footer>
</div>
<pre>
<?php
echo($plugin->get_wp_rewrite()->mod_rewrite_rules());
?>
    </pre>
