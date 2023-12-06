$(function () {
  // 変数pagetopの宣言
  var pagetop = $(".page-top");

  // スクロールイベント
  $(window).on("scroll", function () {
    if ($(this).scrollTop() > 500) {
      pagetop.addClass("active");
    } else {
      pagetop.removeClass("active");
    }
  });

  // ページトップへ戻るボタンをクリックしたとき
  pagetop.on("click", function () {
    $("html, body").animate({ scrollTop: 0 }, 400, "swing");
    return false;
  });
});
