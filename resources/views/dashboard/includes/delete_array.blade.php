<script>
    function delete_box_select() {
        var data_array = [];
        $("input:checkbox[name=items_cehck_box]:checked").each(function() {
            data_array.push($(this).val());
        });
        if (data_array.length > 0) {
            Swal.fire({
                title: 'Are you sure to delete?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete',
                cancelButtonText: 'No, cancel it!',
                reverseButtons: true,

                showLoaderOnConfirm: true,
                preConfirm: (login) => {
                    var yourArray = [];

                    $("input:checkbox[name=items_cehck_box]:checked").each(function() {
                        yourArray.push($(this).val());
                    });

                    axios.post('{{ $route_delete }}', {
                            ids: yourArray,

                        })
                        .then(function(response) {
                            $("#datatable").DataTable().ajax.reload();
                            $('#check_all').prop('checked', false);
                            Swal.fire({
                                icon: "success",
                                title: "Deleted successfully!",
                                confirmButtonColor: "#5664d2",
                                confirmButtonText: 'Ok'

                                // html: JSON.stringify(result),
                            })


                        })
                        .catch(function(error) {

                            Swal.fire({
                                icon: "error",
                                title: "Deleted Faild ,You do not have permission",
                                confirmButtonColor: "#5664d2",
                                // html: JSON.stringify(result),
                            })

                        });

                },

                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {

                if (result.isConfirmed) {

                    $('#check_all').prop('checked', false);

                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Delete is not completed!",
                        confirmButtonColor: "#5664d2",
                        // html: JSON.stringify(result),
                    });
                    $('#check_all').prop('checked', false);

                }
            })
        } else {
            Swal.fire({
                icon: "error",
                title: "Please Select Items",
                confirmButtonColor: "#5664d2",
                // html: JSON.stringify(result),
            })
        }
    }
</script>
