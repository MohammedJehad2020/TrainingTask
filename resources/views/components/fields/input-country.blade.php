<div class="mb-7 fv-row">
    <label for="country_code" class="required fs-5 fw-bold mb-2 @error('title') is-invalid @enderror">{{ t('Country') }}</label>
    <select name="country_code" id="country_code" data-control="select2" data-hide-search="true" data-placeholder="{{ t('Select Country') }}" class="form-select form-select-solid">
            <option value="{{ null }}">{{ t('Select Country') }}</option>
           @foreach(Symfony\Component\Intl\Countries::getNames(lang()) as $code => $name)
            <option value="{{ $code }}" {{ $user?->address?->country_code == $code ? 'selected' : '' }}>{{ $name }}</option>
           @endforeach
        </select>
    <div id="country_code-error" class="text-danger" error-msg>{{-- $message --}}</div>
</div>