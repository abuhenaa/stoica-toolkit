<?php
class StoicaIconGrid extends \Elementor\Widget_Base{

    public function get_name(){
        return 'stoica-icon-grid';
    }

    public function get_title(){
        return esc_html__( 'Stoica Icon Grid', 'stoica-toolkit' );
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

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'stoica-toolkit' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ],
        );

        $repeater->add_control(
            'desc',
            [
            'label' => esc_html__( 'Description', 'stoica-toolkit' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            ],
        );

        $repeater->add_control(
            'icon',
            [
                'label' => esc_html__( 'Icon Name', 'stoica-toolkit' ),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
            );

        $this->add_control(
            'icon_grid',
            [
                'label' => esc_html__( 'Service Content', 'stoica-toolkit' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'title' => esc_html__( 'Conocimientos legales sólidos y actualizados', 'stoica-toolkit' ),
                        'desc' => esc_html__( 'Un buen abogado debe estar actualizado en las leyes aplicables a su área de especialización, y tener un conocimiento sólido de la jurisprudencia y la doctrina.', 'stoica-toolkit' ),
                        'icon' => 'icon-genius',
                    ],
                    [
                        'title' => esc_html__( 'Habilidades de comunicación efectivas', 'stoica-toolkit' ),
                        'desc' => esc_html__( 'Un buen abogado debe ser capaz de comunicarse de forma clara y efectiva tanto oral como escrita, otros tanto con clientes como con jueces y abogados.', 'stoica-toolkit' ),
                        'icon' => 'icon-185077-first-aid-medecine-shield-streamline',
                    ],
                    [
                        'title' => esc_html__( 'Habilidades de negociación', 'stoica-toolkit' ),
                        'desc' => esc_html__( 'Un buen abogado debe ser capaz de negociar de forma efectiva para llegar a acuerdos justos y beneficiosos para sus clientes.', 'stoica-toolkit' ),
                        'icon' => 'icon-185081-speech-streamline-talk-user',
                    ],
                    [
                        'title' => esc_html__( 'Habilidades analíticas y de resolución de problemas', 'stoica-toolkit' ),
                        'desc' => esc_html__( 'Un buen abogado debe ser capaz de analizar casos y problemas complejos y encontrar soluciones creativas y efectivas', 'stoica-toolkit' ),
                        'icon' => 'icon-edit',
                    ],
                    [
                        'title' => esc_html__( 'Responsabilidad y compromiso', 'stoica-toolkit' ),
                        'desc' => esc_html__( 'Un buen abogado debe ser responsable y comprometido con sus clientes, y trabajar duro para defender sus intereses.', 'stoica-toolkit' ),
                        'icon' => 'icon-target',
                    ],
                    [
                        'title' => esc_html__( 'Empatía y capacidad de escucha', 'stoica-toolkit' ),
                        'desc' => esc_html__( 'Un buen abogado debe ser capaz de ponerse en el lugar de sus clientes y entender sus necesidades y preocupaciones.', 'stoica-toolkit' ),
                        'icon' => 'icon-linegraph',
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
        $icon_grids = $settings['icon_grid'];
        ?>

            <section class="bgc-gray-lightest">
               <div class="container text-center">
                  <p align="center" class="fz-3 " style="font-size: 25px; padding-top: 60px; line-height: 35px "><?php echo $section_title ?></p>
                  <div class="separator-2-color"></div>
               </div>
            </section>
            <section class="page-section bgc-gray-lightest one-child" style=" padding-top: 30px">
               <div class="container">
                  <div class="group-icon-box-border-container">
                     <div class="__container-inner clearfix">
                     <?php
                        foreach($icon_grids as $icon_grid){
                            $title = $icon_grid['title'];
                            $desc = $icon_grid['desc'];
                            $icon = $icon_grid['icon'];    
                        ?>
                        <div class="__border-item">
                           <div class="block-icon-box-vertical wow fadeInUp" data-wow-delay="0.3s">
                              <div class="__icon simple-icon icon <?php echo $icon ?>"></div>
                              <h4 class="__heading smb"><b><?php echo $title ?></b></h4>
                              <p class="__content"><?php echo $desc ?></p>
                           </div>
                        </div>
                        <?php } ?>
                     </div>
                  </div>
               </div>
            </section>
        <?php        
    }

}