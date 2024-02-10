
const input_image = document.getElementById("user-image");
const user_image_preview = document.querySelector(".image-preview");

input_image.style.opacity = 0;

input_image.addEventListener("change", updateImageDisplay);

function updateImageDisplay() {
    while (user_image_preview.firstChild) {
        user_image_preview.removeChild(user_image_preview.firstChild);
    }

    const curFiles = input_image.files;
    if (curFiles.length === 0) {
        const para = document.createElement("p");
        para.textContent = "ファイルが選択されていません";
        user_image_preview.appendChild(para);
    } else {
        for (const file of curFiles) {
            const div = document.createElement("div");
            user_image_preview.appendChild(div);
            const para = document.createElement("p");
            if (validFileType(file)) {
                para.textContent = `ファイル名: ${file.name}`;
                const image = document.createElement("img");
                image.width = 200;
                image.height = 200;
                image.src = URL.createObjectURL(file);

            div.appendChild(image);
            div.appendChild(para);
        } else {
            para.textContent = `ファイル名: ${file.name}: ファイル形式はjpg、jpeg、pngのみ有効です。`;
            div.appendChild(para);
        }
            div.appendChild(div);
        }
    }
}

// https://developer.mozilla.org/ja/docs/Web/Media/Formats/Image_types
const fileTypes = [
    "image/jpeg",
    "image/jpg",
    "image/png",
];

function validFileType(file) {
    return fileTypes.includes(file.type);
}