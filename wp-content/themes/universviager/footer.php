   <!-- Footer Section -->
    <footer>
        <div>
            <div>
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                    <img src="http://univers-viager.test/wp-content/uploads/2023/10/logo-white-universViager.svg" alt="Logo Univers Viagers"/>
                </a>
            </div>

            <!-- Navigation footer -->
            <nav id="site-navigation" class="main-navigation" role="navigation">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'container'      => 'ul',
                        'container_class' => 'footer-navigation',
                    ));
                    ?>
                    <div>
                        <span>Contact</span>
                        <a href="telto:05 56 21 91 44">
                            <img src="http://univers-viager.test/wp-content/uploads/2023/10/btn-AlertMail.svg" alt="icon alerte mail"/>
                            <p>05 56 21 91 44</p>
                        </a>
                        <a href="/">
                            <img src="http://univers-viager.test/wp-content/uploads/2023/10/ph_phone.svg" alt="icon alerte mail"/>
                            <p>Créez votre alerte email</p>
                        </a>
                    </div>
                </nav>

            
        </div>
        <div>
            <div>
                <a href="/">
                    <img src="http://univers-viager.test/wp-content/uploads/2023/10/mdi_linkedin.svg" alt="Logo Linkedin"/>
                 </a>
                 <a href="/">
                    <img src="http://univers-viager.test/wp-content/uploads/2023/10/mdi_twitter.svg" alt="Logo Twitter"/>
                 </a>
                 <a href="/">
                    <img src="http://univers-viager.test/wp-content/uploads/2023/10/mdi_facebook.svg" alt="Logo Facebook"/>
                 </a>
            </div>
            <div>
                <a href="/">
                    Mentions légales
                </a>
                <span> - </span>
                <a href="/">
                    RGPD
                </a>
                <span> - </span>
                <p>
                    Univers Viager 2023
                </p> 
            </div>
        </div>
    </footer>

</body>
</html>
