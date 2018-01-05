angular
    .module("app.dollhouse", [])
    .component("dollhouse", {
        templateUrl: "./app/components/dollhouse/dollhouse.template.html"
    })

.directive('slideImageComparison', function($window) {

	function moveOver(divider, resized, container) {
		
		var move = {};

		var divideWidth = divider.prop('offsetWidth'),
			offsetToWindow = container.offset(),
			containerOffsetLeft = offsetToWindow.left,
			containerOffsetTop = offsetToWindow.top,
			containerWidth = container.prop('offsetWidth');

		var moveSlide = function(e) {
			console.info(e);

			var pageX = e.pageX || e.targetTouches[0].pageX;
			var pageY = e.pageY || e.targetTouches[0].pageY;

			move = {
				left: pageX - containerOffsetLeft,
				top: pageY - containerOffsetTop
			};

			moveWidth = (move.left - 1)*100/containerWidth+'%';

			divider.css({
				left: moveWidth
			});
			resized.css({
				width: moveWidth
			});

		}

		// Support desktop + touch
		divider[0].addEventListener('touchmove', moveSlide, false);
		divider[0].addEventListener('mousemove', moveSlide, false);

	}

	return {
		restrict: 'E',
		scope: {
			imageInfo: '=info'
		},
		link: function(scope, elem, attr) {

        	var w = angular.element($window);

        	var container = angular.element(elem[0].querySelector('.slide-comb'));

			// Adjust resize image
			var resized = angular.element(elem[0].querySelector('.resized'));
			var resizedImage = elem[0].querySelector('.resized img');
			angular.element(resizedImage).css({
				width: container.prop('offsetWidth')+'px'
			})

			// Change resized image width on window resize
			w.bind('resize', function () {
				angular.element(resizedImage).css({
					width: container.prop('offsetWidth')+'px'
				})
			});

			// Get divider
			var divider = angular.element(elem[0].querySelector('.divider'));

			// Bind move event
			moveOver(divider, resized, container);

		},
		templateUrl: 'app/templates/dollhouseslider.html'
	};
});

