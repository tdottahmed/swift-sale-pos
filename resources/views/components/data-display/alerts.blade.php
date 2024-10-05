@if (session('success'))
    <script>
        $(document).ready(function() {
            new Noty({
                theme: 'alert alert-success alert-styled-left p-0 bg-success',
                text: "{{ session('success') }}",
                type: 'success',
                progressBar: true,
                closeWith: ['button']
            }).show();
        });
    </script>
@endif
@if (session('error'))
    <script>
        $(document).ready(function() {
            new Noty({
                theme: 'alert alert-danger alert-styled-left p-0 bg-danger',
                text: "{{ session('error') }}",
                type: 'error',
                progressBar: true,
                closeWith: ['button']
            }).show();
        });
    </script>
@endif
@if (session('info'))
    <script>
        $(document).ready(function() {
            new Noty({
                theme: 'alert alert-info alert-styled-left p-0 bg-info',
                text: "{{ session('info') }}",
                type: 'info',
                progressBar: true,
                closeWith: ['button']
            }).show();
        });
    </script>
@endif
@if (session('warning'))
    <script>
        $(document).ready(function() {
            new Noty({
                theme: 'alert alert-warning alert-styled-left p-0 bg-warning',
                text: "{{ session('warning') }}",
                type: 'warning',
                progressBar: true,
                closeWith: ['button']
            }).show();
        });
    </script>
@endif
