<footer>
  <section class="container-fluid">
    <div class="row">
      <div class="col-12 text-center mb-3">
        <a class="navbar-brand" href="<?php echo home_url() ?>">
          <p class="display-4"><?php bloginfo('name'); ?></p>
        </a>
        <p class="display-4 fantasy">made by</p>
        <p class="h4 mb-2">酒屋(@dW5tPrkDNSK0JEv)</p>
        <p class="h3 mb-2">はやさん(@aliwoooop)</p>
      </div>
      <div class="col-12 col-md-6 mb-3">
        <h2>Special Thanks</h2>
        <ol style="list-style-type: disc">
          <li>イバン@JYZVzYbQYEKivRN 様</li>
          <li>JagaBata@JagaBata15 様</li>
          <li>千里@senli_chii 様</li>
          <li>Avriey@Avriey4 様</li>
          <li>冨岡 義勇@yyyyyk03 様</li>
        </ol>
      </div>
      <div class="col-12 col-md-6 mb-3">
        <h2>LINKS</h2>
        <ol style="list-style-type: disc">
          <li><a href="http://citydunk.joytea.jp" target="blank">シティダンク公式サイト</a></li>

        </ol>
      </div>
    </div>
  </section>

  <section class="container-fluid">
    <div class="row">
      <div class="container">
        <p class="mt-3 text-center">© 2019 <?php bloginfo('name'); ?></p>
      </div>
    </div>
  </section>
</footer>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  <!-- 追加のCSSの読み込み -->
<script src="<?php bloginfo('template_directory'); ?>/js/wow.min.js"></script>
<?php wp_footer(); ?>

<script>
$('a[href^="#"]').click(function() {
  var speed = 400;
  var href= $(this).attr("href");
  var target = $(href == "#" || href == "" ? 'html' : href);
  var position = target.offset().top;
  $('body,html').animate({scrollTop:position}, speed, 'swing');
  return false;
});

// wow jsのinit
new WOW().init();
</script>
</body>
</html>
