const openDialogButton = document.getElementById("openDialog");
const cancelButton = document.getElementById("cancelButton");
const favDialog = document.getElementById("favDialog")

openDialogButton.addEventListener("click", () =>{
    favDialog.showModal();
})

cancelButton.addEventListener("click", () =>{
    favDialog.close();
})




