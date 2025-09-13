
jQuery(function ($) {
  const $hamburger = $(".js-hamburger");
  const $drawer = $(".js-drawer");

  $hamburger.click(function () {
      if ($(this).hasClass("is-open")) {
          $(this).find("span:nth-of-type(1), span:nth-of-type(2), span:nth-of-type(3)").addClass("is-close");
          setTimeout(() => {
              $(this).removeClass("is-open");
              $(this).find("span:nth-of-type(1), span:nth-of-type(2), span:nth-of-type(3)").removeClass("is-close");
          }, 500);
      } else {
          $(this).addClass("is-open");
      }
      $drawer.fadeToggle();
  });

  $(".js-drawer a[href]").on("click", function () {
      $hamburger.removeClass("is-open");
      $drawer.fadeOut();
  });

});


// ドロワーのメニューをクリックしたら開く
document.addEventListener("DOMContentLoaded", function () {
    const toggles = document.querySelectorAll(".header-drawer__toggle");
  
    toggles.forEach(toggle => {
      toggle.addEventListener("click", function () {
        const submenu = this.nextElementSibling;
        
        // トグルボタン自体にもopenクラスを追加/削除
        this.classList.toggle("open");
        
        // サブメニューの開閉
        if (submenu) {
          submenu.classList.toggle("open");
        }
      });
    });
  });
