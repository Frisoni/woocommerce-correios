<?php
/**
 * Correios SEDEX Hoje shipping method.
 *
 * @package WooCommerce_Correios/Classes/Shipping
 * @since   3.0.0
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * SEDEX Hoje shipping method class.
 */
class WC_Correios_Shipping_SEDEX_Hoje extends WC_Correios_Shipping {

	/**
	 * Service code.
	 * 40290 - SEDEX Hoje without contract.
	 *
	 * @var string
	 */
	protected $code = '40290';

	/**
	 * Initialize SEDEX Hoje.
	 *
	 * @param int $instance_id Shipping zone instance.
	 */
	public function __construct( $instance_id = 0 ) {
		$this->id           = 'correios-sedex-hoje';
		$this->method_title = __( 'SEDEX Hoje', 'woocommerce-correios' );
		$this->more_link    = 'https://www.correios.com.br/enviar-e-receber/encomendas';

		parent::__construct( $instance_id );
	}

	/**
	 * Get the declared value from the package.
	 *
	 * @param  array $package Cart package.
	 * @return float
	 */
	protected function get_declared_value( $package ) {
		if ( 20.50 >= $package['contents_cost'] ) {
			return 0;
		}

		if ( 3000 < $package['contents_cost'] ) {
			return 3000;
		}

		return $package['contents_cost'];
	}
}
