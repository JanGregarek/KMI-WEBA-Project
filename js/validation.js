(() => {
  'use strict'

  const forms = document.querySelectorAll('.needs-validation')

  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()


const form = document.querySelector('.needs-validation');
const inputs = form.querySelectorAll('.form-control');

inputs.forEach(input => {
  input.addEventListener('input', () => {
    if (!input.checkValidity()) {
      input.classList.add('is-invalid');
      input.classList.remove('is-valid');
    } else {
      input.classList.remove('is-invalid');
      input.classList.add('is-valid');
    }
  });
});
