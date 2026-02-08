<?php
/**
 * Front Page Template
 *
 * Displays the portfolio landing page with all 7 sections:
 * Hero, About, Skills, Projects, Vibe Coding, Coffee Support, Contact.
 *
 * @package Andrius_G_Theme
 */

get_header(); ?>

<!-- ==========================================
     SECTION 1: HERO
     ========================================== -->
<section class="ag-hero" id="hero">
  <canvas id="ag-matrix-canvas"></canvas>
  <div class="ag-hero__content">
    <h1 class="ag-hero__name" id="ag-hero-name" data-text="ANDRIUS G"><?php echo esc_html( 'ANDRIUS G' ); ?></h1>
    <p class="ag-hero__tagline"><?php echo esc_html( 'I vibe code things into existence.' ); ?></p>
    <div class="ag-hero__typing">
      <span id="ag-typing-target"></span><span class="ag-hero__typing-cursor">|</span>
    </div>
    <a href="#projects" class="ag-glow-btn" data-magnetic>
      <?php echo esc_html( 'See What I Build' ); ?>
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
    </a>
  </div>
  <div class="ag-hero__scroll">
    <span><?php echo esc_html( 'Scroll' ); ?></span>
    <div class="ag-hero__scroll-chevron">
      <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
    </div>
  </div>
</section>

<!-- ==========================================
     SECTION 2: ABOUT
     ========================================== -->
<section class="ag-section" id="about">
  <p class="ag-section__label ag-reveal"><?php echo esc_html( '// about_me' ); ?></p>
  <h2 class="ag-section__title ag-reveal" data-delay="100"><?php echo esc_html( 'Creative Technologist & Vibe Coder' ); ?></h2>
  <div class="ag-about__grid">
    <div class="ag-reveal" data-delay="200">
      <p class="ag-about__bio">
        <?php echo wp_kses_post( 'I\'m Andrius &mdash; an IT enthusiast who turns ideas into working products. I don\'t just write code, I vibe with it. From web apps to AI automation, from volleyball court bookings to accounting systems &mdash; if it can be built, I\'ll find a way.' ); ?>
      </p>
      <p class="ag-about__quote"><?php echo esc_html( '"Good ideas for everyone."' ); ?></p>
      <div class="ag-about__tags">
        <span class="ag-about__tag"><?php echo esc_html( 'JavaScript' ); ?></span>
        <span class="ag-about__tag"><?php echo esc_html( 'React' ); ?></span>
        <span class="ag-about__tag"><?php echo esc_html( 'Node.js' ); ?></span>
        <span class="ag-about__tag"><?php echo esc_html( 'WordPress' ); ?></span>
        <span class="ag-about__tag"><?php echo esc_html( 'Python' ); ?></span>
        <span class="ag-about__tag"><?php echo esc_html( 'AI/ML' ); ?></span>
        <span class="ag-about__tag"><?php echo esc_html( 'Figma' ); ?></span>
        <span class="ag-about__tag"><?php echo esc_html( 'SQL' ); ?></span>
        <span class="ag-about__tag"><?php echo esc_html( 'Three.js' ); ?></span>
        <span class="ag-about__tag"><?php echo esc_html( 'Blender' ); ?></span>
      </div>
    </div>
    <div class="ag-reveal" data-delay="400">
      <div class="ag-about__frame">
        <div class="ag-about__frame-border"></div>
        <div class="ag-about__frame-inner">
          <span class="ag-about__frame-initials"><?php echo esc_html( 'AG' ); ?></span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ==========================================
     SECTION 3: SKILLS
     ========================================== -->
