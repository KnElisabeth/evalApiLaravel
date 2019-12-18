//Récupère les infos d'une source externe
fetch('http://192.168.33.10/api/interns')
//On stocke les infos récupérées en json
.then ((response)=>{
    response.json()
    //dans un fichier data
    .then ((data)=>{

        document.querySelector("main").innerHTML="";

        //CREATION D'UN TABLEAU
        // la TABLE
        let tableElement=document.createElement("table");
        document.querySelector("main").appendChild(tableElement);

        //le THEAD
        let theadElement=document.createElement("thead");
        tableElement.appendChild(theadElement);

        //le TR
        let trElement1=document.createElement("tr");
        theadElement.appendChild(trElement1);

        //les TH
        let thElement1=document.createElement("th");
        let thElement2=document.createElement("th");
        let thElement3=document.createElement("th");
        let thElement4=document.createElement("th");
        let thElement5=document.createElement("th");

        thElement1.innerHTML="Prénom";
        thElement2.innerHTML="Nom";
        thElement3.innerHTML="Age";
        thElement4.innerHTML="Téléphone";
        thElement5.innerHTML="Email";

        trElement1.appendChild(thElement1);
        trElement1.appendChild(thElement2);
        trElement1.appendChild(thElement3);
        trElement1.appendChild(thElement4);
        trElement1.appendChild(thElement5);

        data.description.forEach(element => {
            console.log(element);
            //le TBODY
            let tbodyElement=document.createElement("tbody");
            tableElement.appendChild(tbodyElement);

            //le second TR
            let trElement2=document.createElement("tr");
            tbodyElement.appendChild(trElement2);

            //les TD
            let tdElement1=document.createElement("td");
            let tdElement2=document.createElement("td");
            let tdElement3=document.createElement("td");
            let tdElement4=document.createElement("td");
            let tdElement5=document.createElement("td");

            //INSERTION DES DONNEES DANS LES TD
            tdElement1.innerHTML=element.firstname;
            tdElement2.innerHTML=element.lastname;
            tdElement3.innerHTML=element.age;
            tdElement4.innerHTML=element.phone_number;
            tdElement5.innerHTML=element.email;

            //APPARITION DES TD
            trElement2.appendChild(tdElement1);
            trElement2.appendChild(tdElement2);
            trElement2.appendChild(tdElement3);
            trElement2.appendChild(tdElement4);
            trElement2.appendChild(tdElement5);
        });
    });
})
