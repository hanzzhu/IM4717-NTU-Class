
function validateName(){
    var name = document.getElementById('name').value;
    // console.log(name);
    if (checkName(name)) {
        // alphabet letters found
        console.log("correct");
    } else {
        alert("Alphabets and spaces only!");
    }
}

function checkName(input){
    var alphabets = /^[a-zA-Z\s]*$/;

    return !!input.match(alphabets);
}

function validateEmail(){
    var email = document.getElementById('email').value;

    // if email have @
    if (email.indexOf('@') != -1){
        // split email
        var username = email.split('@')[0];
        var domain = email.split('@')[1];
        console.log(username, domain);

        //check if username contains hyphen and period
        if (username.indexOf('-') == -1){
            alert("Please add hyphen '-' to user name");
        }

        if (username.indexOf('.') == -1){
            alert("Please add dot '.' to user name");
        }

        //check domain name
        if(domain.indexOf('.') != -1){
            var domainArr = domain.split('.');

            // check the number of address extensions
            if(domainArr.length < 2 || domainArr.length > 4){
                alert('domain name contains two to four address extensions');
            }

            // check the last extension
            if(domainArr[domainArr.length - 1].length < 2 || domainArr[domainArr.length - 1].length > 3){
                alert('last extension must have two to three characters.');
            }
        } else {
            alert('please input correct domain extension');
        }
    } else {
        alert('please add @ to email');
    }
}

function validateForm(){
    validateName();
    validateEmail();
    //checkStartDate();
}