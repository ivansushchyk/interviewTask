<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="/styles/style.css">
    <!--              Import font from Google                        -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
</head>
<body>


<div class="header">
    <div class="container">
        <p class="header-nav">
            Test assigment
        </p>
    </div>

</div>
<!-- HEADER END -->


<div class="main">
    <div class="currencies default-section">
        <div class="container">
            <div class="title text-center">
                <span> Hryvnia exchange rate</span>
            </div>
            <!-- TITLE END -->
            <div class="currencies-row">
                <div class="currency">
                    <div class="currency-image">
                        <a href="/history/EUR">
                            <img src="/images/eur.png" height="330" width="330">
                        </a>
                    </div>

                    <div class="currency-title">
                       <span>EUR </span>
                    </div>


                    <div class="currency-title">
                        BUY <?= $EUR[0] ?> /
                        SELL <?= $EUR[1] ?>
                    </div>


                </div>
                <!-- CURENCY END -->
                    <div class="currency">
                        <div class="currency-image">
                            <a href="/history/USD">
                                <img src="/images/usd.png" height="330" width="330">
                            </a>
                        </div>

                        <div class="currency-title">
                            <span> USD </span>
                        </div>


                        <div class="currency-title">
                            BUY <?= $USD[0] ?> /
                            SELL <?= $USD[1] ?>
                        </div>


                    </div>
                <!-- CURENCY END -->
                <div class="currency">
                    <div class="currency-image">
                        <a href="/history/RUR">
                            <img src="/images/rub.png" height="330" width="330">
                        </a>
                    </div>

                    <div class="currency-title">
                        <span> RUB </span>
                    </div>

                    <div class="currency-title">
                        BUY <?= $RUR[0] ?> /
                        SELL <?= $RUR[1] ?>
                    </div>


                </div>

                </div>


            </div>


            <!-- CONTAINER END -->
    </div>
    <!-- CURRENCIES END -->





</div>





<!-- MAIN END -->
</body>
</html>