const kategori = document.getElementById('kategori');

const getHak = async () => {
    const response = await fetch('http://localhost/zakat-fitrah/db/data-mustahik.php');
    return response.json();
}

const fillCategories = async () => {
    const categories = await getHak();
    const hakBox = document.getElementById('jml_hak');

    for (const category of categories) {
        if (category.nama_kategori === kategori.value) {
            hakBox.value = category.jumlah_hak;
        } else if (kategori.value === "") {
            hakBox.value = null;
        }
    }
};

kategori.addEventListener('change', (event) => {
    fillCategories();
});
