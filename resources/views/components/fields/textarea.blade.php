<div class="d-flex flex-column mb-8">
    <label class="fs-6 fw-bold mb-2">{{ $title }}</label>
    <textarea class="form-control form-control-solid" rows="3" name="{{ $name }}" id="{{ $id }}" placeholder="{{ t($placeholder) }}">{{ $value }}</textarea>
    <div id="{{ $name }}-error" class="text-danger error-msg">{{-- $message --}}</div>
</div>