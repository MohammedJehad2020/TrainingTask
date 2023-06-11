<x-master>
    <div class="card mb-5 mb-xl-10">
       <x-profile.header :user="$user"/>
    </div>
    <div class="card mb-5 mb-xl-10">
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">{{ t('Profile Details') }}</h3>
            </div>
        </div>
        <div id="kt_account_settings_profile_details" class="collapse show">
            <form id="profile_details_form" class="form" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="card-body border-top p-9">
                    <input type="text" name="id" value="{{ $user->id }}" hidden>
                    <x-fields.profile.avatar name="image" title="Avatar" id="image" avatar="{{ $user->image ? asset('storage/uploads/users-images/'.$user->image) : asset('/assets/media/avatars/blank.png')}}"/>
                    <x-fields.profile.input name="name" type="text" title="Full Name" id="name" placeholder="{{ t('Full Name') }}" value="{{ $user?->name }}"/>
                    <x-fields.profile.input name="email" type="email" title="Email" id="email" placeholder="{{ t('Email') }}" value="{{ $user?->email }}"/>
                    <x-fields.profile.language-input :user="$user"/>    
                </div>
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <x-buttons.discard-button />
                    <x-buttons.submit-button />
                </div>
            </form>
        </div>
    </div>
    <x-fields.profile.reset-password userId="{{ $user->id }}" /> 
   
</x-master>


<script>
    $('#profile_details_form').submit(function(e) {
        e.preventDefault();
        var id = $('#id').val();
        var url = '{{ route('profile.update', ':id') }}'
        url = url.replace(':id', id);
        let formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            success: (data) => {
                var index = data;
                $.each(data, function(index, value) {
                    $('#' + value).removeClass('invalid-border');
                    $('#' + value + "_valid").removeClass('d-block');
                    $('#' + value + "_valid").html();
                });
                document.getElementById('profile_details_form')
            .reset(); //reset all inputs in form after storing data
                //console.log(data);
                $('.error-msg').text('');

                Swal.fire({
                    text: "Edited Successfully",
                    icon: "success",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                });

            },
            error: function(data) {
                $('.error-msg').text('');
                var errors = data.responseJSON.errors;
            var erorr_arr = [];
            $.each(errors, function(index, value) {
                var id_error = index+'-error';
                 $('#'+ id_error).text(value[0]);
            });
            }
        });
    });
</script>
{{-- <script>
    $('#kt_signin_change_password').submit(function(e) {
        alert(555555)
        e.preventDefault();
        // var id = $('#id').val();
        var url = '{{ route('profile.resetPassword') }}';
        // url = url.replace(':id', id);
        let formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            success: (data) => {
                var index = data;
                $.each(data, function(index, value) {
                    $('#' + value).removeClass('invalid-border');
                    $('#' + value + "_valid").removeClass('d-block');
                    $('#' + value + "_valid").html();
                });
                document.getElementById('kt_signin_change_password')
            .reset(); //reset all inputs in form after storing data
                //console.log(data);
                $('.error-msg').text('');

                Swal.fire({
                    text: "Edited Password Successfully",
                    icon: "success",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                });

            },
            error: function(data) {
                $('.error-msg').text('');
                var errors = data.responseJSON.errors;
            var erorr_arr = [];
            $.each(errors, function(index, value) {
                var id_error = index+'-error';
                 $('#'+ id_error).text(value[0]);
            });
            }
        });
    });
</script> --}}

<script type="text/javascript">
    // SweetAlert Toast example
    function showToast(type, message) {
        alert(55555);
      /*   window.toast.fire({
            icon: type,
            type: type,
            title: message,
        }); */
        Swal.fire({
            text: message,
            icon: "success",
            buttonsStyling: false,
            confirmButtonText: "Ok, got it!",
            customClass: {
                confirmButton: "btn btn-primary"
            }
        });
    }

    // SweetAlert Alert Example
   /*  function showAlert(title, message, type) {
        window.swal.fire({
            title: "Response Message",
            text: title,
            type: type,
            confirmButtonText: "OK",
            html: message,
            // cancelButtonText: "Cancel",
            showCancelButton: false,
        }).then(console.log)
            .catch(console.error);
    } */

    @if(session()->has('message'))
        showToast({{ strtolower(session('message')['type']) }}, {{ session('message')['text'] }});
    @endif

</script>



