// Exercice 1
// Créer un input type number et un bouton qui permet au clic de faire une requête sur notre api permettant d'afficher le prénom de l'apprenant recherché dans une balise <p> créée en js

document.querySelector("button").addEventListener("click", ()=>{

    let internID=document.querySelector("input").value;
    fetch (`http://192.168.33.10/api/interns/${internID}`)

    .then ((response)=>{
        response.json()
            .then((data)=>{
                //debugger;
                document.querySelector("main").innerHTML="";
            
                let p1=document.createElement("p");
                p1.innerHTML=data.description[0].firstname;
                //c'est bien le [0] puisque nous ne sélectionnons toujours qu'un apprenant à la fois
                document.querySelector("main").appendChild(p1);
        })
    })
})

