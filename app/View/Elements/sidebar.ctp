<div id="sidebar">

    <h4 class="strong text-uppercase">Our Menu</h4>
    <ul class="nav nav-pills nav-stacked strong">
        <li <?= ($cur_page == 'Breakfast') ? "class=\"active\"" : "" ?>><a href="<?= $site_url ?>meal/Breakfast">Breakfasts</a>
        </li>
        <?php if ($myRole != 'Guest'): ?>
            <li <?= ($cur_page == 'Lunch') ? "class=\"active\"" : "" ?>><a href="<?= $site_url ?>meal/Lunch">Lunchs</a>
            </li>
        <?php endif; ?>
        <li <?= ($cur_page == 'Snack') ? "class=\"active\"" : "" ?>><a href="<?= $site_url ?>meal/Snack">Snacks</a></li>
        <?php if ($myRole != 'Guest'): ?>
            <li <?= ($cur_page == 'Dinner') ? "class=\"active\"" : "" ?>><a href="<?= $site_url ?>meal/Dinner">Dinners</a>
            </li><li <?= ($cur_page == 'MidnightSnack') ? "class=\"active\"" : "" ?>><a
                    href="<?= $site_url ?>meal/MidnightSnack">Midnight Snacks</a></li>
		<?php endif; ?>
    </ul>

    <div class="spacer"></div>

    <h4 class="strong text-uppercase">Our Contacts</h4>
    <ul class="nav nav-pills nav-stacked strong">
        <li>
            <a href="tel:639328800189">
                <span class="glyphicon glyphicon-earphone"></span> +63 932 880 0189
            </a>
            <a href="tel:639175399852">
                <span class="glyphicon glyphicon-earphone"></span> +63 917 539 9852
            </a>
        </li>
        <li>
            <a href="mailto:info@rlfooddelivery.com">
                <span class="glyphicon glyphicon-envelope"></span> info@rlfooddelivery.com
            </a>
        </li>
        <li class="active text-center strong text-uppercase"><br>
            <a data-toggle="modal" href="#modal-contact">Send A Message</a>
        </li>
    </ul>

</div><!-- #sidebar -->