<?php

class FirstOrderWalker extends Walker_Nav_Menu {

    function display_element ($element, &$children_elements, $max_depth, $depth = 0, $args, &$output){
        // check, whether there are children for the given ID and append it to the element with a (new) ID
        $element->hasChildren = isset($children_elements[$element->ID]) && !empty($children_elements[$element->ID]);
        return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }

    function start_lvl(&$output, $depth) {
        $output .= '<ul class="ul-depth-' . $depth . '">';
    }

    function end_lvl(&$output, $depth) {
        $output .= "</ul>";
    }

    function start_el(&$output, $item, $depth, $args){
        if ( $depth === 0 ) {
            $s_Target = (strlen($item->target) > 0) ? 'target="'.$item->target.'"' : '';
            if($item->hasChildren){
                //$item_output = '<a class="item" title="'.$item->title.'" target="'.$item->target.'" data-toggle="modal" data-target="#submenu-' . $item->ID . '">'.$item->title.'</a>';
                $item_output = '<a class="item submenu-toggle" data-target="#submenu-' . $item->ID . '" title="'.$item->title.'" '.$s_Target.'>'.$item->title.'</a>';
                $output .= '<li id="menu-item-'. $item->ID . '" class="li-depth-' . $depth . '">' . $item_output ;   
            } else {
                $activeMenuItemClass = (in_array('current-menu-item', $item->classes)) ? ' class="active"' : '';
                $item_output = '<a class="item" href="'.$item->url.'" title="'.$item->title.'" '.$s_Target.'>'.$item->title.'</a>';
                $output .= '<li '.$activeMenuItemClass.' id="menu-item-'. $item->ID . '" class="li-depth-' . $depth . '">' . $item_output ;     
            }
        } else {
 
        }
    }

    function end_el(&$output, $item, $depth, $args) {
        if ( $depth === 0 ) {
            $output .= '</li>';
        } else {

        }
    }
}

class submenuWalker extends Walker_Nav_Menu{

    
    function start_lvl(&$output, $depth) {

        $output .= '<ul class="ul-depth-' . $depth . '">';

    }

    function end_lvl(&$output, $depth) {

        $output .= "</ul>";
    }

    function start_el(&$output, $item, $depth, $args){
        $s_Target = (strlen($item->target) > 0) ? 'target="'.$item->target.'"' : '';
        if ( $depth === 0 ) {

            $output .= '<div id="submenu-' . $item->ID . '" class="submenu-panel fade"><i class="submenu-dismiss glyphicon glyphicon-remove pull-right"></i>';
            $output .= '<div class="submenu-panel-inner submenu-' . $item->ID . '">';

            if($item->url !== '#' && $item->url !== NULL){
                $output .= '<span class="overview-page-link"><a href="' . $item->url . '" '.$s_Target.'>zur Übersichtsseite ' . $item->title . '</a></span>';
            }
            //return;

        } else {

            $item_output = '<a class="item" href="'.$item->url.'" title="'.$item->title.'" '.$s_Target.' rel="'.$item->rel.'">'.$item->title.'</a>';

            $output .= '<li id="main-menu-item-'. $item->ID . '" class="li-depth-' . $depth . '">' . $item_output ;
           
        }

        

    }

    function end_el(&$output, $item, $depth, $args) {

        if ( $depth === 0 ) {

            $output .= '</div><!-- ./submenu-panel-inner -->';
            $output .= '</div><!-- ./submenu-panel -->';
            //return;

        } else {

            $output .= '</li>';

        }

        


    }
}




/*

// UNUSED 

class MobileWalker extends Walker_Nav_Menu {

    function display_element ($element, &$children_elements, $max_depth, $depth = 0, $args, &$output){
        // check, whether there are children for the given ID and append it to the element with a (new) ID
        $element->hasChildren = isset($children_elements[$element->ID]) && !empty($children_elements[$element->ID]);
        return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }

    function start_lvl(&$output, $depth) {
        if($depth === 0) {
            $output .= '<ul class="dropdown-menu depth-' . $depth . '">';
        } else {
            $output .= '<ul class="dropdown-menu sub-menu depth-' . $depth . '">';
        }
    }

    function end_lvl(&$output, $depth) {
        $output .= "</ul>";
    }

    function start_el(&$output, $item, $depth, $args){
        $s_Target = (strlen($item->target) > 0) ? 'target="'.$item->target.'"' : '';
        if($item->hasChildren){
            $item_output = '<a href="' . $item->url . '" class="trigger sub-menu-a dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" title="'.$item->title.'" '.$s_Target.'>'.$item->title.'<span class="caret"></span></a>';
            $output .= '<li class="dropdown">' . $item_output ;
        } else {
            $item_output = '<a href="' . $item->url . '" class="sub-menu-a" title="'.$item->title.'" '.$s_Target.'>'.$item->title.'</a>';
            $output .= '<li>' . $item_output ;     
        }
    }

    function end_el(&$output, $item, $depth, $args) {
        $output .= '</li>';
    }
}

*/
















