$(() => {
  (() => {
    let formGroupElemCount = $(".form__group").length;

    if (formGroupElemCount > 1) {
      let firstElem = $(".form__group")[0];
      let lastElem = $(".form__group")[formGroupElemCount - 1];

      firstElem.style.borderTopLeftRadius = "5px";
      firstElem.style.borderTopRightRadius = "5px";
      lastElem.style.borderBottomLeftRadius = "5px";
      lastElem.style.borderBottomRightRadius = "5px";
    } else {
      $(".form__group").css("borderTopLeftRadius", "5px");
      $(".form__group").css("borderTopRightRadius", "5px");
      $(".form__group").css("borderBottomLeftRadius", "5px");
      $(".form__group").css("borderBottomRightRadius", "5px");
    }
  })();

  $(".content__main-lists .lists__item .information").each((index, elem) => {
    elem.addEventListener("click", e => {
      let href = elem.getAttribute("data-href");

      if (href !== "") {
        document.location.href = href;
      }
    });
  });
  $(".form .form__group").each((index, elem) => {
    elem.addEventListener("click", e => {
      elem.children[1].children[1].focus();
    });
  });

  $(".form__group--fields input").each((index, elem) => {
    if (elem.parentElement.parentElement.classList.contains("--invalid")) {
      let parent = elem.parentElement.parentElement;
      let err = elem.nextElementSibling;

      let informclass = elem.parentElement.nextElementSibling.children;
      let errinform = informclass[0].className;
      let reg = /err-[a-zA-Z]+/gi;
      errinform = errinform.match(reg)[0];
      errinform = `.${errinform}`;

      let information = informclass[1].className;
      let regex = /info-[a-zA-Z]+/gi;
      information = information.match(regex)[0];
      information = `.${information}`;

      $(errinform).show();
      $(information).hide();
      parent.classList.add("form__group--active");

      if (elem.value !== "") {
        if (err.textContent !== "") {
          parent.classList.add("form__group--expand");
        }

        elem.classList.add("--active");
      }
    } else {
      let informclass = elem.parentElement.nextElementSibling.children;
      let errinform = informclass[0].className;
      let reg = /err-[a-zA-Z]+/gi;
      errinform = errinform.match(reg)[0];
      errinform = `.${errinform}`;

      let information = informclass[1].className;
      let regex = /info-[a-zA-Z]+/gi;
      information = information.match(regex)[0];
      information = `.${information}`;

      $(errinform).hide();
      $(information).show();
    }
    elem.addEventListener("focus", e => {
      let parent = elem.parentElement.parentElement;
      let err = elem.nextElementSibling;

      parent.classList.add("form__group--active");
      elem.classList.add("--active");

      if (err.textContent !== "") {
        parent.classList.add("form__group--expand");
      }
    });
    elem.addEventListener("focusout", e => {
      let parent = elem.parentElement.parentElement;
      let err = elem.nextElementSibling;

      if (elem.value === "") {
        if (parent.classList.contains("--invalid")) {
          parent.classList.remove("form__group--active");
          elem.classList.remove("--active");
          parent.classList.remove("form__group--expand");
        } else {
          parent.classList.remove("form__group--active");
          elem.classList.remove("--active");
        }
      } else {
        if (err.textContent === "") {
          parent.classList.remove("form__group--active");
        } else {
          parent.classList.add("form__group--active");
          parent.classList.add("form__group--expand");
        }
      }
    });
  });

  $(".--radioToggler").each((index, elem) => {
    let radioId = `#${elem.id}`;
    $(radioId).change(e => {
      // remove the previous checked chips
      if ($(".--checked").length) {
        $(".chip").removeClass("--checked");
      }

      // prepare the new chip
      let chipId = $(radioId)
        .next(".chip")
        .attr("for");

      chipId = `#${chipId}`;

      // activated it
      if (radioId == chipId) {
        $(radioId)
          .next(".chip")
          .addClass("--checked");
      }
      $(".card__button button:disabled").removeAttr("disabled");
      $(".card__button button").removeAttr("data-tooltip");
    });
  });
});
