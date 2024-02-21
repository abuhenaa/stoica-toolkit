<?php
class StoicaImageSliderWithInfo extends \Elementor\Widget_Base{

    public function get_name(){
        return 'stoica-image-slider-with-info';
    }

    public function get_title(){
        return esc_html__( 'Stoica Image Slider With Info', 'stoica-toolkit' );
    }

    public function get_icon(){
        return 'eicon-code';
    }

    public function get_categories(){
        return [ 'stoica' ];
    }

    protected function register_controls(){

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Content', 'stoica-toolkit' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'section_title',
            [
                'label' => esc_html__( 'Section Title', 'stoica-toolkit' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Your section title', 'stoica-toolkit' ),
            ],
        );
        $this->add_control(
            'section_subtitle',
            [
                'label' => esc_html__( 'Section Content', 'stoica-toolkit' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'label_block' => true,
                'default' => esc_html__( 'Your section content', 'stoica-toolkit' ),
            ],
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'slider_image',
            [
                'label' => esc_html__( 'Slider Image', 'stoica-toolkit' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
            ],
        );

        $this->add_control(
            'testimonial_contents',
            [
                'label' => esc_html__( 'Testimonial Contents', 'stoica-toolkit' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),

            ]
            
        );

        $this->end_controls_section();
        
    }

    protected function render(){

        $settings = $this->get_settings_for_display();
        $section_title = $settings['section_title'];
        $section_content = $settings['section_content'];
        $sliders = $settings['slider_image'];
        ?>
            <section class="page-section" style="padding-top: 10px">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-6 col-md-6 col-sm-6 col-sm-12 mb-70 wow fadeInLeft">
                        <div class="image-slider-large" style="padding-bottom: 1px">
                           <div class="slider slide direction-nav control-nav">
                            <?php foreach($sliders as $slider): ?>
                              <div class="__item">
                                 <div class="__image"><img src="<?php echo $slider['url']; ?>" title="Abogados para Agencias Inmobiliarias Madrid, Abogados para Agencias Inmobiliarias Alcalá de Henares, Derecho inmobiliario Madrid," alt="Abogados para Agencias Inmobiliarias Madrid, Abogados para Agencias Inmobiliarias Alcalá de Henares, Derecho inmobiliario Madrid,"/></div>
                              </div>
                            <?php endforeach; ?>
                           </div>
                        </div>
                     </div>
                     <div style="padding-top: 5px; margin-bottom: -30px " data-wow-delay="0.3s" class="col-md-6 section-block pt-40 wow fadeInRight">
                        <header class="hr-header">
                           <h1 class="smb " style="font-size:25px" > <?php echo $section_title; ?></h1>
                           <div class="separator-2-color"></div>
                        </header>
                        <p class="hmb" style=" line-height: 22px" align="justify" > <?php echo $section_content; ?></p>
                     </div>
                  </div>
               </div>
            </section>
        <?php        
    }

}