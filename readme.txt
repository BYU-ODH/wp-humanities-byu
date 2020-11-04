=============
Septera WordPress Theme
Copyright 2017-2018 Cryout Creations
https://www.cryoutcreations.eu/

Author: Cryout Creations
Requires at least: 4.5
Tested up to: 5.2
Stable tag: 1.5.0
Requires PHP: 5.3
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl.html
Donate link: https://www.cryoutcreations.eu/donate/

Septera is a multipurpose responsive theme, with a clean and elegant design, crisp, stylish typography and an a great set of powerful yet easy to use customizer settings.

== License ==

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program. If not, see http://www.gnu.org/copyleft/gpl.html


== Third Party Resources ==

Septera WordPress Theme bundles the following third-party resources:

HTML5Shiv, Copyright Alexander Farkas (aFarkas)
Dual licensed under the terms of the GPL v2 and MIT licenses
Source: https://github.com/aFarkas/html5shiv/

FitVids, Copyright Chris Coyier - http://css-tricks.com + Dave Rupert - http://daverupert.com
Licensed under the terms of the WTFPLlicense
Source: http://fitvidsjs.com/

== Bundled Fonts ==

Icomoon icons, Copyright Keyamoon.com
Licensed under the terms of the GPL license
Source: https://icomoon.io/#icons-icomoon

Zocial CSS social buttons, Copyright Sam Collins
Licensed under the terms of the MIT license
Source: https://github.com/smcllns/css-social-buttons

Feather icons, Copyright Cole Bemis
Licensed under the terms of the MIT license
Source: http://colebemis.com/feather/

== Bundled Images ==

The following bundled images are released into the public domain under Creative Commons CC0:
https://pixabay.com/en/street-sidewalk-vintage-old-1284362/
https://unsplash.com/photos/8WClaa1CmZ0

Preview demo images:
1.jpg - https://pixabay.com/en/sunset-dusk-last-light-lake-coast-192980/
2.jpg - https://pixabay.com/en/city-walkway-street-boat-the-fog-2045453/
3.jpg - https://pixabay.com/en/urban-people-crowd-citizens-438393/
4.jpg - https://pixabay.com/en/adult-blur-book-daylight-education-1835799/
5.jpg - https://pixabay.com/en/girl-hat-brunette-long-hair-people-926738/
6.jpg - https://pixabay.com/en/nature-landscape-coast-beach-shore-1246613/
7.jpg - https://pixabay.com/en/child-beautiful-model-little-cute-920131/
8.jpg - https://pixabay.com/en/street-sidewalk-vintage-old-1284362/
9.jpg - https://pixabay.com/en/taxi-cab-taxicab-taxi-cab-new-york-238478/
10.jpg - https://pixabay.com/en/road-asphalt-space-sky-clouds-220058/

The rest of the bundled images are created by Cryout Creations and released with the theme under GPLv3


== Changelog ==

= 1.5.0 =
* Added option to control featured images in the header size enforcement
* Improved Google Fonts functionality to load all weights for the general font
* Improved footer widgets responsiveness when set to center align
* Improved content spacing on single pages/posts when comment form is not displayed
* Improved page/post meta options support for the block editor
* Improved block editor styling for dark color schemes
* Optimized layout detection code and moved to the framework
* Optimized frontend scripts
* Renamed top and bottom widget areas for clarity
* Renamed and rearranged some theme options for consistency between themes
* Fixed normalized tags still having different sizes
* Fixed editor style option not applying to the block editor styling
* Fixed deferring functionality applying to some dashboard scripts
* Fixed $content_width not being defined in the dashboard
* Fixed continue reading buttons in animated2 featured boxes using the same accent color as background
* Multiple fixes for older IEs
* Disabled featured images on post formats
* Disabled search form display on the landing page when no posts are available
* Updated Cryout Framework to 0.8.2:
	* Activated Select2 functionality on font selector controls
	* Added Select2 functionality to icon-select controls
	* Fixed RTL issues with color controls, toggle controls, half/third width selectors, number slider
	* Switched enable/disable options to use the new toggle control
	* Switched number options to use the new number slider control

