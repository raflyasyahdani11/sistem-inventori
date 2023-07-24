const barangSelect = document.getElementById("barang");
const stokLabel = document.getElementById("stok");

barangSelect.addEventListener("change", async () => {
    try {
        const barangId = barangSelect.value;
        const response = await fetch(
            `http://localhost:8000/api/barang/${barangId}`
        );

        const payload = await response.json();

        if (response.ok) {
            const { data } = payload;

            stokLabel.innerHTML = data.jumlah;
        } else {
            Swal.fire(payload.message, payload?.additional_info, "error");
        }
    } catch (err) {
        Swal.fire("Server Error", err.message, "error");
    }
});

const cEvent = new Event("change");
barangSelect.dispatchEvent(cEvent);
