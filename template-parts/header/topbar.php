
<div class="top-area-block">
    <ul class="unlist contacts d-flex">
        <li><i class="las la-map-marker-alt"></i><p class="contacts-address"><?php the_field('Address', 'option'); ?></p></li>
        <li><i class="las la-phone"></i><a class="contacts-phone" href="tel:<?php the_field('phone_number', 'option'); ?>"><?php the_field('phone_number', 'option'); ?></a></li>
        <li><i class="lar la-envelope"></i><a class="contacts-email" href="mailto:<?php the_field('email_address', 'option'); ?>"><?php the_field('email_address', 'option'); ?></a></li>
        <li><i class="lab la-facebook-f"></i><a class="socials-item"
            href="<?php the_field('facebook_url', 'option'); ?>"
            target="_blank" title="Facebook">

            <span style="font-size: 14px;">Follow Us</span>
        </a></li>
    </ul>
</div>