<?php
$text = Atomlab::setting( 'top_bar_style_01_text' );
?>
<div class="page-top-bar top-bar-01">
	<div class="container-fluid">
		<div class="row row-xs-center">
			<div class="col-md-6">
				<div class="top-bar-wrap top-bar-left">
					<?php echo '<div class="top-bar-text">' . $text . '</div>' ?>
				</div>
			</div>
			<div class="col-md-6">
				<div class="top-bar-wrap top-bar-right">

					<?php Atomlab_Templates::top_bar_info( '01' ); ?>

					<?php Atomlab_Templates::top_bar_button( '01' ); ?>

				</div>
			</div>
		</div>
	</div>
</div>
