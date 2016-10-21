<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Codeigniter Navigation Helper
*
* This is a small helper to create dynamic navigation menus in codeigniter. 
*
* @author Ramon Lapenta <me@ramonlapenta.com>
* @copyright Public Domain
* @license http://ramonlapenta.com/license.txt
*
*/

if ( ! function_exists('menu')) {
    function menu( $items, $sel = '', $class = '' ) {
        if( ! empty( $class ) ) {
            $menu = '<ul class = "' . $class . '">' . "\n";
        } else {
            $menu = '<ul>' . "\n";
        }
        
        $icon = '<i class="fa fa-circle-o"></i>';
        
        foreach( $items as $item ) {
            $id = ( ! empty( $item['id'] ) ) ? ' id = "'. $item['id'] . '"' : '';
            $current = ( in_array( $sel, $item ) ) ? ' class="active"' : '';
            $menu .= '<li' . $current . '><a href="' . $item['link'] . '"'. $id . '>' . $icon . $item['title'] . '</a></li>' . "\n";
        }
        $menu .= '</ul>' . "\n";
        return $menu;
    }
}

if ( ! function_exists('menu_nav')){
    /**
    * Navigation Menu
    *
    * Creates a il list with icons and staff
    *
    * @param	array	a multidimensional array with the menu
    * @param	array	branch and leaf selection, leaf class
    * array('branch_select' => '', 'leaf_class' => 'requeried','leaf_select' => '',);
    * @return	string
    */
    function menu_nav( $items = array(), $config = array() ) {      
        
        $branch_select = 'none';
        $leaf_select = 'none';
        
        if( ! empty( $config['branch_select'] )){
            $branch_select = $config['branch_select'];
        }
        
        if( ! empty( $config['leaf_select'] )){
            $leaf_select = $config['leaf_select'];
        }
        
        $menu = '';
        
        foreach( $items as $key => $value ) {
            $id = ( ! empty( $value['id'] ) ) ? ' id="'. $value['id'] . '"' : '';
            $link = ( ! empty( $value['link'] ) ) ? $value['link'] : '';
            $icon = ( ! empty( $value['icon'] ) ) ? '<i class="' . $value['icon'] . '"></i>' : '';
            $arrow = ( ! empty( $value['items'] ) ) ? '<span class="fa fa-angle-left pull-right"></span>' : '';
                        
            $active = ( in_array( $branch_select, $value ) ) ? ' active ' : '';            
            $menu .= '<li class = "treeview' . $active . '" ><a href="' . $link . '"'. $id . '>' . $icon . ' ' . $value['title'] . $arrow .' </a>' . "\n";

            if(isset($value['items'])){
                $menu .= menu($value['items'], $leaf_select, 'treeview-menu');
            }            
            $menu .= '</li>' . "\n";
        }
        
        return $menu;
    }
}

if ( ! function_exists('menu_prv')) {
    function menu_prv( $items = array(), $config = array() ) {
        $class = '';
        $id = '';
        $selected = '';
        $link_class = '';
        
        if( ! empty( $config['class'] )){
            $class = 'class="' .$config['class'] . '" ';
        }
        
        if( ! empty( $config['id'] )){
            $id = 'id="' . $config['id'] . '" ';
        }
        
        if( ! empty( $config['selected'] )){
            $selected = $config['selected'];
        }
        
        if( ! empty( $config['link_class'] )){
            $link_class = $config['link_class'];
        }
        
        $menu = '<ul ' . $class . $id . '> ';
                
        if( ! empty( $link_class ) ) {
            $link = '<a class="' . $link_class . '"' . "\n";
        } else {
            $link = '<a' . "\n";
        }
        
        foreach( $items as $item ) {
            $id = ( ! empty( $item['id'] ) ) ? ' id="'. $item['id'] . '"' : '';
            $current = ( in_array( $selected, $item ) ) ? ' class="active"' : '';
            $menu .= '<li' . $current . '>'. $link .' href="' . $item['link'] . '"'.$id . '>' . $item['title'] . '</a></li>' . "\n";
        }
        $menu .= '</ul>' . "\n";
        return $menu;
    }
}

if ( ! function_exists('menup')) {
    function menup( $items, $sel = '', $class = '', $sep = '|' ) {
        if( ! empty( $class ) ) {
            $menup = '<p class="' . $class . '">' . "\n";
        } else {
            $menup = '<p>' . "\n";
        }
        $count = count($items);
        $i = 0;
        foreach( $items as $item ) 
        {
            $id = ( ! empty( $item['id'] ) ) ? ' id="'. $item['id'] . '"' : '';
            $current = ( in_array( $sel, $item ) ) ? ' class="current"' : '';
            $menup .= '<a href="' . base_url() . $item['link'] . '"'.$id . ' ' . $current . '>' . $item['title'] . '</a>' . "\n";
            $i++;
            if( $count != $i )
            {
                $menup .= ' ' . trim( $sep ) . ' ';
            }
        }
        $menup .= '</p>' . "\n";
        return $menup;
    }
}

/* End of file nav_helper.php */
/* Location: ./system/helpers/nav_helper.php */