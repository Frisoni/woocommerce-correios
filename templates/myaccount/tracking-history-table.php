<?php
/**
 * Tracking history table.
 *
 * @author  Claudio_Sanches
 * @package WooCommerce_Correios/Templates
 * @version 2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<h2><?php _e( 'Delivery History', 'woocommerce-correios' ); ?></h2>

<table class="shop_table shop_table_responsive">
	<tr>
		<th><?php _e( 'Date', 'woocommerce-correios' ); ?></th>
		<th><?php _e( 'Location', 'woocommerce-correios' ); ?></th>
		<th><?php _e( 'Status', 'woocommerce-correios' ); ?></th>
	</tr>

	<?php foreach ( $events as $event ): ?>
		<tr>
			<td><?php echo esc_html( $event->data . ' ' . $event->hora ); ?></td>
			<td>
				<?php echo esc_html( $event->local . ' - ' . $event->cidade . '/' . $event->uf ); ?>

				<?php if ( isset( $event->destino ) ) : ?>
					<br />
					<?php printf( __( 'In transit to %s', 'woocommerce-correios' ), esc_html( $event->destino->local . ' - ' . $event->destino->cidade . '/' . $event->destino->uf ) ); ?>
				<?php endif; ?>
			</td>
			<td>
				<?php echo esc_html( $event->descricao ); ?>
			</td>
		</tr>
	<?php endforeach ?>
</table>