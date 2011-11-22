$('#devot-ee a.toggle').live('click', function(){
	$(this).toggleClass('open-toggle');
	$(this).parent().parent().next('tr').toggleClass('open-notes');
	return false;
});