function validateName(){
    const name = document.getElementById('customer_name').value;
    
    if(!name.match(/^[A-Za-z]/)){
    alert('Enter a valid name');
    }
    else{
        return name;
    }
    
    }
      
    function validateEmail(){
        const email = document.getElementById('customer_email').value;
    
        if(!email.match(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/)){
        alert('Enter a valid email');
        }
        else{
            return email;
        }
        
    }

    function validatePassword(){
        const password = document.getElementById('customer_password').value;
    
        if(!password.match(/^[(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}]+)*$/)){
        alert('Enter a valid password');
        }
        else{
            return password;
        }
        
    }

    function validateConfirmPassword(){
        const password = document.getElementById('password').value;
    
        if(!password.match(/^[(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}]+)*$/)){
        alert('Enter a valid password');
        }
        else{
            return password;
        }
        
    }

    function validateCountry(){
        const country = document.getElementById('customer_country').value;
    
        if(!country.match(/^[A-Za-z]/)){
        alert('Enter a valid Country');
        }
        else{
            return country;
        }
    }

    function validateCity(){
        const city = document.getElementById('customer_city').value;
    
        if(!city.match(/^[A-Za-z]/)){
        alert('Enter a valid city');
        }
        else{
            return city;
        }
    }

    function validateContact(){
        const contact = document.getElementById('customer_contact').value;
    
        if(!contact.match(/^(\([0-9]{3}\) |[0-9]{3}-)[0-9]{3}-[0-9]{4}/)){
        alert('Enter a valid contact');
        }
        else{
            return contact;
        }
    }

   