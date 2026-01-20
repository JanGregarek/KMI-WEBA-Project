document.addEventListener("DOMContentLoaded", () => {
  const deleteButtons = document.querySelectorAll(".button--delete");
  const confirmButton = document.getElementById("confirmDelete");
  const deleteModalElement = document.getElementById("deleteModal");

  if (!deleteButtons.length || !confirmButton || !deleteModalElement) return;

  const deleteModal = new bootstrap.Modal(deleteModalElement);
  let deleteAction = null;
  let activeRow = null;

  deleteButtons.forEach(button => {
    button.addEventListener("click", () => {
      deleteAction = button.dataset.action;
      activeRow = button.closest("tr");
      deleteModal.show();
    });
  });

  confirmButton.addEventListener("click", e => {
    e.preventDefault();

    if (!deleteAction) return;

    fetch(deleteAction, {method: "POST"})
      .then(r => {
        if (!r.ok) throw new Error(r.status);
        return r.text();
      })
      .then(() => {
        deleteModal.hide();
        activeRow?.remove();
      })
      .catch(err => {
        console.error(err);
        alert("Mazání se nezdařilo");
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