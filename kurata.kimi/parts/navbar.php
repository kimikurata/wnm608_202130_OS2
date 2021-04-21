	<script>
		const makeNavLogo = (classes =' ', logoUrl=' ') => {
			

			document.write(`
				<div class="${classes}" style="position: fixed; z-index: 11; width:100%;">
					<nav class=" container display-flex display-flex-wrap">
						<a class="nav-logo display-inline-block"   href="index.php"><img  class="image-contain" style="display:inline-block; vertical-align: middle;" src="${logoUrl}" alt="image placeholder"></a>
						<div class="flex-stretch"></div>
						<div class="display-flex flex-align-center nav-links-box">
						<ul class="nav display-flex">
							<li><a href="product_list.php">Shopp</a></li>
							<li><a href="about.php">About</a></li>
							<li><a href="admin_home.php">Admin</a></li>
						</ul>
						<a class="cart-link" href="cart.php" style="display:flex;">
						<img  class="nav-icon image-contain" src="images/icon/shopping-cart.svg" alt="image placeholder">
						<div class="cart-number">0</div>
						</a>

						</div>
					</nav>
				</div>
				`);
		}
	</script>
	<header>
			<script>makeNavLogo("navbar","images/suculentina_logo.svg");</script>
	</header>