<template>
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-lg-2">
					<input
						type="button"
						id="btnTop"
						value="Back to Top"
						onClick="javascript:document.documentElement.scrollTop=0;"
					/>
				</div>

				<div class="col-sm-12 col-md-12 col-lg-3">
					&copy;&nbsp;2000 - &copy;&nbsp;{{ copyright }}&nbsp;Slycoder.com
				</div>
				<div class="col-sm-12 col-md-4 col-lg-2">Westminster,&nbsp;Co.&nbsp;80601</div>
				<div class="col-sm-12 col-md-4 col-lg-2">
					cell:&nbsp;<a href="tel:720-364-8011">(720)&nbsp;364&#8209;8011</a>
				</div>
				<div class="col-sm-12 col-md-4 col-lg-2">
					e&#8209;mail:&nbsp;<a href="mailto:sly@slycoder.com">Sly@SlyCoder.com</a>
				</div>
			</div>
		</div>
	</footer>
</template>

<script>
export default {
	data: function() {
		return {
			copyright: new Date().getFullYear()
		};
	}
};
</script>

<style>
footer {
	background: var(--dark);
	color: var(--light);
	text-align: center;
	padding: 1rem;
}

footer a {
	text-decoration: none;
	color: var(--light);
}
</style>
