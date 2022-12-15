<?php
session_start();


// 入力画面からのアクセスでなければ入力画面に移動
if (!isset($_SESSION['form'])) {
    header('Location: ./index.php');
    exit();
}
$post = $_SESSION['form'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // メールを管理者に送信
    $to = 'ryoya.web41@gmail.com';
    $from = $post['email'];
    $subject = 'お問い合わせが届きました';
    $body = <<<EOT
    名前： {$post['name']}
    ふりがな： {$post['ruby']}
    メールアドレス： {$post['email']}
    電話番号： {$post['tel']}
    内容：
    {$post['inquiry']}
    EOT;
    mb_send_mail($to, $subject, $body, "Form: {$from}");

    // メールを訪問者に返信
    $to = 'ryoya.web41@gmail.com';
    $subject = 'お問い合わせありがとうございます';
    $from="From:" .mb_encode_mimeheader("りょーや@Web制作"). "<ryoya.web41@gmail.com>";
    $body = <<<EOT
    お問い合わせを受け付けました。下記の内容をご確認ください。
    名前： {$post['name']}
    ふりがな： {$post['ruby']}
    メールアドレス： {$post['email']}
    電話番号： {$post['tel']}
    内容：
    {$post['inquiry']}

    ******************************************
    村田　怜哉（ムラタ　リョウヤ）
    TEL 080-9210-2670
    E-mail ryoya.web41@gmail.com
    Twitter https://twitter.com/Ryoya_prog
    ******************************************
    EOT;
    mb_send_mail($post['email'],  $subject, $body, $from);

    // セッションを消してサンクスページへ移動
    unset($_SESSION['form']);
    header('Location: ./thanks.php');
    exit();
}
?>

<?php
session_start();
$error = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $post = filter_input_array(INPUT_POST, $_POST);
  // フォーム送信時にチェックを行う
  if ($post['name'] === '') {
    $error['name'] = 'blank';
  }
  if ($post['ruby'] === '') {
    $error['ruby'] = 'blank';
  }
  if ($post['email'] === '') {
    $error['email'] = 'blank';
  } else if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)){
    $error['email'] = 'email';
  }

  if(count($error) === 0){
    // エラーが無い場合確認画面へ移動
    $_SESSION['form'] = $post;
    header('Location: ./confirm.php');
    exit();
  }
} else {
  if (isset($_SESSION['form'])){
    $post = $_SESSION['form'];
  }
}
?>
<?php include './header.php'; ?>


<?php include './template-parts/loading.html'; ?>


<!-- Contact -->
<section class="section contact" id="contact">
    <div class="section__inner contact__inner">
        <div class="section__heads">
            <h2 class="section__title">ーお問い合わせー</h2><!-- /.about_title -->
        </div><!-- /.section__heads -->
        <div class="section__desc section__desc--contact">入力内容をご確認ください。</div><!-- /.section__desc -->
        <form id="form" action="" class="form" method="POST">
            <div class="form__table-wrap">
                <table class="form__table">
                    <tr class="form__item">
                        <th class="form__label-wrap"><span class="form__label form__label--input_required">お名前</span><!-- /.form__label -->
                        </th><!-- /.form__label-wrap -->
                        <td class="form__input-wrap">
                            <?php echo htmlspecialchars($post['name']); ?>
                        </td><!-- /.form__input-wrap -->
                    </tr><!-- /.form__item -->
                    <tr class="form__item">
                        <th class="form__label-wrap"><span class="form__label form__label--input_required">フリガナ</span><!-- /.form__label -->
                        </th><!-- /.form__label-wrap -->
                        <td class="form__input-wrap">
                            <?php echo htmlspecialchars($post['ruby']); ?>
                        </td><!-- /.form__input-wrap -->
                    </tr><!-- /.form__item -->
                    <tr class="form__item">
                        <th class="form__label-wrap"><span class="form__label form__label--input_required">メールアドレス</span><!-- /.form__label -->
                        </th><!-- /.form__label-wrap -->
                        <td class="form__input-wrap">
                            <?php echo htmlspecialchars($post['email']); ?>
                    </tr><!-- /.form__item -->
                    <tr class="form__item">
                        <th class="form__label-wrap"><span class="form__label form__label--input_optional">電話番号</span><!-- /.form__label -->
                        </th><!-- /.form__label-wrap -->
                        <td class="form__input-wrap">
                            <?php echo htmlspecialchars($post['tel']); ?>
                        </td><!-- /.form__input-wrap -->
                    </tr><!-- /.form__item -->
                    <tr class="form__item">
                        <th class="form__label-wrap form__label-wrap--textarea"><span class="form__label form__label--input_optional">お問い合わせ内容</span><!-- /.form__label -->
                        </th><!-- /.form__label-wrap -->
                        <td class="form__textarea-wrap">
                            <?php echo nl2br(htmlspecialchars($post['inquiry'])); ?>
                        </td>
                    </tr><!-- /.form__item -->
                </table>
            </div>
            <div class="form__button-wrap">
                <a href="../index.php#form" class="button form__button back-button">戻る</a><!-- /.button form__button -->
                <input id="js-submit" type="submit" class="button form__button" name="send" value="送信する"><!-- /.button form__button -->
            </div><!-- /.form__button-wrap -->
        </form><!-- /.form -->
    </div><!-- /.section__inner contact__inner -->
</section><!-- /.section contact -->
</main><!-- /.main -->

<?php include './footer.php'; ?>