= 1.4.0.2.1 = 
* Reupload of 1.4.0.2 due to incomplete style.css

= 1.4.0.2 =
* Fixed notice about malformed number format in setup.php since 1.4.0
* Fixed Gutenberg editor background color missing

= 1.4.0.1 =
* Fixed block embeds responsiveness conflict with Fitvids script
* Fixed notice about malformed number format in custom-styles.php since 1.4.0
* Fixed classic editor styling not working since 1.4.0

= 1.4.0 =
* Adjusted headings color option to apply to landing page text area inner headings as well
* Improved standards compliance CSS cleanup
* Fixed long submenus sometimes causing horizontal scrollbar with non-fixed menus
* Improved mobile menu non-link text to use the configured navigation text color
* Gutenberg editor tweaks and improvements:
	* Added styles for the new block horizontal separators
	* Added editor styles for the Gutenberg editor
	* Added support for theme colors and font sizes in the Gutenberg editor
	* Added wide image support
	* Improved list appearance in blocks
	* Fixed margins on gallery blocks
	* Fixed caption alignment in blocks
	* Fixed cover block text styling	
* Updated to Cryout Framework 0.7.8.5:
	* Improved manual excerpts detection in landing page blocks and boxes to detect <!--more--> and <!--nextpage--> tags

= 1.3.3 =
* Changed static slider / slider greyscale filter to adjust in sync with overlay opacity value
* Fixed WP Globus translations not working in landing page icon blocks excerpts (should improve support for other plugins as well)
* Updated screenshot

= 1.3.2 =
* Adjusted margins and responsiveness on 3-column magazine layout
* Adjusted responsiveness for page header and author info
* Fixed manual excerpts being filtered in featured boxes
* Updated to Cryout Framework v0.7.8.4

= 1.3.1 =
* Fixed landing page content generation after first activation failing to retrieve all available static pages in some cases
* Added support for shortcodes in custom footer text field
* Rearranged landing page 'featured content' options to dedicated options section
* Fixed an animation glitch affecting submenu items in some instances
* Fixed header widgets being included on the landing page when header image is not used
* Sorted icon block icons list alphabetically
* Updated to Cryout framework v0.7.8.3
	* Improved WPML support for landing page featured boxes and icon blocks
	* Added required PHP version check
	* Improved required WordPress version check

= 1.3.0.3 =
* Fixed invalid markup on the back to top button causing issues with cookie notification plugins

= 1.3.0.2 =
* Added landing page featured icon blocks overall disable option
* Fixed leftover debug code making text red after click on main navigation search (since 1.3.0.1)

= 1.3.0.1 =
* Fixed header image not visible when active on the landing page
* Fixed main navigation search icon click reloads page

= 1.3.0 =
* Added support for custom embedded fonts
* Added main navigation keyboard accessibility support
* Added mobile menu close on click/tap functionality
* Added hints in the customizer interface for Site Identity / Header options
* Improved label hiding option to only apply to default comment form fields
* Improved mobile menu multi-line menu items behaviour
* Increased mobile menu width on smaller devices
* Fixed GDPR-related checkbox missing on comment form
* Fixed comment form fields center alignment on checkboxes and radio controls
* Fixed static slider positioning on <720px with RTL
* Fixed site tagline positioning with RTL
* Fixed spacing between title and logo on RTL
* Fixed static slider image caption text alignment on RTL
* Fixed header widgets being present on the landing page when the header image is not used
* Updated to Cryout Framework 0.7.6

= 1.2.4 =
* Added featured box titles link functionality
* Added compatibility styling for Jetpack Portfolio titles sizes in widgets
* Improved scroll-to-anchor functionality
* Improved accessibility for landing page block icons, boxes links and titles, edit button, read more links and back-to-top button
* Improved first content title spacing before
* Improved landing page icon blocks and text areas disabling condition checks
* Fixed site title border visible and taking up space when site title is hidden
* Fixed cover+fixed background images zoomed incorrectly on Safari
* Fixed cover+fixed background images shaky on IEs and Edge

