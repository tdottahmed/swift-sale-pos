<x-layouts.master>




      <div class="table">
          <table class="table datatable-basic">
              <thead class="bg-indigo-600">
                  <tr>
                      <th>SL</th>
                      <th>User ID</th>
                      <th>Date</th>
                      <th>Check In</th>
                      <th>Check Out</th>
                      {{-- <th>Note</th> --}}
                  </tr>
              </thead>
              <tbody>
                  @foreach ($attendances as $attendance)
                  @if ($attendance->user_id == Auth::user()->id )

                      <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $attendance->user_id }}</td>
                          <td>{{ $attendance->date }}</td>
                          <td>{{ $attendance->check_in }}</td>
                          <td>{{ $attendance->check_out }}</td>
                          {{-- <td>{{ $attendance->note }}</td> --}}
                      </tr>
                  @endif
                  @endforeach


              </tbody>
          </table>
      </div>


































  
  </x-layouts.master>
  