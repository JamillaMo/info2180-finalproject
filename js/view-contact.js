window.addEventListener('click', () =>{

    let id = addNoteBtn.classList;
    let assigntome = document.querySelector("#assign");
    let switchbtn = document.querySelector("#switch");

    let addNoteBtn = document.querySelector("#addNote")
    let noteInput = document.querySelector("textarea")

    assigntome.addEventListener('click', function(element) {
        element.preventDefault();

        fetch(`view-contactScript.php?assign=${id}`)
        .then(response => {
            if (response.ok){
                return response.text()
            }else {
                return Promise.reject('something went wrong')
            }
        })
        .then(data => {
            document.querySelector("#assigned").value = data
        })
        .catch(error => console.log('There was an error' + error));
    })
    
    
    switchbtn.addEventListener('click', function(element) {
        element.preventDefault();

        let newType;
        if(switchbtn.innerText.includes('Sales')){newType = "Support"}
        else if(switchbtn.innerText.includes('Support')){newType = "Sales Lead"}

        fetch(`view-contactScript.php?switch=${id}&to=${newType}`)
        .then(response => {
            if (response.ok){
                return response.text()
            }else {
                return Promise.reject('something went wrong')
            }
        })
        .then(data => {
            switchbtn.innerHTML = "<i class=\"fas fa-exchange\"></i>Switch to " + data
        })
        .catch(error => console.log('There was an error' + error));
    })

    
    addNoteBtn.addEventListener('click', (e) => {
        e.preventDefault()

        fetch("view-contactScript.php", {
            method: 'POST',
            headers: {'Content-Type':'application/x-www-form-urlencoded'},
            body: `comment=${noteInput.value}&id=${id}`
        })
        .then(response => {
            if (response.ok){
                return response.text()
            }else {
                return Promise.reject('something went wrong')
            }
        })
        .then(data => {
            document.querySelector(".notes-container").innerHTML += data
        })
        .catch(error => console.log('There was an error' + error));
    })

})
