
function supprimer(nb){

    if(Confirmationsup()){
	$.ajax({ 
        type: "GET", 
        async: false,
        url: "supprimer_coureur.php", 
        data: "supprimer="+nb ,
        success : function(msg){
        	document.getElementById("SupprimerCoureur").innerHTML=msg;
    	}
        });
    $.ajax({ 
        type: "GET", 
        async: false,
        url: "liste_coureur.php", 
        success : function(msg){
            document.getElementById("liste_coureur").innerHTML=msg;
        }
        });

    }
}

function numeroepreuve(){
    var x = document.getElementById("annee").value;
    $.ajax({ 
        type: "GET", 
        async: true,
        url: "numeroepreuve.php", 
        data: "annee="+x,
        success : function(msg){
            document.getElementById("numeroepreuve").innerHTML=msg;
        }
        });

}


function Confirmation(){

	if(confirm("Confirmer l'inscription de ce coureur"))
	{ 
    	return true;
    }else{
    	return false;
	}
}

function Confirmationsup(){

    if(confirm("Confirmer la suppression de ce coureur"))
    { 
        return true;
    }else{
        return false;
    }
}