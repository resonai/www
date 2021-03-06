<!DOCTYPE html>
<html ng-app="mainApp">
    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-64361267-6"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-64361267-6');
        </script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title ng-bind="MetaTags.title">Resonai: Discover new realities. Vera for AR + 3D visual search.</title>
        <meta name="description" content="Resonai is all about visual perception – understanding the digital and physical world in 3D, and applying that to AR, visual search, and more.">
        <meta name="keywords" content="Resonai, Vera for AR, Visual Search, Unity Visual Search, Animaker">
        <meta name="robots" content="{{MetaTags.robots}}">
        <meta ng-repeat="(key, value) in MetaTags.properties" property="{{key}}" content="{{value}}">
        <meta name="prerender-status-code" content="{{MetaTags.prerender.statusCode}}">
        <meta name="prerender-header" ng-if="MetaTags.prerender.header" content="{{MetaTags.prerender.header}}">

        <meta name="twitter:site" content="@Resonai_XR">
        <meta property="og:site_name" content="Resonai">
        <!--        <meta name="twitter:card" content="summary_large_image">-->

        <!--        <meta property="fb:app_id" content="your_app_id" />-->

        <link rel="shortcut icon" href="favicon.ico" />
        <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon.png" />
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png" />
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png" />
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5" />
        <meta name="msapplication-TileColor" content="#da532c" />
        <meta name="theme-color" content="#ffffff" />

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900" rel="stylesheet">

        <!-- CSS (load bootstrap) -->
        <script src="js/jquery-3.3.1.slim.min.js"></script>
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
        <script src="js/ui-router-metatags.min.js"></script>

        <!-- components -->
        <script src="app/components/homepage/homepage.component.js"></script>
        <script src="app/components/contactus/contactus.component.js"></script>
        <script src="app/components/dollhouse/dollhouse.component.js"></script>
        <script src="app/components/jobs/jobs.component.js"></script>
        <script src="app/components/jobsform/jobsform.component.js"></script>
        <script src="app/components/search/search.component.js"></script>
        <script src="app/components/search4unity/search4unity.component.js"></script>
        <script src="app/components/whitepaper/whitepaper.component.js"></script>
        <script src="app/components/retailebook/retailebook.component.js"></script>
        <script src="js/index.js"></script>

        <!-- style css -->
        <link rel="stylesheet" href="css/fontAwesome/css/all.min.css"/>
        <link rel="stylesheet" href="css/ngDialog.min.css"/>
        <link rel="stylesheet" href="css/ngDialog-theme-default.min.css"/>
        <link type="text/css" rel="stylesheet" href="css/index.css">

    </head>
    <body scroll ng-class="{sticky:boolChangeClass}">
       <!-- Preloader
        <div id="preloader" style="display: none;">
            <div class="loader" style="display: none;"></div>
        </div>-->
        <section class="wrapper" ng-controller="smoothScroll">
            <!-- MAIN CONTENT -->
            <div class="resonai-content" ui-view></div>
            <div ng-include='"app/templates/footer.html"'></div>
        </section>
    </body>
</html>
