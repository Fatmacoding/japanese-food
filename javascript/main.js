var menu = document.getElementById('menu')
var navbar = document.querySelector('.header__menu')
var close = document.querySelector('.close')

menu.onclick = () => {
  navbar.classList.toggle('active-menu')
}

close.onclick = () => {
  navbar.classList.toggle('active-menu')
}

const cards = document.querySelectorAll('.popular-foods__card')

cards.forEach((card) => {
  card.addEventListener('click', () => {
    cards.forEach((card1) => {
      card1.classList.remove('active-card')
    })
    card.classList.add('active-card')
  })
  
})
