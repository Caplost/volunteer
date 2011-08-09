<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 *
 * encrypt the password the prefix default null
 * return the cryptographic password with function md5
 * 
 * 
 * @param type $pwd
 * @param type $prefix
 * @return type 
 * @author Yinneng Wang <337855696@qq.com>
 *  
 */
 function setPwd($pwd,$prefix=''){
     return md5($prefix.$pwd);
}
?>
