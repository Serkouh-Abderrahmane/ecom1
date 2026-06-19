<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
    #map { height: 420px; width: 100%; }
</style>

<div class="m-page">
    <h1 style="font-size:28px;font-weight:700;margin-bottom:8px;"><?= lang('contact_us') ?></h1>
    <p style="font-size:16px;color:#666;margin-bottom:32px;"><?= lang('contact_us_feel_free') ?></p>

    <div style="display:grid;grid-template-columns:1fr 360px;gap:40px;">
        <div style="border:1px solid var(--color-border);padding:32px;">
            <?php if ($this->session->flashdata('resultSend')) { ?>
                <div style="padding:16px;border:1px solid var(--color-border);margin-bottom:24px;font-size:14px;">
                    <?= $this->session->flashdata('resultSend') ?>
                </div>
            <?php } ?>

            <form method="POST" action="">
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;">
                    <div>
                        <label class="m-label"><?= lang('name') ?></label>
                        <input type="text" name="name" id="name" class="m-input" required>
                    </div>
                    <div>
                        <label class="m-label"><?= lang('email_address') ?></label>
                        <input type="email" name="email" id="email" class="m-input" required>
                    </div>
                    <div style="grid-column:1/-1;">
                        <label class="m-label"><?= lang('subject') ?></label>
                        <input type="text" name="subject" id="subject" class="m-input">
                    </div>
                    <div style="grid-column:1/-1;">
                        <label class="m-label"><?= lang('message') ?></label>
                        <textarea name="message" id="message" class="m-input" rows="7" required></textarea>
                    </div>
                </div>
                <div style="display:flex;justify-content:flex-end;margin-top:20px;">
                    <button type="submit" class="m-btn" id="btnContactUs"><?= lang('send_message') ?> →</button>
                </div>
            </form>
        </div>

        <div>
            <div style="border:1px solid var(--color-border);padding:32px;">
                <h3 style="font-size:16px;font-weight:600;margin-bottom:16px;"><?= lang('our_office') ?></h3>
                <div style="font-size:15px;color:#666;line-height:1.8;">
                    <?= html_entity_decode($contactspage) ?>
                </div>
            </div>
        </div>
    </div>

    <?php if (trim($googleApi) != null && trim($googleMaps) != null) { ?>
        <div style="margin-top:40px;border:1px solid var(--color-border);overflow:hidden;">
            <div id="map"></div>
        </div>
        <?php $coordinates = explode(',', $googleMaps); ?>
        <script src="https://maps.googleapis.com/maps/api/js?key=<?= $googleApi ?>"></script>
        <script>
            function initialize() {
                var myLatlng = new google.maps.LatLng(<?= $coordinates[0] ?>, <?= $coordinates[1] ?>);
                var mapOptions = { zoom: 10, center: myLatlng };
                var map = new google.maps.Map(document.getElementById("map"), mapOptions);
                var marker = new google.maps.Marker({ position: myLatlng, title: "Here we are!" });
                marker.setMap(map);
            }
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
    <?php } ?>
</div>