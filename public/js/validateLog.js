function validateForme(e) {
    var password = document.getElementById('passworde').value;
    var email = document.getElementById('emaile').value;

 
        var emailRegex = /^\S+@\S+\.\S+$/;
        var passRegex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,}$/;

    const errors = {};

    function displayError(id, message) {
        errors[id] = message;
        const errorElement = document.getElementById(id + "Error");
        errorElement.textContent = message;
        errorElement.style.color = "red";

    }

    function clearError(id) {
        delete errors[id];
        const errorElement = document.getElementById(id + "Error");
        errorElement.textContent = "";
    }
  
    if (!email.match(emailRegex)) {
        displayError("emaile", "Veuillez entrer une adresse e-mail valide.");
    } else {
        clearError("emaile");
    }
    if (!password.match(passRegex)) {
        displayError("passworde", "Veuillez entrer un mot de passe valide (au moins une lettre majuscule, une lettre minuscule et un chiffre)");
    } else {
        clearError("passworde");
    }
    if (Object.keys(errors).length === 0) {
       
    } else {
        
        e.preventDefault(); 
    }
}
  