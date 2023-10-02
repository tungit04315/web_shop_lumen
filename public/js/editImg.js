const fileform = document.querySelector(".fileform")
const customFile = document.querySelector("#customFile")
const imgProduct = document.querySelector("#imgProduct")
const deleteFile = document.querySelector("#deleteFile")

function defautlBtnIMG() {
    fileform.click();
}

fileform.addEventListener("change", function() {
    const file = this.files[0];
    if (file) {
        const render = new FileReader();
        render.onload = function() {
            const result = render.result;
            imgProduct.src = result;
        }

        deleteFile.addEventListener("click", function() {
            imgProduct.src = "";
        })

        render.readAsDataURL(file);
    }
})