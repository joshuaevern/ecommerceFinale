
/////////////////////////////////////////////////////////////////////////////////
/*
a function to validate product title.
it returns true if value is alphabets only and false otherwise
*/
function validateTitle(title){
    if(title.match(/^[A-Za-z0-9 _-]+$/))
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


