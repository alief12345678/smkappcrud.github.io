document.addEventListener("DOMContentLoaded", function () {
    // Konfirmasi sebelum menghapus data siswa
    let deleteButtons = document.querySelectorAll(".delete-btn");

    deleteButtons.forEach(function (button) {
        button.addEventListener("click", function (event) {
            let confirmDelete = confirm("Apakah Anda yakin ingin menghapus data ini?");
            if (!confirmDelete) {
                event.preventDefault(); // Batalkan aksi jika pengguna menekan 'Batal'
            }
        });
    });

    // Validasi Form Edit Siswa
    let editForm = document.querySelector("#editForm");
    if (editForm) {
        editForm.addEventListener("submit", function (event) {
            let nama = document.querySelector("input[name='nama']").value.trim();
            let kelas = document.querySelector("input[name='kelas']").value.trim();
            let noTelp = document.querySelector("input[name='no_telp']").value.trim();
            
            if (nama === "" || kelas === "" || noTelp === "") {
                alert("Semua kolom wajib diisi!");
                event.preventDefault();
            }
        });
    }
});
