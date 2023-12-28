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
  setInterval(scaleUpAndDown, 2000); // Adjust the interval as needed
});
