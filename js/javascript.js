console.log("loaded")
document.addEventListener("DOMContentLoaded", () => {
  const deleteButtons = document.querySelectorAll(".button--delete");
  const confirmLink = document.getElementById("confirmDelete");
  const deleteModalElement = document.getElementById("deleteModal");

  if (!deleteButtons.length || !confirmLink || !deleteModalElement) return;

  const deleteModal = new bootstrap.Modal(deleteModalElement);

  deleteButtons.forEach(button => {
    button.addEventListener("click", () => {
      const action = button.dataset.action;
      console.log(action)
      console.log("a")
      confirmLink.setAttribute("action", action);
      deleteModal.show();
    });
  });
});

document.addEventListener("DOMContentLoaded", () => {
  const logoutButton = document.getElementById("button--logout");
  const confirmLink = document.getElementById("confirmLogout");
  const modalElement = document.getElementById("logoutModal");

  if (!logoutButton || !confirmLink || !modalElement) return;

  const logoutModal = new bootstrap.Modal(modalElement);

  logoutButton.addEventListener("click", (event) => {
    event.preventDefault();
    console.log("Logout button clicked");
    confirmLink.href = "./logout";

    logoutModal.show();
  });


}); 

document.querySelectorAll(".button--edit").forEach(btn => {
  btn.addEventListener("click", () => {
    if (!btn.disabled) {
      window.location.href = btn.dataset.action;
    }
  });
});