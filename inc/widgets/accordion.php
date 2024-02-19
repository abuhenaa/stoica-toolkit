<?php
class StoicaAccordion extends \Elementor\Widget_Base{

    public function get_name(){
        return 'stoica-accordion';
    }

    public function get_title(){
        return esc_html__( 'Stoica Accordion', 'stoica-toolkit' );
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
            'accordion_bg',
            [
                'label' => esc_html__( 'Accordion Background', 'stoica-toolkit' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ],
        );
        $this->add_control(
            'accordion_left_logo',
            [
                'label' => esc_html__( 'Accordion Left Logo', 'stoica-toolkit' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ],
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'accordion_title',
            [
                'label' => esc_html__( 'Accordion Title', 'stoica-toolkit' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
            ],
        );
        $repeater->add_control(
            'accordion_content',
            [
                'label' => esc_html__( 'Accordion Content', 'stoica-toolkit' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
            );


        $this->add_control(
            'accordion_contents',
            [
                'label' => esc_html__( 'Accordion Contents', 'stoica-toolkit' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'accordion_title' => esc_html__( 'NUESTRA MISIÓN', 'stoica-toolkit' ),
                        'accordion_content' => esc_html__( 'Nuestra misión es brindar asesoramiento jurídico de alta calidad y representación legal a nuestros clientes, trabajando con profesionalismo, ética y compromiso para defender sus derechos e intereses. Además, de ser un aliado estratégico para nuestros clientes, ofreciéndoles soluciones innovadoras y adaptadas a sus necesidades para lograr los mejores resultados.', 'stoica-toolkit' ),
                    ],
                    [
                        'accordion_title' => esc_html__( 'NUESTRA MISIÓN', 'stoica-toolkit' ),
                        'accordion_content' => esc_html__( 'Ofrecer un servicio de alta calidad y excelencia en el asesoramiento jurídico a nuestros clientes, lograr una posición destacada en el mercado y ser reconocidos como líder en su especialidad. Para conseguirlo, sumamos la búsqueda constante de la innovación y la actualización en el conocimiento del derecho, así como el compromiso con la ética y la responsabilidad social.', 'stoica-toolkit' ),
                    ],
                    [
                        'accordion_title' => esc_html__( 'NUESTROS VALORES', 'stoica-toolkit' ),
                        'accordion_content' => esc_html__( '• Excelencia, innovación y creatividad
                        • Asesoramiento personalizado
                        • Minimización de los riesgos
                        • Anticipación
                        • Orientación al cliente', 'stoica-toolkit' ),
                    ],
                
                ],
                'title_field' => '{{{ accordion_title }}}',

            ]
            
        );

        $this->end_controls_section();
        
    }

    protected function render(){

        $settings = $this->get_settings_for_display();
        $section_title = $settings['section_title'];
        $section_subtitle = $settings['section_subtitle'];
        $accordion_bg = $settings['accordion_bg']['url'];
        $accordion_left_logo = $settings['accordion_left_logo']['url'];
        $accordion_contents = $settings['accordion_contents'];
        ?>
            <section class="page-section bgc-light" style="padding-bottom: 1px; "> </section>
            <section class="page-section bgc-dark-o-7 ">
               <div data-parallax="scroll" data-image-src="<?php echo $accordion_bg; ?>" data-speed="0.3" class="parallax-background"></div>
               <div class="container">
                  <div class="row">
                     <div class="col-md-4 section-block"><img src="<?php echo $accordion_left_logo; ?>" title=" Stoica abogados, Derecho inmobiliario Madrid, Abogados para Agencias Inmobiliarias Madrid" alt=" Stoica abogados, Derecho inmobiliario Madrid, Abogados para Agencias Inmobiliarias Madrid" class="img-responsive center-block"/></div>
                     <div class="block-icon-box-left-icon">
                        <div class="__icon circle-icon icon-home"></div>
                        <div class="__right-side">
                           <h2 class="__heading smb"><?php echo $section_title; ?> <br></h2>
                           <p style="font-family:Arial, Helvetica, sans-serif; font-size: 15px; line-height: 30px " > <?php echo $section_subtitle; ?></p>
                        </div>
                     </div>
                     <br>
                     <div class="col-md-8 col-xs-12 section-block">
                        <div class="accordion transparent caret-primary">
                            <?php 
                                foreach($accordion_contents as $accordion_content){
                                    $accordion_title = $accordion_content['accordion_title'];
                                    $accordion_content = $accordion_content['accordion_content'];                               
                            ?>
                           <div class="accordion-header">
                              <div class="__icon"><i></i></div>
                              <div class="__title">
                                 <p class="font-heading mb-0"><?php echo $accordion_title; ?></p>
                              </div>
                           </div>
                           <div class="accordion-content">
                              <p style="font-family:Arial, Helvetica, sans-serif; font-size: 15px; line-height: 27px " > <?php echo $accordion_content; ?></p>
                           </div>

                           <?php  } ?>

                        </div>
                     </div>
                  </div>
               </div>
            </section>
        <?php        
    }

}