<section class="ag-section ag-skills" id="skills">
  <p class="ag-section__label ag-reveal"><?php echo esc_html( '// expertise' ); ?></p>
  <h2 class="ag-section__title ag-reveal" data-delay="100"><?php echo esc_html( 'What I Do' ); ?></h2>
  <div class="ag-skills__scroll ag-reveal" data-delay="200">

    <!-- Web Development -->
    <div class="ag-skills__card">
      <div class="ag-skills__card-icon">&#x1F310;</div>
      <h3 class="ag-skills__card-title"><?php echo esc_html( 'Web Development' ); ?></h3>
      <p class="ag-skills__card-desc"><?php echo esc_html( 'Building modern, responsive web experiences with clean code and cutting-edge technologies.' ); ?></p>
      <div class="ag-skills__card-tags">
        <span class="ag-skills__card-tag"><?php echo esc_html( 'HTML/CSS' ); ?></span>
        <span class="ag-skills__card-tag"><?php echo esc_html( 'JavaScript' ); ?></span>
        <span class="ag-skills__card-tag"><?php echo esc_html( 'React' ); ?></span>
        <span class="ag-skills__card-tag"><?php echo esc_html( 'Node.js' ); ?></span>
        <span class="ag-skills__card-tag"><?php echo esc_html( 'WordPress' ); ?></span>
      </div>
    </div>

    <!-- UI/UX Design -->
    <div class="ag-skills__card">
      <div class="ag-skills__card-icon">&#x1F3A8;</div>
      <h3 class="ag-skills__card-title"><?php echo esc_html( 'UI/UX Design' ); ?></h3>
      <p class="ag-skills__card-desc"><?php echo esc_html( 'Crafting intuitive interfaces and user journeys that feel natural and look stunning.' ); ?></p>
      <div class="ag-skills__card-tags">
        <span class="ag-skills__card-tag"><?php echo esc_html( 'Figma' ); ?></span>
        <span class="ag-skills__card-tag"><?php echo esc_html( 'Prototyping' ); ?></span>
        <span class="ag-skills__card-tag"><?php echo esc_html( 'Design Systems' ); ?></span>
      </div>
    </div>

    <!-- AI & Automation -->
    <div class="ag-skills__card">
      <div class="ag-skills__card-icon">&#x1F916;</div>
      <h3 class="ag-skills__card-title"><?php echo esc_html( 'AI & Automation' ); ?></h3>
      <p class="ag-skills__card-desc"><?php echo esc_html( 'Leveraging AI to build smarter solutions that save time and amplify creativity.' ); ?></p>
      <div class="ag-skills__card-tags">
        <span class="ag-skills__card-tag"><?php echo esc_html( 'Claude AI' ); ?></span>
        <span class="ag-skills__card-tag"><?php echo esc_html( 'Prompt Engineering' ); ?></span>
        <span class="ag-skills__card-tag"><?php echo esc_html( 'API Integration' ); ?></span>
        <span class="ag-skills__card-tag"><?php echo esc_html( 'Python' ); ?></span>
      </div>
    </div>

    <!-- Data & Analytics -->
    <div class="ag-skills__card">
      <div class="ag-skills__card-icon">&#x1F4CA;</div>
      <h3 class="ag-skills__card-title"><?php echo esc_html( 'Data & Analytics' ); ?></h3>
      <p class="ag-skills__card-desc"><?php echo esc_html( 'Turning data into actionable insights with powerful dashboards and queries.' ); ?></p>
      <div class="ag-skills__card-tags">
        <span class="ag-skills__card-tag"><?php echo esc_html( 'SQL' ); ?></span>
        <span class="ag-skills__card-tag"><?php echo esc_html( 'ClickHouse' ); ?></span>
        <span class="ag-skills__card-tag"><?php echo esc_html( 'Dashboard Design' ); ?></span>
        <span class="ag-skills__card-tag"><?php echo esc_html( 'Python' ); ?></span>
      </div>
    </div>

    <!-- 3D & Interactive -->
    <div class="ag-skills__card">
      <div class="ag-skills__card-icon">&#x1F3AE;</div>
      <h3 class="ag-skills__card-title"><?php echo esc_html( '3D & Interactive' ); ?></h3>
      <p class="ag-skills__card-desc"><?php echo esc_html( 'Creating immersive digital experiences that push the boundaries of the web.' ); ?></p>
      <div class="ag-skills__card-tags">
        <span class="ag-skills__card-tag"><?php echo esc_html( 'Three.js' ); ?></span>
        <span class="ag-skills__card-tag"><?php echo esc_html( 'Blender' ); ?></span>
        <span class="ag-skills__card-tag"><?php echo esc_html( 'Unity' ); ?></span>
        <span class="ag-skills__card-tag"><?php echo esc_html( 'WebGL' ); ?></span>
      </div>
    </div>

    <!-- EdTech -->
    <div class="ag-skills__card">
      <div class="ag-skills__card-icon">&#x1F4DA;</div>
      <h3 class="ag-skills__card-title"><?php echo esc_html( 'EdTech' ); ?></h3>
      <p class="ag-skills__card-desc"><?php echo esc_html( 'Making learning fun and accessible with interactive educational tools and games.' ); ?></p>
      <div class="ag-skills__card-tags">
        <span class="ag-skills__card-tag"><?php echo esc_html( 'Moodle' ); ?></span>
        <span class="ag-skills__card-tag"><?php echo esc_html( 'H5P' ); ?></span>
        <span class="ag-skills__card-tag"><?php echo esc_html( 'SCORM' ); ?></span>
        <span class="ag-skills__card-tag"><?php echo esc_html( 'Gamification' ); ?></span>
      </div>
    </div>

  </div>
