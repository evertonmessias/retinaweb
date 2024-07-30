<?php
//Settings *************************************************
function portal_page_html()
{ ?>
	<div class="settings-retinaweb">
		<h1 class="title">Configurações da Página Inicial</h1><br>
		<p>Nessa página você pode configurar tudo que vai aparecer na sua landing page.</p>
		<hr>
		<form method="post" action="options.php">
			<?php settings_fields('portal_option_grupo'); ?>


			<!-- Nome ********************************** -->
			<label>
				<br><h3 class="title">Nome do Site: </h3><input type="text" id="portal_input_0" name="portal_input_0" value="<?php echo get_option('portal_input_0'); ?>" />
			</label>


			<br><br><!-- Logo 1 *************************************** -->
			<hr>
			<?php
			$image1 = get_option('portal_input_1');
			?>
			<br><h3 class="title">Logo Principal:</h3>
			<table>
				<tr>
					<td><a href="#" onclick="upload_image(1);" class="button button-secondary"><?php _e('Upload Image'); ?></a></td>
					<td><input type="text" name="portal_input_1" id="portal_input_1" placeholder="Logo Principal" value="<?php echo $image1; ?>" /></td>
					<td>&emsp;<a href="<?php echo $image1; ?>" target="_blank"><img id="preview_portal_input_1" alt="preview" title="preview" src="<?php echo $image1; ?>" /></a></td>
				</tr>
			</table>
			<span>(Ideal size: 100x80 px)</span>
			
			
			<br><br><!-- Logo 2 *************************************** -->
			<hr>
			<?php
			$image11 = get_option('portal_input_11');
			?>
			<br><h3 class="title">Logo Secundário:</h3>
			<table>
				<tr>
					<td><a href="#" onclick="upload_image(11);" class="button button-secondary"><?php _e('Upload Image'); ?></a></td>
					<td><input type="text" name="portal_input_11" id="portal_input_11" placeholder="Logo Secundário" value="<?php echo $image11; ?>" /></td>
					<td>&emsp;<a href="<?php echo $image11; ?>" target="_blank"><img id="preview_portal_input_11" alt="preview" title="preview" src="<?php echo $image11; ?>" /></a></td>
				</tr>
			</table>
			<span>(Ideal size: 100x80 px)</span>


			<br><br><!-- Slide *************************************** -->
			<hr>
			<?php
			$image2 = get_option('portal_input_2'); ?>
			<br><h3 class="title">Slide:</h3>
			<table>
				<tr>
					<td><a href="#" onclick="upload_image(2);" class="button button-secondary"><?php _e('Upload Image'); ?></a></td>
					<td><input type="text" name="portal_input_2" id="portal_input_2" placeholder="Banner Principal" value="<?php echo $image2; ?>" /></td>
					<td>&emsp;<a href="<?php echo $image2; ?>" target="_blank"><img class="slide" id="preview_portal_input_2" alt="preview" title="preview" src="<?php echo $image2; ?>" /></a></td>
				</tr>
			</table>
			<span>(Ideal size: 1920x1080 px)</span>


			<br><br><!-- Texto do Slide ********************************** -->
			<hr>

			<label>
				<br><h3 class="title">Texto do Slide: </h3>
				<?php
				$portal3 = get_option('portal_input_3'); 
				wp_editor($portal3, 'portal_input_3', array('textarea_name' => 'portal_input_3'));
				?>
				
			</label>

			<br><br><!-- Sobre *************************************** -->
			<hr>
			<?php
			$image4 = get_option('portal_input_4'); ?>
			<br><h3 class="title">Imagem Sobre:</h3>
			<table>
				<tr>
					<td><a href="#" onclick="upload_image(4);" class="button button-secondary"><?php _e('Upload Image'); ?></a></td>
					<td><input type="text" name="portal_input_4" id="portal_input_4" placeholder="Imagem Sobre" value="<?php echo $image4; ?>" /></td>
					<td>&emsp;<a href="<?php echo $image4; ?>" target="_blank"><img class="slide" id="preview_portal_input_4" alt="preview" title="preview" src="<?php echo $image4; ?>" /></a></td>
				</tr>
			</table>
			<span>(Máx size: 1920x1080 px)</span>


			<br><br><!-- Texto Sobre ********************************** -->
			<hr>

			<label>
				<br><h3 class="title">Texto Sobre: </h3>
				<?php
				$portal5 = get_option('portal_input_5'); 
				wp_editor($portal5, 'portal_input_5', array('textarea_name' => 'portal_input_5'));
				?>
				
			</label>

			<br><br><!-- Conheça *************************************** -->
			<hr>
			<?php
			$image6 = get_option('portal_input_6'); ?>
			<br><h3 class="title">Imagem Conheça:</h3>
			<table>
				<tr>
					<td><a href="#" onclick="upload_image(6);" class="button button-secondary"><?php _e('Upload Image'); ?></a></td>
					<td><input type="text" name="portal_input_6" id="portal_input_6" placeholder="Imagem Conheça" value="<?php echo $image6; ?>" /></td>
					<td>&emsp;<a href="<?php echo $image6; ?>" target="_blank"><img class="slide" id="preview_portal_input_6" alt="preview" title="preview" src="<?php echo $image6; ?>" /></a></td>
				</tr>
			</table>
			<span>(Máx size: 1920x1080 px)</span>


			<br><br><!-- Texto Conheça ********************************** -->
			<hr>
			<label>
				<br><h3 class="title">Texto Conheça: </h3>
				<?php
				$portal7 = get_option('portal_input_7'); 
				wp_editor($portal7, 'portal_input_7', array('textarea_name' => 'portal_input_7'));
				?>				
			</label>

			<br><br><!-- Texto Depoimentos ********************************** -->
			<hr>
			<label>
				<br><h3 class="title">Texto Depoimentos: </h3>
				<?php
				$portal8 = get_option('portal_input_8'); 
				wp_editor($portal8, 'portal_input_8', array('textarea_name' => 'portal_input_8'));
				?>				
			</label>
			
			<br><br><!-- *************************************** -->
			<hr>	

			<?php submit_button(); ?>
		</form>
	</div>
<?php
}

