var app = angular.module('mainApp', ['revealer','ngDialog', 'ngTouch', 'duScroll','ui.router','app.homepage', 'app.contactus',
'app.jobs','app.dollhouse','app.search', 'app.search4unity','ngMeta']);

app.config(function($stateProvider, $urlRouterProvider) {
    
    $urlRouterProvider.otherwise('/home');
    
    $stateProvider
        
        // HOME STATES ========================================
        .state('home', {
            url: '/home',
            template: '<homepage />',
            data: {
                meta: {
                    'title': 'Resonai: Discover new realities. Vera for AR + 3D visual search.',
                    'description': 'Resonai is all about visual perception – understanding the digital and physical world in 3D, and applying that to AR, visual search, and more.',
                    'keywords': 'Resonai, Vera for AR, Visual Search, Unity Visual Search, Animaker'
                }
            }
        })
        
        // SEARCH4UNITY PAGE =================================
        .state('search4unity', {
            url: '/search4unity',
            template: '<search4unity />'
        })
    
        // SEARCH PAGE =================================
        .state('search', {
            url: '/search',
            template: '<search />'
        })
    
        // DOLLHOUSE PAGE =================================
        .state('dollhouse', {
            url: '/dollhouse',
            template: '<dollhouse />'
        })
    
        // JOBS PAGE =================================
        .state('jobs', {
            url: '/jobs',
            template: '<jobs />',
            data: {
                meta: {
                    'title': 'Resonai: Jobs',
                    'description': 'We’re working on some really cool stuff. If you want in, check out the open positions at Resonai. We’d love to hear from you.',
                    'keywords': 'Resonai jobs, careers at Resonai, job openings'
                }
            }
        }) 
    
        // CONTACTUS PAGE =================================
        .state('contactUs', {
            url: '/contactUs',
            template: '<contactus />',
            data: {
                meta: {
                    'title': 'Resonai: Contact Us',
                    'description': 'There’s nothing like a good chat. If you’re interested in a demo of our products, partnerships, or just about anything in between, let us know.',
                    'keywords': 'Contact Resonai, Resonai demos, Resonai partnerships'
                }
            }
        });
}).run(function(ngMeta) {
    ngMeta.init();
});

// HOME PAGE ========================================
 app.controller('smoothScroll', function($scope, $document){
    $scope.toTheTop = function() {
      $document.scrollTopAnimated(0, 5000).then(function() {
        console && console.log('You just scrolled to the top!');
      });
    }
    var section3 = angular.element(document.getElementById('section-3'));
    $scope.toSection3 = function() {
      $document.scrollToElementAnimated(section3);
    }
  }
).value('duScrollOffset', 30);

app.controller('popupVideo', function ($scope, ngDialog,$sce) {
	$scope.openContactForm = function($event) {
        $scope.trustSrc = function(src) {
            return $sce.trustAsResourceUrl(src);
        }
        $scope.movie = {src:$event.target.attributes.data.value};
		ngDialog.openConfirm({template: 'app/templates/index_popup_video.html',
		  scope: $scope //Pass the scope object if you need to access in the template
		}).then(
			function(value) {
				//save the contact form
			},
			function(value) {
				//Cancel or do nothing
			}
		);
	};
});

app.controller('switchSteps', function($scope){
    $scope.howPanel = 0;
    $scope.pastPanel = 0;
    $scope.switchPanel = function(panelNum) {
        $scope.pastPanel = $scope.howPanel;
        $scope.howPanel = panelNum;
    }
});
/*app.controller('hpPopupBeta', function ($scope, ngDialog) {
        $scope.openContactForm = function() {
            ngDialog.openConfirm({template: 'app/templates/hp_beta_popup.html',
              scope: $scope //Pass the scope object if you need to access in the template
            }).then(
                function(value) {
                    //save the contact form
                },
                function(value) {
                    //Cancel or do nothing
                }
            );
        };
    });*/

app.directive("scroll", function ($window) {
    return function(scope, element, attrs) {
        angular.element($window).bind("scroll", function() {
            if (this.pageYOffset >= 10) {
                 scope.boolChangeClass = true;
             } else {
                 scope.boolChangeClass = false;
             }
            scope.$apply();
        });
    };
});

//home page & search4unity page join the beta popup contact form- section 1
app.controller("contactFormPopupBeta", function($scope, $http){
 $scope.insert = {};
 $scope.insertData = function(isValid){
     if(!isValid) return false;
	formRequest($http, "api/insert_contactFormPopupBeta.php", $scope.insert, 
		function showGenericError(error) {
			$scope.errorMessage = error;
		},
		function showError(error) {
			$scope.errorUsername = error.user_name;
			$scope.errorCompanyname = error.company_name;
			$scope.errorEmail = error.email;
			$scope.errorPhone = error.phone;
			$scope.errorMessage = error.message;
			$scope.successInsert = null;
		},
		function showSuccess(message) {
			$scope.insert = null;
			$scope.errorUsername = null;
			$scope.errorCompanyname = null;
			$scope.errorEmail = null;
			$scope.errorPhone = null;
			$scope.errorMessage = null;
			$scope.successInsert = message;
		})
 }
});

