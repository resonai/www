<!DOCTYPE html>
<html ng-app="mainApp">
    <head>
        <title>Resonai</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

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
        
        <!-- components -->
        <script src="app/components/homepage/homepage.component.js"></script>
        <script src="app/components/contactus/contactus.component.js"></script>
        <script src="app/components/dollhouse/dollhouse.component.js"></script>
        <script src="app/components/jobs/jobs.component.js"></script>
        <script src="app/components/jobsform/jobsform.component.js"></script>
        <script src="app/components/search/search.component.js"></script>
        <script src="app/components/search4unity/search4unity.component.js"></script>
        <script src="js/index.js"></script>
        
        <!-- style css -->
        <link rel="stylesheet" href="css/fontAwesome/css/all.min.css"/>
        <link rel="stylesheet" href="css/ngDialog.min.css"/>
        <link rel="stylesheet" href="css/ngDialog-theme-default.min.css"/>
        <link type="text/css" rel="stylesheet" href="css/index.css">
<!--        <link type="text/css" rel="stylesheet" href="css/menu.css">-->
<!--        <link type="text/css" rel="stylesheet" href="css/footer.css">-->
<!--        <link type="text/css" rel="stylesheet" href="css/dollhouse.css">-->
<!--        <link rel="stylesheet" type="text/css" href="css/dollhouseslider.css" />-->
<!--        <link rel="stylesheet" type="text/css" href="css/revealer.css"/>-->
<!--        <link type="text/css" rel="stylesheet" href="css/search.css">-->
<!--        <link rel="stylesheet" href="css/searchslider.css">-->
<!--        <link type="text/css" rel="stylesheet" href="css/search4unity.css">-->
<!--        <link rel="stylesheet" href="css/sliderunity.css">-->
<!--        <link type="text/css" rel="stylesheet" href="css/contactUs.css">-->
<!--        <link type="text/css" rel="stylesheet" href="css/jobs.css">-->
        
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
