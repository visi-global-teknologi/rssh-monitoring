@if ('no' == $row->is_error)
    <span class="badge badge-soft-success">{{ $row->is_error }}</span>
@else
    <span class="badge badge-soft-danger">{{ $row->is_error }}</span>
@endif
