<?php include("header.php"); ?>

<!--[if lte IE 6]>
<style type="text/css">
	#homepage-marquee h3{
		background-image: none;
		filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='/images/image_overlay.png', sizingMethod='image');
	}
</style>	
	
<![endif]-->

<script type="text/javascript" src="application.js"></script>
<script type="text/javascript">

$(function() {
	$('#homepage-marquee').rockinSlideshow();
});


(function($){
	
	$.fn.slideRight = function(target, callback){
		this.animate({left: target}, callback);
	}
	
	$.fn.slideLeft = function(target, callback){
		this.animate({right: target}, callback);
	}
	
	$.fn.startLoading = function() {
		if(!$(this).data("isLoading")){
			$('body').append($("<div class='loading'></div>").css({position: "absolute", width: $(this).width(), height: $(this).height(), top: $(this).offset().top, left: $(this).offset().left, opacity: .5}));
			$(this).data("isLoading", true)
		}
	}
	
	$.fn.stopLoading = function() {
		$(".loading").remove();
		$(this).data("isLoading", false);
	}
	
	$.fn.rockinSlideshow = function(photos_json) {
		var offset = 0;
		var photos = [];
		var self = this;
		
		
		return this.each(function(i, el){
				new Slideshow(el);
			
		});
		
		
	}
	
	function Slideshow(el){
		this.element = el;
		this.photos = $("#homepage-marquee li");
		this.pointer = 0;
		var self = this;
		this.main_img = "#main_img_container img";
		this.timer = setInterval(function(){
		self.next();
		}, 3000);
		this.initEvents();
	}
	
	$.extend(Slideshow.prototype, {
		initEvents: function() {
			var self = this;
			$(this.element).find("#next").click(function(e){
				e.preventDefault();
				self.next();
			});
			
			$(this.element).find("#prev").click(function(e){
				e.preventDefault();
				self.prev();
			});
			$(this.main_img).live("click", function(e){
				e.preventDefault();
				self.next();
			});
			
			$(document).keyup(function(e){
				switch(e.keyCode){
					case 39:
						self.next();
						break;
					case 37:
						self.prev();
						break;
				}
			});
		},
		next: function() {
			this.pointer++;
			this.switchPhoto(this.photos[Math.abs(this.pointer%this.photos.length)], "left");
		},
		
		prev: function() {
			this.pointer--;
			this.switchPhoto(this.photos[Math.abs(this.pointer%this.photos.length)], "right");
		},
		
		switchPhoto: function(photo){
			var dir = "left";
			var image = photo;
			var self = this;
			
			$(this.element).find("ul").animate({left: -$(photo).position().left}, {queue: false, duration: 500, easing: "easeInBack", complete: function() {//console.log($(this.element).find("ul").append($(this.element).find("ul li:first")));
			}});
			
			self.switchCaption(photo);
			
		},	
		
		switchCaption: function(photo){
			$("#photo_caption span").fadeOut(function(){
				$(this).text($(photo).find("img").attr("title")).fadeIn("fast");
			})
		}
	})
	
})(jQuery);
</script>

<div id="content" class="clearfix">

	<div id="main" class="full-width">
	  <div class="padding_left">
	  <div id="homepage-marquee">
		<ul id="slideshow" class="clearfix">
	    	<li><img src="images/header_homepage.jpg" alt="Header Homepage" title="Youth-Driven Public Radio"></li>
			<li><img src="images/banner2.jpg" alt="Header Homepage" title="Exclusive Latin And Urban Alternative Programming"></li>
			<li><img src="images/banner3.jpg" alt="Header Homepage" title="Empowering Youth Through Media/Journalism Training"></li>
		</ul>
		<h3 id="photo_caption"><span>Youth-Driven Public Radio</span></h3>
	  </div>
	  
		<h1>Specialty Shows</h1>
		
		<p class=""><em class="homepage">Radio Arte&rsquo;s productions approach the issues that the young, local Latino&rsquo;s are forced to deal with daily.  </em></p>
		
		<div id="homepage-productions" class="clearfix">
		
		<ul class="clearfix">
		  <li>
		    <a href="/homofrecuencia.php"><img src="images/production_HomoFrecuencia.jpg" width="245" height="165" alt="Homo Frecuencia"></a>
		    <h3 class="homo-frecuencia">Homo Frecuencia</h3>
		   <a href="/homofrecuencia.php">Read more</a>
		  </li>
		  
		  <li>
		    <a href="/first-voice.php"><img src="images/production_FirstVoice.jpg" width="245" height="165" alt="First Voice"></a>
		    <h3 class="first-voice">First Voice</h3>
		    <a href="/first-voice.php">Read more</a>
		  </li>
		  
		  <li class="last">
		   <a href="/primera-voz.php"> <img src="images/production_PrimeraVoz.jpg" width="245" height="165" alt="Primera Voz"></a>
		    <h3 class="primera-voz">Primera Voz</h3>
		     <a href="/primera-voz.php">Read more</a>
		  </li>
		  
		  <li>
		   <a href="/sin-papeles.php"> <img src="images/production_SinPapeles.jpg" width="245" height="165" alt="Sin Papeles"></a>
		    <h3 class="sin-papeles">Sin Papeles</h3>
		     <a href="/sin-papeles.php">Read more</a>
		  </li>
		  
		  <li>
		    <a href="/without-borders.php"><img src="images/production_WithoutBorders.jpg" width="245" height="165" alt="Without Borders"></a>
		    <h3 class="without-borders">Without Borders</h3>
		     <a href="/without-borders.php">Read more</a>
		  </li>
		  
		  <li class="last">
		    <a href="/1401.php"><img src="images/production_1401.jpg" width="245" height="165" alt="1401"></a>
		    <h3 class="without-borders">Without Borders</h3>
		    <a href="/1401.php">Read more</a>
		  </li>
		  
		</ul>
		
		</div>

<!--		
		<h1>Events/News</h1>



	><div id="homepage-news-and-events">
		<div id="events">
		  <p class="caption" style="height:35px"><em class="homepage">Upcoming events from Radio Arte&rsquo;s community calendar. We want to help promote you! Be sure to add your events.</em></p>
  		<div id="event-list">
    		<h2 class="events">EVENTS</h2>
    		<ul>
    		  <li>6/29: Calendar event</li>
    		  <li>6/28: Calendar event</li>
    		  <li>6/27: Calendar event</li>
    		  <li>6/26: Calendar event</li>
    		  <li>6/25: Calendar event</li>
    		  <a class="link-with-arrow" href="#">View Full Calendar</a>
    		</ul>
      </div>
    </div>
    
    <div id="news">
      <p class="caption" style="height:35px"><em class="homepage">Today&rsquo;s Headlines pulled from cnn.com  </em></p>
  		<div id="event-list">
  		  <h2 class="news">NEWS</h2>
    		<ul>
    		  <li>6/29: Recent Headline</li>
    		  <li>6/29: Recent Headline</li>
    		  <li>6/29: Recent Headline</li>
    		  <li>6/29: Recent Headline</li>
    		  <li>6/29: Recent Headline</li>
    		  <a class="link-with-arrow" href="#">View Full Calendar</a>
    		</ul>
    	</div>
  	</div>
</div>	

-->	

</div>
	</div>

	<?php include("sidebar.php"); ?>
</div>

<?php include("footer.php"); ?>