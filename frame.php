<head>
  <meta charset="utf-8">
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title; ?></title>
  <link href="/images/favicon.ico" rel="shortcut icon">

  <!-- google font  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100&display=swap" rel="stylesheet">

  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <link href="/css/layout.css" rel="stylesheet">

  <link href=<?php echo $css; ?> rel="stylesheet">

  <script>
    // 黑色遮罩及卷軸: 顯示或隱藏
    const onOpenOverlay = () => {
      document.getElementById("js-overlay").classList.toggle('js-overlay-open');
      document.documentElement.classList.toggle('js-headHidden')
    }

    /* 黑色遮罩及卷軸: 隱藏
        小網關閉側選單
        我要投稿: 開啟地圖設置經緯度
        文章 | 老照片: 內容修改建議
    **/
    const onCloseOverlay = () => {
      document.getElementById("js-sideNav").style.right = '';
      if (document.getElementById("js-setMap")) {
        document.getElementById("js-setMap").classList.remove('js-modal-in');
      }
      if (document.getElementById("js-contentSuggestion")) {
        document.getElementById("js-contentSuggestion").classList.remove('js-modal-in');
      }

      onOpenOverlay();
    }

    // 小網打開側選單
    const onOpenSideNav = () => {
      document.getElementById("js-sideNav").style.right = '0%';
      onOpenOverlay();
    }

    // 側選單: 內容交互
    window.addEventListener('DOMContentLoaded', () => {
      const navLists = document.querySelectorAll('.js-sideNavLists');
      Array.prototype.forEach.call(navLists, t => {
        t.addEventListener('click', e => {
          const sideNavIn = document.querySelectorAll('.js-sideNavLists-in');
          Array.prototype.forEach.call(sideNavIn, act => {
            act.classList.remove('js-sideNavLists-in');
          })
          e.target.classList.add('js-sideNavLists-in');
        });
      });
    });

    // 卷軸於 100 時變換視覺樣式
    window.addEventListener('scroll', () => {
      const scrollPositionY = window.pageYOffset;
      if (scrollPositionY > 100) {
        document.getElementById("js-hdFixed").classList.add('js-hdFixed-in');
      } else {
        document.getElementById("js-hdFixed").classList.remove('js-hdFixed-in');
      }
    });

    // 小網開啟與關閉 searchBar
    const onOpenSearchBar = () => {
      const searchBar = document.getElementById('js-searchBar');
      searchBar.classList.toggle('js-searchBar-open')
    };

    // 我要投稿: 開啟地圖設置經緯度
    const onOpenSetMap = () => {
      document.getElementById("js-setMap").classList.add('js-modal-in');
      onOpenOverlay();
    };

    // 文章 | 老照片: 內容修改建議按鈕
    const onOpenContentSuggestion = () => {
      document.getElementById("js-contentSuggestion").classList.add('js-modal-in');
      onOpenOverlay();
    };
  </script>
</head>