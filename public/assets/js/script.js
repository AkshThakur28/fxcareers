var navbar = document.getElementById('navbar');
var navlink = document.querySelectorAll('.nav_color');
var logo = document.getElementById('logo');

let lastScrollTop = 0;

const path = window.location.pathname.replace(BASE_URL.replace(window.location.origin, ''), '');
const isHome = ["", "/", "index.php", "about-us", "collaboration"].includes(path);

if (isHome) {
  logo.src = "http://localhost:8080/fxcareers.ae/public/assets/img/fxcareers-logo-white.svg";
  function updateNavbar() {
    const currentScroll = window.scrollY;

    if (currentScroll > lastScrollTop && currentScroll > 200) {
      navbar.style.transform = 'translateY(-200px)';
    } else {
      navbar.style.transform = 'translateY(0)';
    }

    lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;

    if (currentScroll > 200) {
      navbar.style.position = 'fixed';
      navbar.style.top = '0';
      navbar.style.width = '100%';
      navbar.style.left = '0';
      navbar.style.right = '0';
      navbar.style.background = "#0000008c";
      navbar.style.backdropFilter = "blur(10px)";
    } else {
      navbar.style.position = 'absolute';
      navbar.style.background = "transparent";
      navbar.style.backdropFilter = "blur(0px)";
    }

    navlink.forEach(link => link.style.color = "#fff");
  }

  window.addEventListener('scroll', updateNavbar);
  window.addEventListener('DOMContentLoaded', updateNavbar);
}
else {
  logo.src = "http://localhost:8080/fxcareers.ae/public/assets/img/fxcareers-logo-black.svg"; 

  navbar.style.position = 'sticky';
  navbar.style.top = '0';
  navbar.style.background = "#fff";
  navlink.forEach(link => link.style.color = "#000");
}


function toggleHeight() {
  const dropdown = document.getElementById('mobileDropdown');
  const currentHeight = dropdown.style.height;
  dropdown.style.height = currentHeight === '0px' ? `${dropdown.scrollHeight}px` : '0px';
}

function toggleLang() {
  const langBox = document.getElementById('langBox');
  const currentHeight = langBox.style.height;
  langBox.style.height = currentHeight === '0px' ? `${langBox.scrollHeight}px` : '0px';
}

function toggleLang1() {
  const langBox1 = document.getElementById('langBox1');
  const currentHeight = langBox1.style.height;
  langBox1.style.height = currentHeight === '0px' ? `${langBox1.scrollHeight}px` : '0px';
}

function handleShow() {
  const offcanvas = new bootstrap.Offcanvas(document.getElementById('offcanvasNavbar'));
  offcanvas.show();
}

