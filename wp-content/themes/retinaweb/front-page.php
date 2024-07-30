<?php
get_header();
if (!is_user_logged_in()) {
	registerdb($_SERVER['REMOTE_ADDR'], $_SERVER['REDIRECT_URL']);
} else {
	registerdb2(wp_get_current_user()->user_login, $_SERVER['REMOTE_ADDR'], $_SERVER['REDIRECT_URL']);
}
?>
<div class="modal fade" id="basicModal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title azul">Solicitar E-Book Gratuitamente</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<?php echo do_shortcode('[contact-form-7 id="e5876c9" title="Formulário de contato"]'); ?>
			</div>
		</div>
	</div>
</div>

<!-- ======= Hero Section ======= -->
<section id="hero" style="background: url('<?php echo get_option('portal_input_2'); ?>') top center no-repeat fixed;" class="d-flex align-items-center">
	<div class="container" data-aos="zoom-out" data-aos-delay="100">
		<div class="row">
			<div class="col-lg-6">
				<div class="box">
					<h1 class="branco">MARKETING&emsp;DIGITAL<BR><span class="vazado">&nbsp;PARA</span>&ensp;<span class="rosa">MÉD&ensp;<i class="ri-add-line branco"></i>COS</span></h1>
				</div>
				<?php echo get_option('portal_input_3'); ?><br>
				<button type="button" class="btn-get-started" data-bs-toggle="modal" data-bs-target="#basicModal">Baixe Gratuitamente o E-Book</button>
			</div>
			<div class="col-lg-6"></div>
		</div>
	</div>
</section><!-- End Hero -->
<main id="main">

	<section id="about" class="section about">
		<div class="container" data-aos="fade-up" data-aos-delay="100">
			<div class="row">
				<div class="col-lg-6">
					<?php echo get_option('portal_input_5'); ?>
					<button type="button" class="btn-get-started" data-bs-toggle="modal" data-bs-target="#basicModal">Baixe Gratuitamente o E-Book</button>
				</div>
				<div class="col-lg-6">
					<img src="<?php echo get_option('portal_input_4'); ?>" class="img-fluid sobre" alt="">
				</div>
			</div>
		</div>
	</section><!-- /Sobre Section -->

	<!-- ======= Advantages Section ======= -->
	<section id="advantages" class="advantages">
		<div class="container" data-aos="fade-up">
			<div class="section-title-center">
				<h1 class="azul center">Vantagens do Marketing Digital para Médicos</h1>
			</div>
			<br>
			<div class="advantages-slider swiper" data-aos="fade-up" data-aos-delay="100">
				<div class="swiper-wrapper">
					<?php
					$args = array(
						'post_type' => 'vantagem',
						'posts_per_page' => 10
					);
					$loop = new WP_Query($args);
					foreach ($loop->posts as $post) {
					?>
						<div class="swiper-slide">
							<div class="advantage-wrap">
								<div class="advantage-item">
									<img src="<?php the_post_thumbnail_url('full'); ?>" title="<?php echo get_the_title() ?>" class="advantage-img" alt="">
									<h3 class="azul"><?php echo get_the_title() ?></h3>
									<h4><?php echo get_post_meta($post->ID, 'vantagem_resumo', true); ?></h4>

									<p>
										<i class="bx bxs-quote-alt-left quote-icon-left"></i>
										Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
										<i class="bx bxs-quote-alt-right quote-icon-right"></i>
									</p>
								</div>
							</div>
						</div><!-- End advantage item -->
					<?php
					}
					wp_reset_postdata();
					?>
				</div>
				<div class="swiper-pagination"></div>
			</div>
		</div>
	</section><!-- End advantages Section -->

	<section id="know" class="section about">
		<div class="container" data-aos="fade-up" data-aos-delay="100">
			<div class="row">
				<div class="col-lg-6">
					<img src="<?php echo get_option('portal_input_6'); ?>" class="img-fluid conheca" alt="">
				</div>
				<div class="col-lg-6">
					<?php echo get_option('portal_input_7'); ?>
					<a href="https://api.whatsapp.com/send?phone=5519995200771&text=Contato" target="_blank" class="btn-get-started scrollto elem-center">Fale Conosco</a>
				</div>
			</div>
		</div>
	</section><!-- /Conheca Section -->

	<!-- Testimonials Section -->
	<section id="testimonials" class="testimonials section">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-5 info" data-aos="fade-up" data-aos-delay="100">
					<?php echo get_option('portal_input_8'); ?>
				</div>
				<div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">
					<div class="box-rosa"></div>
					<div class="swiper init-swiper">
						<script type="application/json" class="swiper-config">
							{
								"loop": true,
								"speed": 600,
								"autoplay": {
									"delay": 5000
								},
								"slidesPerView": "auto",
								"pagination": {
									"el": ".swiper-pagination",
									"type": "bullets",
									"clickable": true
								}
							}
						</script>
						<div class="swiper-wrapper">
							<?php
							$args = array(
								'post_type' => 'depoimento',
								'posts_per_page' => 10
							);
							$loop = new WP_Query($args);
							foreach ($loop->posts as $post) {
							?>
								<div class="swiper-slide">
									<div class="testimonial-item">
										<div class="d-flex">
											<img src="<?php the_post_thumbnail_url('full'); ?>" title="<?php echo get_the_title() ?>" class="testimonial-img flex-shrink-0" alt="">
											<div>
												<h3 class="azul"><?php echo get_the_title() ?></h3>
												<h4><?php echo get_post_meta($post->ID, 'depoimento_resumo', true); ?></h4>
												<div class="stars">
													<i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
												</div>
											</div>
										</div>
										<p>
											<i class="bi bi-quote quote-icon-left"></i>
											<span><?php echo get_post_meta($post->ID, 'depoimento_descricao', true); ?></span>
											<i class="bi bi-quote quote-icon-right"></i>
										</p>
									</div>
								</div><!-- End testimonial item -->
							<?php
							}
							wp_reset_postdata();
							?>
						</div>
						<div class="swiper-pagination"></div>
					</div>
				</div>
			</div>
			<br><br>
			<a href="https://api.whatsapp.com/send?phone=5519995200771&text=Contato" target="_blank" class="btn-get-started scrollto elem-center">Fale Conosco</a>
		</div>
	</section><!-- /Testimonials Section -->


</main><!-- End #main -->
<br><br>
<?php get_footer(); ?>