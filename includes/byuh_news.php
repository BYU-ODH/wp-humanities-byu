<?php
require_once( get_template_directory() . "/includes/simplehtmldom/HtmlWeb.php" );  // scraping
use simplehtmldom\HtmlWeb;

/* News feed for the front page */

function byuh_news () {
    $xml=("https://news.humanities.byu.edu/recent-news.rss");
    $xmlDoc = new DOMDocument();
    $xmlDoc->load($xml);
    $channel=$xmlDoc->getElementsByTagName('channel')->item(0);
    $feed_date = $channel->getElementsByTagName('lastBuildDate')->item(0)->nodeValue;
    $items = $channel->getElementsByTagName('item');
    echo "<section class='recent-news'>";
    for ($x = 0; $x < 1; $x++) {
	$title = $items->item($x)->getElementsByTagName('title')->item(0)->nodeValue;
	$link = $items->item($x)->getElementsByTagName('link')->item(0)->nodeValue;
	$description = $items->item($x)->getElementsByTagName('description')->item(0)->nodeValue;
	$dd = "<div class='news-description'>$description</div>";
	$pubdate = $items->item($x)->getElementsByTagName('pubDate')->item(0)->nodeValue;
	$pubdate = preg_replace('/(.* \d{4}).*/', '$1', $pubdate);
	$publine = "<h6 class='details'>$pubdate</h6>";
	$tlink = "<h5 class='title lp-box-title'><a class='news-title' href='$link'>$title</a></h5>";
	$news_content = "<div class='news-content'>" . $tlink . $publine . $dd . "</div>";

	$client = new HtmlWeb();
	$html = $client->load($link);
	$image_src = $html->find('figure img')[0]->src . PHP_EOL;
	$image = "<div class='image-container'><a href='$link'><img src='$image_src'></a></div> ";
    $more_news = "<div class='elementor-button-wrapper'>
      <a href='https://news.humanities.byu.edu' class='not-really-elementor elementor-button-link elementor-button elementor-size-xl elementor-animation-grow' role='button'>
	<span class='elementor-button-content-wrapper'>
	  <span class='elementor-button-text'>More News</span>
	</span>
      </a>
    </div>";

	echo "<div class='recent-news-box'>" . $image . $news_content . $more_news . "</div>";
	}
    echo "</section>"; // end recent-news
    ?>

    <?php
    } // end byuh_news
    ?>

