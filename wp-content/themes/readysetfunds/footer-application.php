<footer id="colophon" class="app_footer">
    <div class="app_footer_nav">
        <button class="app_nav_btn btn_back" id="back" onclick="goBack()"><i class="fa fa-angle-double-left"></i>
            Back</button>
        <button class="app_nav_btn btn_cont" id="continue" onclick="goForward()">Continue <i
                class="fa fa-angle-double-right"></i></button>
    </div>
    <div class="app_footer_bottom">
        <p class="terms-privacy-sec"><a href="#">Terms of Use</a> | <a href="#">Privacy Policy</a> | <a
                href="#">Security Policy</a></p>
    </div>
</footer><!-- #colophon -->

<script type="text/javascript"
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbWin1wKBILpnCVdiqqbdPcl4wWNzH9vk&libraries=places&callback=initAutocomplete"
    async defer></script>
<script type="text/javascript" src="<?php echo bloginfo('template_directory') ?>/assets/js/addressFill.js"></script>

<?php wp_footer(); ?>
<!--Js Files-->
<script src="<?php echo bloginfo('template_directory') ?>/assets/js/apply.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="<?php echo bloginfo('template_directory') ?>/assets/js/commonScripts.js"></script>
</body>

</html>