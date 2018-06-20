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
  
  var divs = document.getElementsByClassName('description');
  for (var i = 0; i < divs.length; i++) {
    divs[i].onhover = function(j){
      desc_hover(j);
    }(i);
  }
});

