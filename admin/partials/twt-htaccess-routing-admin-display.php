<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://twt.de
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
<div class="wrap twt-htaccess-routing">
    <h2><?php echo __('.htaccess-based Routing', $plugin->get_text_domain()); ?></h2>

    <div class="stuffbox">
        <h3>
            <span><?php echo __('Actions', $plugin->get_text_domain()); ?></span>
        </h3>
        <div class="inside">
            <a class="button button-primary button-large" href="<?php echo $plugin->get_flush_action_url(); ?>">
                <?php echo __('Flush Rules to .htaccess', $plugin->get_text_domain()); ?>
            </a>
        </div>
    </div>

    <div class="stuffbox">
        <h3>
            <span><?php echo __('Current Htaccess', $plugin->get_text_domain()); ?></span>
        </h3>
        <textarea class="stuffbox-content" disabled="disabled"><?php
            echo $plugin->get_htaccess();
        ?></textarea>
    </div>

    <div class="stuffbox">
        <h3>
            <span><?php echo __('Rule Preview', $plugin->get_text_domain()); ?></span>
        </h3>
        <textarea class="stuffbox-content" disabled="disabled"><?php
            echo $plugin->get_verbose_wp_rewrite()->mod_rewrite_rules();
        ?></textarea>
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
