<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="premium.scss">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link rel="stylesheet" href="swiper-bundle.min.css">
    <script src="swiper-bundle.min.js.js"></script>
    <title>PREMIUM TEAS</title>
</head>
<body>
<header>
        <div class="title">
            <div>
                <h1>PREMIUM TEAS</h1>
                <h3>UNIQUE TEA EXPERIENCE 🇨🇦</h3>
            </div>
            <div>
                <box-icon type='logo' name='twitter'></box-icon>
                <box-icon name='instagram' type='logo'></box-icon>
                <box-icon name='facebook' type='logo'></box-icon>
            </div>
        </div>
        <nav>
            <ul>
                <li><a href="">BLACK TEA</a></li>
                <li><a href="">GREEN TEA</a></li>
                <li><a href="">HERBAL</a></li>
                <li><a href="">1LB BAGS</a></li>
                <li><a href="">DECAF</a></li>
                <li><a href="">COLLECTIONS</a></li>
                <li><a href="">FALL TEA</a></li>
                <li><a href="">GIFTS</a></li>
                <li><a href="">MORE</a></li>
                <li><a href="">SALE</a></li>
                <li><input type="text" id="search" placeholder="Search"> <box-icon name='search' color='#c2c2c2'></box-icon></li>
            </ul>
        </nav>
        <div class="swiper carrousel">
        <div class="swiper-wrapper">
        <!-- div.slide${Slide $}*5 -->
            <div class="swiper-slide slide1"><img src="https://greenfieldtea.co.uk/upload/iblock/46f/46fe47bec8e83c384fdb3d531f6a2890.png" alt="image"></div>
            <div class="swiper-slide slide2"><img src="https://www.zoodelahautetouche.fr/sites/hautetouche/files/styles/1020x576/public/thumbnails/image/autruches_c_gilles_martin.jpg?itok=ilANaLoi" alt="autruche"></div>
            <div class="swiper-slide slide3"><img src="https://images.midilibre.fr/api/v1/images/view/6196bb16d286c27e81754705/large/image.png?v=1" alt="jsp"></div>
            <div class="swiper-slide slide4"><img src="https://static.cnews.fr/sites/default/files/styles/image_750_422/public/3._kenichi-morinaga_the-big-boss-taille1200_64affb0c7a14e_0.jpg?itok=tOwyOxHj" alt="chat"></div>
            <div class="swiper-slide slide5"><img src="https://cdn.discordapp.com/attachments/1163786787710308362/1163794674553716796/Screenshot_2023-10-17-13-03-55-017_com.zhiliaoapp.musically-edit.jpg?ex=658178c0&is=656f03c0&hm=33625d3ade36764cf30775f36a519d1c034e48b775384b22100d5d42274bbf92&" alt="apiculuteur"></div>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
    <script>
        const carrousel = new Swiper('.carrousel', {
            loop: true,
            autoplay: {
                delay: 4500,
                disableOnInteraction: true
            },
            pagination: {
                el: '.swiper-pagination'
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            }
        })
    </script>
</body>
</html>