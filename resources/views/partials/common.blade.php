@if (isset($isProfile) && $isProfile)
    <a target="_blank" href="{{ Aws::presignedUri($image) }}"><img onerror=this.src="{{ asset('assets/img/400x300.jpg') }}"
            src="{{ Aws::presignedUri($image) }}" class="cover rounded-circle" style="object-fit: cover;" height="40"
            width="40" /></a>
@endif

@if (isset($isStamp) && $isStamp)
    <a target="_blank" href="{{ asset($stamp_color) }}"><img onerror=this.src="{{ asset('assets/img/400x300.jpg') }}"
            src="{{ asset($stamp_color) }}" class="cover" style="object-fit: cover;" height="40"
            width="40" /></a>
@endif

@if (isset($isApproved) && $isApproved)
    <span class="{{ $row->approved == 1 ? 'success-btn' : 'danger-btn' }} dt-btn">
        {{ $row->approved == 1 ? __('common.approved') : __('common.notApproved') }}
    </span>
@endif

@if (isset($isStatus) && $isStatus)
    <button class="status-btn {{ $row->status == 1 ? 'success-btn' : 'danger-btn' }} dt-btn">
        {{ $row->status == 1 ? __('common.available') : __('common.unavailable') }}
    </button>
@endif

@if (isset($isOrderStatus) && $isOrderStatus)
    @switch($row->status)
        @case(1)
            <button class="status-btn coffee-dark-btn dt-btn">
                {{ __('common.orderPlaced') }}
            </button>
        @break

        @case(2)
            <button class="status-btn success-btn dt-btn">
                {{ __('common.orderCollected') }}
            </button>
        @break

        @default
            <button class="status-btn danger-btn dt-btn">
                {{ '-' }}
            </button>
    @endswitch
@endif
