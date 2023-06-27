const searchDate = document.querySelector('input[placeholder="Date"]');
const searchCity = document.querySelector('input[placeholder="City"]');
const searchGenre = document.querySelector('input[placeholder="Genre"]');
const searchMicrochipNumber = document.querySelector(
  'input[placeholder="Microchip number"]'
);
const foundListContainer = document.querySelector(".found-list");

searchDate.addEventListener("keyup", function (event) {
  if (event.key === "Enter") {
    event.preventDefault();

    searchCity.value = "";
    searchGenre.value = "";
    searchMicrochipNumber.value = "";

    const data = { search: this.value };

    fetch("/searchFoundDate", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(data),
    })
      .then(function (response) {
        return response.json();
      })
      .then(function (founds) {
        foundListContainer.innerHTML = "";
        loadFoundList(founds);
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

    fetch("/searchFoundCity", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(data),
    })
      .then(function (response) {
        return response.json();
      })
      .then(function (founds) {
        foundListContainer.innerHTML = "";
        loadFoundList(founds);
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

    fetch("/searchFoundGenre", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(data),
    })
      .then(function (response) {
        return response.json();
      })
      .then(function (founds) {
        foundListContainer.innerHTML = "";
        loadFoundList(founds);
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
      .then(function (founds) {
        foundListContainer.innerHTML = "";
        loadFoundList(founds);
      });
  }
});

function loadFoundList(founds) {
  founds.forEach((found) => {
    console.log(found);
    createFound(found);
  });
}

function createFound(found) {
  const template = document.querySelector("#found-template");
  const clone = template.content.cloneNode(true);

  const image = clone.querySelector("img");
  image.src = `public/uploads/${found.photo}`;

  const city = clone.querySelector(".info-city strong");
  city.innerHTML = found.city;

  const microchip = clone.querySelector(".info-microchipNumer strong");
  microchip.innerHTML = found.microchip_number;

  const description = clone.querySelector(".info-description strong");
  description.innerHTML = found.description;

  const foundDate = clone.querySelector(".info-found-date strong");
  foundDate.innerHTML = found.found_date;

  const telephone = clone.querySelector(".info-telephone strong");
  telephone.innerHTML = found.telephone;

  foundListContainer.appendChild(clone);
}
