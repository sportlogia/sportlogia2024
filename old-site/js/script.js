// <![CDATA[
$(function() {

  // Slider
  $('#coin-slider').coinslider({width:960,height:333,opacity:1});

  // Radius Box
  $('#formsearch, .content .sidebar .gadget, .menu_nav ul li a').css({"border-radius":"16px", "-moz-border-radius":"16px", "-webkit-border-radius":"16px"});
  //$('.content .sidebar .gadget, .fbg_resize').css({"border-radius":"12px", "-moz-border-radius":"12px", "-webkit-border-radius":"12px"});
  //$('.content p.pages span, .content p.pages a').css({"border-radius":"16px", "-moz-border-radius":"16px", "-webkit-border-radius":"16px"});
  $('.content .sidebar .gadget h2').css({"border-top-left-radius":"16px", "border-top-right-radius":"16px", "-moz-border-radius-topleft":"16px", "-moz-border-radius-topright":"16px", "-webkit-border-top-left-radius":"16px", "-webkit-border-top-right-radius":"16px"});

});	

// Cufon
Cufon.replace('h1, h2, h3, h4, h5, h6, .article a.com', { hover: true });
//Cufon.replace('h1', { color: '-linear-gradient(#fff, #ffaf02)'});
//Cufon.replace('h1 small', { color: '#8a98a5'});

// ]]>