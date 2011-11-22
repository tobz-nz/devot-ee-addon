// toggle buttons for notes field
$('#devot-ee a.toggle').live('click', function(){
	$(this).toggleClass('open-toggle');
	$(this).parent().parent().next('tr').toggleClass('open-notes');
	return false;
});

// live refreshing when update button is clicked
$('#devot-ee a.refresh').live('click', function() {
	var refreshUrl = $(this).attr('href');
	
	$.get(refreshUrl, function(data) {
		var updatedHTML = $('div.border', data);
		
		$('#accessoriesDiv #devot-ee div.border:first').html(updatedHTML).hide().fadeIn();
	}, 'html');
	
	return false;
});