function formRequest($http, url, data, showGenericError, showErrorFunc, showSuccessFunc) {

  $http({
   method:"POST",
   url: url,
   data: data,
  }).then(function(response){
	let data = response.data;
	handleFormResult(data, showGenericError, showErrorFunc, showSuccessFunc);
  })
  .catch(function(response){
	return showGenericError("Server error. Please try again later.");
  });
}

function handleFormResult(data, showGenericError, showErrorFunc, showSuccessFunc) {
   if(!data) {
	return showGenericError("Server error. Please try again later.");
   }
   if(data.error) {
	   if(typeof data.error === "string" || data.error instanceof String){
		showGenericError(data.error);
	   }
	   else {
		showErrorFunc(data.error);
	   }
   }
   else
   {
	showSuccessFunc(data.message);
   }

}

// JOBS PAGE =================================

app.controller('jobs', function($scope) {
  
  $scope.hideMe = function(){
    console.log('hide the button');
    $scope.hide();
  }
  
});

// DOLLHOUSE PAGE =================================

app.controller('dollhouse', ['$scope', function($scope) {

	$scope.images = {
		image1: 'images/doll_DSC7689_18May17_Screen1.jpg',
		image2: 'images/doll_DSC7689_18May17_Screen2.jpg'
	}

}]);


// SEARCH PAGE =================================

    app.controller('search', function ($scope) {
        $scope.slides = [
            {image: 'images/search/New_Screens_10Jan18_V1-no-laptop.jpg', description: 'Image 00'},
            {image: 'images/search/New_Screens_10Jan18_V2-no-laptop.jpg', description: 'Image 01'},
            {image: 'images/search/New_Screens_10Jan18_V3-no-laptop.jpg', description: 'Image 02'}
        ];

        $scope.direction = 'left';
        $scope.currentIndex = 0;

        $scope.setCurrentSlideIndex = function (index) {
            $scope.direction = (index > $scope.currentIndex) ? 'left' : 'right';
            $scope.currentIndex = index;
        };

        $scope.isCurrentSlideIndex = function (index) {
            return $scope.currentIndex === index;
        };

        $scope.prevSlide = function () {
            $scope.direction = 'left';
            $scope.currentIndex = ($scope.currentIndex < $scope.slides.length - 1) ? ++$scope.currentIndex : 0;
        };

        $scope.nextSlide = function () {
            $scope.direction = 'right';
            $scope.currentIndex = ($scope.currentIndex > 0) ? --$scope.currentIndex : $scope.slides.length - 1;
        };
    })
    app.animation('.slide-animation', function () {
        return {
            beforeAddClass: function (element, className, done) {
                var scope = element.scope();

                if (className == 'ng-hide') {
                    var finishPoint = element.parent().width();
                    if(scope.direction !== 'right') {
                        finishPoint = -finishPoint;
                    }
                    TweenMax.to(element, 0.5, {left: finishPoint, onComplete: done });
                }
                else {
                    done();
                }
            },
            removeClass: function (element, className, done) {
                var scope = element.scope();

                if (className == 'ng-hide') {
                    element.removeClass('ng-hide');

                    var startPoint = element.parent().width();
                    if(scope.direction === 'right') {
                        startPoint = -startPoint;
                    }

                    TweenMax.fromTo(element, 0.5, { left: startPoint }, {left: 0, onComplete: done });
                }
                else {
                    done();
                }
            }
        };
    });

    //dollhouse, search & search4unity page contact form demo
    app.controller('popupContactus', function ($scope, ngDialog) {
        $scope.openContactForm = function() {
            ngDialog.openConfirm({template: 'app/templates/dollhouse_popup.html',
              scope: $scope //Pass the scope object if you need to access in the template
            }).then(
                function(value) {
                    //save the contact form
                },
                function(value) {
                    //Cancel or do nothing
                }
            );
        };
    });

    app.controller("contactFormPopupDemo", function($scope, $http){
     $scope.insert = {};
     $scope.insertData = function(isValid){
         if(!isValid) return false;
	formRequest($http, "api/insert_contactFormPopupDemo.php", $scope.insert, 
		function showGenericError(error) {
			$scope.errorMessage = error;
		},
		function showError(error) {
			$scope.errorUsername = error.user_name;
			$scope.errorCompanyname = error.company_name;
			$scope.errorEmail = error.email;
			$scope.errorPhone = error.phone;
			$scope.errorMessage = error.message;
			$scope.successInsert = null;
		},
		function showSuccess(message) {
			$scope.insert = null;
			$scope.errorUsername = null;
			$scope.errorCompanyname = null;
			$scope.errorEmail = null;
			$scope.errorPhone = null;
			$scope.errorMessage = null;
			$scope.successInsert = message;
		})
    };
})

    // SEARCH4UNITY PAGE =================================

    app.controller('search4unity', function ($scope) {
        $scope.slides = [
            {image: 'images/Search4unity/Screenshot1.jpg', description: 'Image 00'},
            {image: 'images/Search4unity/Screenshot2.jpg', description: 'Image 01'},
            {image: 'images/Search4unity/Screenshot3.jpg', description: 'Image 02'},
            {image: 'images/Search4unity/Screenshot4.jpg', description: 'Image 03'}
        ];

        $scope.direction = 'left';
        $scope.currentIndex = 0;

        $scope.setCurrentSlideIndex = function (index) {
            $scope.direction = (index > $scope.currentIndex) ? 'left' : 'right';
            $scope.currentIndex = index;
        };

        $scope.isCurrentSlideIndex = function (index) {
            return $scope.currentIndex === index;
        };

        $scope.prevSlide = function () {
            $scope.direction = 'left';
            $scope.currentIndex = ($scope.currentIndex < $scope.slides.length - 1) ? ++$scope.currentIndex : 0;
        };

        $scope.nextSlide = function () {
            $scope.direction = 'right';
            $scope.currentIndex = ($scope.currentIndex > 0) ? --$scope.currentIndex : $scope.slides.length - 1;
        };
    })
    app.animation('.slide-animation', function () {
        return {
            beforeAddClass: function (element, className, done) {
                var scope = element.scope();

                if (className == 'ng-hide') {
                    var finishPoint = element.parent().width();
                    if(scope.direction !== 'right') {
                        finishPoint = -finishPoint;
                    }
                    TweenMax.to(element, 0.5, {left: finishPoint, onComplete: done });
                }
                else {
                    done();
                }
            },
            removeClass: function (element, className, done) {
                var scope = element.scope();

                if (className == 'ng-hide') {
                    element.removeClass('ng-hide');

                    var startPoint = element.parent().width();
                    if(scope.direction === 'right') {
                        startPoint = -startPoint;
                    }

                    TweenMax.fromTo(element, 0.5, { left: startPoint }, {left: 0, onComplete: done });
                }
                else {
                    done();
                }
            }
        };
    });

    /*app.controller('popupBeta', function ($scope, ngDialog) {
        $scope.openContactForm = function() {
            ngDialog.openConfirm({template: 'app/templates/search4unity_popup.html',
              scope: $scope //Pass the scope object if you need to access in the template
            }).then(
                function(value) {
                    //save the contact form
                },
                function(value) {
                    //Cancel or do nothing
                }
            );
        };
    });*/

