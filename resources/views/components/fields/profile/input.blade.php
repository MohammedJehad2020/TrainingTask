<div class="row mb-6">
    <!--begin::Label-->
    <label class="col-lg-4 col-form-label required fw-bold fs-6">{{ $title }}</label>
    <!--end::Label-->
    <!--begin::Col-->
    <div class="col-lg-8 fv-row">
        <input type="{{ $type }}" name="{{ $name }}" class="form-control form-control-lg form-control-solid" placeholder="{{ $placeholder }}" value="{{ $value }}" />
        <div id="{{ $name }}-error" class="text-danger error-msg">{{-- $message --}}</div>
    </div>
    <!--end::Col-->
</div>