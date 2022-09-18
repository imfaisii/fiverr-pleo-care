<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div wire:ignore.self class="modal fade" id="jobRolePaymentsModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="jobRolePaymentsModalLabel">
                        @if ($jobRole?->name)
                            Payment(s) for the job role : {{ $jobRole->name }}
                        @else
                            ....
                        @endif
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body text-center">
                    @if ($jobRole)
                        @php
                            $paymentSchedules = $jobRole->payments;
                        @endphp

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Day</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Payment</th>
                                    <th>Is full day?</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($paymentSchedules as $paymentSchedule)
                                    <tr>
                                        <td>{{ $paymentSchedule->day }}</td>
                                        <td class="d-none d-md-table-cell text-fade">
                                            @if ($paymentSchedule->is_full_day)
                                                ---
                                            @else
                                                {{ $paymentSchedule->from_time->format('h:i:s A') }}
                                            @endif
                                        </td>
                                        <td class="d-none d-md-table-cell text-fade">
                                            @if ($paymentSchedule->is_full_day)
                                                ---
                                            @else
                                                {{ $paymentSchedule->to_time->format('h:i:s A') }}
                                            @endif
                                        </td>
                                        <td>
                                            {{ $paymentSchedule->payment_amount }}
                                        </td>
                                        <td>
                                            @if ($paymentSchedule->is_full_day)
                                                <span class="badge badge-success">Yes</span>
                                            @else
                                                <span class="badge badge-danger">No</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <td class="text-center" colspan="5">No payments scheduled.</td>
                                @endforelse
                            </tbody>
                        </table>
                    @else
                        <div class="text-center spinner-border"></div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
