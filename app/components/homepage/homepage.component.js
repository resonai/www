angular
    .module("app.homepage", ['ngAnimate'])
    .component("homepage", {
        templateUrl: "./app/components/homepage/homepage.template.html"
    })

    $(window).on("scroll", function() {
        if($(window).scrollTop() > 50) {
            $(".navbar").addClass("scrolled");
        } else {
           $(".navbar").removeClass("scrolled");
        }
    });