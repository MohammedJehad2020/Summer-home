$(document).ready(function () {
    $('#check_all').on('click', function(e) {
        if($(this).is(':checked',true))
        {
            $(".checkbox").prop('checked', true);
        } else {
            $(".checkbox").prop('checked',false);
        }
    });
    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#check_all').prop('checked',true);
        }else{
            $('#check_all').prop('checked',false);
        }
    });
    $('.delete-all').on('click', function(e) {
        var idsArr = [];
        $(".checkbox:checked").each(function() {
            idsArr.push($(this).attr('data-id'));
        });
        if(idsArr.length <=0)
        {
            alert("Please select atleast one record to delete.");
        }  else {
            if(confirm("Are you sure, you want to delete the selected categories?")){
                var strIds = idsArr.join(",");
                $.ajax({
                    url: "products/delete-multiple-products",
                    type: 'DELETE',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: 'ids='+strIds,
                    success: function (data) {
                        if (data['status']==true) {
                            $(".checkbox:checked").each(function() {
                                $(this).parents("tr").remove();
                            });
                            toastr.options.closeButton = true;
                            toastr.options.closeMethod = 'fadeOut';
                            toastr.options.closeDuration = 100;
                            toastr.success('Deleted Successfully');
                        } else {
                            alert('Whoops Something went wrong!!');
                        }
                    },
                    error: function (data) {
                        alert(data.responseText);
                    }
                });
            }
        }
    });
});