@if (config('rssh.device.status.yes') == $row->device_active_status)
    <span class="badge badge-soft-success">{{ $row->device_active_status }}</span>
@else
    <span class="badge badge-soft-danger">{{ $row->device_active_status }}</span>
@endif
