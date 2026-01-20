const el = document.getElementById("others-content");

fetch("http://localhost/REST_API/users/get")
  .then(r => r.text())
  .then(text => {
    el.textContent = text;
  })
  .catch(err => {
    el.textContent = "Error";
    console.error(err);
  });

