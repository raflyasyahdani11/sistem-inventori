const tanggalMasukDatePicker = document.getElementById("tanggal_masuk");
const tanggalExpDatePicker = document.getElementById("tanggal_expired");

const inDate = new Date().toISOString();
const inDateStr = inDate.split("T")[0];

const expDate = new Date().toISOString();
const expDateStr = expDate.split("T")[0];

tanggalMasukDatePicker.value = inDateStr;
tanggalExpDatePicker.value = expDateStr;
