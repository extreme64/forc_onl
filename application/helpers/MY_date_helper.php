<?php
#   EXTEND helper 'date'


    function sada()
    {
        return now();
    }

    function formatDatum($unix_ts="")
    {
        if($unix_ts=="")
            $unix_ts = time();
        return date("d/m/Y", $unix_ts);
    }
    
    function formatVreme($unix_ts="")
    {
        if($unix_ts=="")
            $unix_ts = time();
        return date("H:i", $unix_ts);
    }
    

    /** function preKolikoCeoFormat
    * Koristi preKoliko() da oformi ceo string sa svim vrem. jedin. koji predstavlja od kada je nesto
    * na osnovu UNIX t.s.-a 
    */
    function preKolikoCeoFormat($unix_ts, $vratiSamonajvecuJedinicu = FALSE)
    {
        $u1 = preKoliko($unix_ts, "godina", true);
        if($vratiSamonajvecuJedinicu==true && $u1>0)
            return $u1;
        $u2 = preKoliko($unix_ts, "mesec", true);
        if($vratiSamonajvecuJedinicu==true && $u2>0)
            return $u2;
        $u3 = preKoliko($unix_ts, "nedelja", true);
        if($vratiSamonajvecuJedinicu==true && $u3>0)
            return $u3;
        $u4 = preKoliko($unix_ts, "sat", true);
        if($vratiSamonajvecuJedinicu==true && $u4>0)
            return $u4;
        $u5 = preKoliko($unix_ts, "minut", true);
        if($vratiSamonajvecuJedinicu==true && $u5>0)
            return $u5;
        return $u1." ".$u2." ".$u3." ".$u4." ".$u5;
        
    }

    /** function preKoliko (potenc. PRIVATE)
    * Na osnovu CI timespan(), segmentira string, izvlaci pojedine vrednosti i dodaje tekstualni sufiks
    * Vraca formatiranu jedinicu vremena na osnovu UNIX t.s.-a
    */
    function preKoliko($unix_ts, $unit="minut", $textsux = true)
    {
        $prekoliko = timespan($unix_ts); // drugi aprametar je ako izostavljen podrazumevano now()
        $prekoliko_exp = explode(", ", $prekoliko);
        
        $godina =  count(preg_grep("/^.*Year.*/",       $prekoliko_exp))>0  ?   preg_grep("/^.*Year.*/",   $prekoliko_exp) : array("");
        $mesec =   count(preg_grep("/^.*Month.*/",      $prekoliko_exp))>0  ?   preg_grep("/^.*Month.*/",  $prekoliko_exp) : array("");
        $nedelja = count(preg_grep("/^.*Week.*/",       $prekoliko_exp))>0  ?   preg_grep("/^.*Week.*/",   $prekoliko_exp) : array("");
        $sat = count(preg_grep("/^.*Hour.*/",       $prekoliko_exp))>0  ?   preg_grep("/^.*Hour.*/",   $prekoliko_exp) : array("");
        $minut =   count(preg_grep("/^.*Minut.*/",      $prekoliko_exp))>0  ?   preg_grep("/^.*Minut.*/",  $prekoliko_exp) : array("");
        
        $zasebne_jedinice_vremena = array(
            'godina' => $godina,
            'mesec' => $mesec,
            'nedelja' => $nedelja,
            'sat' => $sat,
            'minut' => $minut
        );
        $element = element($unit, $zasebne_jedinice_vremena); //vraca po key
        $prekoliko_vreme_jedinica;
        for( $i=0; $i<count($prekoliko_exp); $i++ )
        {   
            if( array_key_exists ( $i , $element ) )
                $prekoliko_vreme_jedinica = explode(" ",$element[$i]);
        }
        $tekst_str = "";
        switch($unit)
        {
            case 'godina': if($prekoliko_vreme_jedinica[0]==0){ break; } $tekst_str = ($prekoliko_vreme_jedinica[0] < 5 )   ?   "godine" : $unit ; break;
            case 'mesec':  if($prekoliko_vreme_jedinica[0]==0){ break; } $tekst_str = 1*(substr($prekoliko_vreme_jedinica[0], -1)) < 5   ?  "meseca" : "meseci" ; break;
            case 'nedelja': if($prekoliko_vreme_jedinica[0]==0){ break; } $tekst_str = ($prekoliko_vreme_jedinica[0] < 5 )   ?   "nedelje" : $unit ; break;
            case 'sat': if($prekoliko_vreme_jedinica[0]==0){ break; } $tekst_str = (5 > $prekoliko_vreme_jedinica[0] || $prekoliko_vreme_jedinica[0] > 20 )   ?   "sata" : "sati" ; break;
            case 'minut': if($prekoliko_vreme_jedinica[0]==0){ break; } $tekst_str = 1*(substr($prekoliko_vreme_jedinica[0], -1)) == 1   ?  $unit : "minuta" ; break;

        }
        return $prekoliko_vreme_jedinica[0]." ".$tekst_str;
    }
    

?>