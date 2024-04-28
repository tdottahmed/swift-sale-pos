@push('css')
<style>
     .clock {
        width: 350px;
        height: 80px;
        background-color: #3F51B5; /* Change background color here */
        color: #fff;
        font-family: Arial, sans-serif;
        font-size: 24px;
        font-weight: bold;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
    }
</style>
@endpush

<div class="clock rounded"></div> 

@push('scripts')
<script>
    function updateClock() {
        var now = new Date();
        var options = { timeZone: 'Asia/Dhaka', weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        var date = now.toLocaleDateString('en-US', options);
        options = { timeZone: 'Asia/Dhaka', hour12: true, hour: 'numeric', minute: 'numeric', second: 'numeric' };
        var time = now.toLocaleTimeString('en-US', options);
        document.querySelector('.clock').innerHTML = date + '<br>' + time;
    }
    
    // Call updateClock every second
    setInterval(updateClock, 1000);
    </script>
@endpush