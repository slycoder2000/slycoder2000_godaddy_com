<template>
	<div class="col-md-2 d-md-flex ml-md-n3">
		<div class="flex-fill mr-md-n3" id="ServicesBlock">
			Services
			<ul v-if="services.length">
				<li v-for="service in services">{{ service }}</li>
			</ul>
		</div>
	</div>
</template>

<script>
export default {
	props: ['data'], // accepts data for replies
	data: function() {
		return {
			services: [
				'Software Engineering',
				'Web Development',
				'Computer Repair and Upgrades',
				'Video Conversion',
				'Professional Consulting & Tutoring'
			]
		};
	},
	mounted() {
		//console.log('Component mounted.');
		//console.log({{ asset('images/webpic1.jpg') }});
	}
};
</script>

<style>
#ServicesBlock {
	background: var(--dark);
	color: #fff;
	padding: 3rem;
	justify-self: center;
	align-self: stretch;
}
</style>
