// var product_id = document.getElementsByClassName("fav");
//     for(var i =0; i<product_id.length; i++){
//         product_id[i].addEventListener("click", function(event){
            
//             // <?php
//             // if(!isset($_SESSION['user_id'])){
//             //     echo ("You need to login first to add this item into favourites.");
//             //     die();
//             // }?>
            
//             var target = event.target;
//             var id = target.getAttribute("data-id");


//             var xml = new XMLHttpRequest();
//             xml.onreadystatechange = function(){

//                 var response = JSON.parse(event.target.responseText);

//                 if(this.readyState == 4 && this.status == 200){
//                     if(response.success){
//                         var count = document.querySelector("favourites_count");
//                         if(response.is_interested){
//                             alert(response.message);
//                             target.classList.remove('fa-regular');
//                             target.classList.add('fa-solid');
//                             count.innerHTML = parseFloat(count.innerHTML) +1;
//                         }
//                         else{
//                             alert(response.message);
//                             target.classList.remove('fa-solid');
//                             target.classList.add('fa-regular');
//                             count.innerHTML = parseFloat(count.innerHTML) -1;
//                         }
//                     }
//                     else if(!response.success && !response.is_logged_in){

//                         alert("Login first to mark it as favourites");
//                     }
//                 }
//             }

//             xml.open("Get", "favourites_toggle.php?id="+id, true);
//             xml.send();
//         })
//     } 


// var product_id = document.getElementsByClassName("fav");
//     for(var i =0; i<product_id.length; i++){
//         product_id[i].addEventListener("click", function(event){
            
//             // <?php
//             // if(!isset($_SESSION['user_id'])){
//             //     echo ("You need to login first to add this item into favourites.");
//             //     die();
//             // }?>
            
//             var target = event.target;
//             var id = target.getAttribute("data-id");


//             var xml = new XMLHttpRequest();
//             // xml.onreadystatechange = function(){
//             xml.addEventListener("load",  function(event){


//                 var response = target.responseText;

//                 if(this.readyState == 4 && this.status == 200){
//                     if(response.success){
//                         var count = document.querySelector("favourites_count");
//                         if(response.is_interested){
//                             alert(response.message);
//                             target.classList.remove('fa-regular');
//                             target.classList.add('fa-solid');
//                             count.innerHTML = parseFloat(count.innerHTML) +1;
//                         }
//                         else{
//                             alert(response.message);
//                             target.classList.remove('fa-solid');
//                             target.classList.add('fa-regular');
//                             count.innerHTML = parseFloat(count.innerHTML) -1;
//                         }
//                     }
//                     else if(!response.success && !response.is_logged_in){
//                         alert("Login first to mark it as favourites");
//                     }
//                 }
//             }

//             xml.open("Get", "favourites_toggle.php?id="+id, true);
//             xml.send();
//         })
//     } 

window.addEventListener("load", function(){
    var favourite = document.getElementsByClassName("favourites-image");
    Array.from(favourite).forEach(element => {
        element.addEventListener("click", function(event) {
            var XML = new XMLHttpRequest();
            var product_id = event.target.getAttribute("data_id");
            
            XML.addEventListener("load", toggle_favourites_function);

            XML.open("GET", "favourites_toggle.php?id="+product_id);
            XML.send();

            event.preventDefault();
        });
    });
});

var toggle_favourites_function = function(event) {
    var response = JSON.parse(event.target.responseText);
    if(response.success){
        var product_id = response.data_id;
        var count = document.querySelectorAll(".product-id-" + product_id + " .favourites_count")[0];
        var favourites_image = document.querySelectorAll(".product-id-" + product_id + " .favourites-image")[0];
        if(response.favourite){
            favourites_image.classList.remove('fa-regular');
            favourites_image.classList.add('fa-solid');
            count.innerHTML = parseFloat(count.innerHTML) +1;
        }
        else{
            count.innerHTML = parseFloat(count.innerHTML) -1;
            favourites_image.classList.remove('fa-solid');
            favourites_image.classList.add('fa-regular');
        }
    }
    else if(!response.success && !response.is_logged_in){
        alert("Login first to mark it as favourites");
    }
}