= 1.2.3 =
* Fixed liliputian sizes for landing page titles in v1.2.2

= 1.2.2 =
* Added landing page sections support for WPML/Polylang localization

= 1.2.1 =
* Added support for WooCommerce breadcrumbs
* Added landing page icon blocks read more links
* Added landing page options visibility dependencies checks
* Improved on-page SEO
* Improved tables styling
* Changed headings size options to apply to content headings only
* Fixed quantity input being too short for double digits with WooCommerce 3.3+
* Fixed landing page featured boxes not being disable-able
* Fixed language flag images being improperly aligned in menus
* Fixed HTML markup validation warning due to empty 'media' attribute
* Fixed CSS validation warnings due to empty color fields and invalid 'default' values
* Removed 'defer' loading of comments script due to conflict with Jetpack
* Updated to Cryout Framework v0.7.4

= 1.2.0 =
* Improved featured image srcset functionality to support more browsers and usage scenarios
* Fixed page layout option overlapping category/search/archive layout when last item uses custom layout
* Fixed non working translation in article publish date
* Improved 'comments moderated' text positioning
* Improved demo content check to use theme slug
* Improved compatibility of dark color schemes with Crayon Syntax Highlighter plugin's editor styling
* Fixed comments block being visible on landing page featured page
* Added all weight values for the typography options
* Improved sublists appearance in sidebar widgets
* Updated to Cryout Framework 0.7.3:
	* Framework: fixed invalid count() call in prototypes.php triggering warnings on PHP 7+
	* Framework: added cryout_get_picture(), cryout_get_picture_src(), cryout_is_landingpage(), cryout_on_landingpage() functions

= 1.1.4 =
* Added landing page background color options for specific sections: slider, icon blocks, featured boxes, text areas
* Improved responsiveness
* Fixed "back to top" button being visible in footer on mobile devices when disabled and also adjusted its "in footer" layout
* Fixed Serious Slider style buttons overlapping in content
* Fixed Serious Slider "theme" style missing styling on arrows/indicators
* Fixed landing page static image and Serious slider "theme" caption responsiveness
* Updated translation files

= 1.1.3 =
* Fixed fixed menu missing background color on mobile devices when menu is on top of header image
* Fixed missing text areas numbers in theme options
* Fixed non-translatable strings in theme options
* Added auto-match for mailto: URL in social icons
* Improved masonry initiation to check if function is available
* Further adjusted landing page static slider image responsiveness to cover more usage scenarios
* Adjusted slider button, featured box, aside border to use content background color
* Fixed missing breadcrumbs background

= 1.1.2 =
* Properly fixed static slider responsiveness to better fit the screen
* Added workaround for horizontal scrollbar on mobile devices when large menus are used

= 1.1.1 =
* Added integrated styling for our Serious Slider plugin
* Adjusted responsiveness of static slider image to better fit screen
* Increased content headers line-height to 1.2
* Fixed extra space under menu when main menu is set to fixed and on top of header image with boxed layout when no header image is set
* Fixed editor styling option not controlling style.css enqueue
* Renamed $septeras variables to be more generic
* Fixed featured boxes not deactivating by setting the category to 'disabled'
* Fixed dropdown menu width issue in Chrome with very short menu items
* Adjusted static slider CTA buttons styling to be more generic
* Fixed static slider caption container being displayed when no static slider caption fields are used

