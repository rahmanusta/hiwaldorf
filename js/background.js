(function($)
{
    $.fn.magicbluebck = function(options)
    { 
        // Bool
        var animBool    = false;  
        var bck_playing = true;

        // Defaults Values of plugin
        var defaults =
        {
        	div							: $(this),
            image                       : "",
            valign                      : "center",
            halign                      : "center",
            imglist                     : 0,
            imgwidth                    : "1600",
            imgheight                   : "1050",
            altTxt						: "",
            points				   		: "",
            minWidth                    : 0,
            minHeight                   : 0,
            delayBetweenTransition      : 0,
            DisplayPrevNextButton       : false,
            DisplayThumbsButton         : false,
            AppendDisplayPrevNextButton : "background",
            PrevNextButtonImage         : "",
            PrevNextButtonWidth         : 0,
            PrevNextButtonHeight        : 0,
            ThumbsButtonWidth           : 0,
            ThumbsButtonHeight          : 0
        };
        
        // Replacing defaults by parameters
        var change_bck;
        var options   = $.extend(defaults, options);         
        var nb        = 0;
        var points 	  = options.points;
        var finalimgx = "";
        var finalimgy = "";
        var slider 	  = false;

        // Create image in DOM
        obj = defaults.div;

        // SET DEFAULT CSS FOR BACKGROUND
        obj.css({"position" : "absolute","height": "100%","width": "100%","overflow": "hidden","z-index": "1","top": "0"});
        obj.find('div').css({"background-color": "transparent","position": "absolute","bottom": "0","z-index": "8","opacity": "0.0" });
        obj.find('div.active').css({"z-index" : "10","opacity" : "1.0","position" : "relative" });
        obj.find('div.last-active').css({"z-index" : "30"});
        obj.find('div img').css({"position" : "absolute", "display" : "block","border" : "0"});

        nb_img = defaults.imglist.length;

        obj.parent().append('<div class="preload" style="display:none;"></div>');

        if(nb_img > 1){
        	slider = true;
        }

        for(i=0;i<nb_img;i++){
            $(".preload").append('<img type="hidden" src="' + defaults.imglist[i]["link"] + '" alt="" />');  
        }

        if(nb_img > 0)
        {
            defaults.image = defaults.imglist[0]["link"];
            
            if (defaults.imglist[0]["valign"] == undefined)
            {
            	
            }
            else
            {
                defaults.valign = defaults.imglist[0]["valign"];
                defaults.halign =  defaults.imglist[0]["halign"];
            }
        }

        if (nb_img > 1){
            $("#playpause").css("display", "none");
        }

        obj.append('<div class="active"><img src="' + defaults.image + '" alt="' + defaults.altTxt + '" /></div>');

        if(defaults.DisplayPrevNextButton == true && nb_img > 1 && defaults.DisplayThumbsButton == false)
        {
            $("#" + defaults.AppendDisplayPrevNextButton).append('<div id="slider_buttons"></div>');
            $("#slider_buttons").css({
            	"width" : (defaults.PrevNextButtonWidth + 15) * nb_img + "px",
	            "z-index" : "5",
	            "margin" : "auto"
            });
            
            for(var i = 0; i < nb_img; i++)
            {
                $("#" + defaults.AppendDisplayPrevNextButton).find("#slider_buttons").append('<a href="javascript:void(0);"></a>');
                $("#" + defaults.AppendDisplayPrevNextButton).find("#slider_buttons a").css({"cursor" : "pointer", "margin-bottom" : "10px", "background-repeat" : "no-repeat", "display" : "block", "font-size" : "0px", "text-indent" : "-9999px", "background-image" : "url('" + defaults.PrevNextButtonImage + "')", "width" : defaults.PrevNextButtonWidth + "px", "height" : defaults.PrevNextButtonHeight + "px"});
            }

            $("#" + defaults.AppendDisplayPrevNextButton).find("#slider_buttons a:first").css({"background-position" : "0px -" + defaults.PrevNextButtonHeight + "px"});
            $("#" + defaults.AppendDisplayPrevNextButton).find("#slider_buttons").append("<div id='playpause'>&nbsp;</div>");
        }
        
        if(defaults.DisplayPrevNextButton == false && nb_img > 1 && defaults.DisplayThumbsButton == true)
        {
            $("#" + defaults.AppendDisplayPrevNextButton).append('<div id="slider_buttons" style="width : ' + defaults.ThumbsButtonWidth + 'px; position : absolute; z-index : 5;"></div>');
            makeItFitSmallWebSite();
            for(var i = 0; i < nb_img; i++)
            {
                $("#" + defaults.AppendDisplayPrevNextButton).find("#slider_buttons").append('<a style="background-image:url('+defaults.imglist[i]["link_thumb"]+')" href="javascript:void(0);"></a>');
                $("#" + defaults.AppendDisplayPrevNextButton).find("#slider_buttons a").css({"border":"1px solid #ffffff" ,"cursor" : "pointer", "margin-bottom" : "10px", "background-repeat" : "no-repeat", "display" : "block", "font-size" : "0px", "text-indent" : "-9999px", "width" : defaults.ThumbsButtonWidth + "px", "height" : defaults.ThumbsButtonHeight + "px"});
            }

            $("#" + defaults.AppendDisplayPrevNextButton).find("#slider_buttons a:first").css({"background-position" : "0px -" + defaults.ThumbsButtonHeight + "px"});
            $("#" + defaults.AppendDisplayPrevNextButton).find("#slider_buttons").append("<div id='playpause'>&nbsp;</div>");
        }

        // Function Used to Background Resize
        function resize_background(defaults) 
        {       	
        	obj = defaults.div;
        	
        	if($.browser.msie && $.browser.version.substring(0) == "7"){
                var pageWidth  = obj.width();		//Window Size
                var pageHeight = obj.height();
        	}else{
                var pageWidth  =  obj.width();		//Window Size
                var pageHeight =  obj.height();
        	}
        	
            var minHeight = defaults.minHeight;		//Min Website Size
            var minWidth  = defaults.minWidth;

            var iw = defaults.imgwidth;				//Image size
            var ih = defaults.imgheight;


            var fRatio    = iw / ih;				//Image Ratio
            var this_left = 0;						//Values horizontal center
            var this_top  = 0;						//Values vertical center
            
            var DivImg = obj.find('div img');
            var DivImgLast = obj.find('div img').last();

            if (pageHeight < minHeight) 
            {
                if(pageWidth < minWidth)
                {
                    obj.css({"width" : minWidth + "px","height" : minHeight + "px","position" : "absolute","top" : 0}); 

                    DivImg.css("width", minWidth + "px");
                    DivImg.css("height", Math.round(minWidth * (1 / fRatio)));

                    var newIh = Math.round(minWidth * (1 / fRatio));

                    if (newIh < minHeight) 
                    {

                        var fRatio = ih / iw;
                        DivImg.css("height", minHeight);
                        DivImg.css("width", Math.round(minHeight * (1 / fRatio)));
                        DivImgLast.css({"position" : "absolute","top" : 0,"left" : 0});
                    }

                    // Centrage Horizontal
                    if (DivImg.width() > minWidth) 
                    {
                        this_left = (DivImg.width() - minWidth);

                        if (defaults.halign == "center") 
                        {
                            this_left = this_left / 2;
                        } 
                        else if (defaults.halign == "left") 
                        {
                            this_left = 0;
                        }
                    }
                    
                    
                    // Application du centrage
                    finalimgx= DivImg.css("width");
                    finalimgy=  DivImg.css("height");
                }
                else
                {
                    // CSS for this case
                    obj.css({"width" : pageWidth, "height" : minHeight, "position" : "absolute", "overflow" : "hidden", "z-index" : "1", "top" : 0});
                    DivImgLast.css({"position" : "absolute", "top" : 0, "left" : 0});
                    DivImg.css("width", pageWidth + "px");
                    DivImg.css("height", Math.round(pageWidth * (1 / fRatio)));

                    // If resized image height still smaller than minimal height
                    if (Math.round(pageWidth * (1 / fRatio)) < minHeight) 
                    {
                        DivImg.css("height", minHeight + "px");
                        DivImg.css("width", Math.round(minHeight * (fRatio)));
                    }

                    // Centrage Horizontal
                    if (DivImg.width() > pageWidth) 
                    {
                        this_left = (DivImg.width() - pageWidth);
                        if (defaults.halign == "center") 
                        {
                            this_left = this_left / 2;
                        } 
                        else if (defaults.halign == "left")
                        {
                            this_left = 0;
                        }
                    }
                 	// Application du centrage
                    finalimgx = DivImg.css("width");
                    finalimgy = DivImg.css("height");
                }

                // Centrage Vertical
                if (DivImg.height() > minHeight) 
                {
                    this_top = (DivImg.height() - minHeight);
                    
                    if (defaults.valign == "center") 
                    {
                        this_top = this_top / 2;
                    } 
                    else if (defaults.valign == "top") 
                    {
                        this_top = 0;
                    }
                }
            }
            else 
            {
            	 if(pageWidth < minWidth)
                 {
                     obj.css({"width" : minWidth + "px","height" : pageHeight + "px","position" : "absolute","top" : 0}); 
                     DivImg.css("width", minWidth + "px");
                     DivImg.css("height", Math.round(minWidth * (1 / fRatio)));

                     var newIh = Math.round(minWidth * (1 / fRatio));

                     if (newIh < pageHeight) 
                     {                    	 
                         var fRatio = ih / iw;
                         DivImg.css("height", pageHeight);
                         DivImg.css("width", Math.round(pageHeight * (1 / fRatio)));
                         DivImgLast.css({"position" : "absolute","top" : 0,"left" : 0});
                     }

                     // Centrage Horizontal
                     if (DivImg.width() > minWidth) 
                     {
                         this_left = (DivImg.width() - minWidth);

                         if (defaults.halign == "center") 
                         {
                             this_left = this_left / 2;
                         } 
                         else if (defaults.halign == "left") 
                         {
                             this_left = 0;
                         }
                     }
                     
                     // Application du centrage
                     finalimgx=  DivImg.css("width");
                     finalimgy=  DivImg.css("height");
                 }else{
                	 
		                // CSS for this case
		                $("#background").css({"position" : "fixed", "height" : "100%", "width" : "100%", "overflow" : "hidden", "z-index" : "1", "top" : "0"});
		                DivImg.css("width", pageWidth + "px");
		                DivImg.css("height", Math.round(pageWidth * (1 / fRatio)));
		
		                // If resized image height still smaller than minimal height
		                if (Math.round(pageWidth * (1 / fRatio)) < pageHeight) 
		                {
		                    DivImg.css("height", pageHeight + "px");
		                    DivImg.css("width", Math.round(pageHeight * (fRatio)));
		                }

                
                 }
                
                // Centrage Horizontal    
                if (DivImg.width() > pageWidth)
                {
                    this_left = (DivImg.width() - pageWidth);

                    if (defaults.halign == "center") 
                    {
                        this_left = this_left / 2;
                    } 
                    else if (defaults.halign == "left") 
                    {
                        this_left = 0;
                    }
                }


                
                // Centrage Vertical
                if (DivImg.height() > pageHeight) 
                {
                    this_top = DivImg.height() - pageHeight;

                    if (defaults.valign == "center") 
                    {
                        this_top = this_top / 2;
                    }
                    else if (defaults.valign == "top") 
                    {
                        this_top = 0;
                    }
                }
            }

            // positioning of image
            DivImgLast.css({ "position" : "absolute", "left" : Math.floor(-this_left), "top" : Math.floor(-this_top) });
        }

        //Function to change the background
        function change_background(img_list, nb, obj)
        {        	
        	
            //Get Number of img
            nb_img = img_list.length;
            if(nb_img<2){return};
            
            
            //Grab the Nxt Img link
            nextimg = img_list[nb]["link"];
            
            if (defaults.imglist[nb]["valign"] == undefined){
            	defaults.valign = "center";
            	defaults.halign = "center";
            }else{
                defaults.valign = defaults.imglist[nb]["valign"];
                defaults.halign =  defaults.imglist[nb]["halign"];
            }

            
            // Get size of current img
            wsize = obj.find('div img').width();
            hsize = obj.find('div img').height();
            // Effect Choice
            var left = obj.find('img').first().css("left");
            left = left.substr(0,left.length-2);
            left = parseInt(left);
            
            
            if(img_list[nb]["effect"] == "none")
            {
                obj.find('div img').attr("src",nextimg);
            }
            else if(img_list[nb]["effect"] == "rslide")
            {
                animBool = true;
                wsize2 = wsize + left;
                obj.append('<div class="active"><img src="' + nextimg + '" alt="' + defaults.altTxt + '" /></div>');
                obj.find('img').last().css({"position" : "absolute", "left" : + -wsize + "px", "z-index":"1"});
                obj.find('img').first().css({'position' : "absolute", "z-index":"2"});
                obj.find('img').first().animate({'left' : wsize2 + "px"}, 1500);
                obj.find('img').last().animate({'left' : left},  1500, function()
                {
                    obj.find('.active').first().remove();
                    obj.find('img').css({'left' : left});
                    animBool = false;
                });
                
            }
            else if(img_list[nb]["effect"] == "lslide")
            {
                animBool = true;
                obj.append('<div class="active"><img src="' + nextimg + '" alt="' + defaults.altTxt + '" /></div>');
                obj.find('img').last().css({"position" : "absolute", "left" : + wsize + left + "px", "z-index":"1"});
                obj.find('img').first().css({'position' : "absolute", "z-index":"2"});
                obj.find('img').first().animate({'left' : -wsize + "px"}, 1500);
                obj.find('img').last().animate({'left' : left},  1500, function()
                {
                    obj.find('.active').first().remove();
                    obj.find('img').css({'left' : left});
                    animBool = false;
                });
                
            }
            else if(img_list[nb]["effect"] == "bslide")
            { 
                animBool = true;
                obj.append('<div class="active"><img src="' + nextimg + '" alt="' + defaults.altTxt + '" /></div>');
                obj.find('img').last().css({"position" : "absolute", "top" : + - hsize + "px", "z-index":"1"});
                obj.find('img').first().css({'position' : "absolute", "z-index":"2"});
                obj.find('img').first().animate({'top' : hsize + "px"}, 1500);
                obj.find('img').last().animate({'top' : 0},  1500, function()
                {
                    obj.find('.active').first().remove();
                    obj.find('img').css({'top' : 0});
                    animBool = false;
                });
                
            }
            else if(img_list[nb]["effect"] == "tslide")
            {
                animBool = true;
                obj.append('<div class="active"><img src="' + nextimg + '" alt="' + defaults.altTxt + '" /></div>');
                obj.find('img').last().css({"position" : "absolute", "top" : + hsize + "px", "z-index":"1"});
                obj.find('img').first().css({'position' : "absolute", "z-index":"2"});
                obj.find('img').first().animate({'top' : -hsize + "px"}, 1500);
                obj.find('img').last().animate({'top' : 0},  1500, function()
                {
                    obj.find('.active').first().remove();
                    obj.find('img').css({'top' : 0});
                    animBool = false;
                });
                //alert();
            }
            else if(img_list[nb]["effect"] == "fade")
            {
                animBool = true;
                obj.append('<div class="active"><img src="' + nextimg + '" alt="' + defaults.altTxt + '" /></div>');
                obj.find('img').last().css({"position" : "absolute", "z-index":"1"});
                obj.find('img').first().css({'position' : "absolute", "z-index":"2"});                
                obj.find('img').first().fadeOut(1000, function(){
                obj.find('.active').first().remove();
                animBool = false;
                });
                
                obj.find('.active').last().fadeIn(1000);
                
            }

            update_prev_next_button($("#"+options.AppendDisplayPrevNextButton+" > #slider_buttons a:eq(" + nb + ")"));
        }
          
        function placePoint(points)
        {
        	var ratiox =  finalimgx / defaults.imgwidth ;
        	var ratioy = finalimgy / defaults.imgheight ;

            for(var i in points)
        	{
        		
        		var pointwidth = $('*[name="'+points[i]["classname"]+'"]').width();
        		var pointheight =  $('*[name="'+points[i]["classname"]+'"]').height();
        		
        		var xcenter = 0;
        		var ycenter = 0;

            	if(points[i]['alignx'] == "center"){
            		xcenter = - (pointwidth/2);
            	}else if (points[i]['alignx'] == "right"){
            		xcenter = - pointwidth;
            	}
            	
            	if(points[i]['aligny'] == "center"){
            		ycenter = - (pointheight/2);
            	}else if (points[i]['aligny'] == "bottom"){
            		ycenter = - pointheight;	
            	}
            	
        		var fx = Math.round((points[i]['xpos'] * ratiox) - finalimgleft   + parseInt(xcenter));
            	var fy = Math.round((points[i]['ypos'] * ratioy) - finalimgtop  + parseInt(ycenter));
            	
            	var fx_popup = fx;
            	var fy_popup = fy;

            	if( fx_popup < 0 )
            	{
            		fx_popup = 0;
            	}

            	if( fx_popup > ($("#wrap").width() - $('*[name="'+points[i]["classname"]+'_popup"]').width()))
            	{
            		fx_popup = ($("#wrap").width() - $('*[name="'+points[i]["classname"]+'_popup"]').width());
            	}

            	if( fy_popup < 179 )
            	{
            		fy_popup = 179;
            	}

            	if( fy_popup > ($("#wrap").height()-69 - $('*[name="'+points[i]["classname"]+'_popup"]').height()))
            	{
            		fy_popup = ($("#wrap").height()-69 - $('*[name="'+points[i]["classname"]+'_popup"]').height());
            	}

            	if(obj.height() < defaults.minHeight)
            	{
            		$('*[name="'+points[i]["classname"]+'"]').css({"position" : "absolute",
			        	   "top" : fy+"px",
			        	   "left" : fx+"px"});
            		
            		$('*[name="'+points[i]["classname"]+'_popup"]').css({"position" : "absolute",
			        	   "top" : fy_popup+"px",
			        	   "left" : fx_popup+"px"});
            	}
            	else
            	{
            		$('*[name="'+points[i]["classname"]+'"]').css({"position" : "fixed",
			        	   "top" : fy+"px",
			        	   "left" : fx+"px"});

            		$('*[name="'+points[i]["classname"]+'_popup"]').css({"position" : "absolute",
			        	   "top" : fy_popup+"px",
			        	   "left" : fx_popup+"px"});
            	}
        	}
        }

        function update_prev_next_button(link)
        {
            $("#"+options.AppendDisplayPrevNextButton+" > #slider_buttons a").css({"background-position" : "0px 0px"});
            
            if(defaults.DisplayPrevNextButton == true && defaults.DisplayThumbsButton == false)
                link.css({"background-position" : "0px -" + defaults.PrevNextButtonHeight + "px"});
                
            else if(defaults.DisplayPrevNextButton == false && defaults.DisplayThumbsButton == true)
                link.css({"background-position" : "0px -" + defaults.ThumbsButtonHeight + "px"});    
        }

        function set_background_change_interval(obj)
        {        	
            change_bck = setInterval(function() 
            {
                nb = (nb + 1) % defaults.imglist.length;
                	
                if(slider == true){
                	change_background(defaults.imglist, nb, obj);
                }
                resize_background(defaults);
            }, defaults.delayBetweenTransition);
        }

        function reset_interval()
        {
            clearInterval(change_bck);
            set_background_change_interval(defaults.div);
        }

        $(document).ready(function() 
        {
    	    // On lance le Plugin
    	    resize_background(defaults);

            // On lance le defilement du background si il y a plusieurs images
            if (defaults.imglist.length > 1) 
            {
	            set_background_change_interval(defaults.div);
	            
	            $("#"+options.AppendDisplayPrevNextButton+" > #slider_buttons a").click(function()
	            {
	                if(!animBool)
	                {
	                    nb = ($(this).index()) % defaults.imglist.length;
	                    //reset_interval();
	                    clearInterval(change_bck);
	                    update_prev_next_button($(this));
	                    change_background(defaults.imglist, $(this).index(), defaults.div);
	                    resize_background(defaults);
	                }
	                else
	                {
	                    return;
	                }   
	            });
            }
            
            $("#playpause").click(function()
            {
                if(bck_playing == true)
                {
                    clearInterval(change_bck);
                    bck_playing = false;
                    $("#playpause").css({"background-position" : "0 -20px"});
                }
                else
                {
                    clearInterval(change_bck);
                    set_background_change_interval(defaults.div);
                    bck_playing = true;
                    $("#playpause").css({"background-position" : "0 0px"});
                }
             });

             placePoint(points);

            //On Relance a chaque resize de fenetre
            $(window).resize(function() 
            {
        	    placePoint(points);
                resize_background(defaults);
                // Si plusieurs images on lance le slider
                if (nb_img > 1)
                {
                    reset_interval();
                }
            });

           $(window).blur(function() 
           {
                clearInterval(change_bck);
           });

           $(window).focus(function() 
           {
                clearInterval(change_bck);
                set_background_change_interval(defaults.div);
           });
        });
    };
})(jQuery);