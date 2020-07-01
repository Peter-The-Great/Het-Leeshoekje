window.onscroll = function() {stickyNav()};
    var header = document.getElementById("nav");
    var sticky = header.offsetTop;

    function stickyNav() {
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
}