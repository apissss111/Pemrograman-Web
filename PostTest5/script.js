// ========== DARK MODE ==========
const toggleDarkMode = () => {
    document.body.classList.toggle("dark-mode");
};

// Tambahkan tombol Dark Mode ke header
document.addEventListener("DOMContentLoaded", () => {
    const header = document.querySelector("header");

    const darkBtn = document.createElement("button");
    darkBtn.textContent = "🌙 Dark Mode";
    darkBtn.className = "btn btn-primary";
    darkBtn.style.marginLeft = "20px";

    header.appendChild(darkBtn);

    darkBtn.addEventListener("click", toggleDarkMode);
});

// ========== GALERI: menUpload Foto ==========
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
                    const newArticle = document.createElement("article");
                    const title = document.createElement("h3");
                    title.textContent = "Foto Baru";

                    const img = document.createElement("img");
                    img.src = event.target.result;
                    img.alt = "Foto baru";

                    newArticle.appendChild(title);
                    newArticle.appendChild(img);

                    galeriSection.insertBefore(newArticle, uploadForm.parentElement);
                };

                reader.readAsDataURL(file);
                fileInput.value = "";
            } else {
                alert("Pilih foto terlebih dahulu!");
            }
        });
    }
});
