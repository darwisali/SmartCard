<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    function deleteItem(e){
        let id = e.getAttribute('data-id');

        swal({
            title: "Are you sure!",
            type: "error",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes!",
            showCancelButton: true,
        }).then((result) => {
            if(result){
                $.ajax({
                    type: "DELETE",
                    url: "kategoristatus/" + id,
                    data: {"_token": "{{ csrf_token() }}"},
                    success: function (data) {
                        swal({
                            title: "Data Berhasil Di Hapus!",
                            type: "success",
                        });
                        location.reload();
                    }
                });
            }else{
                swal({
                    title: "Data gagal di hapus!",
                    type: "error",
                });
                location.reload();
            }
        });
    }
</script>
