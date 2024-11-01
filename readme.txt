=== Simple Silverstream TV Shortcodes ===
Contributors: mikemanger
Tags: shortcode, video, silverstream tv
Requires at least: 2.5.0
Tested up to: 4.6.1
Stable tag: 1.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A simple plugin to embed Silverstream TV videos.

== Description ==

A simple unofficial plugin to embed [Silverstream TV](http://www.silverstream.tv/) videos.

Allows you to use the `[silverstream]` shortcode in your posts. This is useful
with WordPress multisite installs that prevent iframe and script tags.

= Shortcode Usage =

Example:
`[silverstream video_key="12345" player_key="abcdef"]`

To load the bespoke player at just enter the URL to the right of the 'silverstream.tv/'

So http://silverstream.tv/istream_rts becomes:
`[silverstream bespoke_player="istream_rts" width="580px"]`


Attributes:

* `video_key` the iframe ID the video that you want to embed (optional)
* `player_key` the Silverstream player key (required)
* `bespoke_player` path to the video on Silverstream's server. Used to load client branded videos (optional)
* `width` the width of the iframe (optional, default is 853px)
* `height` the height of the iframe (optional, default is 480px)

The `width` and `height` attributes should include the metric (e.g. metric, e.g. px, %, em)


== Installation ==

1. Upload `simple-silverstream-tv-shortcodes` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= Where do I find my video and player keys? =

The video and player keys can be found in the embed code provided by the Silverstream dashboard.

`<iframe id="sstv_[video_key]" class="sstv_embed" src="//video.silverstream.tv/player/[player_key]" style="border:none;overflow:hidden;width:853px;max-width:100%;height:480px;" frameborder="0" seamless allowfullscreen webkitAllowFullScreen></iframe>
<script src="//video.silverstream.tv/themes/default/js/responsive.js.php?uid=sstv_[video_key]&height=480&aspect_ratio=1.7771"></script>`

= I have found a bug =

Please raise a ticket on the [issue tracker](https://bitbucket.org/lighthouseuk/simple-silverstream-tv-shortcodes/issues). Pull requests also accepted!

== Changelog ==

= 1.4 =
* Fix couple of issues with iframe ID
* Fix resolution being set to 480

= 1.3 =
* Force load Silverstream videos over HTTPS.
* Make the video_key attribute optional as not required.

= 1.2 =
* Allow loading of bespoke iStream Sliverstream videos using the `bespoke_player` attribute.
* Escape iframe and script URLs

= 1.1 =
* First public release

== Upgrade Notice ==

= 1.4 =
Fixes some issues reported by the Silverstream team, thanks Jonathan!

= 1.2 =
Adds a new attribute for bespoke iStream support.