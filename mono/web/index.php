
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=0.1, maximum-scale=3.0, user-scalable=yes" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-DATA Casablanca-Settat</title>
    <!-- VIEWPORT -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=0.1, maximum-scale=3.0, user-scalable=yes" />
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="./fonts/font-awesome/css/font-awesome.min.css">
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="./styles/bootstrap.min.css">
    <!-- CSS -->
    <link rel="stylesheet" href="./styles/reveal.css">
    <link rel="stylesheet" href="./styles/monograph.css">
    <link rel="stylesheet" href="./styles/breadcrumb.css">
    <link rel="stylesheet" href="./styles/style.css">


    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="https://www.jqueryscript.net/demo/Exporting-Html-Tables-To-CSV-XLS-XLSX-Text-TableExport/dist/css/tableexport.css" rel="stylesheet" type="text/css">


</head>

<script src="./js/jquery.min.js"></script>
<script src="./js/Chart.min.js"></script>
<script src="./js/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="./js/Chart.bundle.js"></script>
<script src="./js/Chart.PieceLabel.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/reveal.js/3.6.0/plugin/search/search.js"></script> -->




<body style="overflow: auto">
    <div class="se-pre-con"></div>
    <div class="reveal" style="display:none">
        <header class="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-11 col-xs-12 logo animated fadeInDown">
                        <a href="#">
                            <img src="images/logo.jpg" alt="CRI Casablanca">
                        </a>
                    </div>
                    <div class="col-md-1 col-xs-3 hamburger-wrapper">
                        <span>MENU</span>
                        <div class="hamburger animated fadeInRight">
                            <span></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="fil-ariane animated fadeInLeft">
                            <a href="#/sommaire">
                                <i class="fa fa-home"></i>
                            </a>
                            <span id="indicatorGrand">></span>
                            <a id="grandParentSlide" href="#"></a>
                            <span id="indicatorParent">></span>
                            <a id="parentSlide" href="#"></a>
                            <a id="indicatorChild" href="#"></a>
                            <span id="childSlide" class="red"></span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="slides">
            <?php

            require_once 'script.php';

            ?>
        </div>
            <div class="sk-circle">
                <div class="sk-circle1 sk-child"></div>
                <div class="sk-circle2 sk-child"></div>
                <div class="sk-circle3 sk-child"></div>
                <div class="sk-circle4 sk-child"></div>
                <div class="sk-circle5 sk-child"></div>
                <div class="sk-circle6 sk-child"></div>
                <div class="sk-circle7 sk-child"></div>
                <div class="sk-circle8 sk-child"></div>
                <div class="sk-circle9 sk-child"></div>
                <div class="sk-circle10 sk-child"></div>
                <div class="sk-circle11 sk-child"></div>
                <div class="sk-circle12 sk-child"></div>
            </div>
            <!-- JQUERY -->
            <script src="./scripts/jquery-2.2.1.min.js"></script>
            <script>
                     $(document).ready(function() {
                       $(".sk-circle").show();
                       $(".reveal").hide();
                     });
            </script>
            <!-- Reveal.js -->
            <script src="./scripts/head.min.js"></script>
            <script src="./scripts/reveal.js"></script>
           
            <!-- BOOTSTRAP JS -->
            <script src="./scripts/tether.min.js"></script>
            <script src="./scripts/bootstrap.min.js"></script>
            <!-- CUSTOM SCRIPT -->
            <script src="./scripts/main.js"></script>
           
            <!-- PLACEHOLDER IE9 -->
            <!--[if lte IE 9]>
                    <script src="js/placeholder-ie9.js"></script>
                <![endif]-->
            <script>
                  $(document).ready(function() {});
            </script>

            <!-- table export	 -->

<!--       <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script> -->
<script src="https://fastcdn.org/FileSaver.js/1.1.20151003/FileSaver.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/blob-polyfill/2.0.20171115/Blob.js"></script>
<script src="https://www.jqueryscript.net/demo/Exporting-Html-Tables-To-CSV-XLS-XLSX-Text-TableExport/xls.core.min.js"></script>

<script src="https://www.jqueryscript.net/demo/Exporting-Html-Tables-To-CSV-XLS-XLSX-Text-TableExport/dist/js/tableexport.js"></script>
<script>
$("table").tableExport({formats: ["xlsx","xls", "csv", "txt"],    });
</script>

<script type="text/javascript">
	
</script>

            <footer class="footer animated fadeInUp">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 col-xs-12"><img src="images/cri-estat-logo.png" alt=""></div>
                        <div class="col-md-5  col-xs-12">
                            <p>
                                Région Casablanca-settat
                                <span>|</span>
                                <strong class="green">#2018</strong>
                            </p>
                            <p class="copyright">
                                &copy; 2018 - CRI de
                                <strong class="red">Casablanca - Settat</strong> - tous droits réservés
                            </p>
                        </div>
                        <div class="col-md-5  col-xs-12 logo-we-casa">
                            <img src="images/we-casa.png" class="logo-we-casa" alt="">
                        </div>
                    </div>
                </div>
            </footer>
    </div>
</body>

</html>