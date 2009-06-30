<div  id="sidebar">
	<div class="box" id="listenNow">
		<h2>Listen Now!</h2>
		<a id="live_stream" target="_blank" href="http://www.live365.com/cgi-bin/mini.cgi?membername=radioarte&site=pro&tm=8548">Radio Arte Live Stream</a>
		<a id="live_stream_hd" target="_blank" href="http://www.live365.com/cgi-bin/mini.cgi?stream=1355763&genre=&site=live365&tm=953">Radio Arte 2 Live Stream HD</a>
		<!--<p>ON AIR: latin alternative<br>
		UP NEXT: democracy now</p>-->
	</div>
	
	<div class="box" id="donateNow">
		<a href="https://co.clickandpledge.com/default.aspx?wid=24445">Donate Now!</a>
	</div>
	
	<div class="box" id="twitterFeed">
		<h2>Radio Arte Is</h2>
		<?php 
		require_once("TwitterCacher.php");
		require_once("TimeAgo.php");

		$twEmail = "radioarte";
		$twPass = "wrte1401";

		$tc = new TwitterCacher($twEmail,$twPass);

		// I do this just to be a nice guy. So Twitter knows who we are.
		$tc->setUserAgent("Mozilla/5.0 (compatible; TwitterCacher/1.0;)");

		// Read the timeline from the cache, or from Twitter.
		$timeline = json_decode( $tc->getUserTimeline() );

		  // Get the Tweet itself.
		  $text = $timeline[0]->text;

		  // Twitter uses GMT+0 but I convert it to my local time.
		  $date = TimeAgo(strtotime($timeline[0]->created_at));

		

		?>
		
		<p><?= $text; ?>
		 <a href="http://twitter.com/<?= $timeline[0]->user->screen_name; ?>/status/<?= $timeline[0]->id; ?>"><?= $date ?></a></p>
	</div>
	
	<div class="box" id="flickrStream">
		<h2>See Our Photo Gallery!</h2>
		<a class="flickr_photo" href="http://www.flickr.com/photos/37902025@N04/">
			<img src="images/side_flickr_photo.jpg">
		</a>
		<a id="flickr_gallery" href="http://www.flickr.com/photos/37902025@N04/">go to flickr</a> 
	</div>
	
	<div class="box" id="socialNetworks">
		<h2>Stay Connected!</h2>
		<ul class="clearfix">
			<li id="flickr"><a href="http://www.flickr.com/photos/37902025@N04/">flickr</a></li>
			<li id="facebook"><a href="http://www.facebook.com/pages/Radio-Arte/49095583400">facebook</a></li>
			<li id="twitter"><a href="http://twitter.com/radioarte">twitter</a></li>
			<li id="myspace"><a href="http://www.myspace.com/wrte905fm">myspace</a></li>
		</ul>
	</div>
	<!--
	<div class="box" id="weather">
		
	</div>
-->
</div>