<div class="col-md-6 fv-row">
    <label class="fs-6 fw-bold mb-2">{{ $title }}</label>
    <input class="form-control form-control-solid" id="{{ $id }}" placeholder="{{ $placeholder }}" name="{{ $name }}" value="{{ $value }}" />
    <div id="{{ $name }}-error" class="text-danger error-msg">{{-- $message --}}</div>
</div>