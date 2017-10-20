$(function () {    
    //$('[data-toggle="popover"]').popover()
    //$('[data-toggle="tooltip"]').tooltip()
    $('[data-toggle="popoverload"]').focus(function(event) {
	var e=$(this);
	var uri = location.protocol+'//'+location.hostname+(location.port ? ':'+location.port: '') + '/' +  e.data('type') + '/' + e.data('id') + '/justcontent';
	$.get(uri,function(d) {	  
	    e.popover({html: true, content: d}).popover('show');
	});
    });
    $('[data-toggle="popoverload"]').focusout(function(event) {
	$(this).popover('hide');
    });
}) 

//# sourceMappingURL=app.js.map