function portal_options_page()
{
	add_submenu_page('retinaweb', 'Pagina Inicial', 'Pagina Inicial', 'edit_posts', 'pagina-inicial', 'portal_page_html', 1);
}
add_action('admin_menu', 'portal_options_page');


//************************ DB Fields

function portal_settings0()
{
	add_option('portal_input_0');
	register_setting('portal_option_grupo', 'portal_input_0');
}
add_action('admin_init', 'portal_settings0');

function portal_settings1()
{
	add_option('portal_input_1');
	register_setting('portal_option_grupo', 'portal_input_1');
}
add_action('admin_init', 'portal_settings1');

function portal_settings11()
{
	add_option('portal_input_11');
	register_setting('portal_option_grupo', 'portal_input_11');
}
add_action('admin_init', 'portal_settings11');

function portal_settings2()
{
	add_option('portal_input_2');
	register_setting('portal_option_grupo', 'portal_input_2');
}
add_action('admin_init', 'portal_settings2');

function portal_settings3()
{
	add_option('portal_input_3');
	register_setting('portal_option_grupo', 'portal_input_3');
}
add_action('admin_init', 'portal_settings3');
function portal_settings4()
{
	add_option('portal_input_4');
	register_setting('portal_option_grupo', 'portal_input_4');
}
add_action('admin_init', 'portal_settings4');
function portal_settings5()
{
	add_option('portal_input_5');
	register_setting('portal_option_grupo', 'portal_input_5');
}
add_action('admin_init', 'portal_settings5');
function portal_settings6()
{
	add_option('portal_input_6');
	register_setting('portal_option_grupo', 'portal_input_6');
}
add_action('admin_init', 'portal_settings6');
function portal_settings7()
{
	add_option('portal_input_7');
	register_setting('portal_option_grupo', 'portal_input_7');
}
add_action('admin_init', 'portal_settings7');
function portal_settings8()
{
	add_option('portal_input_8');
	register_setting('portal_option_grupo', 'portal_input_8');
}
add_action('admin_init', 'portal_settings8');