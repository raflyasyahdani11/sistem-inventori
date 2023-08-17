const barangSelect = document.getElementById("barang");
const eoqLabel = document.getElementById('eoq');
const tanggalMasukDatePicker = document.getElementById("tanggal_masuk");
const tanggalExpDatePicker = document.getElementById("tanggal_expired");

const allUrl = document.getElementById("url");
const { barangGet } = allUrl.dataset;

const inDate = new Date().toISOString();
const inDateStr = inDate.split("T")[0];

const expDate = new Date().toISOString();
const expDateStr = expDate.split("T")[0];

tanggalMasukDatePicker.value = inDateStr;
tanggalExpDatePicker.value = expDateStr;

barangSelect.addEventListener("change", async () => {
    try {
        const barangId = barangSelect.value;

        const url = barangGet.replace(':id', barangId);
        const response = await fetch(url);

        const payload = await response.json();

        if (response.ok) {
            const { data } = payload;
            const { eoq } = data;

            eoqLabel.innerHTML = eoq;
        } else {
            Swal.fire(payload.message, payload?.additional_info, "error");
        }
    } catch (err) {
        Swal.fire("Server Error", err.message, "error");
    }
});

const cEvent = new Event("change");
barangSelect.dispatchEvent(cEvent);