$( () => {
  $('#to_types').click( () => {
    $('#types').animate({
      "visibility": "visible"
    }, 500);
  });
  $('.fil-close').click( () => {
    $('#types').animate({
      "visibility": "hidden"
    }, 500);
  });
});
   
