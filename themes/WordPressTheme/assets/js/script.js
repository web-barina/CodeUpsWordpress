"use strict";

jQuery(function ($) {
  // この中であればWordpressでも「$」が使用可能になる

  /*********************
   *ハンバーガーメニュー*
   *********************/

  $(document).ready(function () {
    // ハンバーガーメニューのクリックイベント
    $("#js-hamburger").on("click", function () {
      if ($(this).hasClass("js-active")) {
        $(".header__sp-nav").fadeOut();
        $(this).removeClass("js-active");
      } else {
        $(".header__sp-nav").fadeIn();
        $(this).addClass("js-active");
      }
    });

    // ウィンドウリサイズ時のイベント
    $(window).on("resize", function () {
      if (window.matchMedia("(min-width: 768px)").matches) {
        $("#js-hamburger").removeClass("js-active");
        $(".header__sp-nav").fadeOut();
      }
    });

    // ハンバーガーメニュー内のリンククリック時のイベント
    $(".header__sp-nav a").on("click", function () {
      $(".header__sp-nav").fadeOut();
      $("#js-hamburger").removeClass("js-active");
    });
  });

  /***********
   *FV-swiper*
   ***********/
  var topFVswiper = new Swiper("#js-topFVswiper", {
    effect: "fade",
    speed: 1500,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false
    }
  });

  /******************
   * campaign-swiper*
   ******************/
  var topCampaign = new Swiper("#js-topCampaign", {
    slidesPerView: "auto",
    loop: true,
    speed: 1000,
    autoplay: {
      delay: 3000
    },
    spaceBetween: 24,
    breakpoints: {
      768: {
        spaceBetween: 40
      }
    },
    navigation: {
      nextEl: ".topCampaign__next",
      prevEl: ".topCampaign__prev"
    }
  });

  /**************
   *カラーボックス*
   **************/
  var box = $(".js-color-box"),
    speed = 700;
  box.each(function () {
    $(this).append('<div class="color"></div>');
    var color = $(this).find($(".color")),
      image = $(this).find("img");
    var counter = 0;
    image.css("opacity", "0");
    color.css("width", "0%");
    color.on("inview", function () {
      if (counter == 0) {
        $(this).delay(200).animate({
          width: "100%"
        }, speed, function () {
          image.css("opacity", "1");
          $(this).css({
            left: "0",
            right: "auto"
          });
          $(this).animate({
            width: "0%"
          }, speed);
        });
        counter = 1;
      }
    });
  });

  /*****************
   *スクロールトップ*
   *****************/
  function PageTopAnime() {
    var scroll = $(window).scrollTop();
    if (scroll >= 300) {
      $("#js-scroll-top").removeClass("DownMove");
      $("#js-scroll-top").addClass("UpMove");
    } else {
      if ($("#js-scroll-top").hasClass("UpMove")) {
        $("#js-scroll-top").removeClass("UpMove");
        $("#js-scroll-top").addClass("DownMove");
      }
    }
    var wH = window.innerHeight;
    var footerPos = $("#footer").offset().top;
    if (scroll + wH >= footerPos + 10) {
      var pos = scroll + wH - footerPos + 15; //スクロールの値＋画面の高さからfooterの位置＋15pxを引いた場所を取得し
      $("#js-scroll-top").css("bottom", pos);
    } else {
      //それ以外は
      if ($("#js-scroll-top").hasClass("UpMove")) {
        $("#js-scroll-top").css("bottom", "10px");
      }
    }
  }

  // 画面をスクロールをしたら動かしたい場合の記述
  $(window).scroll(function () {
    PageTopAnime();
  });
  // ページが読み込まれたらすぐに動かしたい場合の記述
  $(window).on("load", function () {
    PageTopAnime();
  });
  // #scroll-topをクリックした際の設定
  $("#js-scroll-top").click(function () {
    $("body,html").animate({
      scrollTop: 0 //ページトップまでスクロール
    }, 500); //ページトップスクロールの速さ。
    return false; //リンク自体の無効化
  });

  /******************************************
   *キャンペーン、他のリンクから遷移した時の動き*
   ******************************************/

  document.addEventListener("DOMContentLoaded", function () {
    // 現在のURLを取得
    var urlParams = new URLSearchParams(window.location.search);
    var category = urlParams.get("category");
    // すべてのタブ要素を取得
    var tabs = document.querySelectorAll(".tabs__item");
    // すべてのタブからアクティブクラスを削除
    tabs.forEach(function (tab) {
      tab.classList.remove("js-active");
    });
    // 該当するタブにアクティブクラスを追加
    if (category) {
      var activeTab = document.querySelector('.tabs__item[href*="category=' + category + '"]');
      // 選択したタブ要素をコンソールに表示して確認
      console.log("Active Tab:", activeTab);
      if (activeTab) {
        activeTab.classList.add("js-active");
      }
    } else {
      // 'ALL' タブをデフォルトでアクティブにする
      var allTab = document.querySelector('.tabs__item[href*="category=all"]');
      // 'ALL' タブ要素をコンソールに表示して確認
      console.log("All Tab:", allTab);
      if (allTab) {
        allTab.classList.add("js-active");
      }
    }
  });

  /******************
   *FAQアコーディオン*
   ******************/
  $(function () {
    $(".faq__question").on("click", function () {
      var $answer = $(this).next();
      $answer.slideToggle(300);
      $(this).toggleClass("open", 300);
    });

    // 初期状態で開いた状態にする
    $(".faq__answer").each(function () {
      $(this).show();
      $(this).prev().addClass("open");
    });
  });

  /******************
   *AboutUs モーダル*
   *****************/
  $(document).ready($(function () {
    $(".photo").on("click", function () {
      var modal_id = $(this).attr("id");
      $(".modal#cont-" + modal_id).fadeIn(200);
      $(".modal#cont-" + modal_id).addClass("active");
      $("html, body").css("overflow-y", "hidden");
    });
    $(".modal").on("click", function () {
      if ($(this).hasClass("active")) {
        $(this).fadeOut();
        $("html, body").css("overflow-y", "auto");
      }
    });
  }));

  /*****************
   *infoタブメニュー*
   *****************/

  $(document).ready(function () {
    var tabButton = $(".info__tab"),
      tabContent = $(".info__content");
    function activateTab(tabId) {
      tabButton.removeClass("js-active");
      tabContent.removeClass("js-active");

      // タブボタンとタブコンテンツを一致させる
      tabButton.each(function (index) {
        if ($(this).attr("id") === tabId) {
          $(this).addClass("js-active");
          tabContent.eq(index).addClass("js-active");
        }
      });
    }

    // ページ読み込み時にURLのハッシュを確認してタブを表示
    var hash = window.location.hash;
    if (hash) {
      var tabId = hash.substring(1); // '#'を取り除く
      activateTab(tabId);
    }
    var newUrl = $(".site-map__sub-titles a").on("click", function () {
      var targetHash = $(this).attr("href").split("#")[1];
      activateTab(targetHash);
    });
    console.log(newUrl);

    // タブクリック時の処理
    tabButton.on("click", function () {
      var tabId = $(this).attr("id");
      activateTab(tabId);

      // URLにハッシュを追加（ページ遷移なし）
      var newUrl = window.location.pathname + window.location.search + "#" + tabId;
      history.pushState(null, "", newUrl);
    });

    // サイトマップのリンククリック時の処理
    $(".site-map__sub-titles a").on("click", function () {
      var targetHash = $(this).attr("href").split("#")[1];
      activateTab(targetHash);
    });

    // 初回ロード時のデフォルトタブ
    if (!hash) {
      activateTab("license-info"); // デフォルトタブ
    }
  });

  /********************
   *サイドバーアーカイブ*
   ********************/
  $(function () {
    $(".sidebar__archive-year").on("click", function () {
      $(this).next().slideToggle(300);
      $(this).toggleClass("open", 300);
    });
  });

  /***********************
   *ローディング2回目非表示*
   ***********************/
  $(document).ready(function () {
    // Cookieの値を取得
    var loadingAnime = $.cookie("accessdate"); //キーが入っていれば年月日を取得
    var myD = new Date(); //日付データを取得
    var myYear = String(myD.getFullYear()); //年
    var myMonth = ("0" + (myD.getMonth() + 1)).slice(-2); //月（2桁に補完）
    var myDate = ("0" + myD.getDate()).slice(-2); //日（2桁に補完）
    var today = myYear + myMonth + myDate; // yyyyMMdd形式の日付

    // Cookieデータとアクセスした日付を比較
    if (loadingAnime !== today) {
      $(".js-loading").css("display", "block");

      // Cookieに今日の日付をセットし、1日の有効期限を設定
      $.cookie("accessdate", today, {
        expires: 1,
        path: "/"
      });
    } else {
      $(".js-loading").css("display", "none");
    }
  });
});