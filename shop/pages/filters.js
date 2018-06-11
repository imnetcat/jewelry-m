$( () => {
  $('#to_types').click( () => {
    $('#types').css({
      visibility: "visible",
      zIndex: 100
    });
    $('#filters').css({
      visibility: "hidden",
      zIndex: 99
    });
  });
  $('.fil-close').click( () => {
    $('#types').css({
      visibility: "hidden",
      zIndex: 99
    });
    $('#filters').css({
      visibility: "visible",
      zIndex: 100
    });
  });
});
   
