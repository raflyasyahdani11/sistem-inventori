const dataTable = new DataTable("#dataTable");
const table = document.getElementById("dataTable");

const listFormDelete = document.querySelectorAll(".formDelete");

listFormDelete.forEach((form) => {
    form.addEventListener("submit", async (e) => {
        e.preventDefault();

        const { isConfirmed } = await Swal.fire({
            title: "Yakin ingin menghapus barang?",
            text: "barang akan terhapus selamanya!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes",
        });

        if (isConfirmed) {
            form.submit();
        }
    });
});
