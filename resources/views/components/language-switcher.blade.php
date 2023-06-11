<div class="menu-sub menu-sub-dropdown w-175px py-4">
    <!--begin::Menu item-->

    @foreach($locales as  $code => $locale)
    <div class="menu-item px-3">
        <a href="{{ LaravelLocalization::getLocalizedURL($code) }}" class="menu-link d-flex px-5 active">
        <span class="symbol symbol-20px me-4">
            <img class="rounded-1" src="{{ asset('assets/media/flags/united-states.svg') }}" alt="" />
        </span>{{ $locale['name'] }}</a>
    </div>
    @endforeach
    <!--end::Menu item-->
</div>