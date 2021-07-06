const divRestos = document.querySelector(".restos");
const divPlats = document.querySelector(".plats");

function getAllRestos() {
  let requete = new XMLHttpRequest();

  requete.open(
    "GET",
    "http://localhost/examApi/garageclean/index.php?controller=restaurant&task=indexApi"
  );

  requete.onload = () => {
    let data = JSON.parse(requete.responseText);
    makeCardsRestos(data);
  };
  requete.send();
}

function makeCardsRestos(tableauRestos) {
  let cards = "";

  tableauRestos.forEach((resto) => {
    card = `
      <div class="col-4 p-3">

        <div class="card" style="width: 18rem;">
            <div class="card-body">
            <h5 class="card-title">${resto.name}</h5>
            <p class="card-text">${resto.address}</p>
            <button value="${resto.id}" class="btn btn-primary showResto">Voir la carte</button>
            </div>
        </div>

    </div>`;

    cards += card;
    divRestos.innerHTML = cards;
    divPlats.innerHTML = "";
  });
  document.querySelectorAll(".showResto").forEach((bouton) => {
    bouton.addEventListener("click", (event) => {
      afficheUnResto(bouton.value);
    });
  });
}

function faireCardRestoEtCardsPlats(restaurant, plats) {
  cardResto = `<div class="col-4 p-3">

    <div class="card" style="width: 18rem;">
        <div class="card-body">
        <h5 class="card-title">${restaurant.name}</h5>
        <p class="card-text">${restaurant.address}</p>
        </div>
             <button class="btn btn-success retourRestos">Retour aux restaurants</button>
     </div> 
   
</div>`;
  divRestos.innerHTML = cardResto;

  cardsPlats = "";

  plats.forEach((plat) => {
    cardPlat = `
  <div data-plat="${plat.id}">
    <hr>
        <p><strong>${plat.name}</strong></p>
        <p><strong>${plat.price}</strong></p>
        <p>${plat.description}</p>        
        <button class="btn btn-danger supprPlat" value=${plat.id}>Supprimer ce plat</button>

    <hr>
</div>
  `;

    cardsPlats += cardPlat;

    divPlats.innerHTML = cardsPlats;
  });
  formPlat = `<form action="" method="POST">
        
            <input type="text" name="namePlat" placeholder="Nom de votre plat" id="namePlat">
            <input type="text" name="descriptionPlat" placeholder="Description de votre plat" id="descriptionPlat">
            <input type="text" name="pricePlat" id="pricePlat" placeholder="Prix de votre plat">
            <button type="submit" class="btn btn-info" id="restaurant_id" name="restaurant_id" value="${restaurant.id}">Envoyer</button>
        
        </form>`;

  divPlats.innerHTML += formPlat;

  document.querySelector(".retourRestos").addEventListener("click", (event) => {
    getAllRestos();
  });
  document.querySelectorAll(".supprPlat").forEach((buttonsupprPlat) => {
    buttonsupprPlat.addEventListener("click", () => {
      deletePlat(buttonsupprPlat.value);
    });
  });
  document
    .querySelector("button#restaurant_id")
    .addEventListener("click", () => {
      let namePlat = document.querySelector("#namePlat").value;
      let descriptionPlat = document.querySelector("#descriptionPlat").value;
      let pricePlat = document.querySelector("#pricePlat").value;
      let restaurant_id = document.querySelector("#restaurant_id").value;
      addPlat(namePlat, descriptionPlat, pricePlat, restaurant_id);
      afficheUnResto(restaurant.id);
    });
}

function afficheUnResto(sonId) {
  let maRequete = new XMLHttpRequest();

  maRequete.open(
    "GET",
    `http://localhost/examApi/garageclean/index.php?controller=restaurant&task=showApi&id=${sonId}`
  );

  maRequete.onload = () => {
    let data = JSON.parse(maRequete.responseText);

    let restaurant = data.restaurant; //objet
    let plats = data.plats; //tableau d'objets recette

    faireCardRestoEtCardsPlats(restaurant, plats);
  };

  maRequete.send();
}

function deletePlat(sonId) {
  let requete = new XMLHttpRequest();

  requete.open(
    "POST",
    `http://localhost/examApi/garageclean/index.php?controller=plat&task=supprApi`
  );
  requete.onload = () => {
    data = JSON.parse(requete.responseText);

    console.log(requete.responseText);

    let divItemSuppr = document.querySelector(`div[data-plat="${sonId}"]`);
    divItemSuppr.remove();
  };

  requete.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  //ce que l'on veut envoyer à l'api pour la variable $_POST
  requete.send(`id=${sonId}`);
}

function addPlat(namePlat, descriptionPlat, pricePlat, restaurant_id) {
  let requete = new XMLHttpRequest();

  requete.open(
    "POST",
    "http://localhost/examApi/garageclean/index.php?controller=plat&task=createApi"
  );

  requete.onload = () => {
    data = JSON.parse(requete.responseText);
  };

  requete.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  requete.send(
    `namePlat=${namePlat}&descriptionPlat=${descriptionPlat}&pricePlat=${pricePlat}&restaurant_id=${restaurant_id}`
  );
}

getAllRestos();
