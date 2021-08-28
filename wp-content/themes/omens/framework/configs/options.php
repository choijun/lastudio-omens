<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if(!function_exists('omens_setup_customizer')){
    function omens_setup_customizer( $args ){
        $args['prefix']      = 'omens';
        $args['options']    = [
            /** `General` panel */
            'general_settings' => array(
                'title'       => esc_html__( 'General Site settings', 'omens' ),
                'priority'    => 40,
                'type'        => 'panel',
            ),
            /** `Favicon` section */
            'favicon' => array(
                'title'       => esc_html__( 'Favicon', 'omens' ),
                'priority'    => 10,
                'panel'       => 'general_settings',
                'type'        => 'section',
            ),
            /** `Logo` section */
            'logos' => array(
                'title'       => esc_html__( 'Logo', 'omens' ),
                'priority'    => 15,
                'panel'       => 'general_settings',
                'type'        => 'section',
            ),
            'logo_default' => array(
                'title'    => esc_html__( 'Logo', 'omens' ),
                'section'  => 'logos',
                'priority' => 20,
                'field'     => 'image',
                'type'     => 'control',
                'button_labels' => array(
                    'select' => esc_html__( 'Select Logo', 'omens' ),
                    'remove' => esc_html__( 'Remove Logo', 'omens' ),
                    'change' => esc_html__( 'Change Logo', 'omens' ),
                ),
            ),
            'logo_transparency' => array(
                'title'    => esc_html__( 'Logo Transparency', 'omens' ),
                'section'  => 'logos',
                'priority' => 25,
                'field'     => 'file',
                'type'     => 'control',
                'button_labels' => array(
                    'select' => esc_html__( 'Select Logo', 'omens' ),
                    'remove' => esc_html__( 'Remove Logo', 'omens' ),
                    'change' => esc_html__( 'Change Logo', 'omens' ),
                ),
            ),
            /** `Preloader` panel */
            'preloader' => array(
                'title'       => esc_html__( 'Page preloader', 'omens' ),
                'priority'    => 15,
                'panel'       => 'general_settings',
                'type'        => 'section',
            ),
            'page_preloader' => array(
                'title'    => esc_html__( 'Show page preloader', 'omens' ),
                'section'  => 'preloader',
                'priority' => 10,
                'default'  => false,
                'field'     => 'checkbox',
                'type'     => 'control',
                'transport'=> 'postMessage',
            ),
            'page_preloader_type' => array(
                'title'    => esc_html__( 'Page preloader type', 'omens' ),
                'section'  => 'preloader',
                'priority' => 15,
                'field'     => 'select',
                'default'  => '1',
                'type'     => 'control',
                'choices'  => [
                    '1' => esc_html__( 'Type 1', 'omens' ),
                    '2' => esc_html__( 'Type 2', 'omens' ),
                    '3' => esc_html__( 'Type 3', 'omens' ),
                    '4' => esc_html__( 'Type 4', 'omens' ),
                    '5' => esc_html__( 'Type 5', 'omens' ),
                    'custom' => esc_html__( 'Custom', 'omens' ),
                ],
                'transport'=> 'postMessage',
            ),
            'page_preloader_custom' => array(
                'title'    => esc_html__( 'Custom page preloader image', 'omens' ),
                'section'  => 'preloader',
                'priority' => 20,
                'field'     => 'image',
                'type'     => 'control',
                'transport'=> 'postMessage',
            ),
            /** `Color Schema` panel */
            'accent_color' => array(
                'title'   => esc_html__( 'Accent color', 'omens' ),
                'section' => 'colors',
                'field'   => 'hex_color',
                'type'    => 'control',
                'priority' => 20,
                'transport'=> 'postMessage',
            ),
            'primary_text_color' => array(
                'title'   => esc_html__( 'Primary Text color', 'omens' ),
                'section' => 'colors',
                'field'   => 'hex_color',
                'type'    => 'control',
                'priority' => 25,
                'transport'=> 'postMessage',
            ),
            'secondary_text_color' => array(
                'title'   => esc_html__( 'Secondary Text color', 'omens' ),
                'section' => 'colors',
                'field'   => 'hex_color',
                'type'    => 'control',
                'priority' => 30,
                'transport'=> 'postMessage',
            ),
            'invert_text_color' => array(
                'title'   => esc_html__( 'Invert Text color', 'omens' ),
                'section' => 'colors',
                'field'   => 'hex_color',
                'type'    => 'control',
                'priority' => 35,
                'transport'=> 'postMessage',
            ),
            'link_color' => array(
                'title'   => esc_html__( 'Link color', 'omens' ),
                'section' => 'colors',
                'field'   => 'hex_color',
                'type'    => 'control',
                'priority' => 40,
                'transport'=> 'postMessage',
            ),
            'link_hover_color' => array(
                'title'   => esc_html__( 'Link hover color', 'omens' ),
                'section' => 'colors',
                'field'   => 'hex_color',
                'type'    => 'control',
                'priority' => 45,
                'transport'=> 'postMessage',
            ),
            'h1_color' => array(
                'title'   => esc_html__( 'H1 color', 'omens' ),
                'section' => 'colors',
                'field'   => 'hex_color',
                'type'    => 'control',
                'priority' => 50,
                'transport'=> 'postMessage',
            ),
            'h2_color' => array(
                'title'   => esc_html__( 'H2 color', 'omens' ),
                'section' => 'colors',
                'field'   => 'hex_color',
                'type'    => 'control',
                'priority' => 55,
                'transport'=> 'postMessage',
            ),
            'h3_color' => array(
                'title'   => esc_html__( 'H3 color', 'omens' ),
                'section' => 'colors',
                'field'   => 'hex_color',
                'type'    => 'control',
                'priority' => 60,
                'transport'=> 'postMessage',
            ),
            'h4_color' => array(
                'title'   => esc_html__( 'H4 color', 'omens' ),
                'section' => 'colors',
                'field'   => 'hex_color',
                'type'    => 'control',
                'priority' => 65,
                'transport'=> 'postMessage',
            ),
            'h5_color' => array(
                'title'   => esc_html__( 'H5 color', 'omens' ),
                'section' => 'colors',
                'field'   => 'hex_color',
                'type'    => 'control',
                'priority' => 70,
                'transport'=> 'postMessage',
            ),
            'h6_color' => array(
                'title'   => esc_html__( 'H6 color', 'omens' ),
                'section' => 'colors',
                'field'   => 'hex_color',
                'type'    => 'control',
                'priority' => 75,
                'transport'=> 'postMessage',
            ),
            /** `Typography Settings` panel */
            'typography' => array(
                'title'       => esc_html__( 'Typography', 'omens' ),
                'description' => esc_html__( 'Configure typography settings', 'omens' ),
                'priority'    => 45,
                'type'        => 'panel',
            ),
            /** `Body text` section */
            'body_typography' => array(
                'title'       => esc_html__( 'Body text', 'omens' ),
                'priority'    => 5,
                'panel'       => 'typography',
                'type'        => 'section',
            ),
            'body_font_family' => array(
                'title'   => esc_html__( 'Font Family', 'omens' ),
                'section' => 'body_typography',
                'field'   => 'fonts',
                'type'    => 'control',
                'transport'=> 'postMessage',
            ),
            'body_font_style' => array(
                'title'   => esc_html__( 'Font Style', 'omens' ),
                'section' => 'body_typography',
                'field'   => 'select',
                'choices' => omens_customizer_get_font_styles(),
                'type'    => 'control',
                'transport'=> 'postMessage',
            ),
            'body_font_weight' => array(
                'title'   => esc_html__( 'Font Weight', 'omens' ),
                'section' => 'body_typography',
                'field'   => 'select',
                'choices' => omens_customizer_get_font_weight(),
                'type'    => 'control',
                'transport'=> 'postMessage',
            ),
            'body_font_size' => array(
                'title'       => esc_html__( 'Font Size, px', 'omens' ),
                'section'     => 'body_typography',
                'field'       => 'number',
                'input_attrs' => array(
                    'min'  => 6,
                    'max'  => 50,
                    'step' => 1,
                ),
                'type' => 'control',
                'transport'=> 'postMessage',
            ),
            'body_line_height' => array(
                'title'       => esc_html__( 'Line Height', 'omens' ),
                'description' => esc_html__( 'Relative to the font-size of the element', 'omens' ),
                'section'     => 'body_typography',
                'field'       => 'number',
                'input_attrs' => array(
                    'min'  => 1.0,
                    'max'  => 3.0,
                    'step' => 0.1,
                ),
                'type' => 'control',
                'transport'=> 'postMessage',
            ),
            'body_letter_spacing' => array(
                'title'       => esc_html__( 'Letter Spacing, px', 'omens' ),
                'section'     => 'body_typography',
                'field'       => 'number',
                'input_attrs' => array(
                    'min'  => -10,
                    'max'  => 10,
                    'step' => 1,
                ),
                'type' => 'control',
                'transport'=> 'postMessage',
            ),
            'body_character_set' => array(
                'title'   => esc_html__( 'Character Set', 'omens' ),
                'section' => 'body_typography',
                'default' => 'latin',
                'field'   => 'select',
                'choices' => omens_customizer_get_character_sets(),
                'type'    => 'control',
                'transport'=> 'postMessage',
            ),
            'body_text_align' => array(
                'title'   => esc_html__( 'Text Align', 'omens' ),
                'section' => 'body_typography',
                'field'   => 'select',
                'choices' => omens_customizer_get_text_aligns(),
                'type'    => 'control',
                'transport'=> 'postMessage',
            ),

            /** `H1 Heading` section */
            'h1_typography' => array(
                'title'       => esc_html__( 'H1 Heading', 'omens' ),
                'priority'    => 10,
                'panel'       => 'typography',
                'type'        => 'section',
            ),
            'h1_font_family' => array(
                'title'   => esc_html__( 'Font Family', 'omens' ),
                'section' => 'h1_typography',
                'field'   => 'fonts',
                'type'    => 'control',
                'transport'=> 'postMessage',
            ),
            'h1_font_style' => array(
                'title'   => esc_html__( 'Font Style', 'omens' ),
                'section' => 'h1_typography',
                'field'   => 'select',
                'choices' => omens_customizer_get_font_styles(),
                'type'    => 'control',
                'transport'=> 'postMessage',
            ),
            'h1_font_weight' => array(
                'title'   => esc_html__( 'Font Weight', 'omens' ),
                'section' => 'h1_typography',
                'field'   => 'select',
                'choices' => omens_customizer_get_font_weight(),
                'type'    => 'control',
                'transport'=> 'postMessage',
            ),
            'h1_font_size' => array(
                'title'       => esc_html__( 'Font Size, px', 'omens' ),
                'section'     => 'h1_typography',
                'field'        => 'lakit_responsive',
                'unit'        => 'px',
                'responsive'  => true,
                'input_attrs' => array(
                    'min'  => 10,
                    'max'  => 200,
                    'step' => 1,
                ),
                'type' => 'control',
                'transport'=> 'postMessage',
            ),
            'h1_line_height' => array(
                'title'       => esc_html__( 'Line Height', 'omens' ),
                'description' => esc_html__( 'Relative to the font-size of the element', 'omens' ),
                'section'     => 'h1_typography',
                'field'       => 'number',
                'input_attrs' => array(
                    'min'  => 1.0,
                    'max'  => 3.0,
                    'step' => 0.1,
                ),
                'type' => 'control',
                'transport'=> 'postMessage',
            ),
            'h1_letter_spacing' => array(
                'title'       => esc_html__( 'Letter Spacing, px', 'omens' ),
                'section'     => 'h1_typography',
                'field'        => 'lakit_responsive',
                'unit'        => 'px',
                'responsive'  => true,
                'input_attrs' => array(
                    'min'  => -10,
                    'max'  => 10,
                    'step' => 1,
                ),
                'type' => 'control',
                'transport'=> 'postMessage',
            ),
            'h1_character_set' => array(
                'title'   => esc_html__( 'Character Set', 'omens' ),
                'section' => 'h1_typography',
                'default' => 'latin',
                'field'   => 'select',
                'choices' => omens_customizer_get_character_sets(),
                'type'    => 'control',
                'transport'=> 'postMessage',
            ),
            'h1_text_align' => array(
                'title'   => esc_html__( 'Text Align', 'omens' ),
                'section' => 'h1_typography',
                'field'   => 'select',
                'choices' => omens_customizer_get_text_aligns(),
                'type'    => 'control',
                'transport'=> 'postMessage',
            ),

            /** `H2 Heading` section */
            'h2_typography' => array(
                'title'       => esc_html__( 'H2 Heading', 'omens' ),
                'priority'    => 15,
                'panel'       => 'typography',
                'type'        => 'section',
            ),
            'h2_font_family' => array(
                'title'   => esc_html__( 'Font Family', 'omens' ),
                'section' => 'h2_typography',
                'field'   => 'fonts',
                'type'    => 'control',
                'transport'=> 'postMessage',
            ),
            'h2_font_style' => array(
                'title'   => esc_html__( 'Font Style', 'omens' ),
                'section' => 'h2_typography',
                'field'   => 'select',
                'choices' => omens_customizer_get_font_styles(),
                'type'    => 'control',
                'transport'=> 'postMessage',
            ),
            'h2_font_weight' => array(
                'title'   => esc_html__( 'Font Weight', 'omens' ),
                'section' => 'h2_typography',
                'field'   => 'select',
                'choices' => omens_customizer_get_font_weight(),
                'type'    => 'control',
                'transport'=> 'postMessage',
            ),
            'h2_font_size' => array(
                'title'       => esc_html__( 'Font Size, px', 'omens' ),
                'section'     => 'h2_typography',
                'field'        => 'lakit_responsive',
                'unit'        => 'px',
                'responsive'  => true,
                'input_attrs' => array(
                    'min'  => 10,
                    'max'  => 200,
                    'step' => 1,
                ),
                'type' => 'control',
                'transport'=> 'postMessage',
            ),
            'h2_line_height' => array(
                'title'       => esc_html__( 'Line Height', 'omens' ),
                'description' => esc_html__( 'Relative to the font-size of the element', 'omens' ),
                'section'     => 'h2_typography',
                'field'       => 'number',
                'input_attrs' => array(
                    'min'  => 1.0,
                    'max'  => 3.0,
                    'step' => 0.1,
                ),
                'type' => 'control',
                'transport'=> 'postMessage',
            ),
            'h2_letter_spacing' => array(
                'title'       => esc_html__( 'Letter Spacing, px', 'omens' ),
                'section'     => 'h2_typography',
                'field'        => 'lakit_responsive',
                'unit'        => 'px',
                'responsive'  => true,
                'input_attrs' => array(
                    'min'  => -10,
                    'max'  => 10,
                    'step' => 1,
                ),
                'type' => 'control',
                'transport'=> 'postMessage',
            ),
            'h2_character_set' => array(
                'title'   => esc_html__( 'Character Set', 'omens' ),
                'section' => 'h2_typography',
                'default' => 'latin',
                'field'   => 'select',
                'choices' => omens_customizer_get_character_sets(),
                'type'    => 'control',
                'transport'=> 'postMessage',
            ),
            'h2_text_align' => array(
                'title'   => esc_html__( 'Text Align', 'omens' ),
                'section' => 'h2_typography',
                'field'   => 'select',
                'choices' => omens_customizer_get_text_aligns(),
                'type'    => 'control',
                'transport'=> 'postMessage',
            ),

            /** `H3 Heading` section */
            'h3_typography' => array(
                'title'       => esc_html__( 'H3 Heading', 'omens' ),
                'priority'    => 20,
                'panel'       => 'typography',
                'type'        => 'section',
            ),
            'h3_font_family' => array(
                'title'   => esc_html__( 'Font Family', 'omens' ),
                'section' => 'h3_typography',
                'field'   => 'fonts',
                'type'    => 'control',
                'transport'=> 'postMessage',
            ),
            'h3_font_style' => array(
                'title'   => esc_html__( 'Font Style', 'omens' ),
                'section' => 'h3_typography',
                'field'   => 'select',
                'choices' => omens_customizer_get_font_styles(),
                'type'    => 'control',
                'transport'=> 'postMessage',
            ),
            'h3_font_weight' => array(
                'title'   => esc_html__( 'Font Weight', 'omens' ),
                'section' => 'h3_typography',
                'field'   => 'select',
                'choices' => omens_customizer_get_font_weight(),
                'type'    => 'control',
                'transport'=> 'postMessage',
            ),
            'h3_font_size' => array(
                'title'       => esc_html__( 'Font Size, px', 'omens' ),
                'section'     => 'h3_typography',
                'field'        => 'lakit_responsive',
                'unit'        => 'px',
                'responsive'  => true,
                'input_attrs' => array(
                    'min'  => 10,
                    'max'  => 200,
                    'step' => 1,
                ),
                'type' => 'control',
                'transport'=> 'postMessage',
            ),
            'h3_line_height' => array(
                'title'       => esc_html__( 'Line Height', 'omens' ),
                'description' => esc_html__( 'Relative to the font-size of the element', 'omens' ),
                'section'     => 'h3_typography',
                'field'       => 'number',
                'input_attrs' => array(
                    'min'  => 1.0,
                    'max'  => 3.0,
                    'step' => 0.1,
                ),
                'type' => 'control',
                'transport'=> 'postMessage',
            ),
            'h3_letter_spacing' => array(
                'title'       => esc_html__( 'Letter Spacing, px', 'omens' ),
                'section'     => 'h3_typography',
                'field'        => 'lakit_responsive',
                'unit'        => 'px',
                'responsive'  => true,
                'input_attrs' => array(
                    'min'  => -10,
                    'max'  => 10,
                    'step' => 1,
                ),
                'type' => 'control',
                'transport'=> 'postMessage',
            ),
            'h3_character_set' => array(
                'title'   => esc_html__( 'Character Set', 'omens' ),
                'section' => 'h3_typography',
                'default' => 'latin',
                'field'   => 'select',
                'choices' => omens_customizer_get_character_sets(),
                'type'    => 'control',
                'transport'=> 'postMessage',
            ),
            'h3_text_align' => array(
                'title'   => esc_html__( 'Text Align', 'omens' ),
                'section' => 'h3_typography',
                'field'   => 'select',
                'choices' => omens_customizer_get_text_aligns(),
                'type'    => 'control',
                'transport'=> 'postMessage',
            ),

            /** `H4 Heading` section */
            'h4_typography' => array(
                'title'       => esc_html__( 'H4 Heading', 'omens' ),
                'priority'    => 25,
                'panel'       => 'typography',
                'type'        => 'section',
            ),
            'h4_font_family' => array(
                'title'   => esc_html__( 'Font Family', 'omens' ),
                'section' => 'h4_typography',
                'field'   => 'fonts',
                'type'    => 'control',
                'transport'=> 'postMessage',
            ),
            'h4_font_style' => array(
                'title'   => esc_html__( 'Font Style', 'omens' ),
                'section' => 'h4_typography',
                'field'   => 'select',
                'choices' => omens_customizer_get_font_styles(),
                'type'    => 'control',
                'transport'=> 'postMessage',
            ),
            'h4_font_weight' => array(
                'title'   => esc_html__( 'Font Weight', 'omens' ),
                'section' => 'h4_typography',
                'field'   => 'select',
                'choices' => omens_customizer_get_font_weight(),
                'type'    => 'control',
                'transport'=> 'postMessage',
            ),
            'h4_font_size' => array(
                'title'       => esc_html__( 'Font Size, px', 'omens' ),
                'section'     => 'h4_typography',
                'field'        => 'lakit_responsive',
                'unit'        => 'px',
                'responsive'  => true,
                'input_attrs' => array(
                    'min'  => 10,
                    'max'  => 200,
                    'step' => 1,
                ),
                'type' => 'control',
                'transport'=> 'postMessage',
            ),
            'h4_line_height' => array(
                'title'       => esc_html__( 'Line Height', 'omens' ),
                'description' => esc_html__( 'Relative to the font-size of the element', 'omens' ),
                'section'     => 'h4_typography',
                'field'       => 'number',
                'input_attrs' => array(
                    'min'  => 1.0,
                    'max'  => 3.0,
                    'step' => 0.1,
                ),
                'type' => 'control',
                'transport'=> 'postMessage',
            ),
            'h4_letter_spacing' => array(
                'title'       => esc_html__( 'Letter Spacing, px', 'omens' ),
                'section'     => 'h4_typography',
                'field'        => 'lakit_responsive',
                'unit'        => 'px',
                'responsive'  => true,
                'input_attrs' => array(
                    'min'  => -10,
                    'max'  => 10,
                    'step' => 1,
                ),
                'type' => 'control',
                'transport'=> 'postMessage',
            ),
            'h4_character_set' => array(
                'title'   => esc_html__( 'Character Set', 'omens' ),
                'section' => 'h4_typography',
                'default' => 'latin',
                'field'   => 'select',
                'choices' => omens_customizer_get_character_sets(),
                'type'    => 'control',
                'transport'=> 'postMessage',
            ),
            'h4_text_align' => array(
                'title'   => esc_html__( 'Text Align', 'omens' ),
                'section' => 'h4_typography',
                'field'   => 'select',
                'choices' => omens_customizer_get_text_aligns(),
                'type'    => 'control',
                'transport'=> 'postMessage',
            ),

            /** `H5 Heading` section */
            'h5_typography' => array(
                'title'       => esc_html__( 'H5 Heading', 'omens' ),
                'priority'    => 30,
                'panel'       => 'typography',
                'type'        => 'section',
            ),
            'h5_font_family' => array(
                'title'   => esc_html__( 'Font Family', 'omens' ),
                'section' => 'h5_typography',
                'field'   => 'fonts',
                'type'    => 'control',
                'transport'=> 'postMessage',
            ),
            'h5_font_style' => array(
                'title'   => esc_html__( 'Font Style', 'omens' ),
                'section' => 'h5_typography',
                'field'   => 'select',
                'choices' => omens_customizer_get_font_styles(),
                'type'    => 'control',
                'transport'=> 'postMessage',
            ),
            'h5_font_weight' => array(
                'title'   => esc_html__( 'Font Weight', 'omens' ),
                'section' => 'h5_typography',
                'field'   => 'select',
                'choices' => omens_customizer_get_font_weight(),
                'type'    => 'control',
                'transport'=> 'postMessage',
            ),
            'h5_font_size' => array(
                'title'       => esc_html__( 'Font Size, px', 'omens' ),
                'section'     => 'h5_typography',
                'field'        => 'lakit_responsive',
                'unit'        => 'px',
                'responsive'  => true,
                'input_attrs' => array(
                    'min'  => 10,
                    'max'  => 200,
                    'step' => 1,
                ),
                'type' => 'control',
                'transport'=> 'postMessage',
            ),
            'h5_line_height' => array(
                'title'       => esc_html__( 'Line Height', 'omens' ),
                'description' => esc_html__( 'Relative to the font-size of the element', 'omens' ),
                'section'     => 'h5_typography',
                'field'       => 'number',
                'input_attrs' => array(
                    'min'  => 1.0,
                    'max'  => 3.0,
                    'step' => 0.1,
                ),
                'type' => 'control',
                'transport'=> 'postMessage',
            ),
            'h5_letter_spacing' => array(
                'title'       => esc_html__( 'Letter Spacing, px', 'omens' ),
                'section'     => 'h5_typography',
                'field'        => 'lakit_responsive',
                'unit'        => 'px',
                'responsive'  => true,
                'input_attrs' => array(
                    'min'  => -10,
                    'max'  => 10,
                    'step' => 1,
                ),
                'type' => 'control',
                'transport'=> 'postMessage',
            ),
            'h5_character_set' => array(
                'title'   => esc_html__( 'Character Set', 'omens' ),
                'section' => 'h5_typography',
                'default' => 'latin',
                'field'   => 'select',
                'choices' => omens_customizer_get_character_sets(),
                'type'    => 'control',
                'transport'=> 'postMessage',
            ),
            'h5_text_align' => array(
                'title'   => esc_html__( 'Text Align', 'omens' ),
                'section' => 'h5_typography',
                'field'   => 'select',
                'choices' => omens_customizer_get_text_aligns(),
                'type'    => 'control',
                'transport'=> 'postMessage',
            ),

            /** `H6 Heading` section */
            'h6_typography' => array(
                'title'       => esc_html__( 'H6 Heading', 'omens' ),
                'priority'    => 35,
                'panel'       => 'typography',
                'type'        => 'section',
            ),
            'h6_font_family' => array(
                'title'   => esc_html__( 'Font Family', 'omens' ),
                'section' => 'h6_typography',
                'field'   => 'fonts',
                'type'    => 'control',
                'transport'=> 'postMessage',
            ),
            'h6_font_style' => array(
                'title'   => esc_html__( 'Font Style', 'omens' ),
                'section' => 'h6_typography',
                'field'   => 'select',
                'choices' => omens_customizer_get_font_styles(),
                'type'    => 'control',
                'transport'=> 'postMessage',
            ),
            'h6_font_weight' => array(
                'title'   => esc_html__( 'Font Weight', 'omens' ),
                'section' => 'h6_typography',
                'field'   => 'select',
                'choices' => omens_customizer_get_font_weight(),
                'type'    => 'control',
                'transport'=> 'postMessage',
            ),
            'h6_font_size' => array(
                'title'       => esc_html__( 'Font Size, px', 'omens' ),
                'section'     => 'h6_typography',
                'field'        => 'lakit_responsive',
                'unit'        => 'px',
                'responsive'  => true,
                'input_attrs' => array(
                    'min'  => 10,
                    'max'  => 200,
                    'step' => 1,
                ),
                'type' => 'control',
                'transport'=> 'postMessage',
            ),
            'h6_line_height' => array(
                'title'       => esc_html__( 'Line Height', 'omens' ),
                'description' => esc_html__( 'Relative to the font-size of the element', 'omens' ),
                'section'     => 'h6_typography',
                'field'       => 'number',
                'input_attrs' => array(
                    'min'  => 1.0,
                    'max'  => 3.0,
                    'step' => 0.1,
                ),
                'type' => 'control',
                'transport'=> 'postMessage',
            ),
            'h6_letter_spacing' => array(
                'title'       => esc_html__( 'Letter Spacing, px', 'omens' ),
                'section'     => 'h6_typography',
                'field'        => 'lakit_responsive',
                'unit'        => 'px',
                'responsive'  => true,
                'input_attrs' => array(
                    'min'  => -10,
                    'max'  => 10,
                    'step' => 1,
                ),
                'type' => 'control',
                'transport'=> 'postMessage',
            ),
            'h6_character_set' => array(
                'title'   => esc_html__( 'Character Set', 'omens' ),
                'section' => 'h6_typography',
                'field'   => 'select',
                'choices' => omens_customizer_get_character_sets(),
                'type'    => 'control',
                'transport'=> 'postMessage',
            ),
            'h6_text_align' => array(
                'title'   => esc_html__( 'Text Align', 'omens' ),
                'section' => 'h6_typography',
                'field'   => 'select',
                'choices' => omens_customizer_get_text_aligns(),
                'type'    => 'control',
                'transport'=> 'postMessage',
            ),
        ];
        return $args;
    }
}
add_filter('lastudio-kit/theme/customizer/options', 'omens_setup_customizer');

