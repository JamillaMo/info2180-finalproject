window.onload= function(){

    var filterall = document.querySelector(".filter-all");
    var filtersales = document.querySelector(".filter-sales");
    var filtersupport = document.querySelector(".filter-support");
    var filterassigned = document.querySelector(".filter-assigned");

   
    filterall.addEventListener('click', function(element){
        element.preventDefault();

        fetch("php/dashboardScript.php?filter=all" )
            .then(response => {
                if (response.ok){
                    return response.text()
                }else {
                    return Promise.reject('something went wrong')
                }
        })
        .then(data => {
            console.log(data)
            document.querySelector('tbody').innerHTML = data
        })
        .catch(error => console.log('There was an error' + error));
    })

    filtersales.addEventListener('click', function(element){
        element.preventDefault();

        fetch("php/dashboardScript.php?filter=sales" )
            .then(response => {
                if (response.ok){
                    return response.text()
                }else {
                    return Promise.reject('something went wrong')
                }
        })
        .then(data => {
            document.querySelector('tbody').innerHTML = data
        })
        .catch(error => console.log('There was an error' + error));
    })

    filtersupport.addEventListener('click', function(element){
        element.preventDefault();
        
        fetch("php/dashboardScript.php?filter=support" )
            .then(response => {
                if (response.ok){
                    return response.text()
                }else {
                    return Promise.reject('something went wrong')
                }
        })
        .then(data => {
            document.querySelector('tbody').innerHTML = data
        })
        .catch(error => console.log('There was an error' + error));
    })

    filterassigned.addEventListener('click', function(element){
        element.preventDefault();
        
        fetch("php/dashboardScript.php?filter=assigned")
            .then(response => {
                if (response.ok){
                    return response.text()
                }else {
                    return Promise.reject('something went wrong')
                }
        })
        .then(data => {
            document.querySelector('tbody').innerHTML = data
        })
        .catch(error => console.log('There was an error' + error));
    })
        
}