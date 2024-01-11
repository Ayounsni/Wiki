function validateForm(e) {
    var nom = document.getElementById('lastname').value;
    var prenom = document.getElementById('firstname').value;
    var password = document.getElementById('password').value;
    var email = document.getElementById('email').value;

    var nomRegex = /^[A-Za-z\s']{3,}$/;
        var prenomRegex = /^[A-Za-z\s']{3,}$/;
        var emailRegex = /^\S+@\S+\.\S+$/;
        var passRegex = /^.{8,}$/;

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
    if (!nom.match(nomRegex)) {
        displayError("lastname", "Veuillez entrer un nom valide (au moins 3 caractères).");
    } else {
        clearError("lastname");
    }
    if (!prenom.match(prenomRegex)) {
        displayError("firstname", "Veuillez entrer un prénom valide (au moins 3 caractères).");
    } else {
        clearError("firstname");
    }
    if (!email.match(emailRegex)) {
        displayError("email", "Veuillez entrer une adresse e-mail valide.");
    } else {
        clearError("email");
    }
    if (!password.match(passRegex)) {
        displayError("password", "Veuillez entrer un mot de passe valide (au moins 8 caractères)");
    } else {
        clearError("password");
    }
    if (Object.keys(errors).length === 0) {
       
    } else {
        
        e.preventDefault(); 
    }
}
  