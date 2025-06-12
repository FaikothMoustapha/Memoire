@if (session('success') || session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const type = @json(session('success') ? 'success' : 'error');
            const message = @json(session('success') ?? session('error'));
            const title = type === 'success' ? 'Succès' : 'Erreur';

            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: type,
                title: title,
                text: message,
                showConfirmButton: false,
                timer: 2500,
                timerProgressBar: true,
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                },
                customClass: {
                    popup: 'p-3 text-sm rounded-lg shadow-lg border border-gray-200',
                    title: 'text-base font-semibold',
                    icon: 'swal-icon-custom'
                },
                @if (session('redirect_to') && session('success'))
                    didClose: () => {
                        window.location.href = @json(session('redirect_to'));
                    },
                @endif
            });
        });
    </script>
@endif
<style>
    .swal2-icon.swal-icon-custom.swal2-success {
        border-color: #0f9d58 !important;
        color: #0f9d58 !important;
        font-size: 1.5rem;
        animation: pulseSuccess 1s ease-in-out;
    }

    @keyframes pulseSuccess {
        0% { transform: scale(0.9); opacity: 0.7; }
        50% { transform: scale(1.1); opacity: 1; }
        100% { transform: scale(1); }
    }
</style>