</section>

<!-- ==========================================
     SECTION 4: PROJECTS
     ========================================== -->
<section class="ag-section" id="projects">
  <p class="ag-section__label ag-reveal"><?php echo esc_html( '// selected_projects' ); ?></p>
  <h2 class="ag-section__title ag-reveal" data-delay="100"><?php echo esc_html( 'What I\'ve Built' ); ?></h2>
  <div class="ag-projects__filter ag-reveal" data-delay="200">
    <button class="ag-filter__tab ag-filter__tab--active" data-filter="all"><?php echo esc_html( 'All' ); ?></button>
    <button class="ag-filter__tab" data-filter="web"><?php echo esc_html( 'Web Apps' ); ?></button>
    <button class="ag-filter__tab" data-filter="ai"><?php echo esc_html( 'AI & Automation' ); ?></button>
    <button class="ag-filter__tab" data-filter="tools"><?php echo esc_html( 'Tools' ); ?></button>
  </div>
  <div class="ag-projects__bento ag-reveal" data-delay="300">
    <?php
    $projects = new WP_Query( array(
        'post_type'      => 'product',
        'posts_per_page' => 6,
        'orderby'        => 'date',
        'order'          => 'DESC',
        'tax_query'      => array(
            array(
                'taxonomy' => 'product_cat',
                'field'    => 'slug',
                'terms'    => 'buy-me-a-coffee',
                'operator' => 'NOT IN',
            ),
        ),
    ) );

    if ( $projects->have_posts() ) :
        $project_index = 0;
        while ( $projects->have_posts() ) : $projects->the_post();

            // Determine category for filter
            $data_category = 'web'; // default
            if ( has_term( 'ai-automation', 'product_cat' ) ) {
                $data_category = 'ai';
            } elseif ( has_term( 'tools', 'product_cat' ) ) {
                $data_category = 'tools';
            } elseif ( has_term( 'web-apps', 'product_cat' ) ) {
                $data_category = 'web';
            }

            // First product is featured (span 2x2)
            $is_featured   = ( $project_index === 0 );
            $featured_class = $is_featured ? ' ag-project-card--featured' : '';

            // Fallback gradient backgrounds per category
            $gradients = array(
                'web'   => 'linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%)',
                'ai'    => 'linear-gradient(135deg, #1a0a2e 0%, #2d1b4e 100%)',
                'tools' => 'linear-gradient(135deg, #0a200a 0%, #1a3a1a 100%)',
            );
            $bg_gradient = isset( $gradients[ $data_category ] ) ? $gradients[ $data_category ] : $gradients['web'];
            ?>
            <div class="ag-project-card<?php echo esc_attr( $featured_class ); ?>" data-category="<?php echo esc_attr( $data_category ); ?>" data-tilt>
              <div class="ag-project-card__bg" style="background: <?php echo esc_attr( $bg_gradient ); ?>;">
                <?php if ( has_post_thumbnail() ) : ?>
                  <?php the_post_thumbnail( 'project-card', array(
                      'style' => 'width:100%;height:100%;object-fit:cover;position:absolute;inset:0;',
                  ) ); ?>
                <?php endif; ?>
              </div>
              <div class="ag-project-card__overlay">
                <h3 class="ag-project-card__title"><?php echo esc_html( get_the_title() ); ?></h3>
                <p class="ag-project-card__desc"><?php echo esc_html( get_the_excerpt() ); ?></p>
                <?php
                // Display product category tags
                $product_cats = get_the_terms( get_the_ID(), 'product_cat' );
                if ( $product_cats && ! is_wp_error( $product_cats ) ) : ?>
                  <div class="ag-project-card__tags">
                    <?php foreach ( $product_cats as $cat ) : ?>
                      <span class="ag-project-card__tag"><?php echo esc_html( $cat->name ); ?></span>
                    <?php endforeach; ?>
                  </div>
                <?php endif; ?>
              </div>
            </div>
            <?php
            $project_index++;
        endwhile;
    endif;
    wp_reset_postdata();
    ?>
  </div>
