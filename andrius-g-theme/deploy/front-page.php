<?php get_header(); ?>

<main>
    <!-- Hero with Huly.io Beam Effect -->
    <section class="relative min-h-[140vh] flex flex-col items-center justify-start px-4 sm:px-6 overflow-hidden pt-32" style="background: #000;">
        <!-- Huly.io Style Wide Beam Effect -->
        <div class="hero-beam-container">
            <div class="beam-ambient"></div>
            <div class="beam-warm"></div>
            <div class="beam-glow"></div>
            <div class="beam-core"></div>
            <div class="beam-flare"></div>
            <div class="beam-line"></div>
            <div class="beam-particles"></div>
            <div class="beam-particles-2"></div>
        </div>

        <!-- Text Content -->
        <div class="relative z-10 container mx-auto text-center space-y-6 mb-16 mt-[20vh]">
            <div class="space-y-4">
                <h2 class="text-xs font-black tracking-[0.3em] text-cyan-400 uppercase">Good ideas for everyone</h2>
                <h1 class="text-5xl xs:text-6xl sm:text-7xl lg:text-8xl font-black tracking-tighter text-white leading-none">ANDRIUS G</h1>
            </div>
            <div class="space-y-4 px-2 pt-4">
                <p class="text-lg sm:text-xl text-slate-400 max-w-2xl mx-auto font-medium leading-relaxed">IT enthusiast creating solutions for everyone.</p>
            </div>
            <div class="pt-6">
                <a href="#expertise" class="glow-button">
                    <span class="glow-button-shimmer"></span>
                    <span class="relative z-10 flex items-center gap-2">
                        See in Action
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </span>
                </a>
            </div>
        </div>

        <!-- Project Screenshot (like Huly.io) -->
        <div class="relative z-10 w-full max-w-5xl mx-auto px-4 mt-8">
            <div class="relative">
                <div class="relative rounded-2xl overflow-hidden shadow-2xl" style="box-shadow: 0 0 40px 10px rgba(0,180,255,0.15), 0 0 80px 25px rgba(0,150,200,0.08), 0 25px 50px -12px rgba(0,0,0,0.9);">
                    <div class="absolute inset-0 rounded-2xl border border-white/15" style="box-shadow: inset 0 1px 1px rgba(255,255,255,0.2);"></div>
                    <img src="<?php echo get_template_directory_uri(); ?>/mian_project.png" alt="Project Screenshot" class="w-full h-auto relative z-10">
                    <div class="absolute top-0 left-0 right-0 h-20 bg-gradient-to-b from-white/8 via-white/3 to-transparent pointer-events-none z-20"></div>
                    <div class="absolute top-0 left-0 w-12 h-full bg-gradient-to-r from-orange-400/5 to-transparent pointer-events-none z-20"></div>
                    <div class="absolute top-0 right-0 w-12 h-full bg-gradient-to-l from-blue-400/5 to-transparent pointer-events-none z-20"></div>
                    <div class="absolute bottom-0 left-0 right-0 h-48 bg-gradient-to-t from-black via-black/70 to-transparent pointer-events-none z-20"></div>
                </div>
                <div class="absolute -bottom-10 left-1/2 -translate-x-1/2 w-[80%] h-[80px] bg-gradient-to-t from-cyan-500/5 to-transparent blur-[20px]"></div>
            </div>
        </div>
    </section>

    <!-- Expertise Section -->
    <section id="expertise" class="py-24 px-6 bg-slate-950 relative z-10">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="expertise-section-title text-4xl sm:text-5xl font-black text-white mb-4 tracking-tight uppercase italic">My Expertise</h2>
                <div class="expertise-divider w-16 h-1.5 bg-cyan-500 mx-auto rounded-full"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Web Development Card -->
                <div class="expertise-card">
                    <div class="expertise-card-inner">
                        <div class="expertise-icon">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-white">Web Development</h3>
                        <p class="text-slate-300 text-sm leading-relaxed">Responsive, high-performance websites built with modern technologies.</p>
                    </div>
                </div>
                <!-- Education Tech Card -->
                <div class="expertise-card">
                    <div class="expertise-card-inner">
                        <div class="expertise-icon">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-white">Education Tech</h3>
                        <p class="text-slate-300 text-sm leading-relaxed">Designing tools and platforms that empower children to learn effectively.</p>
                    </div>
                </div>
                <!-- UI/UX Design Card -->
                <div class="expertise-card">
                    <div class="expertise-card-inner">
                        <div class="expertise-icon">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-white">UI/UX Design</h3>
                        <p class="text-slate-300 text-sm leading-relaxed">Creating intuitive and visually stunning interfaces for all users.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Projects Block (Showcase) -->
    <section class="py-24 px-6 bg-slate-100">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-6">
                <h2 class="text-4xl sm:text-6xl font-black text-slate-900 mb-6 tracking-tight">Selected Projects</h2>
                <p class="text-lg text-slate-600 max-w-2xl mx-auto">Innovative solutions designed to make learning engaging and effective for children.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-16">
                <?php
                $featured_products = new WP_Query( array(
                    'post_type' => 'product',
                    'posts_per_page' => 3,
                    'orderby' => 'date',
                    'order' => 'DESC',
                ) );
                if ( $featured_products->have_posts() ) :
                    $counter = 0;
                    while ( $featured_products->have_posts() ) : $featured_products->the_post();
                        if ($counter == 0) {
                            echo '<div class="group cursor-pointer md:col-span-2 md:row-span-2">';
                            echo '<a href="' . get_permalink() . '">';
                            echo '<div class="project-card aspect-[16/10] shadow-2xl shadow-slate-900/20 h-full">';
                            echo '<div class="project-card-inner flex items-center justify-center text-3xl sm:text-5xl font-black text-slate-500 relative overflow-hidden">';
                            the_post_thumbnail('large');
                            echo '</div></div></a></div>';
                        } else {
                            echo '<div class="group cursor-pointer">';
                            echo '<a href="' . get_permalink() . '">';
                            echo '<div class="project-card aspect-[4/3] shadow-2xl shadow-slate-900/20">';
                            echo '<div class="project-card-inner flex items-center justify-center text-2xl sm:text-3xl font-black text-slate-500 relative overflow-hidden">';
                            the_post_thumbnail('medium');
                            echo '</div></div>';
                            echo '<h3 class="mt-4 text-lg sm:text-xl font-bold px-2 text-slate-900 group-hover:text-cyan-600 transition-colors">' . get_the_title() . '</h3>';
                            echo '<p class="mt-1 text-slate-600 px-2 text-xs">' . get_the_excerpt() . '</p>';
                            echo '</a></div>';
                        }
                        $counter++;
                    endwhile;
                endif;
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </section>

    <!-- Contact Block (Home) -->
    <section class="py-24 px-6 bg-slate-950 pb-32">
        <div class="contact-container max-w-5xl mx-auto shadow-2xl flex flex-col md:flex-row">
            <div class="contact-inner md:w-1/2 p-10 sm:p-16 text-white space-y-10">
                <h3 class="text-4xl sm:text-6xl font-black leading-tight tracking-tighter">Let's work <br><span class="text-cyan-400">together</span>.</h3>
                <div class="space-y-6">
                    <a href="mailto:andrius.godeliauskas@gmail.com" class="contact-link">
                        <div class="contact-icon"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg></div>
                        <span class="contact-text text-sm sm:text-xl font-bold break-all">andrius.godeliauskas@gmail.com</span>
                    </a>
                    <a href="tel:+37060127050" class="contact-link">
                        <div class="contact-icon"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg></div>
                        <span class="contact-text text-xl font-bold">+370 601 27050</span>
                    </a>
                </div>
            </div>
            <div class="contact-decoration contact-inner md:w-1/2 flex items-center justify-center p-10 sm:p-16">
                <div class="text-center space-y-4">
                    <div class="contact-icon-large"><svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg></div>
                    <p class="text-white font-black text-base italic uppercase">I respond within 24 hours.</p>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
