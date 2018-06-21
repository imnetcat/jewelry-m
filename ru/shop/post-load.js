$( () => {
  $('.fil-close-btn').click( () => {
    $('.filters').css({
      visibility: "hidden",
      zIndex: 99
    });
    $('#to_filters').css({
      visibility: "visible",
      zIndex: 100
    });
    $('#use_filters').css({
      visibility: "visible",
      zIndex: 100
    });
  });

  $('#to_types').click( () => {
    $('#types').css({
      visibility: "visible",
      zIndex: 100
    });
    $('#to_filters').css({
      visibility: "hidden",
      zIndex: 99
    });
    $('#use_filters').css({
      visibility: "hidden",
      zIndex: 99
    });
  });

  $('#to_stones').click( () => {
    $('#stones').css({
      visibility: "visible",
      zIndex: 100
    });
    $('#to_filters').css({
      visibility: "hidden",
      zIndex: 99
    });
    $('#use_filters').css({
      visibility: "hidden",
      zIndex: 99
    });
  });
  
  $('#to_technology').click( () => {
    $('#technology').css({
      visibility: "visible",
      zIndex: 100
    });
    $('#to_filters').css({
      visibility: "hidden",
      zIndex: 99
    });
    $('#use_filters').css({
      visibility: "hidden",
      zIndex: 99
    });
  });
  
  $('#to_cost').click( () => {
    $('#cost').css({
      visibility: "visible",
      zIndex: 100
    });
    $('#to_cost').css({
      visibility: "hidden",
      zIndex: 99
    });
    $('#use_filters').css({
      visibility: "hidden",
      zIndex: 99
    });
  });
  
  $('#use_filters').click( () => {
    filter_out();
  });
});

