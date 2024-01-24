
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
        para.textContent = "アップロードするファイルが選択されていません";
        user_image_preview.appendChild(para);
    } else {
        const list = document.createElement("ol");
        user_image_preview.appendChild(list);

        for (const file of curFiles) {
            const listItem = document.createElement("li");
            const para = document.createElement("p");
            if (validFileType(file)) {
                para.textContent = `ファイル名: ${
                    file.name
                }, ファイルサイズ: ${returnFileSize(file.size)}.`;
            const image = document.createElement("img");
            image.src = URL.createObjectURL(file);

            listItem.appendChild(image);
            listItem.appendChild(para);
        } else {
            para.textContent = `ファイル名: ${file.name}: ファイル形式が有効ではありません。選択しなおしてください。`;
            listItem.appendChild(para);
        }

        list.appendChild(listItem);
        }
    }
}

// https://developer.mozilla.org/ja/docs/Web/Media/Formats/Image_types
const fileTypes = [
    "image/apng",
    "image/bmp",
    "image/gif",
    "image/jpeg",
    "image/pjpeg",
    "image/png",
    "image/svg+xml",
    "image/tiff",
    "image/webp",
    "image/x-icon",
];

function validFileType(file) {
    return fileTypes.includes(file.type);
}

function returnFileSize(number) {
    if (number < 1024) {
        return `${number} バイト`;
    } else if (number >= 1024 && number < 1048576) {
        return `${(number / 1024).toFixed(1)} KB`;
    } else if (number >= 1048576) {
        return `${(number / 1048576).toFixed(1)} MB`;
    }
}