

$(function($){

    $('[data-validate]').on('blur', function(e){
        e.preventDefault();
        const elm = $(this)
        const url = elm.attr('data-validate-url').replace('VALUE', $(this).val())

        $.ajax({
            method: "get",
            url: url,
        }).success(function(response){
            $('.validate-msg').remove()
            if(response.exists){
                elm.after(`<p class="font-medium text-red-600 validate-msg">${response.msg}</p>`)
            }else{
                elm.after(`<p class="font-medium text-sm text-green-600 validate-msg">${response.msg}</p>`)
            }
        }).catch(function(response){
            elm.after(`<p class="font-medium text-red-600 validate-msg">${response.msg}</p>`)
        })
    });

})(jQuery);