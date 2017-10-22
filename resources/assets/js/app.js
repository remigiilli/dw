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
	var uri = location.protocol+'//'+location.hostname+(location.port ? ':'+location.port: '') + '/' +  e.data('type') + '/' + e.data('id') + '/justcontent';
	$.get(uri,function(d) {	  
	    e.popover({html: true, content: d}).popover('show');
	});
	event.preventDefault();
    });
    $('[data-toggle="popoverload"]').focusout(function(event) {
	$(this).popover('hide');
    });
    $('[data-paste="remove-newlines"]').on('paste', function(event){
        var e=$(this);
        var dt = event.originalEvent.clipboardData;
        if(dt && dt.items && dt.items[0]){
            dt.items[0].getAsString(function(text){
                e.insertAtCaret(text.replace(/\r?\n|\r/g, ' '));
            });
        }
        else if(dt && 'getData' in dt){
            e.insertAtCaret(dt.getData('text').replace(/\r?\n|\r/g, ' '));
        }        
	event.preventDefault();        
    });    
    $('[data-paste="capitalize"]').on('paste', function(event){
        var e=$(this);
        var dt = event.originalEvent.clipboardData;
        if(dt && dt.items && dt.items[0]){
            dt.items[0].getAsString(function(text){
                e.insertAtCaret(text.capitalize());
            });
        }
        else if(dt && 'getData' in dt){
            e.insertAtCaret(dt.getData('text').capitalize());
        }        
	event.preventDefault();        
    });    
}) 