</section>

<!-- ==========================================
     SECTION 5: VIBE CODING
     ========================================== -->
<section class="ag-section" id="vibe">
  <p class="ag-section__label ag-reveal"><?php echo esc_html( '// vibe_coding' ); ?></p>
  <h2 class="ag-section__title ag-reveal" data-delay="100"><?php echo esc_html( 'How I Work' ); ?></h2>
  <div class="ag-vibe__grid">
    <div class="ag-terminal ag-reveal" data-delay="200">
      <div class="ag-terminal__header">
        <span class="ag-terminal__dot ag-terminal__dot--red"></span>
        <span class="ag-terminal__dot ag-terminal__dot--yellow"></span>
        <span class="ag-terminal__dot ag-terminal__dot--green"></span>
        <span class="ag-terminal__title"><?php echo esc_html( 'vibe-coder.sh' ); ?></span>
      </div>
      <div class="ag-terminal__body">
        <div><span class="comment">// My approach to building things</span></div>
        <div><span class="keyword">const</span> <span class="prop">vibeCoding</span> <span class="punctuation">= {</span></div>
        <div>&nbsp;&nbsp;<span class="prop">describe</span><span class="punctuation">:</span> <span class="string">"What you want"</span><span class="punctuation">,</span></div>
        <div>&nbsp;&nbsp;<span class="prop">tools</span><span class="punctuation">:</span> <span class="punctuation">[</span><span class="string">"Claude AI"</span><span class="punctuation">,</span> <span class="string">"Cursor"</span><span class="punctuation">,</span> <span class="string">"Code"</span><span class="punctuation">],</span></div>
        <div>&nbsp;&nbsp;<span class="prop">process</span><span class="punctuation">:</span> <span class="string">"Vibe &rarr; Iterate &rarr; Ship"</span><span class="punctuation">,</span></div>
        <div>&nbsp;&nbsp;<span class="prop">result</span><span class="punctuation">:</span> <span class="string">"Working product in hours, not weeks"</span></div>
        <div><span class="punctuation">};</span></div>
        <br>
        <div><span class="comment">// No boilerplate. No busywork.</span></div>
        <div><span class="comment">// Just pure creative flow.</span></div>
        <div><span class="prop">vibeCoding</span><span class="punctuation">.</span><span class="func">execute</span><span class="punctuation">();</span> <span class="comment">// &#x1F680;</span></div>
      </div>
    </div>
    <div class="ag-vibe__stats ag-reveal" data-delay="400">
      <div class="ag-stat">
        <div class="ag-stat__number" data-target="50">0</div>
        <div class="ag-stat__label"><?php echo esc_html( 'Projects Shipped' ); ?></div>
      </div>
      <div class="ag-stat">
        <div class="ag-stat__number" data-target="10000">0</div>
        <div class="ag-stat__label"><?php echo esc_html( 'Lines Generated' ); ?></div>
      </div>
      <div class="ag-stat">
        <div class="ag-stat__number">&infin;</div>
        <div class="ag-stat__label"><?php echo esc_html( 'Ideas Shipped' ); ?></div>
      </div>
    </div>
  </div>
