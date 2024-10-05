<x-layouts.master>

<!DOCTYPE html>
<html>
<head>
  <title>Employee Attendance</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <style>
    #closeAttendance {
      display: none;
    }
  </style>
</head>
<body>
  <button id="markAttendance" onclick="markAttendance()">Mark Attendance</button>
  <button id="closeAttendance" onclick="closeAttendance()">Close Attendance</button>
  {{-- {{Auth::user()->id}} --}}
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script>
    // Function to retrieve the state of the button from sessionStorage
    function retrieveButtonState() {
      const isMarked = sessionStorage.getItem('attendanceMarked');
      if (isMarked === 'true') {
        document.getElementById('markAttendance').style.display = 'none';
        document.getElementById('closeAttendance').style.display = 'block';
      }
    }
  
    // Call the function to retrieve button state when the page loads
    window.onload = retrieveButtonState;

    function markAttendance() {
      const userId = {{Auth::user()->id}}; // Replace with dynamic employee ID as needed
      const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

      axios.post('/attendance/mark', {
        user_id: userId
      }, {
        headers: {
          'X-CSRF-TOKEN': csrfToken
        }
      })
      .then(function (response) {
        alert(response.data.message);
        document.getElementById('markAttendance').style.display = 'none';
        document.getElementById('closeAttendance').style.display = 'block';
        // Store the state of the button in sessionStorage
        sessionStorage.setItem('attendanceMarked', 'true');
        
        // Schedule automatic closing at 6 PM
        scheduleAutomaticClose();
      })
      .catch(function (error) {
        console.error('Error marking attendance:', error.response.data);
        alert('Error: ' + error.response.data.message);
      });
    }

    function closeAttendance() {
      const userId = {{Auth::user()->id}}; // Replace with dynamic employee ID as needed
      const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

      axios.post('/attendance/close', {
        user_id: userId
      }, {
        headers: {
          'X-CSRF-TOKEN': csrfToken
        }
      })
      .then(function (response) {
        alert(response.data.message);
        document.getElementById('closeAttendance').style.display = 'none';
        document.getElementById('markAttendance').style.display = 'block';
        // Remove the state of the button from sessionStorage
        sessionStorage.removeItem('attendanceMarked');
      })
      .catch(function (error) {
        console.error('Error closing attendance:', error.response.data);
        alert('Error: ' + error.response.data.message);
      });
    }

    function scheduleAutomaticClose() {
      // Get the current time
      const now = new Date();
      
      // Set the target closing time to 6 PM today
      const closingTime = new Date();
      closingTime.setHours(23, 52, 00, 0); // 6 PM with zero minutes, seconds, milliseconds

      // Calculate the time difference in milliseconds
      const timeDifference = closingTime.getTime() - now.getTime();
      
      // Check if closing time has already passed
      if (timeDifference <= 0) {
        console.log('Closing time has already passed. Attendance will not be closed automatically.');
        return;
      }
      
      // Schedule automatic close after the calculated time difference
      setTimeout(function() {
        closeAttendance();
        sessionStorage.removeItem('attendanceMarked');
      }, timeDifference);
    }
  </script>
</body>
</html>

</x-layouts.master>
