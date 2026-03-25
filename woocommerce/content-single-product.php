<?php
/**
 * The template for displaying product content in the single-product.php template
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>

<main class="max-w-7xl mx-auto px-6 lg:px-20 py-10 tracking-normal antialiased">
    <div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
        
        <!-- Hero Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-24">
            <?php do_action( 'woocommerce_before_single_product_summary' ); ?>
            
            <!-- Product Image -->
            <div class="relative group">
                <div class="aspect-square rounded-xl overflow-hidden bg-[#fafaf5] dark:bg-[#1a3d1a]/20">
                    <?php 
                    if ( has_post_thumbnail() ) {
                        the_post_thumbnail( 'full', array( 'class' => 'w-full h-full object-cover' ) );
                    } else {
                        echo sprintf( '<img src="%s" alt="%s" class="w-full h-full object-cover" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
                    }
                    ?>
                </div>
                
                <?php if ( $product->is_on_sale() ) : ?>
                    <div class="absolute top-4 left-4 bg-[#11d411] text-white px-4 py-1 rounded-full text-xs font-bold uppercase tracking-widest">
                        Sale
                    </div>
                <?php endif; ?>
            </div>

            <!-- Product Details -->
            <div class="flex flex-col justify-center">
                
                <?php
                if ( wc_review_ratings_enabled() ) {
                    $rating_count = $product->get_rating_count();
                    $review_count = $product->get_review_count();
                    $average      = $product->get_average_rating();

                    if ( $rating_count > 0 ) : ?>
                        <div class="mb-2 flex items-center gap-2">
                            <div class="flex text-[#11d411]">
                                <?php 
                                    $rating = round($average);
                                    for ($i=0; $i<5; $i++) {
                                        echo '<span class="material-symbols-outlined text-sm">' . ($i < $rating ? 'star' : 'star_border') . '</span>';
                                    }
                                ?>
                            </div>
                            <span class="text-xs font-medium text-slate-400">(<?php echo esc_html( $review_count ); ?> Reviews)</span>
                        </div>
                    <?php endif;
                }
                ?>

                <h1 class="text-4xl lg:text-6xl font-black text-[#1a3d1a] dark:text-slate-100 mb-4 leading-tight">
                    <?php the_title(); ?>
                </h1>

                <div class="text-lg text-slate-600 dark:text-slate-400 mb-8 leading-relaxed">
                    <?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ); ?>
                </div>

                <div class="mb-10 product-price-wrapper">
                    <style>
                        .product-price-wrapper .price {
                            display: flex;
                            align-items: baseline;
                            gap: 1rem;
                        }
                        .product-price-wrapper .price ins {
                            text-decoration: none;
                        }
                        .product-price-wrapper .price ins .amount {
                            font-size: 2.25rem;
                            font-weight: 900;
                            color: #11d411;
                        }
                        .product-price-wrapper .price del .amount {
                            color: #94a3b8;
                            text-decoration: line-through;
                        }
                        .product-price-wrapper .price > .amount {
                            font-size: 2.25rem;
                            font-weight: 900;
                            color: #11d411;
                        }
                    </style>
                    <?php echo $product->get_price_html(); ?>
                </div>

                <?php 
                $attributes = $product->get_attributes();
                if ( ! empty( $attributes ) ) : ?>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-10">
                        <?php 
                        $attr_count = 0;
                        foreach ( $attributes as $attribute ) : 
                            if ( ! $attribute->get_visible() ) continue;
                            if ( $attr_count >= 3 ) break; // Limit to 3 attributes like in layout
                            
                            $name = wc_attribute_label( $attribute->get_name() );
                            $options = $attribute->get_options();
                            
                            if ( $attribute->is_taxonomy() ) {
                                $value = wc_get_product_terms( $product->get_id(), $attribute->get_name(), array( 'fields' => 'names' ) );
                                $value = implode(', ', $value);
                            } else {
                                $value = implode(', ', $options);
                            }
                            ?>
                            <div class="p-4 rounded-xl border border-[#11d411]/10 bg-white dark:bg-[#102210] shadow-sm">
                                <p class="text-[10px] uppercase font-bold text-slate-400 mb-1"><?php echo esc_html( $name ); ?></p>
                                <p class="font-bold text-[#1a3d1a] dark:text-slate-200 truncate"><?php echo esc_html( $value ); ?></p>
                            </div>
                            <?php 
                            $attr_count++;
                        endforeach; ?>
                    </div>
                <?php endif; ?>

                <div class="custom-add-to-cart-wrapper mb-10">
                    <style>
                        .custom-add-to-cart-wrapper form.cart {
                            display: flex;
                            flex-wrap: wrap;
                            gap: 1rem;
                            align-items: center;
                        }
                        .custom-add-to-cart-wrapper .quantity {
                            display: flex;
                            align-items: center;
                        }
                        .custom-add-to-cart-wrapper .quantity input {
                            border-radius: 9999px;
                            border: 2px solid rgba(17, 212, 17, 0.2);
                            padding: 0.75rem 1rem;
                            width: 80px;
                            text-align: center;
                        }
                        .custom-add-to-cart-wrapper button.single_add_to_cart_button {
                            flex: 1;
                            background-color: #11d411;
                            color: white;
                            font-weight: bold;
                            padding: 1rem 2rem;
                            border-radius: 9999px;
                            box-shadow: 0 10px 15px -3px rgba(17, 212, 17, 0.2);
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            gap: 0.5rem;
                            transition: all 0.3s;
                            cursor: pointer;
                            border: none;
                        }
                        .custom-add-to-cart-wrapper button.single_add_to_cart_button:hover {
                            background-color: rgba(17, 212, 17, 0.9);
                        }
                        .custom-add-to-cart-wrapper button.single_add_to_cart_button::before {
                            content: 'shopping_bag';
                            font-family: 'Material Symbols Outlined';
                            font-size: 20px;
                        }
                    </style>
                    <?php woocommerce_template_single_add_to_cart(); ?>
                </div>

                <?php do_action( 'woocommerce_single_product_summary' ); ?>
            </div>
        </div>

        <!-- Storytelling Sections (Content) -->
        <div class="space-y-32 py-10">
            <?php
            $content = get_the_content();
            if ( ! empty( $content ) ) : ?>
                <!-- Product Story Section -->
                <section class="max-w-4xl mx-auto space-y-12">
                    <div class="text-center space-y-4">
                        <h2 class="text-3xl font-black text-slate-900 dark:text-white">The Product Story</h2>
                        <div class="w-24 h-1 bg-[#11d411] mx-auto rounded-full"></div>
                    </div>
                    <div class="prose prose-lg dark:prose-invert mx-auto text-slate-600 dark:text-slate-400 leading-relaxed">
                        <?php echo wp_kses_post( $content ); ?>
                    </div>
                </section>
            <?php endif; ?>

            <!-- Creator Profile Section (Vendor Info) -->
            <?php 
            if ( function_exists( 'wcfm_get_vendor_id_by_post' ) ) :
                $vendor_id = wcfm_get_vendor_id_by_post( $product->get_id() );
                if ( $vendor_id ) :
                    $vendor_name = wcfm_get_vendor_store_name( $vendor_id );
                    $vendor_logo = wcfm_get_vendor_store_logo_by_vendor( $vendor_id );
                    
                    // Fetch vendor info using get_user_meta as a fallback/direct access to WCFM store settings
                    $store_info = get_user_meta( $vendor_id, 'wcfmmp_profile_settings', true );
                    $vendor_address = isset( $store_info['address'] ) ? $store_info['address'] : array();
                    $location = array_filter(array(
                        isset($vendor_address['city']) ? $vendor_address['city'] : '',
                        isset($vendor_address['country']) ? $vendor_address['country'] : ''
                    ));
                    $location_str = !empty($location) ? implode(', ', $location) : 'Amazonas';
                    $shop_desc = isset($store_info['shop_description']) ? wp_strip_all_tags( $store_info['shop_description'] ) : '';
                    $store_url = function_exists('wcfmmp_get_store_url') ? wcfmmp_get_store_url($vendor_id) : get_author_posts_url($vendor_id);
                    
                    if ( ! $vendor_logo ) {
                        $vendor_logo = wc_placeholder_img_src(); // Fallback image
                    }
                    ?>
                    <section class="bg-white dark:bg-slate-900 rounded-[2rem] p-8 lg:p-16 shadow-2xl relative overflow-hidden">
                        <!-- Subtle Decorative Motif -->
                        <div class="absolute top-0 right-0 opacity-10 dark:opacity-5 pointer-events-none">
                            <svg fill="currentColor" height="300" viewBox="0 0 100 100" width="300">
                                <path d="M0 0h20v20H0zM40 0h20v20H40zM80 0h20v20H80zM20 20h20v20H20zM60 20h20v20H60zM0 40h20v20H0zM40 40h20v20H40zM80 40h20v20H80zM20 60h20v20H20zM60 60h20v20H60zM0 80h20v20H0zM40 80h20v20H40zM80 80h20v20H80z"></path>
                            </svg>
                        </div>
                        <div class="flex flex-col lg:flex-row items-center gap-12 relative z-10">
                            <div class="w-64 h-64 flex-shrink-0 rounded-full border-4 border-[#11d411]/20 p-2">
                                <div class="w-full h-full rounded-full overflow-hidden grayscale hover:grayscale-0 transition-all duration-500">
                                    <img class="w-full h-full object-cover" alt="<?php echo esc_attr( $vendor_name ); ?>" src="<?php echo esc_url( $vendor_logo ); ?>"/>
                                </div>
                            </div>
                            <div class="flex-1 text-center lg:text-left space-y-6">
                                <div>
                                    <span class="text-[#11d411] font-bold tracking-widest text-xs uppercase">Master Artisan</span>
                                    <h3 class="text-4xl font-black text-slate-900 dark:text-white mt-2"><?php echo esc_html( $vendor_name ); ?></h3>
                                    <div class="flex items-center justify-center lg:justify-start gap-2 text-slate-500 dark:text-slate-400 mt-2">
                                        <span class="material-symbols-outlined text-sm">location_on</span>
                                        <span><?php echo esc_html( $location_str ); ?></span>
                                    </div>
                                </div>
                                <?php if ( $shop_desc ) : ?>
                                    <p class="text-xl text-slate-600 dark:text-slate-400 italic font-light leading-relaxed">
                                        "<?php echo esc_html( $shop_desc ); ?>"
                                    </p>
                                <?php endif; ?>
                                <div class="pt-4">
                                    <a href="<?php echo esc_url( $store_url ); ?>" class="px-8 py-3 bg-slate-900 dark:bg-white dark:text-slate-900 text-white font-bold rounded-full hover:bg-[#11d411] transition-colors inline-flex items-center gap-2 mx-auto lg:mx-0">
                                        View Community Collection
                                        <span class="material-symbols-outlined">arrow_forward</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php endif; 
            endif; ?>

            <!-- Cultural Importance Section -->
            <section class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center border-t border-slate-200 dark:border-slate-800 pt-20">
                <div class="space-y-8">
                    <div class="inline-flex p-3 rounded-2xl bg-[#11d411]/10 text-[#11d411]">
                        <span class="material-symbols-outlined text-3xl">temple_hindu</span>
                    </div>
                    <h2 class="text-4xl font-black text-slate-900 dark:text-white leading-tight">
                        Preserving Ancestral <br/><span class="text-[#11d411]">Wisdom</span>
                    </h2>
                    <div class="space-y-6 text-slate-600 dark:text-slate-400">
                        <p>
                            In Afro-Amazonian and Indigenous cultures, these objects serve as spiritual anchors.
                        </p>
                        <p>
                            By choosing this product, you are actively participating in the preservation of the language and traditional forest management practices that have kept the Amazon diverse for millennia.
                        </p>
                    </div>
                </div>
                <div class="bg-[#11d411]/5 rounded-[2.5rem] p-4 lg:p-10 border border-[#11d411]/10">
                    <div class="rounded-2xl overflow-hidden aspect-video shadow-lg">
                        <img class="w-full h-full object-cover" alt="Amazon" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA_lRzrkQem4oyVmD_G5i2aCsM8WKKTg5ZYJpRD7JTzleb_715ZJSRzTyiMWa4U0baCbMBtBHLCh30rj_wRQEkxqT0O3PDRAsORoMiTj5yjCBDbU9sTwkxPdP3LuZWRnXpe87dco8PchTJqfSAJtr713_HdLRs-aiq_taRwuNVuwGrKmCHT-90oVtu300qq3FhpxPNC75ofELUO2P_lmvWR_hgM6MlMhDZW1PCnjYvjXAB5IXZoWM_nvAN0w8tUQ9WuSiLDYTMDvR4"/>
                    </div>
                    <div class="mt-8 grid grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <span class="text-2xl font-bold text-slate-900 dark:text-white">Empower</span>
                            <p class="text-xs font-bold text-slate-500 uppercase">Local Artisans</p>
                        </div>
                        <div class="space-y-2">
                            <span class="text-2xl font-bold text-slate-900 dark:text-white">Protect</span>
                            <p class="text-xs font-bold text-slate-500 uppercase">The Rainforest</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="max-w-4xl mx-auto pt-20">
                <?php
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
                ?>
            </section>
        </div>

        <?php do_action( 'woocommerce_after_single_product_summary' ); ?>

    </div>
</main>

<?php do_action( 'woocommerce_after_single_product' ); ?>