</section>

<!-- ==========================================
     SECTION 6: COFFEE SUPPORT
     ========================================== -->
<section class="ag-section" id="coffee">
  <p class="ag-section__label ag-reveal"><?php echo esc_html( '// support_me' ); ?></p>
  <h2 class="ag-section__title ag-reveal" data-delay="100"><?php echo esc_html( 'Buy Me a Coffee' ); ?> &#x2615;</h2>
  <p class="ag-coffee__subtitle ag-reveal" data-delay="200"><?php echo esc_html( 'If you enjoy my work or find my projects useful, you can support me by buying a virtual coffee. Every cup fuels more creative coding!' ); ?></p>
  <div class="ag-coffee__grid ag-reveal" data-delay="300">
    <?php
    $coffee = new WP_Query( array(
        'post_type'      => 'product',
        'posts_per_page' => 3,
        'tax_query'      => array(
            array(
                'taxonomy' => 'product_cat',
                'field'    => 'slug',
                'terms'    => 'buy-me-a-coffee',
            ),
        ),
        'orderby'  => 'meta_value_num',
        'meta_key' => '_price',
        'order'    => 'ASC',
    ) );

    if ( $coffee->have_posts() ) :
        $coffee_index = 0;
        $coffee_total = $coffee->post_count;

        while ( $coffee->have_posts() ) : $coffee->the_post();
            /** @var WC_Product $product */
            $product = wc_get_product( get_the_ID() );
            if ( ! $product ) {
                $coffee_index++;
                continue;
            }

            $price        = $product->get_price();
            $price_html   = $product->get_price_html();
            $add_to_cart  = $product->add_to_cart_url();
            $product_name = get_the_title();
            $product_desc = get_the_excerpt();

            // Middle card (index 1) gets --popular class
            $is_popular    = ( $coffee_index === 1 );
            $popular_class = $is_popular ? ' ag-coffee__card--popular' : '';

            // Emoji based on position
            $emojis = array( '&#x2615;', '&#x2615;&#x2615;', '&#x2615;&#x2615;&#x2615;' );
            $emoji  = isset( $emojis[ $coffee_index ] ) ? $emojis[ $coffee_index ] : '&#x2615;';
            ?>
            <div class="ag-coffee__card<?php echo esc_attr( $popular_class ); ?>" data-price="<?php echo esc_attr( $price ); ?>">
              <?php if ( $is_popular ) : ?>
                <div class="ag-coffee__popular-badge"><?php echo esc_html( 'Most Popular' ); ?></div>
              <?php endif; ?>
              <div class="ag-coffee__emoji"><?php echo $emoji; ?></div>
              <h3 class="ag-coffee__card-title"><?php echo esc_html( $product_name ); ?></h3>
              <p class="ag-coffee__card-desc"><?php echo esc_html( $product_desc ); ?></p>
              <div class="ag-coffee__price"><?php echo wp_kses_post( $price_html ); ?></div>
              <a href="<?php echo esc_url( $add_to_cart ); ?>" data-quantity="1" class="ag-coffee__buy-btn add_to_cart_button ajax_add_to_cart" data-product_id="<?php echo esc_attr( $product->get_id() ); ?>" data-product_sku="<?php echo esc_attr( $product->get_sku() ); ?>" aria-label="<?php echo esc_attr( sprintf( 'Add %s to cart', $product_name ) ); ?>" rel="nofollow">
                <?php echo esc_html( 'Buy Coffee' ); ?>
              </a>
            </div>
            <?php
            $coffee_index++;
        endwhile;
    else :
        // Fallback static cards if no WooCommerce products exist yet
        ?>
        <div class="ag-coffee__card" data-price="3">
          <div class="ag-coffee__emoji">&#x2615;</div>
          <h3 class="ag-coffee__card-title"><?php echo esc_html( 'Small Coffee' ); ?></h3>
          <p class="ag-coffee__card-desc"><?php echo esc_html( 'A quick espresso shot to keep the ideas flowing' ); ?></p>
          <div class="ag-coffee__price">&euro;3</div>
          <button class="ag-coffee__buy-btn" data-item="Small Coffee" data-amount="3"><?php echo esc_html( 'Buy Coffee' ); ?></button>
        </div>
        <div class="ag-coffee__card ag-coffee__card--popular" data-price="5">
          <div class="ag-coffee__popular-badge"><?php echo esc_html( 'Most Popular' ); ?></div>
          <div class="ag-coffee__emoji">&#x2615;&#x2615;</div>
          <h3 class="ag-coffee__card-title"><?php echo esc_html( 'Medium Coffee' ); ?></h3>
          <p class="ag-coffee__card-desc"><?php echo esc_html( 'A proper latte to power through the next feature' ); ?></p>
          <div class="ag-coffee__price">&euro;5</div>
          <button class="ag-coffee__buy-btn" data-item="Medium Coffee" data-amount="5"><?php echo esc_html( 'Buy Coffee' ); ?></button>
        </div>
        <div class="ag-coffee__card" data-price="10">
          <div class="ag-coffee__emoji">&#x2615;&#x2615;&#x2615;</div>
          <h3 class="ag-coffee__card-title"><?php echo esc_html( 'Large Coffee' ); ?></h3>
          <p class="ag-coffee__card-desc"><?php echo esc_html( 'Full tank of creative fuel for an entire coding session' ); ?></p>
          <div class="ag-coffee__price">&euro;10</div>
          <button class="ag-coffee__buy-btn" data-item="Large Coffee" data-amount="10"><?php echo esc_html( 'Buy Coffee' ); ?></button>
        </div>
    <?php endif;
    wp_reset_postdata();
    ?>
  </div>
