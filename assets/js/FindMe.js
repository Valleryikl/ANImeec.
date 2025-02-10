document.addEventListener('DOMContentLoaded', function() {
    const profilBTN = document.querySelector('.profil__btn');
    const profil = document.querySelector('.profil');

    profilBTN.addEventListener('click', function() {
        console.log('fff');
        
        if (profil.style.left === "0px") {
            profil.style.left = "-511px";
        } else {
            profil.style.left = "0px";
        }
    });
});
