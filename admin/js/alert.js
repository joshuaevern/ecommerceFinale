
// window.setTimeout(function() {
//     jQuery(".alert").fadeTo(500, 0).slideUp(500, function(){
//         jQuery(this).remove();
//     });
// }, 2000);

function validateBrand(){
    let pattern = /^[a-zA-Z]{4,30}$/g;
    var brand_name = document.getElementById("brand_name").value;
    if(pattern.test(brand_name)){
        return true;
    }
    return false;
}


function validateCategory() {
    var category_name = document.getElementById("category_name").value;
    let pattern = /^[a-zA-Z]{4,30}$/g;
    if(pattern.test(category_name)){
        return true;
    }
    return false;

}

function validate(){
    // var update_name = document.getElementById("brand_name").value;

    var error_message = document.getElementById("error_message");

    error_message.style.padding = "10px";

    var text;
    // let pattern = /^[a-zA-Z]{4,30}$/g;
    // alert(pattern.test(update_name));
    if(validateBrand()){

        return true;

    } else{

        text = "Brand name cannot be a number. And it should be more than three characters";
        error_message.innerHTML = text;
        return false;


    }


}


function validateAddNewBrand(){

    // var update_name = document.getElementById("brand_name").value;

    var error_message = document.getElementById("brand_error_message");

    error_message.style.padding = "10px";

    var text;
    if(validateBrand()){

        return true;

    } else{

        text = "Brand name cannot contain a number. And it should be more than three characters";
        error_message.innerHTML = text;
        return false;


    }
}


function validateAddNewCategory(){

    // var update_name = document.getElementById("category_name").value;

    var error_message = document.getElementById("error_message");

    error_message.style.padding = "10px";

    var text;
    if(validateCategory()){

        return true;

    } else{

        text = "Category name cannot contain a number. And it should be more than three characters";
        error_message.innerHTML = text;
        return false;


    }

}