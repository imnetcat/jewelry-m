$( () => {
  $('#to_types').click( () => {
    $('#types').css({
      visibility: "visible",
    });
  });
  $('.fil-close').click( () => {
    $('#types').animate({
      visibility: "hidden",
    });
  });
});
   
