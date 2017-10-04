<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author a459000
 */
interface iManager {
    public function create(array $datas);
    public function get();
    public function update(array $data);
    public function delete($id);
    public function findBy($champ,$data="");
    public function isValid($datas);
}
?>
