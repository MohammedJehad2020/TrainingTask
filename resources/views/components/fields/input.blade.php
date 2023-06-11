<div class="fv-row mb-7">
    <label class="required fw-bold fs-6 mb-2 @error('title') is-invalid @enderror">{{ $title }}</label>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" value="{{ $value }}" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="{{ $placeholder }}" />
    <div id="{{ $name }}-error" class="text-danger error-msg">{{-- $message --}}</div>
</div>