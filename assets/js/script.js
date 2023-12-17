// ページTOPへ戻るボタン
$(function () {
    var pagetop = $('#page-top');
    pagetop.hide();
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            pagetop.fadeIn();
        } else {
            pagetop.fadeOut();
        }
    });
    pagetop.click(function () {
        $('body, html').animate({ scrollTop: 0 }, 500);
        return false;
    });
});

// アコーディオン
//アコーディオンをクリックした時の動作
$(function () {
    $('.c-faq_accordion__item__ttl').on('click', function () {//タイトル要素をクリックしたら
        $('.c-faq_accordion__item__box').slideUp(500);//クラス名.c-faq_accordion__item__boxがついたすべてのアコーディオンを閉じる

        var findElm = $(this).next(".c-faq_accordion__item__box");//タイトル直後のアコーディオンを行うエリアを取得

        if ($(this).hasClass('close')) {//タイトル要素にクラス名closeがあれば
            $(this).removeClass('close');//クラス名を除去    
        } else {//それ以外は
            $('.close').removeClass('close'); //クラス名closeを全て除去した後
            $(this).addClass('close');//クリックしたタイトルにクラス名closeを付与し
            $(findElm).slideDown(500);//アコーディオンを開く
        }
    });

    //ページが読み込まれた際にopenクラスをつけ、openがついていたら開く動作※不必要なら下記全て削除
    $(window).on('load', function () {
        $('.accordion-area li:first-of-type section').addClass("open"); //accordion-areaのはじめのliにあるsectionにopenクラスを追加
        $(".open").each(function (index, element) { //openクラスを取得
            var Title = $(element).children('.c-faq_accordion__item__ttl'); //openクラスの子要素のtitleクラスを取得
            $(Title).addClass('close');       ///タイトルにクラス名closeを付与し
            var Box = $(element).children('.c-faq_accordion__item__box'); //openクラスの子要素boxクラスを取得
            $(Box).slideDown(500);          //アコーディオンを開く
        });
    });
});