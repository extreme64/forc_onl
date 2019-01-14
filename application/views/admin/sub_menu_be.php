
<ul class="archive-list">

        <li>
                <h5><a href="<?php print $base_url ?>admin/pocetna/" ><span class="fa fa-bars"></span> CMS početna</a></h5>
        </li>
        <li>
                <hr />
        </li>
        <li>
                <h5><a href="<?php print $base_url ?>admin/usluge" ><span class="fa fa-bars"></span> USLUGE</a></h5>
        </li>
        <li>
                <h5><a href="<?php print $base_url ?>admin/tekstovi" ><span class="fa fa-bars"></span> TEKSTOVI</a></h5>
        </li>
        <li>
                <h5><a href="<?php print $base_url ?>admin/kategorije" ><span class="fa fa-bars"></span> KATEGORIJE</a></h5>
        </li>
        <li>
                <h5><a href="<?php print $base_url ?>admin/slike" ><span class="fa fa-bars"></span> SLIKE</a></h5>
        </li>
        <li>
                <h5><a href="<?php print $base_url ?>admin/galerije" ><span class="fa fa-bars"></span> GALERIJE</a></h5>
        </li>
        <li>
                <h5><a href="<?php print $base_url ?>admin/reference" ><span class="fa fa-bars"></span> REFERENCE</a></h5>
        </li>

        <?php if (prolaz_po_ulozi($this->session->userdata("uloga"), 1)) : ?>
                        <li>
                                <h5><a href="<?php print $base_url ?>admin/stranice" ><span class="fa fa-bars"></span> Stranice sajta</a></h5>
                        </li>
                        <li>
                                <h5><a href="<?php print $base_url ?>admin/korisnici" ><span class="fa fa-bars"></span> Korisnici</a></h5>
                        </li>
                <?php endif ?>

        <?php if (prolaz_po_ulozi($this->session->userdata("uloga"), array(1, 2), false)) : ?>
                        <li>
                                <h5><a href="<?php print $base_url ?>admin/komentari" ><span class="fa fa-bars"></span> Komentari</a></h5>
                        </li>
                <?php endif ?>

        <?php if (prolaz_po_ulozi($this->session->userdata("uloga"), array(1), false)) : ?>
                         <li>
                                <hr />
                        </li>
                        <li>
                                <h5><a href="http://www.forwardcreating.com/owa/" target="_blank"><span class="fa fa-bars"></span> Analytics OWA</a></h5>
                        </li>

                        <li>
                                <hr />
                        </li>
                        <li>
                                <p><a href="<?php print $base_url ?>admin/db_ex/" ><span class="fa fa-database"></span> Baza aplikacije</a></p>
                        </li>
                        <li>
                                <p><a href="<?php print $base_url ?>admin/pocetna/log" ><span class="fa fa-edit"></span> Log</a></p>
                        </li>
                <?php endif ?>
</ul>
