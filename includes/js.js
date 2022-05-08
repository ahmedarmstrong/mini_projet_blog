document.getElementById("inscription").addEventListener("submit", function(e){
    var erreur ;
    var pseudo = document.getElementById("pseudo") ;
    var lastname = document.getElementById("lastname") ;
    var firstname = document.getElementById("firstname") ;
    var gender = document.getElementById("grnder") ;
    var email = document.getElementById("email") ;
    var mdp1 = document.getElementById("password") ;
    var mdp2 = document.getElementById("password2") ;
  
      if (!mdp2.value){
      erreur ="veuillez confirmer le Password" ;
  }
  if (!mdp1.value){
    erreur ="veuillez remplir le champs Password" ;
  }
  if (!email.value){
    erreur ="veuillez remplir le champs Email" ;
  }
      if (!gender.value){
      erreur ="veuillez choisier votre Sex" ;
  }
    if (!firstname.value){
        erreur ="veuillez remplir le champs Prenom" ;
    }
    if (!lastname.value){
      erreur ="veuillez remplir le champs Nom" ;
  }
    if (!pseudo.value){
      erreur ="veuillez remplir le champs Pseudo" ;
  }
  
  
    if (erreur){
      e.preventDefault() ;
        document.getElementById("erreur").innerHTML = erreur ;
        return false ;
    }
  else{
      alert('Formulaire envoyé !') } 
  
  })