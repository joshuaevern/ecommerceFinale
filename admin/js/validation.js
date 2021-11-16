



// $(document).ready(function(){
//
//     $( "#Uploadform" ).submit(function( event ) {
//         event.preventDefault();
//
//         validateUpload();
//
//
//
//
//
//     });
//
//
//
// });
function validateUpload(){
    var prod_title =  document.getElementById("prod_title").value;
    // var prod_category = document.getElementById("prod_category").value;
    // var prod_brand = document.getElementById("prod_brand").value;
    var prod_price = document.getElementById("prod_price").value;
    var prod_desc = document.getElementById("prod_desc").value;

    // var prod_keyword = document.getElementById("prod_keyword").value;
    // var prod_pic = document.getElementById("prod_img").value;
    var success = true;

    if(!validateTitle(prod_title))
    {
        document.getElementById("prod_title_err").innerHTML = "Product Title must contain only alphabets";
        document.UploadForm.prod_title.focus() ;
        success = false;
    }

    // // validate category
    // if(!validateCategory(prod_category)){
    //     document.getElementById("prod_category_err").innerHTML = "Please select a category";
    //     document.UploadForm.prod_category.focus() ;
    //     success = false;
    // }

    // // validate prod_brand
    // if(!validateBrand(prod_brand)){
    //     document.getElementById("prod_brand_err").innerHTML = "Please select a brand";
    //     document.UploadForm.prod_brand.focus() ;
    //     success = false;
    // }

    // validate Price
    if(!prod_price.match(/^[0-9.]+$/))
    {
        document.getElementById("price_error").innerHTML = "Invalid Price, Must be an integer or float";
        document.UploadForm.prod_price.focus() ;
        success = false;
    }

    // validate prod_descr
    if(prod_desc.length <=5)
    {
        document.getElementById("description_error").innerHTML = "Description must not be empty";
        document.UploadForm.prod_desc.focus() ;
        success = false;
    }

    // validate prod_keyword
    // if(prod_keyword.length <=0){
    //     document.getElementById("prod_keyword_err").innerHTML = "keyword must not be empty";
    //     document.UploadForm.prod_keyword.focus() ;
    //     success = false;
    // }

    // validate prod_keyword
    // if(prod_img.length <=0) {
    //     document.getElementById("prod_pic_err").innerHTML = "Please upload a picture";
    //     document.UploadForm.prod_img.focus() ;
    //     success = false;
    // }

    return success;

}
/////////////////////////////////////////////////////////////////////////////////
/*
a function to validate product title.
it returns true if value is alphabets only and false otherwise
*/
function validateTitle(title){
    pattern = /^[A-Za-z_-]+$/g;
    if(pattern.test(title))
        return true;
    else
        return false;
}

/*
a function to validate category.
*/
function validateCategory(category){
    if(category != "none")
        return true;
    else
        return false;
}


function validateBrand(brand){
    if(brand != "none")
        return true;
    else
        return false;
}

function validatePrice(price){
    if(price.match(/^[0-9.]+$/))
        return true;
    else
        return false;
}

function validateDescription(desc){
    if(desc.length > 0)
        return true;
    else
        return false;
}
function validateKeyword(keyword){
    if(keyword.length > 0)
        return true;
    else
        return false;
}


