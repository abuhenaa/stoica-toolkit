<?php
class HeaderBreadcrumb extends \Elementor\Widget_Base {

    public function get_name() {
        return 'stoica-breadcrumb';
    }

    public function get_title() {
        return esc_html__('Stoica Breadcrumb', 'stoica-toolkit');
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
                'label'       => esc_html__('Section Subtitle', 'stoica-toolkit'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__('Your section title', 'stoica-toolkit'),
            ],
        );
        $this->add_control(
            'bg',
            [
                'label' => esc_html__('Background Image', 'stoica-toolkit'),
                'type'  => \Elementor\Controls_Manager::MEDIA,
            ],
        );

        $this->end_controls_section();
    }

    protected function render() {

      $settings            = $this->get_settings_for_display();
      $section_subtitle    = $settings['section_subtitle'];
      $bg                  = $settings['bg']['url'];
?>
         <header class="page-header common-header bgc-dark-o-3 large">
            <div data-parallax="scroll" data-image-src="<?php echo $bg ?>" data-speed="0.3" class="parallax-background"></div>
            <div class="container text-center cell-vertical-wrapper">
               <div class="cell-middle">
                  <h1 class="text-responsive size-l nmb" style="font-size: 40px"> <?php the_title() ?> </h1>
                  <p class="nmb common-serif text-responsive"> <?php echo $section_subtitle ?></p>
               </div>
            </div>
            <div class="ab-bottom col-xs-12">
               <div class="container">
                  <div class="breadcrumb bgc-dark-o-6"><span class="__title font-heading fz-6-s"> Estas Aquí:</span><span class="__content italic font-serif fz-6-ss"><span><a href="<?php echo home_url(); ?>"> Inicio</a></span><span><a href="<?php the_permalink() ?>"> <?php the_title() ?> </a></span><span></span></span></div>
               </div>
            </div>
         </header>

        <?php
    }
}
