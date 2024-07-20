<script>
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        @if (session()->has('success'))
            Toast.fire({
                icon: "success",
                title: "{{ session('success') }}"
            });
        @elseif (session()->has('failed'))
            Toast.fire({
                icon: "error",
                title: "{{ session('failed') }}"
            });
        @elseif (session()->has('error'))
            Toast.fire({
                icon: "error",
                title: "{{ session('error') }}"
            });
        @elseif ($errors->any())
            @php
                $errorMessages = implode('<br>', $errors->all());
            @endphp
            Toast.fire({
                icon: "error",
                title: "Validation Error",
                html: "{!! $errorMessages !!}"
            });
        @endif
    });
</script>
