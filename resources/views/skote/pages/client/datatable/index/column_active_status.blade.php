@if (config('rssh.client.status.yes') == $row->active_status)
    <span class="badge badge-soft-success">{{ $row->active_status }}</span>
@else
    <span class="badge badge-soft-danger">{{ $row->active_status }}</span>
@endif
