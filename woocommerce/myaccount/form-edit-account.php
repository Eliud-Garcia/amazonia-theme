<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 10.5.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Hook - woocommerce_before_edit_account_form.
 *
 * @since 2.6.0
 */
do_action( 'woocommerce_before_edit_account_form' );
?>


<form class="woocommerce-EditAccountForm edit-account max-w-4xl mx-auto" action="" method="post" <?php do_action( 'woocommerce_edit_account_form_tag' ); ?> >

	<?php do_action( 'woocommerce_edit_account_form_start' ); ?>

	<!-- Sección de Información Personal -->
	<div class="mb-12">
		<div class="mb-8 border-b border-primary/10 pb-4">
			<h3 class="text-2xl font-black text-slate-800 dark:text-slate-100 flex items-center gap-3">
				<div class="h-10 w-10 bg-primary/10 rounded-full flex items-center justify-center text-primary">
					<span class="material-symbols-outlined">person</span>
				</div>
				Información Personal
			</h3>
			<p class="text-sm text-slate-500 mt-2">Actualiza tus datos básicos y cómo te verán los demás usuarios en tus reseñas.</p>
		</div>

		<div class="space-y-6">
			<!-- Fila 1: Nombres -->
			<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
				<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first m-0 w-full relative group">
					<label for="account_first_name" class="block text-xs uppercase tracking-wider font-bold text-slate-500 mb-2"><?php esc_html_e( 'First name', 'woocommerce' ); ?>&nbsp;<span class="required text-primary" aria-hidden="true">*</span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text w-full bg-slate-50 dark:bg-slate-900 border-2 border-transparent focus:bg-white dark:focus:bg-slate-800 focus:border-primary/30 rounded-xl px-4 py-3 outline-none transition-all duration-300 text-slate-800 dark:text-slate-100 shadow-sm hover:shadow" name="account_first_name" id="account_first_name" autocomplete="given-name" value="<?php echo esc_attr( $user->first_name ); ?>" aria-required="true" />
				</p>
				<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last m-0 w-full relative group">
					<label for="account_last_name" class="block text-xs uppercase tracking-wider font-bold text-slate-500 mb-2"><?php esc_html_e( 'Last name', 'woocommerce' ); ?>&nbsp;<span class="required text-primary" aria-hidden="true">*</span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text w-full bg-slate-50 dark:bg-slate-900 border-2 border-transparent focus:bg-white dark:focus:bg-slate-800 focus:border-primary/30 rounded-xl px-4 py-3 outline-none transition-all duration-300 text-slate-800 dark:text-slate-100 shadow-sm hover:shadow" name="account_last_name" id="account_last_name" autocomplete="family-name" value="<?php echo esc_attr( $user->last_name ); ?>" aria-required="true" />
				</p>
			</div>
			
			<!-- Fila 2: Display Name y Email -->
			<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide m-0 w-full">
					<label for="account_display_name" class="block text-xs uppercase tracking-wider font-bold text-slate-500 mb-2"><?php esc_html_e( 'Display name', 'woocommerce' ); ?>&nbsp;<span class="required text-primary" aria-hidden="true">*</span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text w-full bg-slate-50 dark:bg-slate-900 border-2 border-transparent focus:bg-white dark:focus:bg-slate-800 focus:border-primary/30 rounded-xl px-4 py-3 outline-none transition-all duration-300 text-slate-800 dark:text-slate-100 shadow-sm hover:shadow" name="account_display_name" id="account_display_name" value="<?php echo esc_attr( $user->display_name ); ?>" aria-required="true" /> 
					<span class="block mt-2 text-[11px] text-slate-400 italic"><?php esc_html_e( 'This will be how your name will be displayed in the account section and in reviews', 'woocommerce' ); ?></span>
				</p>
				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide m-0 w-full">
					<label for="account_email" class="block text-xs uppercase tracking-wider font-bold text-slate-500 mb-2"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="required text-primary" aria-hidden="true">*</span></label>
					<input type="email" class="woocommerce-Input woocommerce-Input--email input-text w-full bg-slate-50 dark:bg-slate-900 border-2 border-transparent focus:bg-white dark:focus:bg-slate-800 focus:border-primary/30 rounded-xl px-4 py-3 outline-none transition-all duration-300 text-slate-800 dark:text-slate-100 shadow-sm hover:shadow" name="account_email" id="account_email" autocomplete="email" value="<?php echo esc_attr( $user->user_email ); ?>" aria-required="true" />
				</p>
			</div>
		</div>
	</div>

	<?php
		/**
		 * Hook where additional fields should be rendered.
		 *
		 * @since 8.7.0
		 */
		do_action( 'woocommerce_edit_account_form_fields' );
	?>

	<!-- Sección de Seguridad -->
	<fieldset class="mb-12 bg-white dark:bg-slate-800/80 rounded-3xl p-6 md:p-10 border border-slate-200 dark:border-slate-700 relative overflow-hidden shadow-lg shadow-slate-200/50 dark:shadow-none">
		<!-- Decoración de fondo -->
		<div class="absolute -top-20 -right-20 w-64 h-64 bg-primary/10 rounded-full blur-3xl pointer-events-none"></div>

		<div class="mb-8 relative z-10">
			<legend class="text-2xl font-black text-slate-800 dark:text-slate-100 flex items-center gap-3 m-0 p-0">
				<div class="h-10 w-10 bg-primary/10 rounded-full flex items-center justify-center text-primary">
					<span class="material-symbols-outlined">shield_lock</span>
				</div>
				<?php esc_html_e( 'Password change', 'woocommerce' ); ?>
			</legend>
			<p class="text-sm text-slate-500 mt-2 ml-14">Asegúrate de usar una contraseña larga y única para proteger tu cuenta.</p>
		</div>

		<div class="space-y-6 relative z-10 pl-0 md:pl-14">
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide m-0">
				<label for="password_current" class="block text-xs uppercase tracking-wider font-bold text-slate-500 mb-2"><?php esc_html_e( 'Current password (leave blank to leave unchanged)', 'woocommerce' ); ?></label>
				<input type="password" class="woocommerce-Input woocommerce-Input--password input-text w-full md:w-3/4 bg-slate-50 dark:bg-slate-900 border-2 border-transparent focus:bg-white dark:focus:bg-slate-800 focus:border-primary/30 rounded-xl px-4 py-3 outline-none transition-all duration-300 shadow-sm hover:shadow" name="password_current" id="password_current" autocomplete="current-password" />
			</p>
			
			<div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-slate-100 dark:border-slate-700">
				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide m-0">
					<label for="password_1" class="block text-xs uppercase tracking-wider font-bold text-slate-500 mb-2"><?php esc_html_e( 'New password (leave blank to leave unchanged)', 'woocommerce' ); ?></label>
					<input type="password" class="woocommerce-Input woocommerce-Input--password input-text w-full bg-slate-50 dark:bg-slate-900 border-2 border-transparent focus:bg-white dark:focus:bg-slate-800 focus:border-primary/30 rounded-xl px-4 py-3 outline-none transition-all duration-300 shadow-sm hover:shadow" name="password_1" id="password_1" autocomplete="new-password" />
				</p>
				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide m-0">
					<label for="password_2" class="block text-xs uppercase tracking-wider font-bold text-slate-500 mb-2"><?php esc_html_e( 'Confirm new password', 'woocommerce' ); ?></label>
					<input type="password" class="woocommerce-Input woocommerce-Input--password input-text w-full bg-slate-50 dark:bg-slate-900 border-2 border-transparent focus:bg-white dark:focus:bg-slate-800 focus:border-primary/30 rounded-xl px-4 py-3 outline-none transition-all duration-300 shadow-sm hover:shadow" name="password_2" id="password_2" autocomplete="new-password" />
				</p>
			</div>
		</div>
	</fieldset>

	<?php
		/**
		 * My Account edit account form.
		 *
		 * @since 2.6.0
		 */
		do_action( 'woocommerce_edit_account_form' );
	?>

	<div class="mt-8 pt-6 border-t border-slate-100 dark:border-slate-800 flex flex-col sm:flex-row items-center justify-between gap-4">
		<p class="text-xs text-slate-400">Revisa que todos tus datos estén correctos antes de guardar.</p>
		<p class="m-0 w-full sm:w-auto">
			<?php wp_nonce_field( 'save_account_details', 'save-account-details-nonce' ); ?>
			<button type="submit" class="woocommerce-Button button bg-[#d35400] hover:bg-[#a64200] text-white font-black py-4 px-10 rounded-full shadow-lg shadow-[#d35400]/20 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-3 w-full sm:w-auto <?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>">
				<?php esc_html_e( 'Save changes', 'woocommerce' ); ?>
				<span class="material-symbols-outlined text-[20px]">arrow_forward</span>
			</button>
			<input type="hidden" name="action" value="save_account_details" />
		</p>
	</div>

	<?php do_action( 'woocommerce_edit_account_form_end' ); ?>
</form>

<?php do_action( 'woocommerce_after_edit_account_form' ); ?>
