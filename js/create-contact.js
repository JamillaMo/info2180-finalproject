window.addEventListener('load', ()=>{
    const title = document.querySelector('#title')
    const firstName = document.querySelector('#firstname')
    const lastName = document.querySelector('#lastname')
    const email = document.querySelector('#email')
    const number = document.querySelector('#number')
    const company = document.querySelector('#company')
    const type = document.querySelector('#type')
    const assigned = document.querySelector('#assigned')

    const save_group = document.querySelector('.save-group')
    const msgBox = document.querySelector('.msg')
    const saveBtn = document.querySelector('.save-group input')


    saveBtn.addEventListener('click', (e) => {
        e.preventDefault()

        //Checking if the fields are okay
        let fieldsOK = true

        //Checking if firstname is empty
        if(firstName.value.trim() == "")
        {
            fieldsOK = false
            msg = document.querySelector(".fnameMsg")
            msg.innerHTML = '<i class=\"material-icons\">&#xe000;</i>Enter a First Name'
            msg.classList.add('error')
        }
        else{
            msg = document.querySelector(".fnameMsg")
            msg.innerHTML = ''
            msg.classList.remove('error')
        }
        //Checking if lastname is empty
        if(lastName.value.trim() == "")
        {
            fieldsOK = false
            msg = document.querySelector(".lnameMsg")
            msg.innerHTML = '<i class=\"material-icons\">&#xe000;</i>Enter a Last Name'
            msg.classList.add('error')
        }
        else{
            msg = document.querySelector(".lnameMsg")
            msg.innerHTML = ''
            msg.classList.remove('error')
        }

        //Checking if email matches format
        let mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if(!email.value.trim().match(mailformat))
        {
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

        //Checking if telephone number is empty
        if(number.value.trim() == "")
        {
            fieldsOK = false
            msg = document.querySelector(".phoneMsg")
            msg.innerHTML = '<i class=\"material-icons\">&#xe000;</i>Enter a Telephone number'
            msg.classList.add('error')
        }
        else{
            msg = document.querySelector(".phoneMsg")
            msg.innerHTML = ''
            msg.classList.remove('error')
        }

        //Checking if company is empty
        if(company.value.trim() == "")
        {
            fieldsOK = false
            msg = document.querySelector(".companyMsg")
            msg.innerHTML = '<i class=\"material-icons\">&#xe000;</i>Enter a Company'
            msg.classList.add('error')
        }
        else{
            msg = document.querySelector(".companyMsg")
            msg.innerHTML = ''
            msg.classList.remove('error')
        }

        //Checking if assigned is empty
        if(assigned.value.trim() == "")
        {
            fieldsOK = false
        }
        else{

        }

        if(fieldsOK)
        {
            msgBox.textContent = "Created New User Successfully"
            save_group.classList.remove('fail')
            save_group.classList.add('success')

            console.log("FIELDSOK")

            fetch('php/create-contactScript.php', {
                method: 'POST',
                headers: {'Content-Type':'application/x-www-form-urlencoded'},
                body: `title=${title.value}&fname=${firstName.value.trim()}&lname=${lastName.value.trim()}&email=${email.value.trim()}&telephone=${number.value}&company=${company.value}&type=${type.value}&assign=${assigned.value}`
            })
            .then(response => {
                if(response.ok){return response.text()}
                else{return Promise.reject('Something was wrong with fetch request!')}
            })
            .then(data => {
                console.log(data)
            })
            .catch(error => {
                console.log(`ERROR: ${error}`)
            })
        }
        else
        {
            msgBox.textContent = "Couldn't create new user"
            save_group.classList.add('fail')
            save_group.classList.remove('success')
        }

    })
})