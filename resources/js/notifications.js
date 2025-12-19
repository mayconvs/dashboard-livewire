import Swal from 'sweetalert2'

window.notify = (type, title, message) => {
    const icons = ['success', 'error', 'info', 'warning']

    Swal.fire({
        toast: true,
        position: 'bottom-end',
        icon: icons.includes(type) ? type : 'info',
        title: title,
        text: message,
        showConfirmButton: false,
        timer: 4000,
        /* backdrop: 'rgba(0,0,0,0.03)', */
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        },
    })
}