const barangSelect = document.getElementById("barang");
const stokLabel = document.getElementById("stok");
// const ropLabel = document.getElementById("rop");
const trxMasukId = document.getElementById("trx_masuk_id");
const tanggalExpiredDatePicker = document.getElementById("tanggal_expired");
const tanggalKeluarDatePicker = document.getElementById("tanggal_keluar");

const allUrl = document.getElementById("url");
const { barangGet } = allUrl.dataset;

barangSelect.addEventListener("change", async () => {
    try {
        const barangId = barangSelect.value;

        const url = barangGet.replace(':id', barangId);
        const response = await fetch(url);

        const payload = await response.json();

        if (response.ok) {
            const { data } = payload;
            const { trx_masuk_id, jumlah, min_exp_date, rop } = data;

            const expDate = new Date(min_exp_date).toISOString();
            const expDateStr = expDate.split("T")[0];

            const outDate = new Date().toISOString();
            const outDateStr = outDate.split("T")[0];

            stokLabel.innerHTML = jumlah;
            trxMasukId.value = trx_masuk_id;
            // ropLabel.innerHTML = Math.round(rop);
            tanggalExpiredDatePicker.value = expDateStr;
            tanggalKeluarDatePicker.value = outDateStr;
        } else {
            Swal.fire(payload.message, payload?.additional_info, "error");
        }
    } catch (err) {
        Swal.fire("Server Error", err.message, "error");
    }
});

const cEvent = new Event("change");
barangSelect.dispatchEvent(cEvent);
