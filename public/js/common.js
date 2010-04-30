function set_cookie ( name, value, exp_y, exp_m, exp_d, path, domain, secure )	{
	  var cookie_string = name + "=" + escape ( value );
	  if ( exp_y ){
		var expires = new Date ( exp_y, exp_m, exp_d );
		cookie_string += "; expires=" + expires.toGMTString();
	  }
    	cookie_string += "; path=" + escape ( path );
	  if ( domain )
			cookie_string += "; domain=" + escape ( domain );
	  if ( secure )
			cookie_string += "; secure";
	  document.cookie = cookie_string;
	}

function readCookie(cookieName) {
	 var theCookie=""+document.cookie;
	 var ind=theCookie.indexOf(cookieName);
	 if (ind==-1 || cookieName=="") return ""; 
	 var ind1=theCookie.indexOf(';',ind);
	 if (ind1==-1) ind1=theCookie.length; 
	 return unescape(theCookie.substring(ind+cookieName.length+1,ind1));
}

// jQuery onReady
$(document).ready(function() {

	// Anchor Form Submit
	$('a.fs').click(function(){
		$(this).parents('form').submit();	
		return false;
	});
	
	// Make Things Clickable
	$(".clickable").click(function(){
		var linkURL = $(this).children("a").attr("href");
		if(!linkURL) linkURL = $(this).children("div").children("a").attr("href");
		window.location.href = linkURL;
		return false;
	});
	
	// Toggle	
	$(".toggler").click(function(){
		obj = $(this).attr("rel");
		$('#'+obj).slideToggle("fast");
		if($(this).hasClass('hor')) $(this).fadeOut();
		return false;
	});

});

