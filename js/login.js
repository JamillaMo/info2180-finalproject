window.addEventListener('load', ()=>{
    const email = document.querySelector('input[name="email"]')
    const password = document.querySelector('input[name="password"]')
    const btn = document.querySelector('button')

    btn.addEventListener('click', (e) => {
        e.preventDefault()

        fieldsOK = true

        let mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if(!email.value.trim().match(mailformat)){
            fieldsOK = false
            msg = document.querySelector(".emailMsg")
            msg.innerHTML = '<i class=\"material-icons\">&#xe000;</i>Enter a valid email'
            msg.classList.add('error')
        }
        else{
            msg = document.querySelector(".emailMsg")
            msg.innerHTML = ''
            msg.classList.remove('error')
        }

        if(password.value.trim() == ""){
            fieldsOK = false
            msg = document.querySelector(".passwordMsg")
            msg.innerHTML = '<i class=\"material-icons\">&#xe000;</i>Enter a password'
            msg.classList.add('error')
        }
        else{
            msg = document.querySelector(".passwordMsg")
            msg.innerHTML = ''
            msg.classList.remove('error')
        }

        if(fieldsOK){
            alert('Fetching')

            fetch('php/loginScript.php', {
                method: 'POST',
                headers: {'Content-Type':'application/x-www-form-urlencoded'},
                body: `email=${email.value.trim()}&password=${password.value.trim()}`
            })
            .then(response => {
                if(response.ok){return response.text()}
                else{return Promise.reject('Something was wrong with fetch request!')}
            })
            .then(data => {
                alert(data)
                if(data == "success"){
                    window.location.replace("dashboard.php")
                }
                else{
                    document.querySelector(".passwordMsg").innerHTML = data
                    document.querySelector(".passwordMsg").classList.add('error')
                }
                
            })
            .catch(error => {
                console.log(`ERROR: ${error}`)
            })      
        }
    })
})