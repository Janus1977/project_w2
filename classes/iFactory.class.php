<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author cbarrau-a
 */
interface iFactory {
    public static function create(database $oConnexion,array $datas,$callingObject);
    public static function update(database $oConnexion,array $datas,$callingObject);
    public static function get(database $oConnexion);
    public static function getByID(database $oConnexion,$id);
}
?>
