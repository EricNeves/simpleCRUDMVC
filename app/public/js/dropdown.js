const btnDropdown = document.querySelector('#btn__dropdown')
const dropdown = document.querySelector('#dropdown')
const boxMain = document.querySelector('main')

function handleClickDropdown(e) {
  e.preventDefault()

  dropdown.classList.toggle('dropped')
  btnDropdown.classList.toggle('dropped')
}


if(document.querySelector('#btn__dropdown')) {
  btnDropdown.addEventListener('click', handleClickDropdown)
}
if(document.querySelector('main')) {
  boxMain.addEventListener('click', () => {
    if (dropdown.classList.contains('dropped') && btnDropdown.classList.contains('dropped')) {
      dropdown.classList.remove('dropped')
      btnDropdown.classList.remove('dropped')
    }
  })
}
