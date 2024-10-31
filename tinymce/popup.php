<?php

// loads the shortcodes class, wordpress is loaded with it
require_once('shortcodes.class.php');

// Exit if file is accessed by user that's not logged in
if(!is_user_logged_in()) exit("File can't be accessed directly.");

// get popup type
$popup = urlencode( trim( $_GET['popup'] ) );
$shortcode = new ruven_shortcodes( $popup );

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head></head>
<body>
<div id="ruven-popup">

	<div id="ruven-shortcode-wrap">

		<div id="ruven-sc-form-wrap">

			<div id="ruven-sc-form-head">

				<?php echo $shortcode->popup_title; ?>

			</div>
			<!-- /#ruven-sc-form-head -->

			<form method="post" id="ruven-sc-form">

				<table id="ruven-sc-form-table">

					<?php echo $shortcode->output; ?>

					<tbody>
						<tr class="form-row">
							<?php if( ! $shortcode->has_child ) : ?><td class="label">&nbsp;</td><?php endif; ?>
							<td class="field"><a href="#" class="button-primary ruven-insert">Insert Shortcode</a></td>
						</tr>
					</tbody>

				</table>
				<!-- /#ruven-sc-form-table -->

			</form>
			<!-- /#ruven-sc-form -->

		</div>
		<!-- /#ruven-sc-form-wrap -->

		<div class="clear"></div>

	</div>
	<!-- /#ruven-shortcode-wrap -->

</div>
<!-- /#ruven-popup -->

</body>
</html>