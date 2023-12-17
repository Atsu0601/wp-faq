<footer class="l-footer">
  <div class="l-inner">
    <div class="l-footer__inner">
      <?php
      wp_nav_menu(
        array(
          'theme_location' => 'l-footer-menu', // メニューのロケーションを指定します
          'menu_id'        => 'l-footer-menu', // メニューに適用するIDを指定します
          'container'      => 'div', // メニューを囲むコンテナを指定します。ここではdivタグを使用しています
          'container_class' => 'l-footer-menu-inner' // コンテナに適用するクラス名を指定します
        )
      );
      ?>
    </div>
    <a class="l-footer__logo" href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/logo.png" alt=""></a>
    <p class="l-footer__copy">&copy; <?php echo date('Y'); ?> Social All Rights Reserved.</p>
  </div>
</footer>

<p id="page-top"><a href="#wrap">ページの<br>最上部に戻る</a></p>

<?php wp_footer(); ?>
</body>

</html>