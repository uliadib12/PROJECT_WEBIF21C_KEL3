/**
* Template Name: Arsha
* Updated: Mar 10 2023 with Bootstrap v5.2.3
* Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/
(function () {
  "use strict";

  /**
   * Easy selector helper function
   */
  const select = (el, all = false) => {
    el = el.trim()
    if (all) {
      return [...document.querySelectorAll(el)]
    } else {
      return document.querySelector(el)
    }
  }

  /**
   * Easy event listener function
   */
  const on = (type, el, listener, all = false) => {
    let selectEl = select(el, all)
    if (selectEl) {
      if (all) {
        selectEl.forEach(e => e.addEventListener(type, listener))
      } else {
        selectEl.addEventListener(type, listener)
      }
    }
  }

  /**
   * Easy on scroll event listener 
   */
  const onscroll = (el, listener) => {
    el.addEventListener('scroll', listener)
  }

  /**
   * Navbar links active state on scroll
   */
  let navbarlinks = select('#navbar .scrollto', true)
  const navbarlinksActive = () => {
    let position = window.scrollY + 200
    navbarlinks.forEach(navbarlink => {
      if (!navbarlink.hash) return
      let section = select(navbarlink.hash)
      if (!section) return
      if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
        navbarlink.classList.add('active')
      } else {
        navbarlink.classList.remove('active')
      }
    })
  }
  window.addEventListener('load', navbarlinksActive)
  onscroll(document, navbarlinksActive)

  /**
   * Scrolls to an element with header offset
   */
  const scrollto = (el) => {
    let header = select('#header')
    let offset = header.offsetHeight

    let elementPos = select(el).offsetTop
    window.scrollTo({
      top: elementPos - offset,
      behavior: 'smooth'
    })
  }

  /**
   * Toggle .header-scrolled class to #header when page is scrolled
   */
  let selectHeader = select('#header')
  if (selectHeader) {
    const headerScrolled = () => {
      if (window.scrollY > 100) {
        selectHeader.classList.add('header-scrolled')
      } else {
        selectHeader.classList.remove('header-scrolled')
      }
    }
    window.addEventListener('load', headerScrolled)
    onscroll(document, headerScrolled)
  }

  /**
   * Back to top button
   */
  let backtotop = select('.back-to-top')
  if (backtotop) {
    const toggleBacktotop = () => {
      if (window.scrollY > 100) {
        backtotop.classList.add('active')
      } else {
        backtotop.classList.remove('active')
      }
    }
    window.addEventListener('load', toggleBacktotop)
    onscroll(document, toggleBacktotop)
  }

  /**
   * Mobile nav toggle
   */
  on('click', '.mobile-nav-toggle', function (e) {
    select('#navbar').classList.toggle('navbar-mobile')
    this.classList.toggle('bi-list')
    this.classList.toggle('bi-x')
  })

  /**
   * Mobile nav dropdowns activate
   */
  on('click', '.navbar .dropdown > a', function (e) {
    if (select('#navbar').classList.contains('navbar-mobile')) {
      e.preventDefault()
      this.nextElementSibling.classList.toggle('dropdown-active')
    }
  }, true)

  /**
   * Scrool with ofset on links with a class name .scrollto
   */
  on('click', '.scrollto', function (e) {
    if (select(this.hash)) {
      e.preventDefault()

      let navbar = select('#navbar')
      if (navbar.classList.contains('navbar-mobile')) {
        navbar.classList.remove('navbar-mobile')
        let navbarToggle = select('.mobile-nav-toggle')
        navbarToggle.classList.toggle('bi-list')
        navbarToggle.classList.toggle('bi-x')
      }
      scrollto(this.hash)
    }
  }, true)

  /**
   * Scroll with ofset on page load with hash links in the url
   */
  window.addEventListener('load', () => {
    if (window.location.hash) {
      if (select(window.location.hash)) {
        scrollto(window.location.hash)
      }

      if (sessionStorage.getItem('ShowLogin') === 'none') {

      }
    }
  });

  /**
   * Preloader
   */
  let preloader = select('#preloader');
  if (preloader) {
    window.addEventListener('load', () => {
      preloader.remove()
    });
  }

  /**
   * Initiate  glightbox 
   */
  const glightbox = GLightbox({
    selector: '.glightbox'
  });

  /**
   * Skills animation
   */
  let skilsContent = select('.skills-content');
  if (skilsContent) {
    new Waypoint({
      element: skilsContent,
      offset: '80%',
      handler: function (direction) {
        let progress = select('.progress .progress-bar', true);
        progress.forEach((el) => {
          el.style.width = el.getAttribute('aria-valuenow') + '%'
        });
      }
    })
  }

  /**
   * Porfolio isotope and filter
   */
  window.addEventListener('load', () => {
    let portfolioContainer = select('.portfolio-container');
    if (portfolioContainer) {
      let portfolioIsotope = new Isotope(portfolioContainer, {
        itemSelector: '.portfolio-item'
      });

      let portfolioFilters = select('#portfolio-flters li', true);

      on('click', '#portfolio-flters li', function (e) {
        e.preventDefault();
        portfolioFilters.forEach(function (el) {
          el.classList.remove('filter-active');
        });
        this.classList.add('filter-active');

        portfolioIsotope.arrange({
          filter: this.getAttribute('data-filter')
        });
        portfolioIsotope.on('arrangeComplete', function () {
          AOS.refresh()
        });
      }, true);
    }

  });

  /**
   * Initiate portfolio lightbox 
   */
  const portfolioLightbox = GLightbox({
    selector: '.portfolio-lightbox'
  });

  /**
   * Portfolio details slider
   */
  new Swiper('.portfolio-details-slider', {
    speed: 400,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    }
  });

  /**
   * Animation on scroll
   */
  window.addEventListener('load', () => {
    AOS.init({
      duration: 1000,
      easing: "ease-in-out",
      once: true,
      mirror: false
    });
  });

})()



