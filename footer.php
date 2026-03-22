    </div><!-- #content -->

    <footer class="bg-forest-green text-white py-20 mt-20">
        <div class="max-w-7xl mx-auto px-6 lg:px-20 grid grid-cols-1 md:grid-cols-4 gap-12">
            <div class="col-span-1 md:col-span-2">
                <div class="flex items-center gap-3 mb-8">
                    <span class="material-symbols-outlined text-primary text-4xl">eco</span>
                    <h2 class="text-2xl font-black tracking-tight uppercase"><?php bloginfo('name'); ?></h2>
                </div>
                <p class="text-slate-400 max-w-md leading-relaxed mb-8">
                    Conectamos la sabiduría ancestral de las comunidades amazónicas con el bienestar global a través de productos biológicos de impacto positivo.
                </p>
                <div class="flex gap-4">
                    <a class="size-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-primary transition-colors" href="#">
                        <span class="material-symbols-outlined text-sm">public</span>
                    </a>
                    <a class="size-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-primary transition-colors" href="#">
                        <span class="material-symbols-outlined text-sm">mail</span>
                    </a>
                </div>
            </div>
            <div>
                <h6 class="font-bold mb-6 uppercase text-xs tracking-widest text-primary">Quick Links</h6>
                <ul class="space-y-4 text-slate-400 text-sm">
                    <li><a class="hover:text-white transition-colors" href="#">About Us</a></li>
                    <li><a class="hover:text-white transition-colors" href="#">Sustainability Reports</a></li>
                    <li><a class="hover:text-white transition-colors" href="#">Wholesale</a></li>
                    <li><a class="hover:text-white transition-colors" href="#">Shipping Policy</a></li>
                </ul>
            </div>
            <div>
                <h6 class="font-bold mb-6 uppercase text-xs tracking-widest text-primary">Newsletter</h6>
                <p class="text-xs text-slate-400 mb-4">Recibe historias directamente desde la selva.</p>
                <div class="flex">
                    <input class="bg-white/5 border-white/10 rounded-l-full focus:ring-primary focus:border-primary text-sm w-full" placeholder="Email" type="email"/>
                    <button class="bg-primary px-4 rounded-r-full hover:bg-primary/90">
                        <span class="material-symbols-outlined">send</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-6 lg:px-20 mt-20 pt-8 border-t border-white/5 text-center text-xs text-slate-500">
            &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Preserving the heart of the world.
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
