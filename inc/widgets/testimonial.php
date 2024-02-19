<?php
class StoicaTestimonial extends \Elementor\Widget_Base{

    public function get_name(){
        return 'stoica-testimonial';
    }

    public function get_title(){
        return esc_html__( 'Stoica Testimonial', 'stoica-toolkit' );
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
                'label' => esc_html__( 'Section SubTitle', 'stoica-toolkit' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Your section subtitle', 'stoica-toolkit' ),
            ],
        );
        $this->add_control(
            'button_one_url',
            [
                'label' => esc_html__( 'Button One URL', 'stoica-toolkit' ),
                'type' => \Elementor\Controls_Manager::URL,
                'label_block' => true,
            ],
        );
        $this->add_control(
            'button_two_url',
            [
                'label' => esc_html__( 'Button Two URL', 'stoica-toolkit' ),
                'type' => \Elementor\Controls_Manager::URL,
                'label_block' => true,
            ],
        );
        $this->add_control(
            'testimonial_bg',
            [
                'label' => esc_html__( 'Testimonial Background', 'stoica-toolkit' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ],
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'testimonial_content',
            [
                'label' => esc_html__( 'Testimonial Content', 'stoica-toolkit' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
            ],
        );

        $repeater->add_control(
            'name',
            [
            'label' => esc_html__( 'Name', 'stoica-toolkit' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            ],
        );

        $this->add_control(
            'testimonial_contents',
            [
                'label' => esc_html__( 'Testimonial Contents', 'stoica-toolkit' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'testimonial_content' => esc_html__( 'Beniamin es un abogado muy atento y profesional. Desde el primer día que me puse en contacto con él, supo a la perfección llevar mi caso, y en un mes ya lo tenia solucionado. Siempre haciéndome saber los pasos que íbamos a dar en cada momento y resolviendo cualquier duda que me pudiese surgir al respecto.', 'stoica-toolkit' ),
                        'name' => esc_html__( 'Silvia Lopez Rabago', 'stoica-toolkit' ),
                    ],
                    [
                        'testimonial_content' => esc_html__( 'Un gran abogado, serio y responsable y sobre todo un gran profesional.<br/> Te informa en todo momento, y siempre contesta a cualquier duda que tengas.<br/> Gracias por todo. ', 'stoica-toolkit' ),
                        'name' => esc_html__( 'Carmen C.', 'stoica-toolkit' ),
                    ],
                    [
                        'testimonial_content' => esc_html__( 'Beniamin es un profesional de los pies a la cabeza, se implic&oacute; en mi caso desde el principio, todo fue r&aacute;pido y con un resultado perfecto.', 'stoica-toolkit' ),
                        'name' => esc_html__( 'Alejandro Sanz Franco', 'stoica-toolkit' ),
                    ],
                
                ],
                'title_field' => '{{{ name }}}',

            ]
            
        );

        $this->end_controls_section();
        
    }

    protected function render(){

        $settings = $this->get_settings_for_display();
        $section_title = $settings['section_title'];
        $section_subtitle = $settings['section_subtitle'];
        $button_one_url = $settings['button_one_url']['url'];
        $button_two_url = $settings['button_two_url']['url'];
        $testimonial_bg = $settings['testimonial_bg']['url'];
        ?>
            <section class="page-section bgc-light no-padding bgc-dark-o-7">
               <div class="parallax-background" data-image-src="<?php echo $testimonial_bg; ?>" data-parallax="scroll" data-speed="0.3" style="margin-top: -88px; padding-bottom: 500px; "></div>
               <div class="testimonial style-3 text-center color-light">
                  <div class="container">
                     <div class="row">
                        <div class="col-lg-10 col-lg-offset-1 col-xs-12">
                           <h2 style="font-size: 50px; font-family:Arial, Helvetica, sans-serif;"><?php echo $section_title; ?></h2>
                           <h3 style="font-size: 25px; margin-top: -20px; font-family:Arial, Helvetica, sans-serif; "><?php echo $section_subtitle; ?></h3>
                           <br/> 
                           <div class="slider slide block-testimonial-wrapper direction-nav mb-65">
                            <?php
                                foreach($settings['testimonial_contents'] as $testimonial_content){
                                    $name = $testimonial_content['name'];
                                    $testimonial_content = $testimonial_content['testimonial_content'];                                
                            ?>
                              <div class="block-testimonial">
                                 <div class="__content text-center">
                                    <p style="font-size: 16px"><?php echo $testimonial_content; ?></p>
                                    <h6><?php echo $name; ?></h6>
                                    <div class="star-ratings" data-rating="5"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                                 </div>
                              </div>
                            <?php } ?>
                           </div>
                           <div class="__button"><a class="fullwidth no-border btn btn-primary wow fadeInLeft" href="<?php echo $button_one_url; ?>">CONT&Aacute;CTENOS </a><br class="visible-xs-block"/> <a class="fullwidth btn-border btn-light wow fadeInRight" href="<?php echo $button_two_url; ?>">INFORMACI&Oacute;N </a> </div>
                           <br/> <br/> &nbsp; 
                        </div>
                     </div>
                  </div>
               </div>
            </section>
        <?php        
    }

}