var popupLogin = document.getElementById("popupLogin");


function closePopup() {
  popupLogin.style.display = "none";
}

function openPopup(event) {
  event.preventDefault();
  popupLogin.style.display = "block";
  document.getElementById('navbar').classList.remove("navbar-mobile")
  document.getElementsByClassName('mobile-nav-toggle')[0].classList.replace('bi-x', 'bi-list');
}

// When the user clicks anywhere outside of the modal, close it
popupLogin.onclick = function (event) {
  if (event.target == popupLogin) {
    popupLogin.style.display = "none";
  }
}

var formLogin = document.getElementById("form-login");

function LoginUser(event) {
  event.preventDefault();
  var formData = new FormData(formLogin);
  $.ajax({
    type: 'POST',
    url: "Home/login_user",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      if (response.success) {
        // Respon sukses dari server
        // Redirect ke halaman dashboard atau lakukan tindakan lain
        sessionStorage.setItem('ShowLogin', 'hilangkan');
        window.location.href = 'dashboardUser';
      } else {
        // Respon error dari server
        // Menampilkan pesan error
        document.getElementsByClassName("info-error")[0].innerHTML = "Login gagal. Username atau pasword salah";
      }
    },
    error: function (xhr, status, error) {

    }
  });
}




document.addEventListener('DOMContentLoaded', function () {
  var showLogin = sessionStorage.getItem('ShowLogin');
  if (showLogin === 'hilangkan') {
    var getStarted = document.getElementsByClassName('getstarted')[0];
    document.getElementById('logoutkanan').style.display = 'block';
    getStarted.style.display = 'none';
  }
});

function siginSwitch() {
  document.getElementsByClassName("login-nav")[0].style.marginBottom = "3em";
  document.getElementsByClassName("login__label")[0].style.display = "none";
  document.getElementsByClassName("login__input")[0].style.display = "none";
  document.getElementById("SigninButton").style.display = "block";
  document.getElementById("SignupButton").style.display = "none";

  document.getElementsByClassName("login__forgot")[0].style.display = "block";

  let formItem = document.getElementsByClassName("login-nav__item");
  for (var i = 0; i < formItem.length; i++) {
    formItem[i].classList.remove("active");
  }
  formItem[0].classList.add("active");
}

function signupSwitch() {
  document.getElementsByClassName("login-nav")[0].style.marginBottom = "1.5em";
  document.getElementsByClassName("login__label")[0].style.display = "block";
  document.getElementsByClassName("login__input")[0].style.display = "block";
  document.getElementById("SigninButton").style.display = "none";
  document.getElementById("SignupButton").style.display = "block";
  document.getElementsByClassName("login__forgot")[0].style.display = "none";
  let formItem = document.getElementsByClassName("login-nav__item");
  for (var i = 0; i < formItem.length; i++) {
    formItem[i].classList.remove("active");
  }
  formItem[1].classList.add("active");
  var loginSubmit = document.getElementsByClassName("login__submit")[0];
  loginSubmit.removeEventListener("click", LoginUser); // Menghapus event listener sebelumnya
  loginSubmit.addEventListener("click", function (event) {
    event.preventDefault();
  });
}

function registerUser(event) {
  event.preventDefault();

  var username = document.getElementById("login-input-username").value;
  var email = document.getElementById("login-input-email").value;
  var password = document.getElementById("login-input-password").value;

  // Kirim permintaan Ajax ke endpoint signUp di controller
  $.ajax({
    type: "POST",
    url: "Home/signUp",
    data: {
      username: username,
      email: email,
      password: password
    },
    success: function (response) {
      siginSwitch();
    },
    error: function (xhr, status, error) {
      // Penanganan kesalahan
      console.log(xhr.responseText);
    }
  });
}




function showDetails(element) {
  var h4Element = element.parentNode.parentNode.querySelector("h4");
  var eventName = h4Element.innerText;

  $.ajax({
    url: 'Home/showDetails',
    method: 'POST',
    data: { eventName: eventName },
    success: function (response) {
      window.location.href = "portfolio-details"
    },
    error: function (xhr, status, error) {
      // Penanganan kesalahan
      console.log(xhr.responseText);
    }
  });
}


function scrollToGetStarted() {
  sessionStorage.setItem("ShowLogin", "");
  window.location.href = "dashboardUser";
}






// // Fungsi untuk mengubah tombol login menjadi tombol logout
// function showLogoutButton() {
//   var loginButton = document.querySelector('.getstarted');
//   var logoutButton = document.querySelector('#logoutkanan');

//   loginButton.style.display = 'none';
//   logoutButton.style.display = 'block';
// }

// // Fungsi untuk mengubah tombol logout menjadi tombol login
// function showLoginButton() {
//   var loginButton = document.querySelector('.getstarted');
//   var logoutButton = document.querySelector('#logoutkanan');

//   loginButton.style.display = 'block';
//   logoutButton.style.display = 'none';
// }

// // Contoh penggunaan fungsi di dalam logika login/logout
// // Ketika user berhasil login
// showLogoutButton();

// // Ketika user berhasil logout
// showLoginButton();
