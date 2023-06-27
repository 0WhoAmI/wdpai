const searchDate = document.querySelector('input[placeholder="Date"]');
const searchCity = document.querySelector('input[placeholder="City"]');
const searchGenre = document.querySelector('input[placeholder="Genre"]');
const searchMicrochipNumber = document.querySelector(
  'input[placeholder="Microchip number"]'
);
const lostListContainer = document.querySelector(".found-list");

console.log(searchCity)
searchDate.addEventListener("keyup", function (event) {
  if (event.key === "Enter") {
    event.preventDefault();

    searchCity.value = "";
    searchGenre.value = "";
    searchMicrochipNumber.value = "";

    const data = { search: this.value };

    fetch("/searchLostDate", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(data),
    })
      .then(function (response) {
        return response.json();
      })
      .then(function (losts) {
        lostListContainer.innerHTML = "";
        loadLostList(losts);
      });
  }
});

searchCity.addEventListener("keyup", function (event) {
  if (event.key === "Enter") {
    event.preventDefault();

    searchDate.value = "";
    searchGenre.value = "";
    searchMicrochipNumber.value = "";

    const data = { search: this.value };

    fetch("/searchLostCity", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(data),
    })
      .then(function (response) {
        return response.json();
      })
      .then(function (losts) {
        lostListContainer.innerHTML = "";
        loadLostList(losts);
      });
  }
});

searchGenre.addEventListener("keyup", function (event) {
  if (event.key === "Enter") {
    event.preventDefault();

    searchDate.value = "";
    searchCity.value = "";
    searchMicrochipNumber.value = "";

    const data = { search: this.value };

    fetch("/searchLostGenre", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(data),
    })
      .then(function (response) {
        return response.json();
      })
      .then(function (losts) {
        lostListContainer.innerHTML = "";
        loadLostList(losts);
      });
  }
});

searchMicrochipNumber.addEventListener("keyup", function (event) {
  if (event.key === "Enter") {
    event.preventDefault();

    searchDate.value = "";
    searchCity.value = "";
    searchGenre.value = "";

    const data = { search: this.value };

    fetch("/searchMicrochipNumber", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(data),
    })
      .then(function (response) {
        return response.json();
      })
      .then(function (losts) {
        lostListContainer.innerHTML = "";
        loadLostList(losts);
      });
  }
});

function loadLostList(losts) {
  losts.forEach((lost) => {
    console.log(lost);
    createLost(lost);
  });
}

function createLost(lost) {
  const template = document.querySelector("#lost-template");
  const clone = template.content.cloneNode(true);

  const image = clone.querySelector("img");
  image.src = `public/uploads/${lost.photo}`;

  const city = clone.querySelector(".info-city strong");
  city.innerHTML = lost.city;

  const microchip = clone.querySelector(".info-microchipNumer strong");
  microchip.innerHTML = lost.microchip_number;

  const description = clone.querySelector(".info-description strong");
  description.innerHTML = lost.description;

  const lostDate = clone.querySelector(".info-lost-date strong");
  lostDate.innerHTML = lost.lost_date;

  const telephone = clone.querySelector(".info-telephone strong");
  telephone.innerHTML = lost.telephone;

  lostListContainer.appendChild(clone);
}
