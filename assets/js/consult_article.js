
$('document').ready(function(){

	var test= $('#content').text();
	$('#content').html(markdown.toHTML(test));
	console.log('ok');

	

	$('#down').click(function(){
		console.log('ok');
			var content = test;

			var filename = $('#title').text()+'.md';

			var blob = new Blob([content], {
				type: "text/plain;charset=utf-8"
			});

			saveAs(blob, filename);
	})
})