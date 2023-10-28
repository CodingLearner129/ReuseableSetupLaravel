@if (isset($isAvailable) && $isAvailable)
    <label class="switch s-coffee-medium-light ml-3 mr-3 mb-0">
        <input type="checkbox" name="cafe_type" id="cafe_type" value="1"
            {{ isset($row->is_active) && $row->is_active == 1 ? 'checked=' : '' }}>
        <span class="slider round change-status" data-href="{{ route($currentRoute . '.status', encrypt($row->id)) }}"
            data-status="{{ isset($withStatus) ? $withStatus : false }}"></span>
    </label>
@endif

@if (isset($isStatus) && $isStatus)
    <label class="switch s-coffee-medium-light ml-3 mr-3 mb-0">
        <input type="checkbox" name="cafe_type" id="cafe_type" value="1"
            {{ isset($row->status) && $row->status == 1 ? 'checked=' : '' }}>
        <span class="slider round change-status" data-href="{{ route($currentRoute . '.status', encrypt($row->id)) }}"
            data-status="{{ isset($withStatus) ? $withStatus : false }}"></span>
    </label>
@endif

@if (isset($isView) && $isView)
    <a href="{{ route($currentRoute . '.show', encrypt($row->id)) }}" class="btn btn-coffee-medium dt-btn">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
            <circle cx="12" cy="12" r="3"></circle>
        </svg>
    </a>
@endif

@if (isset($isApproved) && $isApproved)
    @if ($row->approved == 0)
        <a data-href="{{ route($currentRoute . '.approve', encrypt($row->id)) }}"
            class="btn btn-coffee-edit approve-btn dt-btn">
            {{-- {{ $row->approved == 1 ? __('common.approved') : __('common.notApproved') }} --}}
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round" class="feather feather-check">
                <polyline points="20 6 9 17 4 12"></polyline>
            </svg>
        </a>
    @endif
@endif

@if (isset($isEdit) && $isEdit)
    <a href="{{ route($currentRoute . '.edit', encrypt($row->id)) }}" class="btn btn-coffee-edit dt-btn">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3">
            <path d="M12 20h9"></path>
            <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
        </svg>
    </a>
@endif

@if (isset($isDelete) && $isDelete)
    <a data-href="{{ route($currentRoute . '.destroy', encrypt($row->id)) }}"
        class="btn btn-coffee-dark dt-btn delete-btn">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
            <polyline points="3 6 5 6 21 6"></polyline>
            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
            <line x1="10" y1="11" x2="10" y2="17"></line>
            <line x1="14" y1="11" x2="14" y2="17"></line>
        </svg>
    </a>
@endif