/**
 * Move native `site_icon` control (based on WordPress core) into custom section.
 *
 * @since 1.0.0
 * @param  object $wp_customize
 * @return void
 */
if(!function_exists('omens_customizer_change_core_controls')){
    function omens_customizer_change_core_controls( $wp_customize ) {
        $wp_customize->remove_control('display_header_text');
        $wp_customize->remove_control('header_textcolor');
        $wp_customize->get_control( 'site_icon' )->section      = 'omens_favicon';
        $wp_customize->get_control( 'background_color' )->label = esc_html__( 'Body Background Color', 'omens' );
        $wp_customize->get_section( 'colors' )->title = esc_html__( 'Color Scheme', 'omens' );
    }
}

// Move native `site_icon` control (based on WordPress core) in custom section.
add_action( 'customize_register', 'omens_customizer_change_core_controls', 20 );


/**
 * Get font styles
 *
 * @since 1.0.0
 * @return array
 */
if(!function_exists('omens_customizer_get_font_styles')){
    function omens_customizer_get_font_styles() {
        return apply_filters( 'omens-theme/font/styles', array(
            'normal'  => esc_html__( 'Normal', 'omens' ),
            'italic'  => esc_html__( 'Italic', 'omens' ),
            'oblique' => esc_html__( 'Oblique', 'omens' ),
            'inherit' => esc_html__( 'Inherit', 'omens' ),
        ) );
    }    
}


