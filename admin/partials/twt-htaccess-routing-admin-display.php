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

    <a class="button button-primary button-large twt-btn-commit" href="<?php echo $plugin->get_flush_action_url(); ?>">
        <?php echo __('Flush Rules to .htaccess', $plugin->get_text_domain()); ?>
    </a>

    <h2 class="nav-tab-wrapper">
        <a href="#status" class="nav-tab nav-tab-active"><?php echo __('Status Board', $plugin->get_text_domain()); ?></a>
        <a href="#htaccess" class="nav-tab"><?php echo __('Current .htaccess', $plugin->get_text_domain()); ?></a>
        <a href="#preview" class="nav-tab"><?php echo __('Rule Preview', $plugin->get_text_domain()); ?></a>
    </h2>

    <div rel="tab-content" class="stuffbox" id="status">
        <div class="inside">
            miaus
        </div>
    </div>

    <div rel="tab-content" class="stuffbox" id="htaccess">
        <textarea class="stuffbox-content" disabled="disabled"><?php
            echo $plugin->get_htaccess();
        ?></textarea>
    </div>

    <div rel="tab-content" class="stuffbox" id="preview">
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

    <pre>
        <?php var_dump($plugin->get_verbose_wp_rewrite()); ?>
    </pre>
</div>
