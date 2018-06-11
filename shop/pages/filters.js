$( () => {
  $('#to_types').click( () => {
    $('#types').css({
      visibility: "visible",
    });
  });
  $('.fil-close').click( () => {
    $('#types').css({
      visibility: "hidden",
    });
  });
});
   
