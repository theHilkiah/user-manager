(function ($) {
   $(function(){
      var clientSideForm = 'form.ajax-form,form.axios-form';
      
      $(document).on('submit', clientSideForm, function(e){
         console.log(this, e);

      });
   });

})(jQuery);