</section>

<!-- ==========================================
     SECTION 7: CONTACT
     ========================================== -->
<section class="ag-section" id="contact">
  <p class="ag-section__label ag-reveal"><?php echo esc_html( '// get_in_touch' ); ?></p>
  <h2 class="ag-section__title ag-reveal" data-delay="100"><?php echo esc_html( 'Let\'s Build Something' ); ?></h2>
  <div class="ag-contact__grid">
    <div class="ag-contact__info ag-reveal" data-delay="200">

      <!-- Email Row -->
      <div class="ag-contact__row">
        <div class="ag-contact__icon">
          <svg viewBox="0 0 24 24"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
        </div>
        <?php $email = 'andrius.godeliauskas@gmail.com'; ?>
        <span class="ag-contact__detail"><?php echo antispambot( $email ); ?></span>
        <button class="ag-copy-btn" data-copy="<?php echo esc_attr( antispambot( $email ) ); ?>"><?php echo esc_html( 'Copy' ); ?></button>
      </div>

      <!-- Phone Row -->
      <div class="ag-contact__row">
        <div class="ag-contact__icon">
          <svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
        </div>
        <span class="ag-contact__detail"><?php echo esc_html( '+370 601 27050' ); ?></span>
      </div>

      <!-- Response Badge -->
      <div class="ag-contact__badge">&#x26A1; <?php echo esc_html( 'I respond within 24 hours' ); ?></div>

      <!-- Social Links -->
      <div class="ag-contact__socials">
        <a href="<?php echo esc_url( 'https://github.com' ); ?>" target="_blank" rel="noopener noreferrer" class="ag-contact__social-link">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
          <?php echo esc_html( 'GitHub' ); ?>
        </a>
        <a href="<?php echo esc_url( 'https://linkedin.com' ); ?>" target="_blank" rel="noopener noreferrer" class="ag-contact__social-link">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
          <?php echo esc_html( 'LinkedIn' ); ?>
        </a>
      </div>

    </div>
  </div>
</section>

<?php get_footer(); ?>
