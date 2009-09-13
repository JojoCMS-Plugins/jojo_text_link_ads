<?php
/**
 *                    Jojo CMS
 *                ================
 *
 * Copyright 2007-2008 Harvey Kane <code@ragepank.com>
 * Copyright 2007-2008 Michael Holt <code@gardyneholt.co.nz>
 * Copyright 2007 Melanie Schulz <mel@gardyneholt.co.nz>
 *
 * See the enclosed file license.txt for license information (LGPL). If you
 * did not receive this file, see http://www.fsf.org/copyleft/lgpl.html.
 *
 * @author  Harvey Kane <code@ragepank.com>
 * @license http://www.fsf.org/copyleft/lgpl.html GNU Lesser General Public License
 * @link    http://www.jojocms.org JojoCMS
 */

function getTextLinkAds($xmlkey) {
    foreach (Jojo::listPlugins('external/snoopy/Snoopy.class.php') as $pluginfile) {
        require_once($pluginfile);
        break;
    }
    $snoopy = new snoopy();
    $xmlurl = "http://www.text-link-ads.com/xml.php?inventory_key=".$xmlkey."&referer=".$_SERVER['REQUEST_URI'];
    $snoopy->fetch($xmlurl);
    $xml     = $snoopy->results;
    $xml_obj = simplexml_load_string($xml);
    $output  = array();
    $i      = 0;
    
    foreach ($xml_obj->Link as $link_data) {
        $output[$i]                = array();
        $output[$i]['url']         = $link_data->URL;
        $output[$i]['text']        = $link_data->Text;
        $output[$i]['beforetext']  = $link_data->BeforeText;
        $output[$i]['aftertext']   = $link_data->AfterText;
        //echo "{$link_data->BeforeText} <a href=\"{$link_data->URL}\">{$link_data->Text}</a> {$link_data->AfterText} ";
        $i++;
    }
    return $output;
}