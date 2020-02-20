export default {
	init() {
		let $self = this;

		if (process.browser) {
			window.addEventListener('scroll', $self.initServicesAnimations());
		}

		$self.initServicesAnimations();
	},
	initServicesAnimations() {
		let windowHeight = document.documentElement.offsetHeight,
			servicesScreen1 = document.getElementById('servicesItem1').offsetHeight - windowHeight;

		console.log(windowHeight);
		console.log(document.scrollY);

		if (window.scrollY >= servicesScreen1) {
			if (!$('#servicesItem1').hasClass('anim')) {
				$('#servicesItem1').addClass('anim');
			}
		}
	},
};
