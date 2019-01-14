<?php

#   HELPER "PROPS"
#
#   goods and stuff

#    26-Nov-15



    /** Testira da li se uoga korisnika poklapa sa minimalnim nivom autorizacije
     *
     *    @param int
     *    @param int
     *    @param bool=true
     *
     *    @return bool
     */
     function prolaz_po_ulozi($uloga, $min_uloga, $min_ispunjeno=true)
     {
        $arr_velicina = count($min_uloga);
        if($min_ispunjeno)
            return ($uloga >= $min_uloga) ? true : false;
        else {
            /*$CI =& get_instance();
            $CI->load->helper('array'); */
            for($i=0; $i<$arr_velicina; $i++)
            {
                if($uloga == $min_uloga[$i])
                    return true;
            }
            return false;
        }
     }





?>