$('document').ready(function(){
	var test= $('#content').text();
	$('#content').html(markdown.toHTML(test));
})