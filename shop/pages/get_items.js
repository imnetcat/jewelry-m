function get_items(){
  var raw = Array.from($('input:checked').children());
  filters = [];
  for(n = 0, raw.lenght){
    filters[n] = raw[n].attr('id');
  }
  console.log(filters);
  $.ajax({
	  type: "POST",
	  url: "actions.php",
	  data: {
		  action: 'get_items',
	  	filters: filters,
  	},
  	success: function(data){
  		$('#auth_error').html(data);
  	}
  });
