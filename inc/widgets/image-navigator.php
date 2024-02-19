<?php
class ImageNavigator extends \Elementor\Widget_Base {

    public function get_name() {
        return 'stoica-image-navigator';
    }

    public function get_title() {
        return esc_html__('Stoica Image Navigator', 'stoica-toolkit');
    }

    public function get_icon() {
        return 'eicon-code';
    }

    public function get_categories() {
        return ['stoica'];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'stoica-toolkit'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'section_title',
            [
                'label'       => esc_html__('Section Title', 'stoica-toolkit'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__('Your section title', 'stoica-toolkit'),
            ],
        );
        $this->add_control(
            'section_content',
            [
                'label'       => esc_html__('Section Contents', 'stoica-toolkit'),
                'type'        => \Elementor\Controls_Manager::WYSIWYG,
                'label_block' => true,
                'default'     => esc_html__('Your section title', 'stoica-toolkit'),
            ],
        );
        $this->add_control(
            'image_one',
            [
                'label' => esc_html__('Image One', 'stoica-toolkit'),
                'type'  => \Elementor\Controls_Manager::MEDIA,
            ],
        );
        $this->add_control(
            'image_two',
            [
                'label' => esc_html__('Image Two', 'stoica-toolkit'),
                'type'  => \Elementor\Controls_Manager::MEDIA,
            ],
        );
        $this->add_control(
            'image_three',
            [
                'label' => esc_html__('Image Three', 'stoica-toolkit'),
                'type'  => \Elementor\Controls_Manager::MEDIA,
            ],
        );
        $this->add_control(
            'image_four',
            [
                'label' => esc_html__('Image Four', 'stoica-toolkit'),
                'type'  => \Elementor\Controls_Manager::MEDIA,
            ],
        );

        $this->end_controls_section();
    }

    protected function render() {

        $settings        = $this->get_settings_for_display();
        $section_title   = $settings['section_title'];
        $section_content = $settings['section_content'];
        $image_one       = $settings['image_one']['url'];
        $image_two       = $settings['image_two']['url'];
        $image_three     = $settings['image_three']['url'];
        $image_four      = $settings['image_four']['url'];
?>
                <section class="page-section bgc-light" style="padding-bottom: 1px">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-6 col-md-5 col-sm-6 col-sm-12 product-thumbnail-slider-wrapper fullwidth magnific-gallery no-zoom-effect mb-70 wow fadeInLeft ">
                        <div class="product-thumbnail-slider">
                           <div class="product-syn-slider-1-wrapper ">
                              <div class="product-syn-slider-1 syn-slider-1 direction-nav">
                                 <div class="block-product-slider">
                                    <div class="__image img-wrapper"><img src="<?php echo $image_one; ?>" title=" Stoica abogados, Derecho inmobiliario Madrid, Abogados para Agencias Inmobiliarias Madrid" alt=" Stoica abogados, Derecho inmobiliario Madrid, Abogados para Agencias Inmobiliarias Madrid"/></div>
                                 </div>
                                 <div class="block-product-slider">
                                    <div class="__image img-wrapper"><img src="<?php echo $image_two; ?>" title=" Stoica abogados, Derecho inmobiliario Madrid, Abogados para Agencias Inmobiliarias Madrid" alt=" Stoica abogados, Derecho inmobiliario Madrid, Abogados para Agencias Inmobiliarias Madrid"/></div>
                                 </div>
                                 <div class="block-product-slider">
                                    <div class="__image img-wrapper"><img src="<?php echo $image_three; ?>" title=" Stoica abogados, Derecho inmobiliario Madrid, Abogados para Agencias Inmobiliarias Madrid" alt=" Stoica abogados, Derecho inmobiliario Madrid, Abogados para Agencias Inmobiliarias Madrid"/></div>
                                 </div>
                                 <div class="block-product-slider">
                                    <div class="__image img-wrapper"><img src="<?php echo $image_four; ?>" title=" Stoica abogados, Derecho inmobiliario Madrid, Abogados para Agencias Inmobiliarias Madrid" alt=" Stoica abogados, Derecho inmobiliario Madrid, Abogados para Agencias Inmobiliarias Madrid"/></div>
                                 </div>
                              </div>
                           </div>
                           <div class="product-syn-slider-2-wrapper">
                              <div class="product-syn-slider-2 syn-slider-2 v-mode">
                                 <div class="block-product-slider">
                                    <div class="__image text-center overlay-container">
                                       <img src="<?php echo $image_one; ?>" alt="Product slider image"/> 
                                       <div class="overlay bgc-light-o-5"></div>
                                    </div>
                                 </div>
                                 <div class="block-product-slider">
                                    <div class="__image text-center overlay-container">
                                       <img src="<?php echo $image_two; ?>" alt="Product slider image"/> 
                                       <div class="overlay bgc-light-o-5"></div>
                                    </div>
                                 </div>
                                 <div class="block-product-slider">
                                    <div class="__image text-center overlay-container">
                                       <img src="<?php echo $image_three; ?>" alt="Product slider image"/> 
                                       <div class="overlay bgc-light-o-5"></div>
                                    </div>
                                 </div>
                                 <div class="block-product-slider">
                                    <div class="__image text-center overlay-container">
                                       <img src="<?php echo $image_four; ?>" alt="Product slider image"/> 
                                       <div class="overlay bgc-light-o-5"></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-6 col-md-7 col-sm-6 col-sm-12 mb-70 wow fadeInRight">
                        <div class="product-detail">
                           <h1 class="smb " style="font-size:45px" > <?php echo $section_title; ?> </h1>
                           <div class="__rating clearfix">
                              <div data-rating='5' class="star-ratings"><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span></div>
                           </div>
                           <div class="__text">
                               <?php echo $section_content; ?>                              
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>

        <?php
    }
}
