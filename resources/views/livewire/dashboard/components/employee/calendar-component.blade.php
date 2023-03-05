<div class="mb-20 mt-20">
    {{-- Be like water. --}}
    <div class="card">
        <div class="card-body">
        <div id="calendar" wire:ignore></div>

        </div>
    </div>
</div>

@push('extended-js')
    <script src="{{ asset('assets/vendor_components/full-calendar/moment.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/full-calendar/fullcalendar.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth'
            });
            calendar.render();
        });
    </script>
@endpush
