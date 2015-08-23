=== TWT .htaccess Routing ===
Contributors: adormann
Tags: routing, htaccess
Requires at least: 4.2
Tested up to: 4.3
Stable tag: 4.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Takes all WP_Rewrite rules and pushes them info your .htaccess file, offloading your complete routing
to the webserver instead of PHP.

== Description ==

This plugin implements a new menu item within Admin -> Settings called ".htaccess Routing". This item
can be seen by all users with the manage_options capability.

In this section, you'll have the ability to get an overview about your current rules, routes and
prefixes. TWT .htaccess Routing does not aim to list, let alone search through, all of them, as there are
already awesome plugins for this matter (like Monkeyman's Rewrite Analyzer).

You are able to get a look into your current .htaccess file and get a preview of all routes we'd shove
into it.

### Why offload routing to the server?

When using WordPress as an enterprise CMS, developers quickly come across the need to implement custom routes.
Over a project's lifetime, these can aggregate to 50 custom routes or more. Each time a user makes a request to
your site, WordPress walks through your rules and applies regular expressions until a matching rule is found, only
to perform an internal call to index.php afterwards.

Moving this route matching into your .htaccess will improve routing performance. The more custom rules you have,
the more the improvement.

As an added bonus, checking your .htaccess into version control will now automatically apply any rules upon
deployment. Previously, rules had either been manually toggled or asynchronously generated after a deployment.


== Installation ==

1. Upload `twt-htaccess-routing/` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Navigate to Settings -> .htaccess Routing
1. Be happy :)

== Frequently Asked Questions ==

= Is it any good? =

Yes.


== Changelog ==

= 1.0.1 =
* Fixes an issue in per-directory rewrite prefixes, causing some routes not to be matched properly.
* Fixes $matches[\d] leftovers in poorly registered routes.

= 1.0.0 =
* Initial release.

== Upgrade Notice ==

_none yet_

== Authorship ==

This plugin is published by TWT, an agency for digital transformation based in Düsseldorf, Germany. We love
what we do and create digital success for our customers every day.
Interested in a position as WordPress developer? [Join us!](www.twt.de/karriere.html)

