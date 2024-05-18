const confirmAction = (href) => {
    const confirm = window.confirm("Apakah benar ingin menghapus data ini?");

    if (confirm === true) {
        window.location.href = href;
    }
}