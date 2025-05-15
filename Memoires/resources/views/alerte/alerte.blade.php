
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    position: "top-end",
                    icon: 'success',
                    title: 'Succès',
                    text: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    @if (session('redirect_to'))
                        didClose: () => {
                            window.location.href = "{{ session('redirect_to') }}";
                        }
                    @endif
                });
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur',
                    text: '{{ session('error') }}',
                    confirmButtonColor: '#d33'
                });
            });
        </script>
    @endif
