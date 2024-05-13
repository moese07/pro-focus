<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div id='calendar'></div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                themeSystem: 'standard',
                height: '600px',
                initialView: 'dayGridMonth',
                timeZone: 'UTC',
                firstDay: 1,
                displayEventTime: false,
                slotLabelFormat: {
                    hour: '2-digit',
                    minute: '2-digit',
                    omitZeroMinute: false,
                    //no meridiem
                    hour12: false,
                },
                slotMinTime: '05:00:00',
                slotMaxTime: '23:00:00',
                //resize so it looks good on mobile
                handleWindowResize: true,
            
                events: [
                    @foreach($tasks as $task)
                    @auth
                        @if (Auth::user()->id == $task->user_id)
                            @if ($task->status == 0)
                            {
                                title: '{{ $task->name }}',
                                start: '{{ $task->due_date }}',
                                url: '{{ route('tasks.edit', $task->id) }}',
                                color: 'blue'
                            },
                            @endif
                            @endif
                        @endauth
                    @endforeach
                ]
            });
            calendar.render();
        });
    </script>
</x-app-layout>
