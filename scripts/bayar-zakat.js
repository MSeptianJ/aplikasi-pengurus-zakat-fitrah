const jmlBayar = document.getElementById('jml_bayar');
const jenis = document.getElementById('jenis');

const fillValues = () => {
    const jml_uang = document.getElementById('jml_uang');
    const jml_beras = document.getElementById('jml_beras');
    if (jenis.value === 'Uang') {
        const tot = jmlBayar.value * 30000;
        jml_beras.value = 0;
        jml_uang.value = tot;
    } else if (jenis.value === 'Beras') {
        const tot = jmlBayar.value * 2.5;
        jml_beras.value = tot;
        jml_uang.value = 0;
    } else {
        jml_beras.value = null;
        jml_uang.value = null;
    }
};

jenis.addEventListener('change', (event) => {
    fillValues();
});
