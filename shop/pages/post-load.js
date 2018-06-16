$( () => {
  $('#to_types').click( () => {
    $('#types').css({
      visibility: "visible",
      zIndex: 100
    });
    $('#to_filters').css({
      visibility: "hidden",
      zIndex: 99
    });
    $('.fil-close').click( () => {
      $('#types').css({
        visibility: "hidden",
        zIndex: 99
      });
      $('#to_filters').css({
        visibility: "visible",
        zIndex: 100
      });
    });
  });
});
$( () => {
  $('#to_stones').click( () => {
    $('#stones').css({
      visibility: "visible",
      zIndex: 100
    });
    $('#to_filters').css({
      visibility: "hidden",
      zIndex: 99
    });
    $('.fil-close').click( () => {
      $('#stones').css({
        visibility: "hidden",
        zIndex: 99
      });
      $('#to_filters').css({
        visibility: "visible",
        zIndex: 100
      });
    });
  });
});
   
