@if($status == 'Enabled')
<span class="badge badge-light-success me-4">{{ t('Enabled') }}</span>
@else
<span class="badge badge-light-danger me-4">{{ t('Disabled') }}</span>
@endif
