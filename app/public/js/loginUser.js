const form = document.querySelector('.box__login form')
const result = document.querySelector('.result')

async function ajax(config) {
  try {
    const request = await fetch(config.url, config.headers)
    const response = await request.json()

    config.success(response)
  } catch (err) {
    config.error(err)
  }
}

function handleLogin(e) {
  e.preventDefault()

  const { email, passwd } = form

  const formData = new FormData(this)
  formData.append('email', email.value)
  formData.append('passwd', passwd.value)

  const url = window.location.href.replace('login', '')

  ajax({
    url: 'verify',
    headers: {
      body: formData,
      method: 'POST'
    },
    success(data) {
      if (data?.error) {
        result.innerHTML = `<div class="msg error">${data.error}</div>`
        setTimeout(() => result.innerHTML = '', 2000)
      } else if (data?.success) {
        result.innerHTML = `<div class="msg success">${data.success}</div>`
        setTimeout(() => window.location.href = url, 2000)
      }
    },
    error(err) {
      console.log(err)
    }
  })
}

form.addEventListener('submit', handleLogin)