let nisnMask = {
  mask: "00000",
  lazy: true
};

let pincodeEl = document.querySelectorAll(".pincode__ver");
pincodeEl.forEach((elem, index) => {
  elem.addEventListener("focus", () => {
    if (index === 0) {
      pincode = [];
    }
  });
  elem.addEventListener("keyup", e => {
    if (e.keyCode >= 48 && e.keyCode <= 57) {
      elem.value = e.key;
      if (elem.value) {
        if (index !== pincodeEl.length - 1) {
          elem.nextElementSibling.focus();
        } else {
          elem.blur();
        }
        elem.style.borderBottom = "2px solid #040507";
      }
    } else if (e.keyCode === 8 || e.key === "Backspace") {
      elem.value = "";

      if (elem.value === "") {
        if (index !== 0) {
          let submitBtn = document.querySelector("button[name=verifyemail]");
          submitBtn.setAttribute("disabled", "true");
          elem.style.borderBottom = "2px solid #ecf1f3";

          if (e.keyCode === 8) {
            elem.previousElementSibling.focus();
          }
        }
      }
    } else {
      e.preventDefault();
    }
  });

  elem.addEventListener("focusout", e => {
    let submitBtn = document.querySelector("button[name=verifyemail]");

    if (index === 0) {
      elem.style.borderBottom = "2px solid #ecf1f3";
    }
    if (index === pincodeEl.length - 1) {
      submitBtn.removeAttribute("disabled");
      submitBtn.setAttribute("data-tooltip", "Ayo lanjutkan gais.");
    }
  });
});

let nisnEl = document.querySelector("#nisn");

if (document.body.contains(nisnEl)) {
  let maskedNisn = IMask(nisnEl, nisnMask);

  nisnEl.addEventListener("keydown", e => {
    if (e.code == "Backspace" || e.key == "Backspace") {
      let nisnTooltip = document.querySelector(".info-nisn");
      let nisnIcon = nisnTooltip.children[0];

      nisnTooltip.setAttribute("data-tooltip", "NISN mu belum benar");
      nisnIcon.setAttribute("class", "fas fa-fw fa-question");
    }
  });
  maskedNisn.on("complete", () => {
    // if the mask reach the max value
    if (maskedNisn.value.length > 4) {
      let nisnTooltip = document.querySelector(".info-nisn");
      let nisnIcon = nisnTooltip.children[0];

      // change the tooltip and the icon
      nisnTooltip.setAttribute("data-tooltip", "NISN sudah memenuhi standard!");
      nisnIcon.setAttribute("class", "far fa-fw fa-check-circle");
    }
  });
}

const validateEmail = (email = "") => {
  if (email !== "" && typeof email == "string") {
    let reEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/i;

    return reEmail.test(email.toLowerCase());
  }
};

let emailInput = document.querySelector("#email");

if (document.body.contains(emailInput)) {
  emailInput.addEventListener("keydown", e => {
    // console.log(emailInput.value);
    let validate = validateEmail(emailInput.value);

    let emailTooltip = document.querySelector(".info-email");
    let emailIcon = emailTooltip.children[0];
    if (validate) {
      emailTooltip.setAttribute("data-tooltip", "Email mu sudah benar!");
      emailIcon.setAttribute("class", "far fa-fw fa-check-circle");
    } else {
      // if backspace is press mean user input incorrect email
      if (e.key == "Backspace" || e.code == "Backspace") {
        emailIcon.setAttribute("class", "fas fa-fw fa-question");
      }
    }
  });
}

// password
let passEl = document.querySelector("#password");

if (document.body.contains(passEl)) {
  passEl.addEventListener("keydown", e => {
    let passVal = passEl.value;
    let passLen = passVal.length;

    let passTooltip = document.querySelector(".info-password");
    let passIcon = passTooltip.children[0];

    if (passLen > 8) {
      passTooltip.setAttribute(
        "data-tooltip",
        "Password mu sudah memenuhi standard cuy."
      );
      passIcon.setAttribute("class", "far fa-fw fa-check-circle");
    }
  });
}

// form email verification on submited
let verEmail = document.querySelector("button[name=verifyemail]");
if (document.body.contains(verEmail)) {
  verEmail.addEventListener("click", e => {
    e.preventDefault();

    let emailPinCode = [];

    pincodeEl.forEach((elem, index) => {
      if (elem.value !== "") {
        emailPinCode.push(elem.value);
      }
    });

    emailPinCode = emailPinCode.join("");

    verEmail.setAttribute("value", emailPinCode);

    let form = document.querySelector(".form");

    form.submit();
  });
}
