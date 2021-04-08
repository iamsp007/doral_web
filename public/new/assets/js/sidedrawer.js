$('.closebtn').hide()
function openNav() {
    document.getElementById("overlay").style.display = "block";
    document.getElementById("mySidenav").style.width = "500px";
    document.getElementById("mySidenav").style.transition = ".5s";
    $('.closebtn').show(),
    $('.openbtn').hide()
}
function closeNav() {
    document.getElementById("overlay").style.display = "none";
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("mySidenav").style.transition = ".5s";
    $('.closebtn').hide(),
    $('.openbtn').show()
}
