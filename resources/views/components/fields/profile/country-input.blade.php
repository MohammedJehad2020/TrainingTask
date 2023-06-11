<div class="row mb-6">
    <!--begin::Label-->
    <label class="col-lg-4 col-form-label fw-bold fs-6">
        <span class="required">{{ t('Country') }}</span>
        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Country of origination"></i>
    </label>
    <!--end::Label-->
    <!--begin::Col-->
    <div class="col-lg-8 fv-row">
        <select name="country_code" aria-label="Select a Country" data-control="select2"{{--  data-placeholder="Select a country..." --}} class="form-select form-select-solid form-select-lg fw-bold">
            <option value="{{ null }}">{{ t('Select a Country...') }}</option>
            @foreach(Symfony\Component\Intl\Countries::getNames(lang()) as $code => $name)
            <option value="{{ $code }}" {{ $user?->address?->country_code == $code ? 'selected' : '' }}>{{ $name }}</option>
           @endforeach
        </select>
    </div>
    <div id="country_code-error" class="text-danger" error-msg>{{-- $message --}}</div>
    <!--end::Col-->
</div>