= 1.1.0 =
* Moved theme's styling enqueues from wp_head to wp_enqueue_scripts hook to improve child themes compatibility *** this will require updating the child theme if it uses style enqueues
* Revamped single post previous/next buttons
* Changed article markup to improve search engine readability (separated actual article content from article extra information)
* Changed comment headers to 'footer' elements
* Changed author bio div to 'section' element
* Removed font-size: 100% from CSS resets
* Restored default quotes on q tag
* Added height to the header-image-main-inside container for cropped header image
* Adjusted the footer widget area description
* Removed font-weight from admin editor styles
* Fixed site title overlapping menu icon on mobile
* Fixed site title still visible when disabled from option
* Improved slider image responsiveness
* Increased article bottom margin
* Updated to Cryout Framework 0.6.6

= 1.0.4 =
* Removed content background colour from landing page slider area
* Changed content left/right from 1em to 2em for better responsiveness and boxed layouts
* Adjusted elements content background colour applies to and replaced its usage on some other elements with site background colour
* Clarified landing page activation requirements in the customize panel
* Improved header video support and fixed header height on non-homepage sections
* Further improved sidebar and colophon responsiveness
* Updated to Cryout Framework 0.6.5+

= 1.0.3.1 =
* Adjusted image inside links vertical alignment
* Reduces WooCommerce select padding
* Removed theme specific WooCommerce product title font size

= 1.0.3 =
* Fixed landing page CTA buttons responsiveness
* Fixed image vertical alignment in main menu
* Improved icon blocks responsiveness
* Other minor responsiveness changes to the landing page, mobile menu and back to top button
* Added IDs to landing page blocks and boxes
* Fixed post navigation floating issue when no Previous Post exists

= 1.0.2.1 =
* Fixed loading comments template

= 1.0.2 =
* Added  CTA buttons to the landing page
* Changed landing page slider and text area text sizes
* Updated style.css description
* Added a new default slider/header image
* Updated screenshot

= 1.0.1.1 =
* Changed slider/header overlay default opacity value once more
* Replaced demo featured images with smaller ones
* Changed left/right widget areas IDs

= 1.0.1 =
* Changed slider/header overlay default opacity value
* Removed slider/header image grayscale effect
* Updated default header image
* Restored 'Reset Defaults' functionality accidentally removed
* Added demo featured images for when theme is previewed
* Added support for the theme preview sample sidebar
* Updated screenshot

= 1.0.0 =
* Fixed custom colour for the mobile menu dropdown arrows
* Fixed author description and info link arrow on RTL
* Hid socials and footer widgets in print styles
* Fixed article titles size in index.php
* Changed archive page titles to be bold
* Removed WooCommerce page-title font-size using old font-root
* Updated translation files

= 0.9.8 =
* Temporary removed 'save/load theme options' feature until we complete the discussions on the subject with the WPTRT

= 0.9.7.1 =
* Escaped variables in custom-styles.php, loop.php, meta.php and main.php

= 0.9.7 =
* Fixed area label missing translation in header.php
* Default sidebar message is now only shown for users that have widget editing capabilities
* Removed hardcoded JS from main.php ( the 'reset to defaults' confirmation message )
* Escaped get_author_posts_url() with esc_url() in author-bio.php
* Removed 'comment-form' and 'comment-list' from add_theme_support( 'html5' )
* Reset custom WP query in septera_lpindex() and septera_lpboxes() using wp_reset_postdata()
* Modified functions using the 'excerpt_length' and 'excerpt_more' filters to not affect the admin side
* Removed @import from editor-style and fixed editor-style.css loading
* Removed error suppressing from admin-functions.php
* Fixed top social menu margin on mobile
* Fixed mobile menu dropdown arrow line height
* Adjusted z-index on main menu dropdowns and menu search to improve multi-line menu usability
* Adjusted featured boxes hover animation
* Added filters to ob_clean in custom-styles.php and renamed custom_editor_styles to editory_styles
* Adjusted headings appearnace
* Fixed slider overlay still present when opacity set to zero
* Updated translation files

= 0.9.6 =
* Changed featured boxes hover animation
* Added styling to disable Chrome's built-in blue border on focused form elements
* Added explicit support for WooCommerce 3.0 new product gallery
* Removed 'wp_calculate_image_srcset' filter support due to Jetpack_Photon::filter_srcset_array() issue
* Fixed typo in description

