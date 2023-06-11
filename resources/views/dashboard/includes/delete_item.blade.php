
<script>
    function  DeleteItem(id) {
        Swal.fire({
                title: 'Are you sure to delete?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete',
                cancelButtonText: 'No, cancel it!',
                reverseButtons: true,

                showLoaderOnConfirm: true,
                preConfirm: (login) => {
                    // Make a request for a user with a given ID
                    return  axios.delete('{{$route_delete}}/'+id)
                    // .then(function (response) {
                    // handle success
                    // console.log(response);
                    // })
                },

                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                $("#datatable").DataTable().ajax.reload();
                if (result.isConfirmed) {

                    Swal.fire({
                        icon: "success",
                        title: "Deleted successfully!",
                        confirmButtonColor: "#5664d2",
                        confirmButtonText: 'Ok'
                        // html: JSON.stringify(result),
                    })
                }else {
                    Swal.fire({
                        icon: "error",
                        title: "Delete is not completed!",
                        confirmButtonColor: "#5664d2",
                        // html: JSON.stringify(result),
                    })
                }
            })
}






</script>
