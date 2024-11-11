@if (session('success'))
    <script>
        Swal.fire({
            title: "Order Success",
            text: "{{ session('success') }}",
            icon: "success"
        });
    </script>
@endif
