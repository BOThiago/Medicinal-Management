const buttonsModal2 = '.top-btn, .btn, .btn-receita';

const openModalButtons2 = document.querySelectorAll(buttonsModal2);
const closeModalButton2 = document.querySelector('.close2');
const modal2 = document.querySelector('#modal2');

openModalButtons2.forEach((button) => {
  button.addEventListener('click', () => {
    modal2.style.display = 'block';
    b.style.overflowY = 'hidden';
  });
});

closeModalButton2.addEventListener('click', () => {
  modal2.style.display = 'none';
  b.style.overflowY = 'auto';
});