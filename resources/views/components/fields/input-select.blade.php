<div class="mb-7 fv-row">
    <label for="role_id" class="required fs-5 fw-bold mb-2 @error('title') is-invalid @enderror">{{ $title }}</label>
    <select name="{{ $name }}" id="{{ $id }}" data-control="select2" data-hide-search="true" data-placeholder="{{ $placeholder }}" class="form-select form-select-solid">
            <option value="{{ null }}">{{ t('Select Role') }}</option>
            @foreach($roles as $role)
              <option value="{{ $role->id }}" {{ @(in_array($role->id,$rolesIds)?'selected':'') }}>{{ t($role->name) }}</option>
            @endforeach
        </select>
    <div id="{{ $name }}-error" class="text-danger error-msg">{{-- $message --}}</div>
</div>