// CONTACTUS PAGE =================================

app.controller("contactFormContactus", function($scope, $http){
 $scope.insert = {};
 $scope.insertData = function(isValid){
     if(!isValid) return false;
	formRequest($http, "api/insert_contactFormContactus.php", $scope.insert, 
		function showGenericError(error) {
			$scope.errorMessage = error;
		},
		function showError(error) {
			$scope.errorUsername = error.user_name;
			$scope.errorCompanyname = error.company_name;
			$scope.errorEmail = error.email;
			$scope.errorPhone = error.phone;
            $scope.errorMessage = error.message;
			$scope.successInsert = null;
		},
		function showSuccess(message) {
			$scope.insert = null;
			$scope.errorUsername = null;
			$scope.errorCompanyname = null;
			$scope.errorEmail = null;
			$scope.errorPhone = null;
            $scope.errorMessage = null;
			$scope.successInsert = message;
		})
 };
});

// JOBS PAGE =================================

app.controller("contactFormJobs", function($scope, $http, $q){
	$scope.insert = {};
	$scope.insertData = function(isValid){
		if(!isValid || !$scope.fileToUpload) {
			return false;
		}
		
		var inAppEngine = true;
		var promise = null;
		if(inAppEngine) {
			promise = $http({
				method:"POST",
				url: "api/upload-file.php"
			})
		}
		else {
			promise = $q(function(resolve) {
				resolve({
					data: "api/insert_contactFormJobs.php"
				})
			})
		}
		return promise.then(function(urlresponse){
		      var url = urlresponse.data;
		      var fd = new FormData();
		      fd.append('filecv', $scope.fileToUpload);
		      fd.append('user_name', $scope.insert.user_name);
		      fd.append('email', $scope.insert.email);
		      return $http.post(url, fd, { headers: {"Content-Type": undefined}})
		      .then(function(response){
			handleFormResult(response.data,
				function(err) {
					$scope.errorMessage = error;
				},
				function(err){
					console.info("show field errors");
                    $scope.errorUsername = error.user_name;
                    $scope.errorEmail = error.email;
				},
				function(message) {
					$scope.insert = null;
                    $scope.errorUsername = null;
                    $scope.errorEmail = null;
                    $scope.errorFilecv = null;
                    $scope.fileToUpload = null;
                    $scope.errorMessage = null;
					$scope.successInsert = message;
				}
			);
			$scope.$applyAsync();
			 

		      })
		})
		.catch(function(response){
			$scope.errorMessage = "Server error. Please try again later.";
		})
	};
});
