<?php
class ServiceWidget extends \Elementor\Widget_Base{

    public function get_name(){
        return 'service';
    }

    public function get_title(){
        return esc_html__( 'Service', 'stoica-toolkit' );
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
                'default' => esc_html__( 'Nuestros servicios', 'stoica-toolkit' ),
            ],
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'stoica-toolkit' ),
                'type' => \Elementor\Controls_Manager::TEXT,
            ],
        );

        $repeater->add_control(
            'link',
            [
            'label' => esc_html__( 'Link', 'stoica-toolkit' ),
            'type' => \Elementor\Controls_Manager::URL,
            ],
        );

        $repeater->add_control(
            'image',
            [
                'label' => esc_html__( 'Image', 'stoica-toolkit' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
            );

        $this->add_control(
            'services',
            [
                'label' => esc_html__( 'Service Content', 'stoica-toolkit' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'title' => esc_html__( 'Abogados para agencias inmobiliarias', 'stoica-toolkit' ),
                        'image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ]
                    ],
                    [
                        'title' => esc_html__( 'Derecho inmobiliario y propiedad horizontal', 'stoica-toolkit' ),
                        'image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ]
                    ],
                    [
                        'title' => esc_html__( 'Real estate law and horizontal property', 'stoica-toolkit' ),
                        'image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ]
                    ],
                    [
                        'title' => esc_html__( 'Abogados expertos en derecho penal', 'stoica-toolkit' ),
                        'image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ]
                    ],
                
                ],
                'title_field' => '{{{ title }}}',

            ]
            
        );

        $this->end_controls_section();
        
    }

    protected function render(){

        $settings = $this->get_settings_for_display();
        $section_title = $settings['section_title'];
        $services = $settings['services'];
        ?>
            <section class="bgc-gray-lightest">
               <div class="container text-center">
                  <p align="center" class="fz-3 " style="font-size: 35px; padding-top: 30px "><b><?php echo $section_title ?> </b></p>
                  <div class="separator-2-color"></div>
               </div>
            </section>
            <section class="page-section no-padding page-section bgc-light">
               <div class="container-fluid group-process-2">
                  <div class="row">
                    <?php
                    foreach($services as $service){
                        $title = $service['title'];
                        $link = $service['link']['url'];
                        $image = $service['image']['url'];    
                    ?>
                     <div class="grid-item col-sm-3 col-xs-12 graphic-design social-marketing web-design">
                        <div class="block-portfolio overlay-container basic frame-bordered wow fadeInLeft">
                           <img alt="Derecho inmobiliario Madrid, Abogados para Agencias Inmobiliarias Madrid" class="__image" src="<?php echo $image ?>" title="Derecho inmobiliario Madrid, Abogados para Agencias Inmobiliarias Madrid"/> 
                           <div class="overlay bgc-dark-o-7">
                              <div class="cell-vertical-wrapper">
                                 <div class="cell-middle">
                                    <h4 class="__title"><a href="<?php echo $link ?>"><?php echo $title ?></a></h4>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="cell-middle" style="padding-top: 15px ">
                           <h4 align="center"><a href="<?php echo $link ?>" style="font-size: 14px "><?php echo $title ?></a></h4>
                        </div>
                     </div>
                     <?php } ?>
                  </div>
               </div>
            </section>
        <?php        
    }

}