document.addEventListener("DOMContentLoaded", function () {
  const toggleSwitch = document.getElementById("toggleSwitch");
  const toggleText = document.getElementById("toggleText");

  if (!toggleSwitch || !toggleText) {
    console.error("Element not found");
    return;
  }

  toggleSwitch.addEventListener("change", function () {
    toggleText.textContent = this.checked ? "Online" : "Offline";
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const accordionButtons = document.querySelectorAll(".accordion-button");

  accordionButtons.forEach(button => {
    const targetID = button.getAttribute("data-bs-target");
    const collapseElement = document.querySelector(targetID);

    if (button.classList.contains('collapsed')) {
      button.querySelector(".icon-plus").style.display = "flex";
      button.querySelector(".icon-minus").style.display = "none";
    } else {
      button.querySelector(".icon-plus").style.display = "none";
      button.querySelector(".icon-minus").style.display = "flex";
    }

    collapseElement.addEventListener('show.bs.collapse', function () {
      button.querySelector(".icon-plus").style.display = "none";
      button.querySelector(".icon-minus").style.display = "flex";
    });

    collapseElement.addEventListener('hide.bs.collapse', function () {
      button.querySelector(".icon-plus").style.display = "flex";
      button.querySelector(".icon-minus").style.display = "none";
    });
  });
});

new WOW().init();

document.addEventListener("DOMContentLoaded", function () {
  var odometers = document.querySelectorAll(".odometer");
  odometers.forEach(function (odometer) {
    var count = odometer.getAttribute("data-count");
    odometer.innerHTML = count;
  });
});

document.addEventListener("DOMContentLoaded", () => {
  const buttons = document.querySelectorAll(".course_catagory");

  buttons.forEach((button) => {
    button.addEventListener("click", function () {
      buttons.forEach((btn) => btn.classList.remove("active"));
      this.classList.add("active");
    });
  });
});


let currentStep = 0;
const steps = document.querySelectorAll(".enquiry_setp_point");

function updateSteps() {
  steps.forEach((step, index) => {
    step.style.opacity = index <= currentStep ? "1" : "0.7"; 
  });
}

function nextBox(current) {
  if (document.getElementById(`form_box_${current + 1}`)) {
    document.getElementById(`form_box_${current}`).classList.remove("active");
    document.getElementById(`form_box_${current + 1}`).classList.add("active");

    if (currentStep < steps.length - 1) {
      currentStep++;
    }
    updateSteps();
  }
}

function prevBox(current) {
  if (document.getElementById(`form_box_${current - 1}`)) {
    document.getElementById(`form_box_${current}`).classList.remove("active");
    document.getElementById(`form_box_${current - 1}`).classList.add("active");

    if (currentStep > 0) {
      currentStep--;
    }
    updateSteps();
  }
}

updateSteps();

const swiperawards = new Swiper(".swiper-awards", {
  loop: true,
  slidesPerView: 1,
  spaceBetween: 30,
  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    768: { slidesPerView: 1 },
    992: { slidesPerView: 2 },
    1200: { slidesPerView: 4 },
  },
});
const swiperreview = new Swiper(".swiper-review", {
  loop: true,
  slidesPerView: 1,
  spaceBetween: 10,
  autoplay: {
    delay: 20000,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    600: { slidesPerView: 1 },
    900: { slidesPerView: 1 },
    1200: { slidesPerView: 1.3 },
  },
});

var teamSlider = new Swiper(".team-slider", {
  slidesPerView: 4,
  spaceBetween: 50,
  loop: true,
  autoplay: {
    delay: 3000, 
    disableOnInteraction: false,
  },
  breakpoints: {
    0: { slidesPerView: 1 },
    768: { slidesPerView: 2 },
    992: { slidesPerView: 2 },
    1200: { slidesPerView: 4 },
  },
});

    //trade over coffee slider
    var tradeovercoffee = new Swiper(".tradeCoffee", {
      slidesPerView: 1,
      spaceBetween: 20,
      loop: true,
      autoplay: {
          delay: 2000,
          disableOnInteraction: false,
          pauseOnMouseEnter: true,
      },
      pagination: {
          el: ".swiper-pagination",
          clickable: true,
      },
      navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
      },
      breakpoints: {
          640: {
              slidesPerView: 1,
          },
          1024: {
              slidesPerView: 1,
          }
      }
  });
    //blog slider
    var blogswiper = new Swiper(".blogSwiper", {
      slidesPerView: 1,
      spaceBetween: 20,
      loop: true,
      autoplay: {
          delay: 2000,
          disableOnInteraction: false,
          pauseOnMouseEnter: true,
      },
      pagination: {
          el: ".swiper-pagination",
          clickable: true,
      },
      navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
      },
      breakpoints: {
          640: {
              slidesPerView: 1,
          },
          1024: {
              slidesPerView: 1,
          }
      }
  });

var courses_colaps_btn = document.getElementById("courses_colaps");
var change_text = document.getElementById("change_text");

courses_colaps_btn.addEventListener("click", function (e) {
  e.preventDefault(); 
  if (change_text.innerText.trim() === "View All Courses") {
    change_text.innerText = "View Less";
  } else {
    change_text.innerText = "View All Courses";
  }
});

