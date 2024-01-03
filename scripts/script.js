window.onscroll = function () {
  stickyHeader();
};

function stickyHeader() {
  let header = document.getElementById("navbar");
  let sticky = header.offsetTop;

  if (window.scrollY > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}

document.addEventListener("DOMContentLoaded", function () {
  const scalingImage = document.getElementById("mjesec");

  function scaleUpAndDown() {
    scalingImage.style.transform = "scale(1.05)"; // Scale up
    setTimeout(() => {
      scalingImage.style.transform = "scale(1)"; // Scale down
    }, 1000); // Adjust the duration as needed
  }

  // Call the function initially
  scaleUpAndDown();

  // Repeat the animation using setInterval
  setInterval(scaleUpAndDown, 2000);
});

function toggleList() {
  var itemList = document
    .getElementById("popis-pjesama-lista")
    .getElementsByTagName("li");
  for (var i = 3; i < itemList.length; i++) {
    if (itemList[i].classList.contains("hidden-list-item")) {
      itemList[i].classList.remove("hidden-list-item");
    } else {
      itemList[i].classList.add("hidden-list-item");
    }
  }

  var buttonText = document.querySelector("button").textContent;
  document.querySelector("button").textContent =
    buttonText === "Prikaži više" ? "Prikaži manje" : "Prikaži više";
}
