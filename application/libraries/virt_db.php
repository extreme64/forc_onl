<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Virt_db extends CI_Controller {

    private $tekstovi;
    private $komentari_na_post;
    private $stranice;
    private $usluge;
    private $staze;
    
    function __construct() {
        parent::__construct();
        $this->der[] = array('asasa');
        /** tekst id, autor id, autor ime, naslov, datum, tekst */
        $this->tekstovi["kat1"][] = array(1, 1, "neko", "Catsear ricebean rutabaga endive cauliflower sea lettuce", "22.12.2014", 
                  "Yeah, I like animals better than people sometimes...  Veggies es bonus vobis, proinde vos postulo essum magis kohlrabi welsh onion daikon amaranth tatsoi tomatillo 
                melon azuki bean garlic.");
                
        $this->tekstovi["kat1"][] = array(2, 2, "extreme64", "Catsear cauliflower garbanzo yarrow salsify chicory garlic", "21.12.2014", 
                  "Melon azuki bean garlic. Veggies es bonus vobis, proinde vos postulo essum magis kohlrabi welsh onion daikon amaranth tatsoi tomatillo 
                melon azuki bean garlic.");
                                           
        $this->tekstovi["kat1"][] = array(3, 1, "neko", "Veggies es bonus vobis", "18.12.2014", 
                  "Turnip greens yarrow ricebean rutabaga endive cauliflower sea lettuce kohlrabi amaranth water spinach avocado daikon napa cabbage asparagus winter purslane kale. Celery                         potato scallion desert raisin horseradish spinach carrot sokoCatsear cauliflower garbanzo yarrow salsify chicory garlic");
         
        
        $this->tekstovi["kat1"][] = array(4, 2, "extreme64", "You going to give me a dog for a pet", "17.12.2014", 
                  "Veggies es bonus vobis, proinde vos postulo essum magis kohlrabi welsh onion daikon amaranth tatsoi tomatillo 
                melon azuki bean garlic. Vobis, proinde vos postulo essum magis.

                Courgette tatsoi pea sprouts fava bean collard greens dandelion okra wakame 
                tomato. Dandelion cucumber earthnut pea peanut soko zucchini. Gumbo beet greens corn soko endive gumbo gourd. Parsley shallot.");
        
        
        $this->tekstovi["kat1"][] = array(5, 1, "neko", "And the good thing about dogs" , "11.10.2014", 
                  "Yeah, I like animals better than people sometimes... Especially dogs. Dogs are the best. Every time you come home, they act 
                like they haven't seen you in a year. And the good thing about dogs... is they got different dogs for different people. Like pit bulls. The dog of dogs. 
                Pit bull can be the right man's best friend... or the wrong man's worst enemy. You going to give me a dog for a pet, give me a pit bull. Give me... 
                Raoul. Right, Omar? Give me Raoul.");
            
        $this->tekstovi["kat1"][] = array(6, 2, "extreme64", "Catsear cauliflower garbanzo yarrow salsify chicory garlic", "6.10.2014", 
                  "Veggies es bonus vobis, proinde vos postulo essum magis kohlrabi welsh onion daikon amaranth tatsoi tomatillo 
                melon azuki bean garlic.

                Gumbo beet greens corn soko endive gumbo gourd. Parsley shallot courgette tatsoi pea sprouts fava bean collard greens dandelion okra wakame 
                tomato. Dandelion cucumber earthnut pea peanut soko zucchini.

                Turnip greens yarrow ricebean rutabaga endive cauliflower sea lettuce kohlrabi amaranth water spinach avocado daikon napa cabbage asparagus winter
                purslane kale. Celery potato scallion desert raisin horseradish spinach carrot soko. Lotus root water spinach fennel kombu maize bamboo shoot green 
                bean swiss chard seakale pumpkin onion chickpea gram corn pea. Brussels sprout coriander water chestnut gourd swiss chard wakame kohlrabi beetroot 
                carrot watercress. Corn amaranth salsify bunya nuts nori azuki bean chickweed potato bell pepper artichoke.");
            
        $this->tekstovi["kat2"][] = array(7, 3, "korisnik456", "Veggies es bonus vobis, proinde vos postulo essum magis", "10.9.2014",
                  "Celery quandong swiss chard chicory earthnut pea potato. Salsify taro catsear garlic gram celery bitterleaf wattle 
                seed collard greens nori. Grape wattle seed kombu beetroot horseradish carrot squash brussels sprout chard.

                Pea horseradish azuki bean lettuce avocado asparagus okra. Kohlrabi radish okra azuki bean corn fava bean mustard tigernut cama green bean celtuce 
                collard greens avocado quandong fennel gumbo black-eyed pea. Grape silver beet watercress potato tigernut corn groundnut. Chickweed okra pea winter 
                purslane coriander yarrow sweet pepper radish garlic brussels sprout groundnut summer purslane earthnut pea tomato spring onion azuki bean gourd. 
                Gumbo kakadu plum komatsuna black-eyed pea green bean zucchini gourd winter purslane silver beet rock melon radish asparagus spinach.");
        
        
        
        /** komentar id, autor id, autor ime, datum, tekst */
        $this->komentari_na_post[] =  array(6, 1, "neko","11.10.2014", "neko tamo  test tenskordf df d.");
        $this->komentari_na_post[] =  array(5, 2, "extreme64","6.10.2014", "Komentar jeki tmo test test tenskordf df d.");
        $this->komentari_na_post[] =  array(4, 3, "korisnik456","10.9.2014"," tamo asdsad as asd test tenskordf df d.");
        $this->komentari_na_post[] =  array(3, 1, "neko","12.7.2014", "neko tamo  test tenskordf df d.");
        $this->komentari_na_post[] =  array(2, 2, "extreme64","16.4.2014", "Komentar jeki tmo test test tenskordf df d.");
        $this->komentari_na_post[] =  array(1, 3, "korisnik456","22.3.2014"," tamo asdsad as asd test tenskordf df d.");
        
        
        
        
        /** stranica id, datum, naslov, tekst */
        $this->stranice['treca'] = array(3,"11.10.2014", "H1 tekst stranica naslov", "<div><p><strong>neko tamo</strong> teLorem ipsum dolor sit amet, 
                                                        no nec elitr fierent legendos,  </p></div>");
        $this->stranice['druga'] = array(2,"10.10.2014", "Prototip naslov", "<div><p><strong>neko tamo</strong> test tenskordf test tenskordf test tenskordf df d.df ssdf sdfs </p></div>");
        
        $this->stranice['prva'] = array(1,"11.7.2014",  "Test tekstic teksticke", "<div><p><strong>neko tamo</strong>  Neque porro quisquam est qui dolorem ipsum 
                                                        quia dolor sit amet, consectetur, adipisci velit is the first known version </p></div>");            
        
        
        
        /** usluga id, slika clasa, naslov, opis */
        $this->usluge[] = array(5, "li_bulb", "DIZAJN", "Treba vam pouzdan i kvaliteten koncept staze u Vašem kraju... Sada već imamo iskustva u vrednosti cele decenije, dizajna staza unutar                          bajk parka.");
        $this->usluge[] = array(4, "li_cup", "DELOVI", "Putem nas možete nabaviti najnoviju opremu i delove sa popustom, u nekoliko radnji na teritoriji Srbije.");
        $this->usluge[] = array(3, "li_clock", "RENTIRANJE", "U prolazu ste, ili pak još bez bajak u svojoj garaži? Nedostaje neki deo opreme? Treba vam 'šatl' prikolica? Mi imamo sve.");
        $this->usluge[] = array(2, "li_study", "VODIČI", "Prvi put u parku? Treba vam predvodnik/društvo za vožnju? Vodi;i su svaki vikend na tereni, neko je uvek spreman da vam se pridruži");
        $this->usluge[] = array(1, "li_like", "KONSULTACIJE", "Treba vam nov bajk? Treba neki savet? Naš team je uvek uz Vas sa desetina sklopljenih specijalovanih bajkova iza nas, isto toliko zadovoljnih bajkera.");
        $this->usluge[] = array(0, "li_lab", "SERVIS", "Najveći i najbolje opremljeni servis bicikala u ovom delu Srbije. Originalni alati i stručno osoblje garantuje i vrhunsku uslugu.Svi mi                         koji se time bavimo ujedno i vozimo tako da nam je sve to pre svega zadovoljstvo pa onda posao.");
        
        
         /** staza id,  duzina, ime, opis */
        $this->staze = array(
            array(4, 600, "FF",         "Tip: DUPLA CRNA | Freeride extreme"),
            array(3, 700, "GP",         "Tip: DUPLA CRNA | Downhill extreme"),
            array(2, 1500, "LONG JOHN", "Tip: PLAVA | Enduro singletrack"),
            array(1, 1300, "TROL",      "Tip: PLAVA | Downhill classic"),
            array(0, 1400, "PIONIRSKA", "Tip: CRNA | Downhill/Freerire")
        );
    }
    
    
    
    
    
    public function init() {
        
    }
    
    
    public function virtTekstovi()
    { 
        return $this->tekstovi;
    }
    
    public function virtKomentari()
    { 
        return $this->komentari_na_post;
    }
    
    public function virtStrane()
    { 
        return $this->stranice;
    }
    
    public function virtUsluge()
    { 
        return $this->usluge;
    }
    
    public function virtStaze()
    { 
        return $this->staze;
    }
	
}
