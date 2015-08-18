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
            <h3>Stats</h3>
            <div class="twt-row">
                <div class="col-33">
                    <div class="count">
                        <span class="number"><?php echo count($plugin->get_wp_rewrite()->wp_rewrite_rules()); ?></span>
                        <span class="label"><?php echo __('Rules', $plugin->get_text_domain()); ?></span>
                    </div>
                </div>
                <div class="col-33">
                    <div class="count">
                        <span class="number"><?php echo count($plugin->get_wp_rewrite()->non_wp_rules); ?></span>
                        <span class="label"><?php echo __('Non-WP Rules', $plugin->get_text_domain()); ?></span>
                    </div>
                </div>
                <div class="col-33">
                    <div class="count">
                        <span class="number"><?php echo count($plugin->get_wp_rewrite()->extra_permastructs); ?></span>
                        <span class="label"><?php echo __('Permastructs', $plugin->get_text_domain()); ?></span>
                    </div>
                </div>
            </div>

            <h3>Settings</h3>

            <table class="twt-table-striped">
                <thead class="twt-hidden">
                    <tr>
                        <th width="250"><?php echo __('Setting', $plugin->get_text_domain()); ?></th>
                        <th><?php echo __('Value', $plugin->get_text_domain()); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="label"><?php echo __('Permalink Structure', $plugin->get_text_domain()); ?></td>
                        <td class="twt-mono"><?php echo $plugin->get_wp_rewrite()->permalink_structure; ?></td>
                    </tr>
                    <tr>
                        <td class="label"><?php echo __('Trailing Slashes Enabled', $plugin->get_text_domain()); ?></td>
                        <td class="twt-mono"><?php echo $plugin->get_wp_rewrite()->use_trailing_slashes ? __('Yes') : __('No'); ?></td>
                    </tr>
                    <tr>
                        <td class="label"><?php echo __('Author Base', $plugin->get_text_domain()); ?></td>
                        <td class="twt-mono"><?php echo $plugin->get_wp_rewrite()->author_base; ?></td>
                    </tr>
                    <tr>
                        <td class="label"><?php echo __('Verbose Rules Enabled', $plugin->get_text_domain()); ?></td>
                        <td class="twt-mono"><?php echo $plugin->get_wp_rewrite()->use_verbose_rules ? __('Yes') : __('No'); ?></td>
                    </tr>
                    <tr>
                        <td class="label"><?php echo __('Possible Permalink Placeholder', $plugin->get_text_domain()); ?></td>
                        <td class="twt-mono"><?php echo implode('<br />', $plugin->get_wp_rewrite()->rewritecode); ?></td>
                    </tr>
                </tbody>
            </table>
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
</div>
