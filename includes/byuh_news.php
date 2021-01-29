<?php
require_once( get_template_directory() . "/includes/simplehtmldom/HtmlWeb.php" );  // scraping
use simplehtmldom\HtmlWeb;

/* News feed for the front page */
function get_item_value ($domit, $tagname) {
    $domit->getElementsByTagName($tagname)->item(0)->nodeValue;
    }

function byuh_news () {
    $xml=("https://news.humanities.byu.edu/recent-news.rss");
    $xmlDoc = new DOMDocument();
    $xmlDoc->load($xml);
    $channel=$xmlDoc->getElementsByTagName('channel')->item(0);
    //print_r($channel, false);

    $feed_date = $channel->getElementsByTagName('lastBuildDate')->item(0)->nodeValue;
    //echo "<h1>Feed date: $feed_date</h1>";
    //print_r($feed_date, false);
    $items = $channel->getElementsByTagName('item');
    echo "<div class='recent-news'>";
    for ($x = 0; $x < 1; $x++) {
	$title = $items->item($x)->getElementsByTagName('title')->item(0)->nodeValue;
	$link = $items->item($x)->getElementsByTagName('link')->item(0)->nodeValue;
	$description = $items->item($x)->getElementsByTagName('description')->item(0)->nodeValue;
	$pubdate = $items->item($x)->getElementsByTagName('pubDate')->item(0)->nodeValue;
	$tlink = "<a class='news-title' href='$link'>$title</a>";

	$client = new HtmlWeb();
	$html = $client->load($link);
	$image_src = $html->find('figure img')[0]->src . PHP_EOL;
	$image = "<div class='image-container'><a href='$link'><img src='$image_src'></a></div> "; 
	echo "<div class='recent-news-box'>" . $image . $tlink . "</div>";
	}
    echo "</div>"; // end recent-news
    ?>


 

    <?php
    } // end byuh_news
    ?>

