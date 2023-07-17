const btnDelProduct = document.querySelector('#btnDel')
const btnCloseModal = document.querySelector('#closeModal')
const btnOpenModal = document.querySelectorAll("#btnOpenModal")
const modal = document.querySelector('.deleteModal')

const result = document.querySelector('.result.modal__msg')

if (document.querySelector('#btnOpenModal')) {
  btnOpenModal.forEach(btn => {
    btn.onclick = function (e) {
      e.preventDefault()

      modal.classList.add('actived')

      const idProduct = this.getAttribute('item')

      btnDelProduct.onclick = function (e) {
        e.preventDefault()

        const formData = new FormData()
        formData.append('id', idProduct)

        const url = window.location.href
        let endpoint = ''

        if (url.includes('page')) {
          endpoint = '../delete'
        } else {
          endpoint = 'delete'
        }

        fetch(endpoint, {
          body: formData,
          method: 'POST'
        })
          .then(res => res.json())
          .then(res => {
            if (res?.error) {
              result.innerHTML = `<div class="msg error">${res.error}</div>`
              setTimeout(() => window.location.href = url, 2000)
            } else if (res?.success) {
              result.innerHTML = `<div class="msg success">${res.success}</div>`
              setTimeout(() => window.location.href = url, 2000)
            } else {
            }
          })
          .catch(err => {
            console.log(err)
          })
      }
    }

    btnCloseModal.onclick = () => modal.classList.remove('actived')
  })
}

