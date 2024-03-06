(function($){
    $(document).ready(function(){
        $(".popup").each(function(){
            var images = $(this).find("img").attr("src");
            $(this).attr("href", images); 
        });
        
      
      }); 
})(jQuery);
