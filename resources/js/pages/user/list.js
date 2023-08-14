const dataTable = new DataTable("#dataTable");
const table = document.getElementById("dataTable");

const listFormDelete = document.querySelectorAll(".formDelete");

dataTable.on("submit", "td form.formDelete", async function (e) {
    e.preventDefault();

    const { isConfirmed } = await Swal.fire({
        title: "Yakin ingin block user?",
        text: "user tidak dapat mengakses sistem jika di block!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Yes",
    });

    if (isConfirmed) {
        e.currentTarget.submit();
    }
}); 