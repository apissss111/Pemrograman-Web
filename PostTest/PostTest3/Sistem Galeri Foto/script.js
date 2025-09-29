// Fungsi untuk Dark Mode
const toggleDarkMode = () => {
    document.body.classList.toggle("dark-mode");
};

// Tambahkan tombol Dark Mode ke header (DOM Manipulation)
document.addEventListener("DOMContentLoaded", () => {
    const header = document.querySelector("header");

    const darkBtn = document.createElement("button");
    darkBtn.textContent = "🌙 Dark Mode";
    darkBtn.className = "btn btn-primary";
    darkBtn.style.marginLeft = "20px";

    header.appendChild(darkBtn);

    // Event listener untuk klik tombol dark mode
    darkBtn.addEventListener("click", toggleDarkMode);
});

// ========== GALERI: Upload Foto ==========
document.addEventListener("DOMContentLoaded", () => {
    const uploadForm = document.querySelector("#galeri form");
    const galeriSection = document.querySelector("#galeri");

    if (uploadForm) {
        uploadForm.addEventListener("submit", (e) => {
            e.preventDefault();

            const fileInput = document.getElementById("uploadFoto");
            const file = fileInput.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = (event) => {
                    // Buat artikel baru untuk foto
                    const newArticle = document.createElement("article");

                    const title = document.createElement("h3");
                    title.textContent = "Foto Baru";

                    const img = document.createElement("img");
                    img.src = event.target.result;
                    img.alt = "Foto baru";

                    newArticle.appendChild(title);
                    newArticle.appendChild(img);

                    // Tambahkan ke galeri
                    galeriSection.insertBefore(newArticle, uploadForm.parentElement);
                };

                reader.readAsDataURL(file);
                fileInput.value = ""; // reset input
            } else {
                alert("Pilih foto terlebih dahulu!");
            }
        });
    }
});
