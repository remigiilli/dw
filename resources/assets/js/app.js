$(function () {    
    //$('[data-toggle="popover"]').popover()
    //$('[data-toggle="tooltip"]').tooltip()
    $('[data-toggle="popoverload"]').click(function(event) {
	var e=$(this);
	var uri = location.protocol+'//'+location.hostname+(location.port ? ':'+location.port: '') + '/' +  e.data('type') + '/' + e.data('id') + '/justcontent';
	$.get(uri,function(d) {
	    e.popover({html: true, content: d}).popover('show');
	});
    });
}) 
