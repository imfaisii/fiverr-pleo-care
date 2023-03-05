<button wire:ignore wire:click='proposalUpdate({{ $shiftId }}, "approved")' type="button"
    class="btn btn-sm btn-success" data-toggle="tooltip" title="Click to approve"
    @if ($status == 'approved') disabled @endif>
    Approve
</button>
<button wire:ignore wire:click='proposalUpdate({{ $shiftId }}, "rejected")' type="button"
    class="btn btn-sm btn-danger" data-toggle="tooltip" title="Click to reject"
    @if ($status == 'rejected') disabled @endif>
    Reject
</button>
