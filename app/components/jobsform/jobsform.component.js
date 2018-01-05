angular
    .module("app.jobsform", [])
    .component("jobsform", {
        templateUrl: "./app/components/jobsform/jobsform.template.html"
    })
.directive("fileModel",function() {
	return {
		restrict: 'EA',
		scope: {
			setFileData: "&"
		},
		link: function(scope, ele, attrs) {
			ele.on('change', function() {
				scope.$apply(function() {
					var val = ele[0].files[0];
					scope.setFileData({ value: val });
				});
			});
		}
	}
})