/**
 * Get character sets
 *
 * @since 1.0.0
 * @return array
 */
if(!function_exists('omens_customizer_get_character_sets')){
    function omens_customizer_get_character_sets() {
        return apply_filters( 'omens-theme/font/character_sets', array(
            'latin'        => esc_html__( 'Latin', 'omens' ),
            'greek'        => esc_html__( 'Greek', 'omens' ),
            'greek-ext'    => esc_html__( 'Greek Extended', 'omens' ),
            'vietnamese'   => esc_html__( 'Vietnamese', 'omens' ),
            'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'omens' ),
            'latin-ext'    => esc_html__( 'Latin Extended', 'omens' ),
            'cyrillic'     => esc_html__( 'Cyrillic', 'omens' ),
        ) );
    }
}

/**
 * Get text aligns
 *
 * @since 1.0.0
 * @return array
 */
if(!function_exists('omens_customizer_get_text_aligns')){
    function omens_customizer_get_text_aligns() {
        return apply_filters( 'omens-theme/font/text-aligns', array(
            'inherit' => esc_html__( 'Inherit', 'omens' ),
            'center'  => esc_html__( 'Center', 'omens' ),
            'justify' => esc_html__( 'Justify', 'omens' ),
            'left'    => esc_html__( 'Left', 'omens' ),
            'right'   => esc_html__( 'Right', 'omens' ),
        ) );
    }   
}

/**
 * Get font weights
 *
 * @since 1.0.0
 * @return array
 */
if(!function_exists('omens_customizer_get_font_weight')){
    function omens_customizer_get_font_weight() {
        return apply_filters( 'omens-theme/font/weight', array(
            '100' => '100',
            '200' => '200',
            '300' => '300',
            '400' => '400',
            '500' => '500',
            '600' => '600',
            '700' => '700',
            '800' => '800',
            '900' => '900',
        ) );
    }   
}