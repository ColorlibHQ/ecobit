/**
 * Ecobit front-end behaviour, without jQuery.
 *
 * The plugin calls keep the options they always had; ColorlibUI provides
 * drop-in versions of Owl Carousel, Magnific Popup and AjaxChimp that build
 * the same markup, so the theme's stylesheets apply unchanged.
 */
(function () {
  'use strict';

  var UI = window.ColorlibUI;
  if (!UI) return;

  UI.owl('.client_logo_slider', {
    items: 6,
    loop: true,
    responsive: {
      0: {
        items: 3,
        margin: 15
      },
      600: {
        items: 3,
        margin: 15
      },
      991: {
        items: 5,
        margin: 15
      },
      1200: {
        items: 6,
        margin: 15
      }
    }
  });

  UI.owl('.review_slider', {
    items: 1,
    loop: true,
    dots: true,
    autoplay: false,
    autoplayHoverPause: true,
    autoplayTimeout: 5000,
    nav: false
  });

  UI.enhanceSelects('select');

  // menu fixed js code
  UI.ready(function () {
    var menus = UI.toElements('.main_menu');
    window.addEventListener('scroll', function () {
      var fixed = window.pageYOffset + 1 > 50;
      menus.forEach(function (menu) {
        if (fixed) {
          menu.classList.add('menu_fixed', 'animated', 'fadeInDown');
        } else {
          menu.classList.remove('menu_fixed', 'animated', 'fadeInDown');
        }
      });
    }, { passive: true });
  });

  UI.magnific('.gallery_img', {
    type: 'image',
    gallery: {
      enabled: true
    }
  });

  UI.ready(function () {
    // Search Toggle
    var box = document.getElementById('search_input_box');
    var open = document.getElementById('search_1');
    var close = document.getElementById('close_search');
    if (box) {
      box.style.display = 'none';
      if (open) {
        open.addEventListener('click', function () {
          UI.slide(box, 'toggle');
          var input = document.getElementById('search_input');
          if (input) input.focus();
        });
      }
      if (close) {
        close.addEventListener('click', function () {
          UI.slide(box, 'up', 500);
        });
      }
    }

    // Accordion: each .accordion button opens the panel that follows it.
    var acc = document.getElementsByClassName('accordion');
    for (var i = 0; i < acc.length; i++) {
      acc[i].addEventListener('click', function () {
        this.classList.toggle('active');
        var panel = this.nextElementSibling;
        if (!panel) return;
        if (panel.style.maxHeight) {
          panel.style.maxHeight = null;
        } else {
          panel.style.maxHeight = panel.scrollHeight + 'px';
        }
      });
    }
  });

  //------- Mailchimp js --------//
  UI.ajaxChimp('#mc_embed_signup form');
}());
