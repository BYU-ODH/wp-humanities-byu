<?php
/**
 * Theme Defaults
 *
 * @package Septera
 */

function septera_get_option_defaults() {

	$sample_pages = cryout_get_default_pages();

	// DEFAULT OPTIONS ARRAY
	$septera_defaults = array(

	"septera_db" 				=> "0.9",

	// Layout
	"septera_sitelayout"		=> "2cSr", 	// two columns, sidebar right
	"septera_layoutalign"		=> 0, 		// 0=wide, 1=boxed
	"septera_sitewidth"  		=> 1320, 	// pixels
	"septera_primarysidebar"	=> 300, 	// pixels
	"septera_secondarysidebar"	=> 340, 	// pixels
	"septera_magazinelayout"	=> 2, 		// two columns
	"septera_elementpadding" 	=> 0, 		// percent
	"septera_footercols"		=> 3, 		// 0, 1, 2, 3, 4
	"septera_footeralign"		=> 0,		// default

	// Landing page
	"septera_landingpage"		=> 1, // 1=enabled, 0=disabled
	"septera_lpposts"			=> 2, // 2=static page, 1=posts, 0=disabled
	"septera_lpposts_more"		=> 'More Posts',
	"septera_lpslider"			=> 1, // 2=shortcode, 1=static, 0=disabled
	"septera_lpsliderimage"		=> get_template_directory_uri() . '/resources/images/slider/static.jpg', // static image
	"septera_lpslidertitle"		=> get_bloginfo('name'),
	"septera_lpslidertext"		=> get_bloginfo('description'),
	"septera_lpslidershortcode"	=> '',
	"septera_lpslidercta1text"	=> 'Learn More',
	"septera_lpslidercta1link"	=> '#lp-boxes-1',
	"septera_lpslidercta2text"	=> '',
	"septera_lpslidercta2link"	=> '',

	"septera_lpblockmainttitle1"=> '',
	"septera_lpblockmaindesc1"	=> '',
	"septera_lpblockscontent1"	=> 1, // 0=disabled, 1=excerpt, 2=full
	"septera_lpblocksclick1"	=> 0,
	"septera_lpblocksreadmore1"	=> '',
	"septera_lpblockone1"		=> $sample_pages[1],
	"septera_lpblockoneicon1"	=> 'magic-wand',
	"septera_lpblocktwo1"		=> $sample_pages[2],
	"septera_lpblocktwoicon1"	=> 'directions',
	"septera_lpblockthree1"		=> $sample_pages[3],
	"septera_lpblockthreeicon1"	=> 'cup',
	"septera_lpblockfour1"		=> 0,
	"septera_lpblockfouricon1"	=> 'megaphone',

	"septera_lpboxmainttitle1"	=> '',
	"septera_lpboxmaindesc1"	=> '',
	"septera_lpboxcat1"			=> '',
	"septera_lpboxcount1"		=> 6,
	"septera_lpboxrow1"			=> 3, // 1-4
	"septera_lpboxheight1"		=> 300, // pixels
	"septera_lpboxlayout1"		=> 2, // 1=full width, 2=boxed
	"septera_lpboxmargins1"		=> 2, // 1=no margins, 2=margins
	"septera_lpboxanimation1"	=> 2, // 1=animated, 2=static
	"septera_lpboxreadmore1"	=> 'Read More',
	"septera_lpboxlength1"		=> 25,

	"septera_lpboxmainttitle2"	=> '',
	"septera_lpboxmaindesc2"	=> '',
	"septera_lpboxcat2"			=> '',
	"septera_lpboxcount2"		=> 8,
	"septera_lpboxrow2"			=> 4, 	// 1-4
	"septera_lpboxheight2"		=> 400, // pixels
	"septera_lpboxlayout2"		=> 1, 	// 1=full width, 2=boxed
	"septera_lpboxmargins2"		=> 1, 	// 1=no margins, 2=margins
	"septera_lpboxanimation2"	=> 1, 	// 1=animated, 2=static
	"septera_lpboxreadmore2"	=> 'Read More',
	"septera_lpboxlength2"		=> 25,

	"septera_lptextone"			=> $sample_pages[1],
	"septera_lptexttwo"			=> $sample_pages[2],
	"septera_lptextthree"		=> $sample_pages[3],
	"septera_lptextfour"		=> $sample_pages[4],

	// Menu
	"septera_menuheight"		=> 85, 	// pixels
	"septera_menustyle"			=> 1, 	// normal, fixed
	"septera_menuposition"		=> 1, 	// normal, on header image
	"septera_menulayout"		=> 1, 	// 0=left, 1=right, 2=center
	"septera_headerheight" 		=> 400, // pixels
	"septera_headerresponsive" 	=> 1, 	// cropped, responsive

	"septera_logoupload"		=> '', // empty
	"septera_siteheader"		=> 'title', // title, logo, both, empty
	"septera_sitetagline"		=> '', // 1= show tagline
	"septera_headerwidgetwidth"	=> "33%", // 25%, 33%, 50%, 60%, 100%
	"septera_headerwidgetalign"  => "right", // left, center, right

	// Typography
	"septera_fgeneral" 			=> 'Open Sans/gfont',
	"septera_fgeneralgoogle" 	=> '',
	"septera_fgeneralsize" 		=> '15px',
	"septera_fgeneralweight" 	=> '400',

	"septera_fsitetitle" 		=> 'Open Sans/gfont',
	"septera_fsitetitlegoogle"	=> '',
	"septera_fsitetitlesize" 	=> '120%',
	"septera_fsitetitleweight"	=> '700',
	"septera_fmenu" 			=> 'Open Sans/gfont',
	"septera_fmenugoogle"		=> '',
	"septera_fmenusize" 		=> '90%',
	"septera_fmenuweight"		=> '700',

	"septera_fwtitle" 			=> 'Open Sans/gfont',
	"septera_fwtitlegoogle"		=> '',
	"septera_fwtitlesize" 		=> '100%',
	"septera_fwtitleweight"		=> '700',
	"septera_fwcontent" 		=> 'Open Sans/gfont',
	"septera_fwcontentgoogle"	=> '',
	"septera_fwcontentsize" 	=> '100%',
	"septera_fwcontentweight"	=> '400',

	"septera_ftitles" 			=> 'Open Sans/gfont',
	"septera_ftitlesgoogle"		=> '',
	"septera_ftitlessize" 		=> '220%',
	"septera_ftitlesweight"		=> '400',
	"septera_fheadings" 		=> 'Open Sans/gfont',
	"septera_fheadingsgoogle"	=> '',
	"septera_fheadingssize" 	=> '100%',
	"septera_fheadingsweight"	=> '700',

	"septera_lineheight"		=> "1.8em",
	"septera_textalign"			=> "inherit",
	"septera_paragraphspace"	=> "1.0em",
	"septera_parindent"			=> "0.0em",

	// Colors
	"septera_sitebackground" 	=> "#FFFDFF",
	"septera_sitetext" 			=> "#666",
	"septera_headingstext"		=> "#444",
	"septera_contentbackground"	=> "#FFFDFF",
	"septera_primarybackground"	=> "#EEEFF0",
	"septera_secondarybackground"=> "#F7F8F9",
	"septera_menubackground"	=> "#FFF",
	"septera_headeroverlay" 	=> "#24A7CF",
	"septera_headeroverlayopacity" => 75,
	"septera_menutext" 			=> "#AAA",
	"septera_menutextoverlay"	=> "#FFF",
	"septera_submenutext" 		=> "#888",
	"septera_submenubackground" => "#FFF",
	"septera_footerbackground"	=> "#2e3038",
	"septera_footertext"		=> "#AAA",
	"septera_lpsliderbg"		=> "#FFFFFF",
	"septera_lpblocksbg"		=> "#FFFFFF",
	"septera_lpboxesbg"			=> "#FFFFFF",
	"septera_lptextsbg"			=> "#F8F8F8",
	"septera_accent1" 			=> "#24a7cf",
	"septera_accent2" 			=> "#495d6d",

	// General
	"septera_breadcrumbs"		=> 1,
	"septera_pagination"		=> 1,
	"septera_contenttitles" 	=> 1, // 1, 2, 3, 0
	"septera_totop"				=> 'septera-totop-normal',
	"septera_tables"			=> 'septera-stripped-table',
	"septera_normalizetags"		=> 1, // 0,1
	"septera_copyright"			=> '&copy;'. date_i18n('Y') . ' '. get_bloginfo('name'),

	"septera_elementborder" 	=> 0,
	"septera_elementshadow" 	=> 0,
	"septera_elementborderradius"=> 0,
	"septera_articleanimation"	=> "slide",

	"septera_searchboxmain" 	=> 1,
	"septera_searchboxfooter"	=> 0,
	"septera_image_style"		=> 'septera-image-none',
	"septera_caption_style"		=> 'septera-caption-one',

	"septera_meta_author" 		=> 1,
	"septera_meta_date"	 		=> 1,
	"septera_meta_time" 		=> 0,
	"septera_meta_category" 	=> 1,
	"septera_meta_tag" 			=> 0,
	"septera_meta_comment" 		=> 1,

	"septera_comlabels"			=> 1, // 1, 2
	"septera_comdate"			=> 2, // 1, 2
	"septera_comclosed"			=> 1, // 1, 2, 3, 0
	"septera_comformwidth"		=> 650, // pixels

	"septera_excerpthome"		=> 'excerpt',
	"septera_excerptsticky"		=> 'full',
	"septera_excerptarchive"	=> 'excerpt',
	"septera_excerptlength"		=> "50",
	"septera_excerptdots"		=> " &hellip;",
	"septera_excerptcont"		=> "Continue reading",

	"septera_fpost" 			=> 1,
	"septera_fauto" 			=> 0,
	"septera_fheight"			=> 300,
	"septera_fresponsive" 		=> 1, // cropped, responsive
	"septera_falign" 			=> "center center",
	"septera_fheader" 			=> 1,

	"septera_socials_header"		=> 0,
	"septera_socials_footer"		=> 0,
	"septera_socials_left_sidebar"	=> 0,
	"septera_socials_right_sidebar"	=> 0,

	"septera_postboxes" 		=> '',

	// Miscellaneous
	"septera_masonry"			=> 1,
	"septera_defer"				=> 1,
	"septera_fitvids"			=> 1,
	"septera_autoscroll"		=> 1,
	"septera_headerlimits"		=> 1,
	"septera_editorstyles"		=> 1,

	); // septera_defaults array

	return apply_filters( 'septera_option_defaults_array', $septera_defaults );
} // septera_get_option_defaults()

/* Get sample pages for options defaults */
function cryout_get_default_pages( $number = 4 ) {
	$block_ids = array( 0, 0, 0, 0, 0 );
	$default_pages = get_pages(
		array(
			'sort_order' => 'desc',
			'sort_column' => 'post_date',
			'number' => $number,
			'hierarchical' => 0,
		)
	);
	foreach ( $default_pages as $key => $page ) {
		if ( ! empty ( $page->ID ) ) {
			$block_ids[$key+1] = $page->ID;
		}
		else {
			$block_ids[$key+1] = 0;
		}
	}
	return $block_ids;
} //cryout_get_default_pages()

// FIN
