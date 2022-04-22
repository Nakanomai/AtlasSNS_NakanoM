// ドロップダウンメニュー
//.menuをhoverした場合
$('.menu').hover(
  function() {
    //クラス名「open」を付与する
    $(this).children('.dropdown-menu').addClass('open');
    //hoverが外れた場合
  }, function() {
    //クラス名「open」を取り除く
    $(this).children('.dropdown-menu').removeClass('open');
  }
);
