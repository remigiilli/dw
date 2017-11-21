$(function () {    
    $.fn.extend({
        insertAtCaret: function(myValue){
            return this.each(function(i) {
                if (document.selection) {
                    //For browsers like Internet Explorer
                    this.focus();
                    var sel = document.selection.createRange();
                    sel.text = myValue;
                    this.focus();
                }
                else if (this.selectionStart || this.selectionStart == '0') {
                    //For browsers like Firefox and Webkit based
                    var startPos = this.selectionStart;
                    var endPos = this.selectionEnd;
                    var scrollTop = this.scrollTop;
                    this.value = this.value.substring(0, startPos)+myValue+this.value.substring(endPos,this.value.length);
                    this.focus();
                    this.selectionStart = startPos + myValue.length;
                    this.selectionEnd = startPos + myValue.length;
                    this.scrollTop = scrollTop;
                } else {
                    this.value += myValue;
                    this.focus();
                }
            });
        }
    });
    
    String.prototype.capitalize = function() {
        return this.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
    };    
    
    $('[data-toggle="popoverload"]').click(function(event) {
	var e=$(this);
        if (e.data('by') == 'name') {       
            if (typeof e.data('name') !== 'undefined') {
                var uri = location.protocol+'//'+location.hostname+(location.port ? ':'+location.port: '') + '/' +  e.data('type') + '/byname/'+ e.data('name');
            }            
            else {
                var uri = location.protocol+'//'+location.hostname+(location.port ? ':'+location.port: '') + '/' +  e.data('type') + '/byname/'+ e.text();
            }            
        }
        else {
            var uri = location.protocol+'//'+location.hostname+(location.port ? ':'+location.port: '') + '/' +  e.data('type') + '/' + e.data('id') + '/justcontent';
        }
	$.get(uri,function(d) {	  
	    e.popover({html: true, content: d}).popover('show');
	});
	event.preventDefault();
    });
    $('[data-toggle="popoverload"]').focusout(function(event) {
	$(this).popover('hide');
    });
    $('[data-paste="remove-newlines"]').on('paste', function(event){
        var element = $(this);
        var dt = event.originalEvent.clipboardData;
        if(dt && dt.items && dt.items[0]){
            dt.items[0].getAsString(function(text){
                element.insertAtCaret(text.replace(/\r?\n|\r/g, ' '));
            });
        }
        else if(dt && 'getData' in dt){
            element.insertAtCaret(dt.getData('text').replace(/\r?\n|\r/g, ' '));
        }        
	event.preventDefault();        
    });    
    $('[data-paste="capitalize"]').on('paste', function(event){
        var element = $(this);
        var dt = event.originalEvent.clipboardData;
        if(dt && dt.items && dt.items[0]){
            dt.items[0].getAsString(function(text){
                element.insertAtCaret(text.capitalize());
            });
        }
        else if(dt && 'getData' in dt){
            element.insertAtCaret(dt.getData('text').capitalize());
        }        
	event.preventDefault();        
    });     
    
    $('[data-click="repeateble-add"]').click(function(event) {        
        var repeateble_element = $(this).parent().parent().parent().parent().find('.repeateble-template').clone().removeClass('repeateble-template').addClass('repeateble-element');
        $('[data-extra-toggle="1"]', repeateble_element).hide();
        $('[data-click="repeateble-remove"]', repeateble_element).click(function(event) {
            $(this).parent().parent().remove();
        });        
        $('[data-change="check-extra"]', repeateble_element).change(function(event) {
            id = $('option:selected', this).val();            
            if (typeof $('option:selected', this).data('extra') !== 'undefined') {
                $(this).attr('name', '');                                
                id = $('option:selected', this).val();
                name =  $(this).parent().parent().parent().find('[data-extra-toggle="1"]').attr('name');
                name = name.replace(/\[(\d+)?\]/, '['+id+']');
                if ($('option:selected', this).data('extra') == 'options') {
                    var options = $('option:selected', this).data('options');
                    console.log(options);
                    for(i=0; i < options.length ; i++) {
                        $(this).parent().parent().parent().find('[data-extra-toggle="1"]').append($('<option>', { 
                            value: options[i].id,
                            text : options[i].name 
                        }));
                    }
                    $(this).parent().parent().parent().find('[data-extra-toggle="1"]').removeAttr('disabled').attr('name', name).show();
                }
                else {                            
                    $(this).parent().parent().parent().find('[data-extra-toggle="1"]').removeAttr('disabled').attr('name', name).show();
                }
            }
            else {
                $(this).attr('name', $(this).data('org-name'));                
                name =  $(this).parent().parent().parent().find('[data-extra-toggle="1"]').attr('name');
                name = name.replace(/\[(\d+)\]/, '[]');                
                $(this).parent().parent().parent().find('[data-extra-toggle="1"]').val('').attr('disabled', 'disabled').attr('name', name).hide();
            }
        });
        
        $('[data-toggle="popoverload-selected"]', repeateble_element).click(function(event) {
            var e=$(this);
            var uri = location.protocol+'//'+location.hostname+(location.port ? ':'+location.port: '') + '/' +  e.data('type') + '/' + e.parent().prev().val() + '/justcontent';
            $.get(uri,function(d) {	  
                e.popover({html: true, content: d, container: 'body'}).popover('show');
            });
            event.preventDefault();
        });    
        $('[data-toggle="popoverload-selected"]', repeateble_element).focusout(function(event) {
            $(this).popover('hide');
        });            
        
        $('[data-change="check-extra"]', repeateble_element).change();
        $(this).parent().parent().parent().append(repeateble_element);        
        $('[data-change="check-extra"]', repeateble_element).focus();
    });    
    
    $('[data-submit="repeateble-remove"]').submit(function(event) { 
        $('.repeateble-template').remove();
    });    
    
    $('[data-load="repeateble-add"]').each(function(){
        var holderElement = $(this).parent();       
        $('[data-click="repeateble-add"]', holderElement).click();
        var currentElement = $('.repeateble-element:last-child', holderElement);
        $('[data-change="check-extra"]', currentElement).val($(this).data('id')).change();
        if (typeof $(this).data('extra') !== 'undefined') {
            $('[data-extra-toggle="1"]', currentElement).val($(this).data('extra'));
        }         
        
        $('[data-toggle="popoverload-selected"]', currentElement).click(function(event) {
            var e=$(this);
            var uri = location.protocol+'//'+location.hostname+(location.port ? ':'+location.port: '') + '/' +  e.data('type') + '/' + e.parent().prev().val() + '/justcontent';
            $.get(uri,function(d) {	  
                e.popover({html: true, content: d, container: 'body'}).popover('show');
            });
            event.preventDefault();
        });    
        $('[data-toggle="popoverload-selected"]', currentElement).focusout(function(event) {
            $(this).popover('hide');
        });            
    });
    
    $('.collapse').on('shown.bs.collapse', function (event) {
        event.target.scrollIntoView({
            behavior: "smooth",
        });
    });    
}) 
//# sourceMappingURL=app.js.map
