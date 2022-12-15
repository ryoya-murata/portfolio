<footer class="footer">
  <div class="footer__inner">
    <div class="footer__button-wrap">
      <a href="https://twitter.com/ryoya_satisfy" class="button footer__button button--bg_dark button--shape_circle" target="_blank" rel="noopener noreferrer"><i class="fab fa-twitter footer__icon"></i><span class="button__icon button__icon--twitter"></span><!-- /.button__icon button__icon--twitter --></a>
      <!-- /.button button--bg_dark -->
      <a href="https://www.facebook.com/ryoya.0401" class="button footer__button button--bg_dark  button--shape_circle" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook-f footer__icon"></i><span class="button__icon button__icon--facebook"></span><!-- /.button__icon button__icon--facebook --></a>
      <!-- /.button button--bg_dark -->
    </div><!-- /.footer__button-wrap -->
    <small class="footer__copyright">&copy; 2020 Ryoya</small><!-- /.footer__copyright -->
  </div><!-- /.footer__inner -->
</footer><!-- /.footer -->
</div><!-- /.conplete-wrap -->

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- TweenMax -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
<!-- Swiper.js -->
<script src="./js/swiper.min.js"></script>
<!-- my js -->
<script src="js/script.js"></script>
<!-- Swiper -->

<script>
  $('#form').submit(function() {
    var scroll_top = $(window).scrollTop(); //送信時の位置情報を取得
    $('input.st').prop('value', scroll_top); //隠しフィールドに位置情報を設定
  });

  window.onload = function() {
    //ロード時に隠しフィールドから取得した値で位置をスクロール
    $(window).scrollTop(<?php echo @$_REQUEST['scroll_top']; ?>);
  }
</script>




</body>

</html>
