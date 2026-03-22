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
                <section class="max-w-4xl mx-auto text-center">
                    <div class="inline-block p-3 rounded-full bg-[#11d411]/10 text-[#11d411] mb-6">
                        <span class="material-symbols-outlined text-3xl">auto_stories</span>
                    </div>
                    <h2 class="text-3xl lg:text-4xl font-black text-[#1a3d1a] dark:text-slate-100 mb-8">
                        <?php esc_html_e('Product Details', 'woocommerce'); ?>
                    </h2>
                    <div class="prose prose-lg dark:prose-invert mx-auto text-slate-600 dark:text-slate-400 leading-loose">
                        <?php echo wp_kses_post( $content ); ?>
                    </div>
                </section>
            <?php endif; ?>

            <section class="max-w-4xl mx-auto">
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
