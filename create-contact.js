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
        }
        else{

        }
        //Checking if lastname is empty
        if(lastName.value.trim() == "")
        {
            fieldsOK = false
        }
        else{
            
        }

        //Checking if email matches format
        let mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if(!email.value.trim().match(mailformat))
        {
            fieldsOK = false
        }
        else{

        }

        //Checking if telephone number is empty
        if(number.value.trim() == "")
        {
            fieldsOK = false
        }
        else{
            
        }

        //Checking if company is empty
        if(company.value.trim() == "")
        {
            fieldsOK = false
        }
        else{
            
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

            fetch('create-contact.php', {
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