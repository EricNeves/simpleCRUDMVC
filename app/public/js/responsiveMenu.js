const btnBar = document.querySelector('#bar')
const menuResponsive = document.querySelector('header>.container>nav')

function handleClickMenu() {
  menuResponsive.classList.toggle('responsive')
}

btnBar.addEventListener('click', handleClickMenu)