window.addEventListener('click', ()=>{


    const fnameInput = document.querySelector("#fname")
    const lnameInput = document.querySelector("#lname")
    const emailInput = document.querySelector("#email")
    const passwordInput = document.querySelector("#password")

    
    //DROPDOWN DOM ELEMENTS
    const drop_Select = document.querySelector('.select')
    const drop_Caret = document.querySelector('.caret')
    const drop_Menu = document.querySelector('.menu')
    const drop_Options = document.querySelectorAll('.menu li')
    const drop_Selected = document.querySelector('.selected')


    const saveBtn = document.querySelector(".controls button")
    const controls = document.querySelector(".controls")
    const msgBox = document.querySelector(".msg")

    saveBtn.addEventListener('click', (e) => {
        e.preventDefault()

        fieldsOK = true

        //CHECK IF INPUT FIELDS ARE EMPTY

        //FIRST NAME INPUT
        if(fnameInput.value.trim() == "")
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

        //LAST NAME INPUT
        if(lnameInput.value.trim() == "")
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

        //EMAIL INPUT
        let mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if(!emailInput.value.trim().match(mailformat))
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

        if(passwordInput.value.trim() == "")
        {
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
         

        if(fieldsOK)
        {
            msgBox.textContent = "Created New User Successfully"
            controls.classList.remove('fail')
            controls.classList.add('success')

            let firstName = fnameInput.value.trim()
            let lastName = lnameInput.value.trim()
            let email = emailInput.value.trim()
            let password = passwordInput.value.trim()
            let role = drop_Select.value.trim()
        }
        else
        {
            msgBox.textContent = "Couldn't create new user"
            controls.classList.add('fail')
            controls.classList.remove('success')
        }


    })


    
    //Dropdown code
    drop_Select.addEventListener('click', (e) => {
        drop_Select.classList.toggle('select-clicked')
        drop_Caret.classList.toggle('caret-rotate')
        drop_Menu.classList.toggle('menu-open')
        
    })

    drop_Options.forEach(option => {
        option.addEventListener('click', () => {
            drop_Selected.textContent = option.textContent
            drop_Select.classList.remove('select-clicked')
            drop_Caret.classList.remove('carer-rotate')
            drop_Menu.classList.remove('menu-open')

            drop_Options.forEach(option => {
                option.classList.remove('active')
            })

            option.classList.add('active')
        })
    })
})