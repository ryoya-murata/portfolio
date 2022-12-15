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
  } else if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
    $error['email'] = 'email';
  }

  if (count($error) === 0) {
    // エラーが無い場合確認画面へ移動
    $_SESSION['form'] = $post;
    header('Location: ./confirm.php');
    exit();
  }
} else {
  if (isset($_SESSION['form'])) {
    $post = $_SESSION['form'];
  }
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ryoya's Portfolio</title>
  <meta name="description" content="りょーやのポートフォリオサイト">
  <!-- favicon -->
  <link rel="icon" type="image/png" href="./img/favicon.ico">
  <!-- font awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <!-- google fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&family=Noto+Sans+JP&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:ital@1&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./css/destyle.css">
  <link rel="stylesheet" href="./css/swiper.css">
  <link rel="stylesheet" href="./css/style.css">
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:site" content="@Ryoya_prog" />
  <meta property="og:url" content="https://portfolio.ryoya-web.com/" />
  <meta property="og:title" content="Ryoya's Portfolio" />
  <meta property="og:image" content="./img/top.png" />

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-179733140-4"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-179733140-4');
  </script>

</head>

<body>

  <div class="loading">
    <div class="cubic active">
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>


  <!-- header -->
  <header class="header">
    <div class="header__inner">
      <div class="header__logo-wrap">
        <a href="#" class="header__logo"><img src="./img/logo-light.png" alt="Ryoya" class="header__logo-img"></a><!-- /.header__logo -->
      </div><!-- /.header__logo-wrap -->
      <div class="header__list-wrap is-pc">
        <ul class="header__list">
          <li class="header__item"><a href="#about" class="header__link ">自己紹介</a><!-- /.header__link -->
          </li><!-- /.header__item -->
          <li class="header__item"><a href="#skill" class="header__link ">スキル</a></li><!-- /.header__item -->
          <li class="header__item"><a href="#flow" class="header__link ">制作の流れ</a></li><!-- /.header__item -->
          <li class="header__item"><a href="#works" class="header__link ">作品</a></li><!-- /.header__item -->
          <li class="header__item"><a href="#contact" class="header__link ">お問い合わせ</a></li><!-- /.header__item -->
        </ul><!-- /.header__list -->
      </div><!-- /.header__list-wrap -->
    </div><!-- /.header__inner -->
  </header><!-- /.header -->

  <!-- ハンバーガーメニュー -->
  <div class="hamberger">
    <div class="hamberger__line-wrap">
      <span class="hamberger__line"></span>
      <span class="hamberger__line"></span>
      <span class="hamberger__line"></span>
    </div>

    <nav class="hamberger-menu">
      <ul class="hamberger-menu__list">
        <li class="hamberger-menu__item"><a href="#about" class="header__link hamberger-menu__link">自己紹介</a><!-- /.header__link -->
        </li><!-- /.header__item -->
        <li class="hamberger-menu__item"><a href="#skill" class="header__link hamberger-menu__link">スキル</a></li><!-- /.header__item -->
        <li class="hamberger-menu__item"><a href="#flow" class="header__link hamberger-menu__link">制作の流れ</a></li><!-- /.header__item -->
        <li class="hamberger-menu__item"><a href="#works" class="header__link hamberger-menu__link">作品</a></li><!-- /.header__item -->
        <li class="hamberger-menu__item"><a href="#contact" class="header__link hamberger-menu__link">お問い合わせ</a></li><!-- /.header__item -->
      </ul><!-- /.header__list -->
    </nav>

    <!-- クリックしたときの背景 -->
    <div class="overlay"></div>
  </div>

  <main class="main">
    <!-- top -->
    <div class="top">
      <div class="top__img-wrap">
        <div class="top__letters-wrap">
          <span class="top__letter">常</span><!-- /.top__letter -->
          <span class="top__letter">に</span><!-- /.top__letter -->
          <br>
          <span class="top__letter">お</span><!-- /.top__letter -->
          <span class="top__letter">客</span><!-- /.top__letter -->
          <span class="top__letter">様</span><!-- /.top__letter -->
          <span class="top__letter">目</span><!-- /.top__letter -->
          <span class="top__letter">線</span><!-- /.top__letter -->
          <span class="top__letter">を</span><!-- /.top__letter -->
        </div><!-- /.top__letters-wrap -->
        <img src="./img/bg.jpg" alt="トップ" class="top__img">
        <div class="top__button-wrap">
          <a href="#contact" class="button top__button cubic-button">
            <span class="default">お問い合わせする</span>
            <span class="hovering">Contact</span>
          </a>
          <!-- /.button top__button -->
        </div><!-- /.top__button-wrap -->
      </div><!-- /.top__img-wrap -->
    </div><!-- /.top -->


    <!-- about -->
    <section class="section about" id="about">
      <div class="section__inner about__inner">
        <div class="section__heads">
          <h2 class="section__title">ー自己紹介ー</h2><!-- /.about_title -->
        </div><!-- /.section__heads -->
        <div class="about__contents-wrap">
          <div class="about__content about__content--img js-hide">
            <div class="about__img-wrap">
              <img src="./img/profile.jpg" alt="自己紹介" class="about__img" loading="lazy">
              <div class="about__img-bg"></div><!-- /.about__img-bg -->
            </div><!-- /.about__img-wrap -->
          </div><!-- /.about__content about__content--img -->
          <div class="about__content about__content--desc js-hide">
            <p class="about__intro">
              はじめまして！<span class="about__name">りょーや</span>といいます！<br>現在、Webコーダーとして活動しています！<br>
              コーダーをお探しの方は、お気軽にお問い合わせください！
            </p><!-- /.about__intro -->
            <a href="https://twitter.com/ryoya_satisfy" class="button about__button  button--shape_circle"><span class="button__icon button__icon--twitter"><i class="fab fa-twitter"></i></span><!-- /.button__icon --></a><!-- /.button -->
            <a href="https://www.facebook.com/ryoya.0401" class="button about__button  button--shape_circle"><span class="button__icon button__icon--facebook"><i class="fab fa-facebook-f"></i></span><!-- /.button__icon --></a><!-- /.button -->
          </div><!-- /.about__content about__content--desc -->
        </div><!-- /.about__contents-wrap -->
      </div><!-- /.section__inner about__inner -->
    </section><!-- /.section about -->

    <!-- skill -->
    <section class="section skill section--bg_gray section__bg--shape_triangle section__bg--shape_triangle-down" id="skill">
      <div class="section__inner skill__inner">
        <div class="section__heads">
          <h2 class="section__title">ースキルー</h2><!-- /.about_title -->
        </div><!-- /.section__heads -->
        <p class="skill__attention">※デザイン業務は担当外となります。</p><!-- /.skill__desc -->
        <div class="skills">
          <div class="skill__item js-hide">
            <div class="skill__icon-wrap">
              <span class="skill__icon"><i class="fab fa-html5 fa-4x"></i></span>
            </div><!-- /.skill__icon-wrap -->
            <div class="skill__title">HTML/CSS</div><!-- /.skill__title -->
            <div class="skill__desc">HTML/CSSを用いた静的なWebサイトのコーディングが可能です。</div><!-- /.skill__desc -->
          </div><!-- /.skill__item js-hide -->
          <div class="skill__item js-hide">
            <div class="skill__icon-wrap">
              <span class="skill__icon"><i class="fas fa-mobile-alt fa-4x"></i></span><!-- /.skill__icon -->
            </div><!-- /.skill__icon-wrap -->
            <div class="skill__title">レスポンシブ対応</div><!-- /.skill__title -->
            <div class="skill__desc">レスポンシブ対応したWebサイトを制作することが可能です。</div><!-- /.skill__desc -->
          </div><!-- /.skill__item js-hide -->
          <div class="skill__item js-hide">
            <div class="skill__icon-wrap">
              <span class="skill__icon"><i class="fab fa-js-square fa-4x"></i></span><!-- /.skill__icon -->
            </div><!-- /.skill__icon-wrap -->
            <div class="skill__title">jQuery</div><!-- /.skill__title -->
            <div class="skill__desc">jQueryを用いてWebサイトに動きをつけることが可能です。</div><!-- /.skill__desc -->
          </div><!-- /.skill__item js-hide -->
          <div class="skill__item js-hide">
            <div class="skill__icon-wrap">
              <span class="skill__icon"><i class="fab fa-sass fa-4x"></i></span><!-- /.skill__icon -->
            </div><!-- /.skill__icon-wrap -->
            <div class="skill__title">Sass</div><!-- /.skill__title -->
            <div class="skill__desc">Sassを用いてCSSを効率よく書くことが可能です。</div><!-- /.skill__desc -->
          </div><!-- /.skill__item js-hide -->
          <div class="skill__item js-hide">
            <div class="skill__icon-wrap">
              <span class="skill__icon"><i class="fab fa-wordpress fa-4x"></i></span><!-- /.skill__icon -->
            </div><!-- /.skill__icon-wrap -->
            <div class="skill__title">WordPress</div><!-- /.skill__title -->
            <div class="skill__desc">WordPressを用いてコーポレートサイトやブログサイトを作ることが可能です。</div><!-- /.skill__desc -->
          </div><!-- /.skill__item js-hide -->
          <div class="skill__item js-hide">
            <div class="skill__icon-wrap">
              <span class="skill__icon"><i class="fab fa-github fa-4x"></i></span><!-- /.skill__icon -->
            </div><!-- /.skill__icon-wrap -->
            <div class="skill__title">Git</div><!-- /.skill__title -->
            <div class="skill__desc">Githubを用いてソースコードを管理することが可能です。</div><!-- /.skill__desc -->
          </div><!-- /.skill__item js-hide -->
        </div><!-- /.skills -->
      </div><!-- /.section__inner skill__inner -->
    </section><!-- /.section skill -->

    <!-- flow -->
    <section class="section flow" id="flow">
      <div class="section__inner flow__inner">
        <div class="section__heads">
          <h2 class="section__title">ー制作の流れー</h2><!-- /.about_title -->
        </div><!-- /.section__heads -->
        <div class="cards">
          <div class="cards__item card js-hide">
            <div class="card__img-wrap">
              <img src="./img/flow-img/hearing.jpg" alt="ヒアリング" class="card__img" loading="lazy">
            </div><!-- /.card__img-wrap -->
            <div class="card__body">
              <div class="card__title">1.ヒアリング</div><!-- /.card__title -->
              <div class="card__desc">お客様のご期待に沿った最適な提案をいたします。</div><!-- /.card__desc -->
            </div><!-- /.card__body -->
          </div><!-- /.cards__item card js-hide -->
          <div class="cards__item card js-hide">
            <div class="card__img-wrap">
              <img src="./img/flow-img/coding.jpg" alt="コーディング" class="card__img" loading="lazy">
            </div><!-- /.card__img-wrap -->
            <div class="card__body">
              <div class="card__title">2.コーディング</div><!-- /.card__title -->
              <div class="card__desc">作成されたデザインカンプをもとにWebサイトを作成していきます。</div><!-- /.card__desc -->
            </div><!-- /.card__body -->
          </div><!-- /.cards__item card js-hide -->
          <div class="cards__item card js-hide">
            <div class="card__img-wrap">
              <img src="./img/flow-img/finish.jpg" alt="納品" class="card__img" loading="lazy">
            </div><!-- /.card__img-wrap -->
            <div class="card__body">
              <div class="card__title">3.納品</div><!-- /.card__title -->
              <div class="card__desc">期日に余裕をもって納品いたします。</div><!-- /.card__desc -->
            </div><!-- /.card__body -->
          </div><!-- /.cards__item card js-hide -->
        </div><!-- /.cards -->
      </div><!-- /.section__inner flow__inner -->
    </section><!-- /.section flow -->

    <!-- work -->
    <section class="section work section--bg_gray section__bg--shape_triangle section__bg--shape_triangle-up" id="works">
      <div class="section__inner work__inner">
        <div class="section__heads">
          <h2 class="section__title">ー作品ー</h2><!-- /.about_title -->
        </div><!-- /.section__heads -->
        <!-- <div class="section__desc work__desc">作成したWebサイトを掲載いたします。クリックするとそのサイトに移動します。</div> -->
        <p class="work__attention">下記サイトのデザインは担当しておりません。デザインデータからのコーディングのみとなります。</p><!-- /.work__attention -->
        <p class="work__basic">※Basic認証があるサイトはユーザー名：portfolio、パスワード：Gd6YXzSqを入力してください。</p><!-- /.work__basic -->
        <div class="works-wrap work__items swiper-container js-hide">
          <div class="works swiper-wrapper">
            <div class="works__item-wrap swiper-slide">
              <a href="https://engress.ryoya-web.com/" class="works__item" target="_blank" rel="noopener noreferrer">
                <img src="./img/works-img/engress.jpg" alt="Engress" class="works__img" loading="lazy">
              </a><!-- /.works__item -->
            </div><!-- /.works__item-wrap -->
            <div class="works__item-wrap swiper-slide">
              <a href="https://30days.ryoya-web.com" class="works__item" target="_blank" rel="noopener noreferrer">
                <img src="./img/works-img/mahaba.jpg" alt="mahaba" class="works__img" loading="lazy">
              </a><!-- /.works__item -->
            </div><!-- /.works__item-wrap -->
            <div class="works__item-wrap swiper-slide">
              <a href="https://ryoya-web.com/furniture_demo/" class="works__item" target="_blank" rel="noopener noreferrer">
                <img src="./img/works-img/furniture.png" alt="Furniture" class="works__img" loading="lazy">
              </a><!-- /.works__item -->
            </div><!-- /.works__item-wrap -->
            <div class="works__item-wrap swiper-slide">
              <a href="https://ryoya-web.com/MELINDA_sample/" class="works__item" target="_blank" rel="noopener noreferrer">
                <img src="./img/works-img/melinda.png" alt="MELINDA" class="works__img" loading="lazy">
              </a><!-- /.works__item -->
            </div><!-- /.works__item-wrap -->
            <div class="works__item-wrap swiper-slide">
              <a href="https://ryoya-web.com/mel_sample/" class="works__item" target="_blank" rel="noopener noreferrer">
                <img src="./img/works-img/mel.png" alt="MEL" class="works__img" loading="lazy">
              </a><!-- /.works__item -->
            </div><!-- /.works__item-wrap -->
            <div class="works__item-wrap swiper-slide">
              <a href="https://bmonitors.jp/" class="works__item" target="_blank" rel="noopener noreferrer">
                <img src="./img/works-img/monikatsu.png" alt="monikatsu" class="works__img" loading="lazy">
              </a><!-- /.works__item -->
            </div><!-- /.works__item-wrap -->
            <div class="works__item-wrap swiper-slide">
              <a href="https://ryoya-murata.github.io/rosemary/" class="works__item" target="_blank" rel="noopener noreferrer">
                <img src="./img/works-img/rosemary.png" alt="Rosemary" class="works__img" loading="lazy">
              </a><!-- /.works__item -->
            </div><!-- /.works__item-wrap -->
            <div class="works__item-wrap swiper-slide">
              <a href="https://ryoya-web.com/sobolon_sample" class="works__item" target="_blank" rel="noopener noreferrer">
                <img src="./img/works-img/sobolon.jpg" alt="sobolon" class="works__img" loading="lazy">
              </a><!-- /.works__item -->
            </div><!-- /.works__item-wrap -->
            <div class="works__item-wrap swiper-slide">
              <a href="https://ryoya-web.com/shiro_sample" class="works__item" target="_blank" rel="noopener noreferrer">
                <img src="./img/works-img/shiro.jpg" alt="Shiro" class="works__img" loading="lazy">
              </a>
            </div>
          </div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
        </div><!-- /.works-wrap swiper-container -->
        <div class="swiper-pagination swiper-pagination--black work__pagination js-hide"></div>
      </div><!-- /.section__inner works__inner -->
    </section><!-- /.section work -->

    <!-- Contact -->
    <section class="section contact" id="contact">
      <div class="section__inner contact__inner">
        <div class="section__heads">
          <h2 class="section__title">ーお問い合わせー</h2><!-- /.about_title -->
        </div><!-- /.section__heads -->
        <div class="section__desc section__desc--contact">下記のお問い合わせフォームからご連絡よろしくお願いします。</div><!-- /.section__desc -->
        <form id="form" action="" class="form" method="POST" novalidate>
          <input type="hidden" name="scroll_top" value="" class="st">
          <div class="form__table-wrap">
            <table class="form__table">
              <tr class="form__item">
                <th class="form__label-wrap"><span class="form__label form__label--input_required">お名前</span><!-- /.form__label -->
                </th><!-- /.form__label-wrap -->
                <td class="form__input-wrap">
                  <input type="text" class="form__input" id="form_name" name="name" value="<?php echo htmlspecialchars($post['name']); ?>">
                  <?php if ($error['name'] === 'blank') : ?>
                  <p class="error-msg">※お名前をご記入ください</p><!-- /.err-msg -->
                  <?php endif; ?>
                  <p class="form__example">例）山田 太郎</p><!-- /.form__example -->
                </td><!-- /.form__input-wrap -->
              </tr><!-- /.form__item -->
              <tr class="form__item">
                <th class="form__label-wrap"><span class="form__label form__label--input_required">フリガナ</span><!-- /.form__label -->
                </th><!-- /.form__label-wrap -->
                <td class="form__input-wrap">
                  <input type="text" class="form__input" id="form_ruby" name="ruby" value="<?php echo htmlspecialchars($post['ruby']); ?>">
                  <?php if ($error['ruby'] === 'blank') : ?>
                  <p class="error-msg">※ふりがなをご記入ください</p><!-- /.err-msg -->
                  <?php endif; ?>
                  <p class="form__example">例）ヤマダ　タロウ</p><!-- /.form__example -->
                </td><!-- /.form__input-wrap -->
              </tr><!-- /.form__item -->
              <tr class="form__item">
                <th class="form__label-wrap"><span class="form__label form__label--input_required">メールアドレス</span><!-- /.form__label -->
                </th><!-- /.form__label-wrap -->
                <td class="form__input-wrap">
                  <input type="email" class="form__input" id="form_email" name="email" value="<?php echo htmlspecialchars($post['email']); ?>">
                  <?php if ($error['email'] === 'blank') : ?>
                  <p class="error-msg">※メールアドレスをご記入ください</p><!-- /.err-msg -->
                  <?php endif; ?>
                  <?php if ($error['email'] === 'email') :?>
                  <p class="error-msg">※メールアドレスを正しくご記入ください</p><!-- /.err-msg -->
                  <?php endif; ?>
                  <p class="form__example">例）aaa@example.com</p><!-- /.form__example -->
                </td><!-- /.form__input-wrap -->
              </tr><!-- /.form__item -->
              <tr class="form__item">
                <th class="form__label-wrap"><span class="form__label form__label--input_optional">電話番号</span><!-- /.form__label -->
                </th><!-- /.form__label-wrap -->
                <td class="form__input-wrap">
                  <input type="tel" class="form__input" id="form_tel" name="tel" value="<?php echo htmlspecialchars($post['tel']); ?>">
                  <p class="form__example">例）12345678901</p><!-- /.form__example -->
                </td><!-- /.form__input-wrap -->
              </tr><!-- /.form__item -->
              <tr class="form__item">
                <th class="form__label-wrap form__label-wrap--textarea"><span class="form__label form__label--input_optional">お問い合わせ内容</span><!-- /.form__label -->
                </th><!-- /.form__label-wrap -->
                <td class="form__textarea-wrap"><textarea id="form_inquiry" name="inquiry" id="" class="form__textarea"><?php echo htmlspecialchars($post['inquiry']); ?></textarea><!-- /.form__textarea -->
                  <!-- /.form__textarea-wrap -->
              </tr><!-- /.form__item -->
            </table>
          </div>
          <div class="form__button-wrap">
            <input id="js-submit" type="submit" class="button form__button" name="confirm" value="確認画面へ" disabled><!-- /.button form__button -->
          </div><!-- /.form__button-wrap -->
        </form><!-- /.form -->
      </div><!-- /.section__inner contact__inner -->
    </section><!-- /.section contact -->
  </main><!-- /.main -->



  <?php include './footer.php'; ?>
