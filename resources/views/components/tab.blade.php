<div
    data-tab-tag="{{ $tabTag }}"
    data-tab-display-name="{{ $tabDisplayName }}"
    x-show="activeTab == '{{$tabTag}}'"
    x-cloak
>
    {{ $slot }}
</div>