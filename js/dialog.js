const openDialogButton = document.getElementById("openDialog");
const cancelButton = document.getElementById("cancelButton");
const favDialog = document.getElementById("favDialog")

openDialogButton.addEventListener("click", () =>{
    favDialog.showModal();
})

cancelButton.addEventListener("click", () =>{
    favDialog.close();
})


const updateUserButton = document.getElementById("updateUser");
const cancelUpdate = document.getElementById("cancelUpdate");
const updateDialog = document.getElementById("updateUserDialog");

openDialogButton,addEventListener("click", () =>{
    updateDialog.showModal();
})

cancelUpdate.addEventListener("click", () =>{
    updateDialog.close();
})