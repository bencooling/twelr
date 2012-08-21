/**
 * Dropdown hover submenu
 */
(function($){
  $(function(){
    $('.dropdown.visible-desktop').off().hover(function(){
      $(this).children('ul').slideToggle();
    })
  });
})(jQuery)