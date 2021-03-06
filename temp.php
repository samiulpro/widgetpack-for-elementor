<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

class Creative_Button extends Widget_Base
{
//    Widget Name
    public function get_name()
    {
        return 'widgetpack-for-elementor-button';
    }

//    Widget Title
    public function get_title()
    {
        return esc_html__('Creative Button', 'widgetpack-for-elementor');
    }

//    Widget Icon
    public function get_icon()
    {
        return 'eicon-button';
    }

//    Widget keyword
    public function get_keywords()
    {
        return ['button', 'content', 'toggle'];
    }

//    Widget Category
    public function get_categories()
    {
        return ['basic'];
    }

//    Staring widget register control
    protected function register_controls()
    {
//        Starting control section
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Button', 'widgetpack-for-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

//        Adding text inside button
        $this->add_control(
            'button_text',
            [
                'label' => esc_html__('Button Text', 'widgetpack-for-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Click Here', 'widgetpack-for-elementor'),
                'placeholder' => esc_html__('Click Here', 'widgetpack-for-elementor'),
            ]
        );

//        Button size
        $this->add_control(
            'button_size', [
                'label' => esc_html__('Button Size', 'widgetpack-for-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'default' => [
                    'size' => 16,
                ],
                'range' => [
                    'px' => [
                        'max' => 50,
                    ],
                ],
            ]
        );

//        Button Link
        $this->add_control(
            'button_link',
            [
                'label' => __('Link', 'widgetpack-for-elementor'),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => __('https://your-link.com', 'widgetpack-for-elementor'),
                'default' => [
                    'url' => '#',
                ],
            ]
        );

//        Button Alignment
        $this->add_control(
            'alignment',
            [
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'label' => esc_html__('Alignment', 'widgetpack-for-elementor'),
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'widgetpack-for-elementor'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'widgetpack-for-elementor'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'widgetpack-for-elementor'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
            ]
        );

//        Button Icon
        $this->add_control(
            'button_icon',
            [
                'label' => esc_html__('Icon', 'widgetpack-for-elementor'),
                'type' => \Elementor\Controls_Manager::ICON,
                'label_block' => true,
                'default' => '',
            ]
        );

//        Button Icon Alignment
        $this->add_control(
            'button_icon_align',
            [
                'label' => esc_html__('Icon Position', 'widgetpack-for-elementor'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'left',
                'options' => [
                    'left' => esc_html__('Before', 'widgetpack-for-elementor'),
                    'right' => esc_html__('After', 'widgetpack-for-elementor'),
                ],
                'condition' => [
                    'modal_icon!' => '',
                ],
            ]
        );

//        Ending  content section
        $this->end_controls_section();

//        Staring style tab
        $this->start_controls_section(
            'section_style_thumbnail',
            [
                'label' => esc_html__('Button', 'widgetpack-for-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

//        Button text color
        $this->add_control(
            'button_text_color',
            [
                'label' => __('Text Color', 'widgetpack-for-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#54595F',
            ]
        );

//        Button background color
        $this->add_control(
            'bg_color',
            [
                'label' => __('Background Color', 'widgetpack-for-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#6EC1E4',
            ]
        );

//        Button hover text color
        $this->add_control(
            'button_hover_text_color',
            [
                'label' => __('Text Hover Color', 'widgetpack-for-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#B12B2B',
            ]
        );

//        button hover color
        $this->add_control(
            'bg_hover_color',
            [
                'label' => __('Background Hover Color', 'widgetpack-for-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#61CE70',
            ]
        );

//        Button Icon Color
        $this->add_control(
            'button_icon_color',
            [
                'label' => __('Icon Color', 'widgetpack-for-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#54595F',
            ]
        );

//        Button Hover Icon
        $this->add_control(
            'button_hover_icon_color',
            [
                'label' => __('Icon Hover Color', 'widgetpack-for-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#B12B2B',
            ]
        );

//        Button class
        $this->add_control(
            'button_class',
            [
                'label' => __('Class', 'widgetpack-for-elementor'),
                'type' => Controls_Manager::TEXT,
                'default' => '',
                'title' => __('Enter Button Class', 'widgetpack-for-elementor'),
            ]
        );

//        Button Id
        $this->add_control(
            'button_id',
            [
                'label' => __('ID', 'widgetpack-for-elementor'),
                'type' => Controls_Manager::TEXT,
                'default' => '',
                'title' => __('Enter Button ID', 'widgetpack-for-elementor'),
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {

        // get our input from the widget settings.
        $settings = $this->get_settings_for_display();
        //~ print_r($settings);
        $button_text = !empty($settings['button_text']) ? $settings['button_text'] : 'Learn More';
        $button_url = !empty($settings['button_url']) ? $settings['button_url'] : '#';
        $button_icon = $settings['button_icon'];

        ?>
        <a href="<?php echo esc_attr($button_url['url']); ?>"
           class="creative_button <?php var_dump($settings['button_size'])['size']; echo esc_attr($settings['button_class']); ?>"
           id="<?php echo esc_attr($settings['button_id']); ?>">
            <span><?php echo esc_html($button_text); ?></span>
            <?php
            if (!empty($button_icon['value'])) {
                if ($button_icon['library'] == "svg") {
                    ?>
                    <img src="<?php echo esc_attr($button_icon['value']['url']); ?>" style="height:16px;"/>
                <?php } else { ?>
                    <i class="<?php echo esc_attr($button_icon['value']); ?>" aria-hidden="true"></i>
                    <?php
                }
            }
            ?>
        </a>
        <style>
            a.creative_button {
                display: table-row;
            }

            a.creative_button span {
                padding: 5px 25px;
                font-size: 16px;
                display: table-cell;
                color: <?php echo esc_attr( $settings['button_text_color'] ); ?>;
                background: <?php echo esc_attr( $settings['bg_color'] ); ?>;
                width: <?php echo  esc_attr( $settings['button_size'] ); ?>px;
            }

            a.creative_button:hover span {
                color: <?php echo esc_attr( $settings['button_hover_text_color'] ); ?>;
                background: <?php echo esc_attr( $settings['bg_hover_color'] ); ?>;
            }

            a.creative_button i {
                border-left: 1px solid black;
                padding: 12px;
                color: <?php echo esc_attr( $settings['button_icon_color'] ); ?>;
                background: <?php echo esc_attr( $settings['bg_color'] ); ?>;
                display: table-cell;
            }

            a.creative_button img {
                border-left: 1px solid black;
                padding: 12px;
                background: <?php echo esc_attr( $settings['bg_color'] ); ?>;
                display: table-cell;
            }

            a.creative_button:hover i {
                color: <?php echo esc_attr( $settings['button_hover_icon_color'] ); ?>;
                background: <?php echo esc_attr( $settings['bg_hover_color'] ); ?>;
            }

            a.creative_button:hover img {
                color: <?php echo esc_attr( $settings['button_hover_icon_color'] ); ?>;
                background: <?php echo esc_attr( $settings['bg_hover_color'] ); ?>;
            }
        </style>
        <?php
    }

    protected function content_template()
    {
        ?>
        <a href="{{settings.button_link.url}}"
           rel="{{settings.button_link.nofollow}}"
           target="{{settings.button_link.is_external}}"
        >{{settings.button_text}}</a>
    <?php }
}