$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// Delete Category

function removeRow(id, url) {
    if (Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
        }
    })) {
        $.ajax({
            type: 'DELETE',
            datatype: 'JSON',
            data: { "id":id,
                "_token": "{{ csrf_token() }}"
            },
            url: url,
            success: function(result) {
                if (result.error == false) {
                    alert(result.message);
                    location.reload();
                } else {
                    alert('Xóa không thành công');
                }
            },
            error: function (result) {
                console.log(result);
            }
        });
    }
}

// Upload Images

$('#upload').change(function() {

    const form = new FormData();
    form.append('file', $(this)[0].files[0]);

    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        dataType: 'JSON',
        data: form,
        url: '/admin/upload/services',
        success: function(results) {
            if (results.error == false) {
                $('#image_show').html('<a href=" ' + results.url + ' " target="_blank">' +
                    '<img src=" ' + results.url + ' "  width="50px"></a>')
                $('#thumb').val(results.url);
            } else {
                alert('Upload thất bại');
            }
        }
    });
});
