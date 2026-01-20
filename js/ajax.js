const el = document.getElementById("others-content");

fetch("http://localhost:3000/get")
  .then(r => r.text())
  .then(text => {
    el.textContent = text;
  })
  .catch(err => {
    el.textContent = "Error";
    console.error(err);
  });