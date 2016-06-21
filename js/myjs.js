$(document).ready(function() {
// get current page file name 
var url = window.location.pathname;   
var currentPage = url.substring(url.lastIndexOf('/')+1);
    

$("ul.nav li a").each(function(){
       // get its linked page file name        
	var linkPage = this.href.substring(this.href.lastIndexOf('/')+1); 
   

       // add class to <li> if the linked page match the cureent page
	if (currentPage == linkPage) {
      	$(this).parent().addClass('active'); 
       } 
   });  
   
   var offset = 150;
    var duration = 300;
    $(window).scroll(function() {
        if ($(this).scrollTop() > offset) {
            $('.back-to-top').fadeIn(duration);
        } else {
            $('.back-to-top').fadeOut(duration);
        }
    });

    $('.back-to-top').click(function(event) {
        event.preventDefault();
        $('html, body').animate({scrollTop: 0}, duration);
        return false;
    })  
	
});
