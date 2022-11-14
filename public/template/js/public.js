$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function loadMore(){
    const page = $('#page').val();

     $.ajax({
         type: 'POST',
         dataType: 'JSON',
         data: { page },
         url: '/service/load-product',
         success: function (result){
            if (result.html != ''){
                $('#loadProducts').append(result.html)
                $('#page').val(page + 1)
            }
            else {
                $('#btn-loadMore').css('display','none');
            }
        }
     })
}
