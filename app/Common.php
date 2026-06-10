<?php

/**
 * The goal of this file is to allow developers a location
 * where they can overwrite core procedural functions and
 * replace them with their own. This file is loaded during
 * the bootstrap process and is called during the framework's
 * execution.
 *
 * This can be looked at as a `master helper` file that is
 * loaded early on, and may also contain additional functions
 * that you'd like to use throughout your entire application
 /**
  * @see: https://codeigniter.com/user_guide/extending/common.html
  */

 if (! function_exists('d')) {
     /**
      * Custom d() function to render a table instead of Kint dump
      */
     function d($data)
     {
         if (empty($data)) {
             echo "<div class='alert alert-warning'>Data kosong.</div>";
             return;
         }

         $table = new \CodeIgniter\View\Table();

         $template = [
             'table_open' => '<table class="table table-striped table-bordered mt-3">',
         ];
         $table->setTemplate($template);

         // Convert to array if it's an object
         $arrayData = json_decode(json_encode($data), true);

         // Auto-generate headers from the first row keys
         $headers = array_keys(reset($arrayData));
         $table->setHeading($headers);

         echo $table->generate($arrayData);
     }
 }

