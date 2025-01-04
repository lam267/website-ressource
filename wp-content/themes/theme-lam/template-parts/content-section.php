  <!-- start content-section -->
  <?php
        $title_banner = get_field('title_banner', 'option');
        $link_banner = get_field('link_banner', 'option');
        $background_banner = get_field('background_banner', 'option');
        $slider_images = get_field('slider_images', 'option');
    ?>
  <section class="content-section">
      <div class="content-background" style="background-image: url('<?php echo esc_url($background_banner); ?>');">
          <div class="container">
              <div class="d-flex flex-column justify-center">
                  <div class="text-content d-flex flex-column justify-start">
                      <h1>
                          <?php if ($title_banner): ?>
                            <?php echo wp_kses_post($title_banner); ?>
                          <?php endif; ?>
                      </h1>
                      <div class="button-box  button--secondary d-inline-flex align-center">
                          <a href="<?php echo esc_url($link_banner); ?>" class="button button--small">
                              Mehr erfahren
                          </a>
                          <div class="button-icon">
                              <svg width="28" height="18" viewBox="0 0 28 18" fill="none"
                                  xmlns="http://www.w3.org/2000/svg">
                                  <line x1="0.59375" y1="9.16211" x2="25.7559" y2="9.16211" stroke="#170049"
                                      stroke-width="2" />
                                  <path d="M19.1328 0.892578L25.7544 8.83852L19.1328 16.7845" stroke="#170049"
                                      stroke-width="2" />
                              </svg>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <?php if ($slider_images): ?>
          <div class="image-carousel">
              <div id="carousel1" class="image-owl-carousel owl-carousel owl-theme">
                  <?php foreach ($slider_images as $slide): ?>
                  <div class="item">
                      <a href="<?php echo esc_url($slide['image_link']); ?>">
                          <img src="<?php echo esc_url($slide['image_banner']['url']); ?>"
                              alt="<?php echo esc_attr($slide['image_banner']['alt']); ?>" />
                      </a>
                  </div>
                  <?php endforeach; ?>
              </div>
              <div class="custom-nav">
                  <button class="custom-prev prev1">
                      <svg width="28" height="18" viewBox="0 0 28 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <line x1="27.1621" y1="8.62207" x2="1.99995" y2="8.62207" stroke="#170049" stroke-width="2" />
                          <path d="M8.62305 16.8916L2.00143 8.94566L8.62305 0.999711" stroke="#170049"
                              stroke-width="2" />
                      </svg>
                  </button>
                  <button class="custom-next next1">
                      <svg width="27" height="18" viewBox="0 0 27 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <line y1="9.26953" x2="25.1622" y2="9.26953" stroke="#170049" stroke-width="2" />
                          <path d="M18.5391 1L25.1607 8.94595L18.5391 16.8919" stroke="#170049" stroke-width="2" />
                      </svg>
                  </button>
              </div>
          </div>
          <?php endif; ?>
      </div>
  </section>
  <!-- end content-section -->