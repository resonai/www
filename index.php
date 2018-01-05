<!DOCTYPE html>
<html ng-app="mainApp">
    <head>
        <title>Resonai</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- CSS (load bootstrap) -->
        <script src="js/jquery-3.2.1.min.js"></script> 
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/bootstrap.min.js"></script>
        
        <!-- JS (load angular, ui-router, and our custom js file) -->
        <script src="js/angular.min.js"></script>
        <script src="js/angular-ui-router.min.js"></script>
        <script src="js/ngDialog.min.js"></script>
        <script src="js/angular-animate.min.js"></script>
        <script src="js/TweenMax.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.14/angular-touch.min.js"></script>
        <script src="js/angular-scroll.min.js"></script>
        <script src="js/revealer.js"></script>
        
        <!-- components -->
        <script src="app/components/homepage/homepage.component.js"></script>
        <script src="app/components/contactus/contactus.component.js"></script>
        <script src="app/components/dollhouse/dollhouse.component.js"></script>
        <script src="app/components/jobs/jobs.component.js"></script>
        <script src="app/components/jobsform/jobsform.component.js"></script>
        <script src="app/components/search/search.component.js"></script>
        <script src="app/components/search4unity/search4unity.component.js"></script>
        <script src="js/index.js"></script>
        
        
        <link rel="stylesheet" href="css/fontAwesome/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="css/ngDialog.min.css"/>
        <link rel="stylesheet" href="css/ngDialog-theme-default.min.css"/>
        <link type="text/css" rel="stylesheet" href="css/index.css">
        <link type="text/css" rel="stylesheet" href="css/footer.css">
    </head>
    <body scroll ng-class="{sticky:boolChangeClass}">
       <!-- Preloader -->
        <div id="preloader" style="display: none;">
            <div class="loader" style="display: none;"></div>
        </div>
        <section class="wrapper" ng-controller="smoothScroll">
            <!-- NAVIGATION -->
            <header class="header ">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <nav class="navbar navbar-default mobile-bottom">
                                <!-- Brand and toggle get grouped for better mobile display -->
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" 
                                    aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <a class="navbar-brand logo-desktop" href="index.php#!/home#home" du-smooth-scroll du-scrollspy><img alt="Resonai" 
                                    src="images/logo_haeder.png"></a>
                                    <a class="navbar-brand logo-mobile" href="index.php#!/home#home" du-smooth-scroll du-scrollspy><img alt="Resonai" src="images/logo-mobile.png">
                                    </a>
                                </div>
                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="collapse navbar-collapse" id="navbar">
                                    <ul class="nav navbar-nav navbar-right">
                                        <li><a href="index.php#!/home#about" du-smooth-scroll du-scrollspy>About Resonai</a></li>
                                        <li><a href="index.php#!/home#technology" du-smooth-scroll du-scrollspy>Technology</a></li>
                                        <!--<li><a href="index.php#!/home#products" du-smooth-scroll du-scrollspy>Products</a></li>-->
                                        <li class="dropdown">
                                            <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" 
                                            aria-haspopup="true" aria-expanded="false">Products <i class="fa fa-caret-down" 
                                            aria-hidden="true"></i></a>
                                            <ul class="dropdown-menu">
                                                <li><a ui-sref="search4unity" class="s4u">Resonai Search for Unity</a></li>
                                                <li><a ui-sref="search">Resonai Search</a></li>
                                                <li><a ui-sref="dollhouse">Resonai Dollhouse</a></li>
                                            </ul>
                                        </li>
                                        <li><a ui-sref="contactUs" class="contact-us-menu">Contact us</a></li>
                                        <li><a ui-sref="jobs" class="jobs-menu">Jobs</a></li>
                                        <li><a href="index.php#!/home#news" du-smooth-scroll du-scrollspy 
                                        class="news-section">News</a></li>
                                    </ul>
                                </div><!-- /.navbar-collapse -->
                            </nav>
                        </div> 
                    </div> 
                </div> 
            </header>
            
            <!-- MAIN CONTENT -->
            <div class="resonai-content" ui-view></div>
            
            <footer class="desktop-footer">
                <div class="footer">
                    <img src="images/logo-footer.png" alt="Resonai">    
                    <p>&copy; 2017, All rights reserved to Resonai</p>
                </div>
            </footer>   
        </section>
    </body>
</html>
