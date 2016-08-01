
 'use strict';

$(document).ready(function(){
    
        var currentslide=1;
    
        setInterval(function(){     
         $(".slides").animate({'margin-left':'-=280px'},3000,function(){
               currentslide ++;
               
               if(currentslide === $(".slide").length)  {
                    currentslide=1;
                     $(".slides").css('margin-left',0);
               }                                                               
         });
        },3000); 
});
       
       