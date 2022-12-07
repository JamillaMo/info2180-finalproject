window.addEventListener("load", function (e){
    var btn = document.querySelector("button");

    btn.addEventListener('click', function (e) {
        e.preventDefault();
        window.location.href = "addUserPage.php";
    });
})