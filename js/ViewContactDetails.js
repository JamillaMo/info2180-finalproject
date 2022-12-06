window.onload= function(){

    var viewlink = document.querySelector('#link');
    var contactname = document.querySelector('#name');
    var filterall = document.querySelector(".active filter-all");
    var filtersales = document.querySelector(".filter-sales");
    var filtersupport = document.querySelector(".filter-support");
    var filterassigned = document.querySelector(".filter-assigned");

    viewlink.addEventListener('click', function(element) {
        element.preventDefault();

        fetch("ViewContact.php?" )
            .then(response => {
                if (response.ok){
                    return response.text()
                }else {
                    return Promise.reject('something went wrong')
                }
        })
        .then(data => {
            console.log;
        })
        .catch(error => console.log('There was an error' + error));

    })

    contactname.addEventListener('click', function(element) {
        element.preventDefault();
        fetch("php/view-Contact.php" )
            .then(response => {
                if (response.ok){
                    return response.text()
                }else {
                    return Promise.reject('something went wrong')
                }
        })
        .then(data => {
            console.log;
        })
        .catch(error => console.log('There was an error' + error));
    })

    filterall.addEventListener('click', function(element){
        element.preventDefault();
        fetch("dashboard.php?query=filterall" )
            .then(response => {
                if (response.ok){
                    return response.text()
                }else {
                    return Promise.reject('something went wrong')
                }
        })
        .then(data => {
            console.log;
        })
        .catch(error => console.log('There was an error' + error));
    })

    filtersales.addEventListener('click', function(element){
        element.preventDefault();
        fetch("dashboard.php?query=filtersales" )
            .then(response => {
                if (response.ok){
                    return response.text()
                }else {
                    return Promise.reject('something went wrong')
                }
        })
        .then(data => {
            console.log;
        })
        .catch(error => console.log('There was an error' + error));
    })

    filtersupport.addEventListener('click', function(element){
        element.preventDefault();
        fetch("dashboard.php?query=filtersupport" )
            .then(response => {
                if (response.ok){
                    return response.text()
                }else {
                    return Promise.reject('something went wrong')
                }
        })
        .then(data => {
            console.log;
        })
        .catch(error => console.log('There was an error' + error));
    })

    filterassigned.addEventListener('click', function(element){
        element.preventDefault();
        fetch("dashboard.php?query=filterassigned" )
            .then(response => {
                if (response.ok){
                    return response.text()
                }else {
                    return Promise.reject('something went wrong')
                }
        })
        .then(data => {
            console.log;
        })
        .catch(error => console.log('There was an error' + error));
    })
        
}