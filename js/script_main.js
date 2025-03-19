let logged = false;
let like = document.getElementById("like");
let likePost = document.getElementById("like-posta").value;
let likePosta = document.getElementById("like-posta");

like.onclick(function(){
    if(logged){
        likePosta.textContent = likePost++;
    }else{
        alert("musisz byc zalogowany aby likeowac posty");
    }
})