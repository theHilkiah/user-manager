(function ($) {

    $(function () {
        var disabledTogglers = '.toggle-disabled,[data-toggle-prop]';

        $(document).find(disabledTogglers).each(function () {

            var defaultTrigger = $(this).is(':input') ? 'change' : 'click';
            var currentTrigger = $(this).data('trigger') || defaultTrigger;
            var destinedTarget = $(this).data('target') || this.hash;
            var attrPropToggled = $(this).data('toggleProp') || $(this).data('value');
            console.log(defaultTrigger, currentTrigger, destinedTarget);

            $(destinedTarget, document).on(currentTrigger, function (e) {
                console.log(this, e);
                $(this).prop(attrPropToggled, !this.is(attrPropToggled));
            });
        });
    });

    $(function () {
        var disabledTogglers = '.toggle-swap,[data-swap]';

        $(document).find(disabledTogglers).each(function () {

            var destinedTarget = $(this).data('target') || this.hash || this;
            var defaultTrigger = $(this).is(':input') ? 'change' : 'click';
            var currentTrigger = $(this).data('trigger') || defaultTrigger;
            console.log(defaultTrigger, currentTrigger, destinedTarget);

            $(destinedTarget, document).on(currentTrigger, function (e) {
                console.log(this, e);
                $(this).text('disabled', !this.disabled);
            });
        });
    });

    var previewFile = function(event, _id_)
    {
      console.log(event, _id_);
      var reader = new FileReader();
      reader.onload = function(){
         var output = document.querySelector(_id_);
         output.src = reader.result;
      };
      reader.readAsDataURL(event.target.files[0]);
    };

})(jQuery);
