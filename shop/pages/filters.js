$( () => {
  $('#to_types').click( () => {
    $('#types').css({
      visibility: "visible",
      z-index: 100
    });
    $('#filters').css({
      visibility: "hidden",
      z-index: 99
    });
  });
  $('.fil-close').click( () => {
    $('#types').css({
      visibility: "hidden",
      z-index: 99
    });
    $('#filters').css({
      visibility: "visible",
      z-index: 100
    });
  });
});
   
