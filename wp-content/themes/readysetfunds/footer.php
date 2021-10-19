</div><!-- #content -->

<footer id="colophon" class="footer">
    <div class="site-info">
        <div class="footer-info footer-about">
            <h4 class="footer-head">About</h4>
            <!--<img src="<?php bloginfo('template_directory') ?>/assets/images/HorizontalLogo.svg" width="250px" height="auto" alt="logo"/>-->
            <p>123 NW 13 Street, Suite 201 Boca Raton, FL 33432</p>
            <p><strong>Tel:</strong> <a href="tel:8888059316">(888) 805-9316</a></p>
            <p><strong>Email:</strong> <a href="mailto:info@readysetfunds.com">info@readysetfunds.com</a></p>
        </div>
        <div class="footer-info footer-nav">
            <h4 class="footer-head">Quick Nav</h4>
            <?php echo str_replace('sub-menu', 'sub-menu-f', wp_nav_menu( array(
                        'menu'           => 'footer',
                        'menu_class'     => 'footer-menu',
                        'echo' => false,
                        'container'       => 'nav',
                        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                )));?>
        </div>
        <div class="footer-info footer-form">
            <h4 class="footer-head">Join The Community</h4>
            <p>Join our community of over 0 people who recieve free business growth advice.</p>
            <form class="footer_join_form">
                <input type="text" placeholder="email" class="footer-input">
                <input type="submit" value="Join" class="blue_button footer_submit">
            </form>
        </div>
        <div class="footer-share">
            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>"><i class="fa fa-linkedin"></i></a>
            <a href="http://www.reddit.com/submit?url=<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>&title=Ready%20Set%20Funds"><i class="fa fa-reddit-alien"></i></a>
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>"><i class="fa fa-facebook-f"></i></a>
            <a href="https://twitter.com/home?status=<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>"><i class="fa fa-twitter"></i></a>
        </div>
    </div><!-- .site-info -->
    <div class="footer_bottom">
        <p class="copyright">Copyright &copy; <?php echo auto_copyright() ?> <?php bloginfo('name'); ?> LLC. All Rights Reserved.
        <br>Made with <i class="fa fa-heart" style="color: #767676"></i> by <a href="https://buzbiz.com" style="color: #767676; font-weight: bold;">BuzBiz</a></p>
        <p class="terms-privacy"><a href="#">Terms of Use</a> | <a href="#">Privacy Policy</a></p>
    </div>
</footer><!-- #colophon -->

</div><!-- #page -->

<!--Js Files-->
<script src="<?php echo bloginfo('template_directory') ?>/assets/js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="<?php echo bloginfo('template_directory') ?>/assets/js/commonScripts.js"></script>
<?php wp_footer(); ?>

<script type="text/javascript">
    function go_to_calc() {
        loanamt = document.getElementById('loan_amount_required').value.replace(/[^0-9]/g, '');
        loancalculator = document.getElementById('business_loan_calculator');
        loan_calc_amt = document.getElementById('loan_amount');
        loan_calc_amt.value = loanamt;
        updateRangesAndCalculations();

        var headerOffset = 100;
        var calcPosition = loancalculator.getBoundingClientRect().top;
        var offsetPosition = calcPosition - headerOffset;

        window.scrollTo({
            top: offsetPosition,
            behavior: "smooth"
        });
    }
</script>
</body>

</html>