= 0.9.5 =
* Added more padding to the 'continue reading' button
* Added padding to pagination buttons
* Fixed 'more posts' button animation
* Increased landing page featured box title line-height
* Fixed landing page slider title/text sizes with responsiveness
* Changed post titles in posts lists from 40 units smaller to 80%
* Improved srcset functionality by switching to viewpoint units for better responsiveness
* Improved srcset sizes for the landing page featured images
* Improved backwards compatibility for browsers that do not use srcsets
* Fixed srcset sizes for 1 column posts list layout
* Added 'septera_featured_srcset' filter and support for 'wp_calculate_image_srcset' filter for disabling srcset functionality
* Added hint in landing page customizer controls for activation procedure and autofocus to static frontpage section
* Fixed more posts button visible on the lading page when static page is used
* Changed default value for Featured Image Alignment from center/center to center/top
* Updated Cryout Framework to v0.6.5

= 0.9.4.2 =
* Fixed both DOX and UNIX style line endings in front-page.php

= 0.9.4.1 =
* Replaced esc_html() with esc_attr_e() to make HTML attributes translateble in includes/meta.php

= 0.9.4 =
* Changed landing page activation mode; the feature is now only visible when a static page is set on the homepage in WordPress
* Added featured content option for landing page to display posts list, the homepage static page (default) or nothing
* Fixed meta information visibility malfunctioning on search results
* Replaced _e() and __() with esc_attr_e() and esc_attr__() where translations are used in element attributes

= 0.9.3 =
* Moved "Edit" button at the top of the post/page
* Adjusted post meta paddings
* Added icon blocks icon/title animations on hover
* Reduced landing page "More posts" button padding
* Fixed unexpected arrow background on cropped featured images
* Increased page/post titles default value to 220% and made post titles in page list 40 units smaller
* Fixed pages manual excerpts not working and added support for <!–nextpage–> tag in icon blocks
* Extended Featured Image Alignment option to apply to all featured image crop variants added by the new srcset feature
* Slightly adjusted headings font sizes generator function and added separate distinct styling for h5 and h6
* Fixed footer widgets responsiveness when "All in a row" option is used
* Changed H1 to H2 in the static slider
* Added site title always present in the source of the site (for SEO purposes)
* Fixed WordPress' "Display Site Title and Tagline" option not hiding tagline
* Added colour option for the H1-H4 content headings
* Updated language file

= 0.9.2.1 =
* Fixed floats not clearing properly

= 0.9.2 =
* Added srcset support for featured images and two additional featured image sizes to improve responsiveness and cross-device compatibility
* Improved content_width internal handling to take layouts into account (for better handling of embed media sizing)
* Adjusted the landing page block/text areas title and text retrieval functions to work with qTranslate
* Added support for <!--more--> tag in landing page text area pages
* Added WordPress 4.7 video header support
* Fixed icon blocks customizer controls not displaying the icons in Chrome / Safari
* Fixed author pages displaying broken titles in certain cases
* Added landing page slider shortcode field to translatable fields in WPML / Polylang
* Removed wp_kses() filtering from landing page blocks/boxes/texts titles/contents
* Fixed header and main container padding discrepancies
* Fixed responsive styling arranging footer widgets in two columns even when option was set to one column
* Fixed before/after widget areas extra padding for ul/ol
* Fixed header widget area position and z-index
* Updated Cryout Framework to v0.6.4
* Removed septera_socials_menu_preset() function
* Removed blog and e-commerce subject tags
* Fixed page used as static page
* Fixed search results showing meta information for pages

= 0.9.1 =
* Moved submenu arrows closer to the menu items
* Fixed current menu item on landing page having the same color as the background on fixed menus
* Removed grayscale filter from the header image and slider overlays if overlay opacity is set to 0

= 0.9 =
Initial release
