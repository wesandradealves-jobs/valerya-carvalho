var website = angular.module('website', ['ngRoute']);

/*
 * Controllers
 */

 website.controller('parentController', function($scope, $route) {
 	$scope.$on('$routeChangeSuccess', function(newValue, oldValue) {
 		if ( newValue !== oldValue ) {
 			$scope.bodyClass = $route.current.viewClass;
 		}
 	});
 });

 website.controller('home', function ($scope, $location) {});
 website.controller('metodologia', function ($scope, $location) {});

 website.config(function($routeProvider, $locationProvider) {
 	$routeProvider.
 	when("/", {templateUrl: "templates/home.php", title: 'Home', controller: "parentController", viewClass:  'pg-home'}).
 	when("/home", {templateUrl: "templates/home.php", title: 'Home', controller: "parentController", viewClass:  'pg-home'}).
 	when("/metodologia", {templateUrl: "templates/metodologia.php", title: 'Metodologia', controller: "parentController", viewClass:  'pg-interna pg-metodologia'}).
 	when("/implementacao", {templateUrl: "templates/implementacao.php", title: 'Como implementar a prática de gestão de Valerya Carvalho', controller: "parentController", viewClass:  'pg-interna pg-implementacao'}).
 	when("/quem-e-valerya", {templateUrl: "templates/quem-e-valerya.php", title: 'Valerya Carvalho Inovação em Gestão', controller: "parentController", viewClass:  'pg-interna pg-quem-e-valerya'}).
 	when("/cursos-e-palestras", {templateUrl: "templates/cursos-e-palestras.php", title: 'Atuação com workshops e treinamentos de desenvolvimento', controller: "parentController", viewClass:  'pg-interna pg-cursos-e-palestras'}).
 	when("/coaching-e-mentoria", {templateUrl: "templates/coaching-e-mentoria.php", title: 'Coaching e Mentoria', controller: "parentController", viewClass:  'pg-interna pg-coaching-e-mentoria'}).
 	when("/consultoria", {templateUrl: "templates/consultoria.php", title: 'Consultoria', controller: "parentController", viewClass:  'pg-interna pg-consultoria'}).
 	when("/fale-conosco", {templateUrl: "templates/fale-conosco.php", title: 'Contato', controller: "parentController", viewClass:  'pg-interna pg-contato'}).
 	otherwise({redirectTo:'/'})
 	$locationProvider.html5Mode(true);
 });
 website.run(function($rootScope) {
 	$rootScope.$on("$routeChangeSuccess", function(event, currentRoute, previousRoute) {
 		$rootScope.title = currentRoute.title;
 	}); 
 });
 website.controller('nav', function($scope, $location) {
 	$(document).mouseup(function (e){
 		var container = $("header");

		if (!container.is(e.target) // if the target of the click isn't the container...
		&& container.has(e.target).length === 0) // ... nor a descendant of the container
		{
			$(".on").removeClass("on");
		}
	});
 	$(window).resize(function(){
 		$(".on").removeClass("on");
 	});	
 	$("#header .wrap .nav > :last-child span").click(function(){
 		if ($(window).width() <= 910) {
 			$(this).toggleClass("on");
 			$("#mobileNav").toggleClass("on");
 		}
 	});
 	$("#mobileNav a").click(function(){
 		if ($(window).width() <= 910) {
 			$(".on").removeClass("on");
 		}
 	});
	// Find all YouTube videos
	var $allVideos = $("iframe[src^='//player.vimeo.com'], iframe[src^='//www.youtube.com']"),

	    // The element that is fluid width
	    $fluidEl = $("body");

	// Figure out and save aspect ratio for each video
	$allVideos.each(function() {

	  $(this)
	    .data('aspectRatio', this.height / this.width)

	    // and remove the hard coded width/height
	    .removeAttr('height')
	    .removeAttr('width');

	});

	// When the window is resized
	$(window).resize(function() {

	  var newWidth = $fluidEl.width();

	  // Resize all videos according to their own aspect ratio
	  $allVideos.each(function() {

	    var $el = $(this);
	    $el
	      .width(newWidth)
	      .height(newWidth * $el.data('aspectRatio'));

	  });

	// Kick off one resize to fix all videos on page load
	}).resize();

 	$scope.isActive = function(viewLocation) {
 		return viewLocation === $location.path();
 	};

 	$scope.classActive = function( viewLocation ) {
 		if( $scope.isActive(viewLocation) ) {
 			return 'active';
 		}
 		else {
 			return '';
 		}
 	}
 });