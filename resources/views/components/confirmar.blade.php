<script>
    function confirmDelete(id) {
        const form = document.getElementById(`form-${id}`); // Seleccionar el formulario único

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit(); // Enviar el formulario correspondiente
            }
        });
    }
</script>