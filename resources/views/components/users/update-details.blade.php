<div class="modal fade" id="kt_modal_update_details" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <form class="form" id="edit-user" method="POST" action="{{ route('users.store') }}" id="kt_modal_update_user_form" enctype="multipart/form-data">
                @csrf
                <input type="text" name="id" value="{{ $user->id }}" hidden>
                <div class="modal-header" id="kt_modal_update_user_header">
                    <h2 class="fw-bolder">{{ t('Update User Details') }}</h2>
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="modal-body py-10 px-lg-17">
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_update_user_header" data-kt-scroll-wrappers="#kt_modal_update_user_scroll" data-kt-scroll-offset="300px">
                        <div class="fw-boldest fs-3 rotate collapsible mb-7" data-bs-toggle="collapse" href="#kt_modal_update_user_user_info" role="button" aria-expanded="false" aria-controls="kt_modal_update_user_user_info">{{ t('User Information') }}
                        <span class="ms-2 rotate-180">
                            <span class="svg-icon svg-icon-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                                </svg>
                            </span>
                        </span></div>
                        <div id="kt_modal_update_user_user_info" class="collapse show">
                            <x-fields.avatar title="{{ t('Avatar') }}" name="image" id="avatar" avatar="{{ $user->image ? asset('storage/uploads/users-images/'.$user->image) : asset('/assets/media/avatars/blank.png')}}" />
                            <x-fields.input title="{{ t('Full Name') }}" type="text" name="name" id="name" value="{{ $user->name }}" placeholder="{{ t('Full name') }}" />
                            <x-fields.input title="{{ t('Email') }}" type="email" name="email" id="email" value="{{ $user->email }}" placeholder="{{ t('example@domain.com') }}" />
                            <x-fields.input title="{{ t('Description') }}" type="text" name="description" id="description" value="{{ $user->description }}" placeholder="{{ t('description') }}" />
                            <x-fields.input-language :user="$user"/>
                            <x-fields.input-status :status="$user->status"/> 


                        </div>
                        {{-- <div class="fw-boldest fs-3 rotate collapsible mb-7" data-bs-toggle="collapse" href="#kt_modal_update_user_address" role="button" aria-expanded="false" aria-controls="kt_modal_update_user_address">Address Details
                        <span class="ms-2 rotate-180">
                            <span class="svg-icon svg-icon-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                                </svg>
                            </span>
                        </span></div> --}}
                        {{-- <div id="kt_modal_update_user_address" class="collapse show">
                            <x-fields.input title="{{ t('Street') }}" type="text" name="street" id="street" value="{{ $user?->address?->street }}" placeholder="{{ t('street') }}" />
                            <x-fields.input title="{{ t('City') }}" type="text" name="city" id="city" value="{{ $user?->address?->city }}" placeholder="{{ t('city') }}" />
                            <div class="row g-9 mb-7">
                              <x-fields.input-small title="{{ t('State') }}" type="text" name="state" id="state" value="{{ $user?->address?->state }}" placeholder="{{ t('state') }}" />
                              <x-fields.input-small title="{{ t('Post Code') }}" type="text" name="post_code" id="post_code" value="{{ $user?->address?->post_code }}" placeholder="{{ t('post code') }}" />
                            </div>
                            <x-fields.input-country :user="$user"/>
                        </div> --}}
                    </div>
                </div>
                <div class="modal-footer flex-center">
                    <x-buttons.discard-button />
                    <x-buttons.submit-button />
                </div>
            </form>
        </div>
    </div>
</div>