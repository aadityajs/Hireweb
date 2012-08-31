=== PHP Code Widget ===
Contributors: AadityaJS
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=otto%40ottodestruct%2ecom
Tags: php, widget, facebook post, facebook feed, recent facebook post, facebook status widget
Requires at least: 3.0
Tested up to: 3.4
Stable tag: 2.1
License: GPLv2
License URI: http://www.opensource.org/licenses/GPL-2.0

It will help you to show the latest feeds of your facebook account suing Graph API. You can also customize the design easily.

== Description ==

This plugin activates a Facebook user feed burner widget.
It will help you to show the latest feeds of your facebook account suing Graph API.
You can also customize the design easily.

All PHP code must be enclosed in the standard <?php and ?> tags for it to be 
recognized.

WARNING: Upgrading to 2.0 from 1.2 may cause loss of your existing widgets.
Copy the code you have in them elsewhere first, then recreate your widgets
afterwards.

Want regular WordPress news and code updates? Become a fan of my sites on Facebook!

* http://www.facebook.com/pages/Nothing-to-See-Here/241409175928000
* http://www.facebook.com/AadityaJS

Or follow my sites on Twitter!

* http://twitter.com/ottodestruct


== Installation ==

1. Upload `execphp.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Use the widget like any other widget.

== Frequently Asked Questions ==

= There's some kind of error on line 43! =

That error means that your PHP code is incorrect or otherwise broken. 

= No, my code is fine! =

No, it's not. 

Really. 

This widget has no bugs, it's about the simplest widget one can possibly 
make. Any errors coming out of the "execphp.php" file are errors in code you 
put into one of the widgets. The reason that it shows the error being in the
execphp.php file is because that is where your code is actually being run
from.

So, if it says that you have an error on line 43, I assure you, the problem 
is yours. Please don't email me about that error.

== Screenshots ==

1. The widgets screen showing a PHP code widget in use.
2. The output of the widget on the site.

== Changelog ==
= 2.1 =
* Fixed broken wpautop filter. Checkbox on widget works now.

= 2.0 =
* Changed widget to use new Class methods for creating widget. This simplifies the widget and should eliminate any problems with it losing code or disappearing from sidebars and so forth.
* WARNING: Version 2.0 REQUIRES WordPress 2.8 and up. It will not work with older versions.
* WARNING: Upgrading this widget from 1.x might cause the widget to LOSE YOUR EXISTING SIDEBAR CODE. Copy and paste the existing code somewhere else before upgrading (just in case), then recreate the widgets afterwards.
