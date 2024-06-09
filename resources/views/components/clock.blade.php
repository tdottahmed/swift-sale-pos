@push('css')
    <style>
        .clock {
            width: 250px;
            min-height: 50px; /* Set minimum height for the clock */
            background: linear-gradient(135deg, #3F51B5, #2196F3);
            color: #fff;
            font-family: Arial, sans-serif;
            font-size: 16px;
            font-weight: bold;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            position: relative;
            overflow: hidden;
        }

        .time, .date {
            display: inline; /* Make time and date inline */
            opacity: 0;
            animation: fadeIn 1s ease forwards;
        }

        .date {
            font-size: 10px;
            margin-left: 10px; /* Add some space between time and date */
        }

        /* Animation keyframes */
        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.8); }
            to { opacity: 1; transform: scale(1); }
        }
    </style>
@endpush

<div class="clock rounded">
    <div class="time"></div>
    <div class="date"></div>
</div>

@push('scripts')
    <script>
        function updateClock() {
            var now = new Date();
            var options = {
                timeZone: 'Asia/Dhaka',
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            var date = now.toLocaleDateString('en-US', options);
            options = {
                timeZone: 'Asia/Dhaka',
                hour12: true,
                hour: 'numeric',
                minute: 'numeric',
                second: 'numeric'
            };
            var time = now.toLocaleTimeString('en-US', options);
            $('.clock .time').text(time);
            $('.clock .date').text(date);
        }

        // Initial call to updateClock to prevent delay
        updateClock();

        // Call updateClock every second
        setInterval(updateClock, 1000);
    </script>
@endpush
