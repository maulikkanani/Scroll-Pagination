(function ( $ ) {
 
    $.fn.mkscroll = function( options ) {
        var mk = $.extend({
            limit: 0,
            offset:3,
            total: 0,
            url:"ajax.php",
            appendon:"body",
            jqueryfunction:"append",
            loader:"",
            selector:jQuery(window),
        }, options );
        
       var s=mk.selector;
       s.scroll(function(event) {
        if(mk.total==0 || mk.limit==0){
           alert("Please set  total and limit For scroll pagination");  
        }
       if(parseInt(mk.total)>parseInt(mk.limit)){
           if(mk.loader!='')
             $(mk.loader).show();
            if (s.scrollTop() >= ($(document).height() - s.height())) {
               mk.limit= parseInt(mk.limit) + parseInt(mk.offset);
               $.post(mk.url, { limit: mk.limit, offset: mk.offset } )
               .done(function(data) {
                   
                   if(mk.jqueryfunction=='append')
                        $(mk.appendon).append(data);
                   
                   if(mk.jqueryfunction=='before')
                        $(mk.appendon).before(data);
                    
                   if(mk.jqueryfunction=='after')
                        $(mk.appendon).after(data);
                    
                   if(mk.jqueryfunction=='html')
                        $(mk.appendon).html(data);
                
               if(mk.loader!='')         
                   $(mk.loader).hide();
                               
               });
            } 
       }
       
    });
 
    };
 
}( jQuery ));