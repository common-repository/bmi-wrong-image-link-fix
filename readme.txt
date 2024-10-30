=== BMI Wrong Image Link Fix ===
Contributors: websupporter
Tags: bmi, mobile, false image src, bbpress, byte mobile
Requires at least: 3.0
Tested up to: 4.5
Stable tag: 0.2

If you're images change to strange URLs like 1.1.1.1/bmi/ this plugin will help

==Description==
The company ByteMobile came up with a great idea: Deliver compressed images instantly! So, 
if your Provider ( e.g. Vodafone ) cooperates with ByteMobile, they will most likely deliver
compressed pictures on your mobile screen. How this works:

You call a webpage and this webpage contains images. Your provider now rewrites these SRC-Attributes
to http://1.1.1.1/bmi/[url] and there a compressed picture is waiting for you.

I don't want to discuss the advantages and disadvantages of this method, but for WordPress Admins
and Editors, who are using Mobil to edit blogposts, this can be a huge problem.

By this method, your Image-URLs can be overwritten, so you dont save
<img src="http://myurl/wp-content/uploads/2014/03/10/image.jpg" /> but 
<img src="http://1.1.1.1/bmi/myurl/wp-content/uploads/2014/03/10/image.jpg" />

In the end, the picture won't show up at all. BMI Wrong Image Link Fix helps now with this problem.
It hooks into the 'save_post' and 'edit_post'-methods and rewrites the wrong Image URLs to the correct
one.

At the moment the following wrong URLs are known, and this plugin can correct them:

* 1.1.1.1/bmi/
* 1.1.1.2/bmi/
* 1.1.1.3/bmi/
* 1.1.1.4/bmi/
* 1.1.1.5/bmi/
* 1.2.3.4/bmi/
* 1.2.3.9/bmi/
* 1.2.3.10/bmi/
* 1.2.3.11/bmi/

If you are fighting with another URL, pleaes contact me, so we can update the code.

More information at <a href="http://websupporter.net/blog/mobile-users-attention-editing-blogposts-from-mobile-can-inject-wrong-image-paths/">http://websupporter.net/blog/mobile-users-attention-editing-blogposts-from-mobile-can-inject-wrong-image-paths/</a>

== Installation ==
* Download this Plugin
* Unzip it in your Plugins Folder (most likely /wp-content/plugins/
* Go to Plugins and Activate the plugin

Every blogpost you edit from now on, will be checked for wrong addresses, and they will be corrected

== Changelog ==

0.1
First Release

0.2
Fixes Revisions-Problem	
