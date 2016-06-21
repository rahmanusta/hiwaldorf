var message                     = new Array();
    message["mandatory_fields"] = {en : "Please fill in the required fields.", fr : "Svp, remplissez les champs obligatoires."};
    message["email"]            = {en : "Please enter a valid email address", fr : "Svp, entrez une adresse courriel valide"};
    message["postal_code"]      = {en : "Please enter a valid postal code", fr : "Svp, entrez un code postal valide"};
    message["phone"]            = {en : "Please enter a valid telephone number", fr : "Svp, entrez un numéro de téléphone valide"};
    message["extension"]        = {en : "Please, the extension must be digits only", fr : "Svp, l'extension doit être composé de chiffre seulement"};
    message["unknown_error"]    = {en : "An unexpected error occured.", fr : "Une erreur inconnue est survenue."};
    message["thank_you"]        = {en : "Thank you", fr : "Merci"};

var regExpEmail = new RegExp(/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/);
var regExpTel   = new RegExp(/^((([0-9]{1})*[- .(]*([0-9]{3})[- .)]*[0-9]{3}[- .]*[0-9]{4})+)*$/);
var regExpExt   = new RegExp(/^[0-9]+$/);

var latitude  = 45.49622;
var longitude = -73.57460;

var CONTENT_MIN_HEIGHT = 625;

var videoPlayer = null,
	hasHtmlVideo = false,
	hasFlash = false;

$(window).load(function(){
    load_menu();
    adjust_header();
    adjust_content();
});

$(document).ready(function(){
	
	$("#video-overlay").data("left-offset", -($(window).width()) + "px");
	
	if(!$("#video-overlay").hasClass("opened")){
		$("#video-overlay").css("left", -($(window).width()) + "px");
	}
	
	if(Modernizr.video.h264 || Modernizr.video.ogg || Modernizr.video.webm){
		hasHtmlVideo = true;
	}
	else if(swfobject.hasFlashPlayerVersion("10")){
		hasFlash = true;
	}
	
	if(hasHtmlVideo || hasFlash){
		videoPlayer = videojs('video-element');
		
		// Resize the video-element to the window element
			$("#video-element").width($(window).width()).height($(window).height());
	}
	else{
		$("#no-flash-support").show();
		$("#video-element").remove();
	}
	
	// When we click on the video thumbnail, we need to play the video in an overlay
		$("#play-home-video-button").on("click", function(e){
			e.preventDefault();
			
			lockScroll();
			
			$("#video-overlay").css("left", $("#video-overlay").data("left-offset")).addClass("moving");
			
			$("#video-overlay").animate({ left : "0" }, 500, function(){
				if(hasHtmlVideo || hasFlash){
					videoPlayer.play();
				}
			});
		});
	
	// When we close the player
		$("#close-video-overlay").on("click", function(){
			
			if(hasHtmlVideo || hasFlash){
				videoPlayer.pause();
			}
			
			$("#video-overlay").animate({ left : $("#video-overlay").data("left-offset") }, 500, function(){
				unlockScroll();
				
				$("#video-overlay").removeClass("moving");
			});
		});
});

$(window).on("resize", function(e)
{
	$("#video-overlay").data("left-offset", -($(window).width()) + "px");
	
	if(!$("#video-overlay").hasClass("moving")){
		$("#video-overlay").css("left", -($(window).width()) + "px");
	}
	
	if(hasHtmlVideo || hasFlash){
		$("#video-element").width($(window).width()).height($(window).height());
	}
	
	if (e.target == window || e.target == document)
	{
    	adjust_header();
    	adjust_content();
	}
});

function adjust_content()
{
	$('#content').height('');

	var window_height  			 = $(window).height();
	var header_height  		 	 = $('#header_container').outerHeight(true);
	var footer_height  			 = $('#footer_container').outerHeight(true);
    var content_height 			 = $('#content').outerHeight(true);
    var content_available_height = window_height - (header_height + footer_height);

	if (content_height > content_available_height)
	{
		$('#content').height(content_height);
	}
	else if (content_available_height > CONTENT_MIN_HEIGHT)
	{
		$('#content').height(content_available_height);
	}
	else
	{
		$('#content').height(CONTENT_MIN_HEIGHT);
	}
}

function adjust_header()
{
	var header_width 		  	= $('#header').width();
	var header_children_count 	= $('#header li.main_link_item, #header .logo').length;
	var header_children_width 	= 0;
	var header_margin_available = 0;
	var header_children_margin  = 0;

	$('#header li.main_link_item, #header .logo').each(function()
	{
		header_children_width += $(this).width();
	});

	header_margin_available = header_width - header_children_width;
	header_children_margin 	= Math.floor((header_margin_available / header_children_count) / 2) - 5;

	$('#header li.main_link_item, #header .logo').css({'margin-left' : header_children_margin + 'px', 'margin-right' : header_children_margin + 'px'});
	$('#selected_sub_menu_link').css({'margin-left' : header_children_margin + 'px'});
}

function load_menu()
{
    $('#header ul li.main_link_item').hover(function()
    {
    	$('#selected_sub_menu_link').hide();
        $(this).find('.sub_menu').show();
    },
    function()
    {
    	$('#selected_sub_menu_link').show();
        $(this).find('.sub_menu').hide();
    });
}

function check_mandatory_fields()
{
    var all_mandatory_fields_complete = true;

    $(".mandatory").each(function()
    {
        if ($(this).val() == '' || $(this).val() == $(this).attr('defaultValue'))
        {
            if ($("input[name='radio_gender']").is(':checked') == false)
            {
                $('.radio_buttons span').css('color', '#FF0000');
            }
            else
            {
                $('.radio_buttons span').css('color', '#FFFFFF');
            }

            $(this).css('border', '1px solid #FF0000');
            all_mandatory_fields_complete = false;
        }
    });

    return all_mandatory_fields_complete;
}

function check_no_mandatory_field(value, default_value, regExp)
{
    if(value == default_value)
    {
        return true;
    }

    return value.match(regExp);
}

function write_message(key, lang, classe)
{
    $("#message").html(message[key][lang]);
    $("#message").removeClass();
    $("#message").addClass(classe);
}

function lockScroll(){
	var $html = $('html'),
		$body = $('body'),
		initWidth = $body.outerWidth(),
		initHeight = $body.outerHeight()
		scrollPosition = [
			self.pageXOffset || document.documentElement.scrollLeft || document.body.scrollLeft,
			self.pageYOffset || document.documentElement.scrollTop  || document.body.scrollTop
		];
	
	$html
		.data('scroll-position', scrollPosition)
		.data('previous-overflow', $html.css('overflow'))
		.css('overflow', 'hidden');
	
	window.scrollTo(scrollPosition[0], scrollPosition[1]);
	
	var marginR = $body.outerWidth()-initWidth,
		marginB = $body.outerHeight()-initHeight;
		 
	$body.css({ 'margin-right' : marginR, 'margin-bottom' : marginB });
} 

function unlockScroll(){
	var $html = $('html'),
		$body = $('body'),
		scrollPosition = $html.data('scroll-position');
		
	$html.css('overflow', $html.data('previous-overflow'));
	
	window.scrollTo(scrollPosition[0], scrollPosition[1]);
	
	$body.css({ 'margin-right' : 0, 'margin-bottom' : 0 });
}