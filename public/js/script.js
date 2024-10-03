const prenom=document.getElementById('prenom');
const nom=document.getElementById('nom');
const tel=document.getElementById('tel');
const email=document.getElementById('email');
const address=document.getElementById('address');
const login=document.getElementById('login');
const mdp=document.getElementById('mot de passe');
const cv=document.getElementById('CV');
const botton=document.getElementById('botton');
const text=document.getElementById('text');
    
function enrigistrer() {
   if (prenom.value!="" && nom.value!="" && tel.value!="" && email.value!="" && address.value!="" && login.value!="" && mdp.value!="" && cv.value!="" ) {
    botton.setAttribute('type','submit');
   }else{
    alert("TOUS LES CHMAPS SONT OBLIGATOIRES");
    botton.setAttribute('type','button');
   }
}
cv.onchange=function(){
    var fichier=cv.value.trim().split('.');
    var ext=fichier[fichier.length-1].toLowerCase();
    if(ext!="pdf"){
        alert("Changer de fichier !!!! il y'a erreur de formatage du fichier");
        cv.value="";
    }else{ 
        text.removeAttribute('hidden');       
    }
}

// $(document).ready(function() {
//     $(document.on('click','a[data-role=update]',function () {
//         alert($(this).data('idOffre'));
//     }))
    
// })