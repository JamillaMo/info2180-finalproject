window.onload= function(){

    var assigntome = document.querySelector("#abtn");
    var switchbtn = document.querySelector("#sbtn");

    assigntome.addEventListener('click', function(element) {
        element.preventDefault();

        fetch("view-contactScript.php?query=assign")
            .then(response => {
                if (response.ok){
                    return response.text()
                }else {
                    return Promise.reject('something went wrong')
                }
        })
        .then(data => {
            console.log(data)
        })
        .catch(error => console.log('There was an error' + error));
    })

    switchbtn.addEventListener('click', function(element) {
        element.preventDefault();

        fetch("view-contactScript.php?query=switch")
            .then(response => {
                if (response.ok){
                    return response.text()
                }else {
                    return Promise.reject('something went wrong')
                }
        })
        .then(data => {
            console.log(data)
        })
        .catch(error => console.log('There was an error' + error));
    })

    
}
