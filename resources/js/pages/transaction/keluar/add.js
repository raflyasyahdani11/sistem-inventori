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

            const expiredDate = dateToString(min_exp_date);
            const trxDate = dateToString(new Date());

            stokLabel.innerHTML = jumlah;
            trxMasukId.value = trx_masuk_id;

            tanggalExpiredDatePicker.value = expiredDate;
            tanggalKeluarDatePicker.value = trxDate;
        } else {
            Swal.fire(payload.message, payload?.additional_info, "error");
        }
    } catch (err) {
        Swal.fire("Server Error", err.message, "error");
    }
});

const dateToString = (stringDate) => {
    const date = new Date(stringDate);

    const year = date.getFullYear().toString().padStart(2, '0');
    const month = (date.getMonth() + 1).toString().padStart(2, '0');
    const day = date.getDate().toString().padStart(2, '0');

    return `${year}-${month}-${day}`;
};

const cEvent = new Event("change");
barangSelect.dispatchEvent(cEvent);
