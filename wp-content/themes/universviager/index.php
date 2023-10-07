<?php get_header(); ?>
    

    <!-- Main Content Area -->
    <main id="content" class="site-content">

        <!-- Section 1 - FORMULAIRE HERO -->
        <section class="home-section1">
            <div style="background-image:url('<?php the_field('arriere_plan_du_bloc'); ?>');">
                <div class="bloc-form">
                    <?= get_field('titre_du_bloc') ?>
                    
                    <?php ?>
                    <div>
                        <div>
                            <p><?= get_field('titre_du_formulaire') ?></p>
                        </div>

                        <div>
                            <?php         
	                            
                                $args = array(
                                    'post_id' => 'new_post', // On va créer une nouvelle publication
                                    'new_post' => array(
                                        'post_type' => 'form_estimation', // Enregistrer dans l'annuaire
                                        'post_status' => 'publish', // Enregistrer en brouillon
                                    ),
                                    'field_groups' => array( 369 ), // L'ID du post du groupe de champs
                                    'submit_value' => 'Recevoir mon estimation', // Intitulé du bouton
                                );

                                acf_form( $args );
                            ?>
                        </div>
                    </div>
                    <div>
                    <?php
                            $group = get_field('groupe_information_bloc');
                            $img1 = $group['icon_bloc_gauche'];
                            $texte1 = $group['texte_bloc_gauche'];
                            $img2 = $group['icon_bloc_droit'];
                            $texte2 = $group['texte_bloc_droit'];
                            echo '<div><img src="' . $img1 . '"/>';
                            echo $texte1 . '</div>';
                            echo '<div><img src="' . $img2 . '"/>';
                            echo $texte2 . '</div>';
                        ?>

                    </div>
                    
                </div>
            </div>
        </section>

        <!-- Section 2 - ANNONCES-->
        <section class="home-section2">
            <div>
                <?= get_field('titre_bloc_annonce') ?>
                <div>
                    <div>
                        <?php
                            $args = array(
                                'post_type' => 'annonce_viager',
                                'posts_per_page' => 3, 
                            );

                            $custom_query = new WP_Query($args);

                            if ($custom_query->have_posts()) :
                                while ($custom_query->have_posts()) :
                                    $custom_query->the_post();

                                    $titreannonce = get_the_title();
                                    $imgannonce = get_field('image_annonce');
                                    $communeannonce = get_field('commune');
                                    $codepostalannonce = get_field('code_postal');
                                    $linkannonce = get_permalink();

                                    
                                    echo '<div><div><div><img src="' . $imgannonce . '" alt=""/></div>';
                                    echo '<div><div><p>' . $titreannonce . '</p>';
                                    echo '<div><img src="http://univers-viager.test/wp-content/uploads/2023/10/ph_map-pin-fill.svg" alt=""/>';
                                    echo '<div><span>' . $codepostalannonce . '</span><span>' . $communeannonce . '</span></div></div></div>';
                                    echo '<a href="/">Plus d\'info</a></div></div></div>';
                                    

                                endwhile;
                                wp_reset_postdata();
                            else : 
                                // Aucune publication trouvée
                            endif;
                            ?>
                            <div>
                                <?php
                                    $group = get_field('bouton_annonce');
                                    $texteBtn = $group['texte_bouton_annonce'];
                                    $imgBtn = $group['icon_bouton_annonce'];
                                    $lienBtn = $group['lien_bouton_annonce'];
                                    echo '<a href="' . $lienBtn . '"><p>' . $texteBtn . '</p><img src="' . $imgBtn . '"/></a>';
                                ?>
                            </div>
 
                    </div>
                    
                </div>
            </div>

        </section>


        <!-- Section 3 - Univers viager-->
        <section class="home-section3">
            <div>
                <div>
                    <?php
                            $group = get_field('bloc_texte_univers_viagers');
                            $titleUnivers = $group['titre_bloc_univers_viager'];
                            $subtitleUnivers = $group['sous-titre_bloc_univers_viager'];
                            $textUnivers = $group['texte_bloc_univers_viager'];
                            $groupbtnUnivers = $group['bouton_bloc_texte_univers_viager'];
                            $btntextUnivers = $groupbtnUnivers['texte_bouton_bloc_texte_univers_viager'];
                            $btnlinkUnivers = $groupbtnUnivers['lien_bouton_bloc_texte_univers_viager'];
                            echo '<h2>' . $titleUnivers . '</h2>';
                            echo '<span>' . $subtitleUnivers . '</span>';
                            echo '<p>' . $textUnivers . '</p>';
                            echo '<a href="' . $btnlinkUnivers . '">' . $btntextUnivers . '</a>';
                        ?>
                </div>
                <div>
                    <?php
                            $group = get_field('bloc_images_univers_viager');
                            $img1 = $group['image_du_haut_bloc_image_univers_viager'];
                            $img2 = $group['image_du_bas_gauche_bloc_image_univers_viager'];
                            $img3 = $group['image_du_bas_droit_bloc_image_univers_viager'];
                            echo '<div><img src="' . $img1 . '"/></div>';
                            echo '<div><img src="' . $img2 . '"/>';
                            echo '<img src="' . $img3 . '"/></div>';
                        ?>
                </div>
            </div>
        </section>


        <!-- Section 4 - Nos agences -->
        <section class="home-section4">
            <div>
                <div>
                <img src="<?= get_field('image_bloc_agences') ?>" alt=""/>
                </div>
                <div>
                    <?php
                            $group = get_field('bloc_texte_agences');
                            $titre = $group['titre_bloc_texte_agences'];
                            $groupetiquette = $group['etiquettes_nombre_agences'];
                            $imgetiquette = $groupetiquette['image_etiquettes_nombre_agences'];
                            $textetiquette = $groupetiquette['texte_etiquettes_nombre_agences'];
                            $text = $group['texte_bloc_texte_agence'];
                            $groupbn = $group['bouton_bloc_texte_agences'];
                            $btntexttiquette = $groupbn['texte_bouton_bloc_texte_agences'];
                            $btnlinketiquette = $groupbn['lien_bouton_bloc_texte_agences'];
                            echo $titre;
                            echo '<div><img src="' . $imgetiquette . '"/>' . $textetiquette . '</div>';
                            echo '<div>' . $text . '</div>';
                            echo '<a href="' . $btnlinketiquette . '">' . $btntexttiquette . '</a>';
                        ?>
                </div>
            </div>
        </section>


        <!-- Section 5 - Le viager -->
        <section class="home-section5">
            <div>
                <div>
                        <?php
                                $group = get_field('bloc_texte_viager');
                                $titre = $group['titre_bloc_texte_viager'];
                                $text = $group['texte_bloc_texte_viager'];
                                $groupvendeur = $group['bloc_vendeur_viager'];
                                $imgvendeur = $groupvendeur['image_bloc_vendeur_viager'];
                                $textvendeur = $groupvendeur['texte_bloc_vendeur_viager'];
                                $groupacheteur = $group['bloc_acheteur_viager'];
                                $imgacheteur = $groupacheteur['image_bloc_acheteur_viager'];
                                $textacheteur = $groupacheteur['texte_bloc_acheteur_viager'];
                                $groupbtn = $group['bouton_bloc_texte_viager'];
                                $btntext = $groupbtn['texte_bouton'];
                                $btnlink = $groupbtn['lien_bouton'];
                                echo $titre;
                                echo '<div><div>' . $text .'</div>';
                                echo '<div><div><img src="' . $imgvendeur . '" alt=""/>';
                                echo '<div>' . $textvendeur .'</div></div>';
                                echo '<div><img src="' . $imgacheteur . '" alt=""/>';
                                echo '<div>' . $textacheteur .'</div></div></div>';
                                echo '<a href="' . $btnlink . '">' . $btntext . '</a></div>';
                            ?>
                    </div>
                <div>
                    <img src="<?= get_field('bloc_image_viager') ?>" alt=""/>
                </div>
            </div>
        </section>

        <!-- Section 6  - Avis client  -->
        <section class="home-section6">
            <div>
                <?= get_field('titre_avis_client') ?> 
                <div class="slide-container">
                <div class="custom-slider fade" style="display:block">
                    <div>
                        <div class="fade1">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit</p>
                            <div>
                                <img src="http://univers-viager.test/wp-content/uploads/2023/10/alberto-barbarisi-sO3WT9XJOhE-unsplash-1.png" alt=""/>
                                <div>
                                    <span>Marie dupont</span>
                                    <span>Décembre 2022</span>
                                </div>
                            </div>
                            <div>
                                <img src="http://univers-viager.test/wp-content/uploads/2023/10/avis-star.svg" alt=""/>
                                <div></div>
                            </div>       
                        </div>
                        <div class="fade2">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit</p>
                            <div>
                                <img src="http://univers-viager.test/wp-content/uploads/2023/10/alberto-barbarisi-sO3WT9XJOhE-unsplash-1.png" alt=""/>
                                <div>
                                    <span>Marie dupont</span>
                                    <span>Décembre 2022</span>
                                </div>
                            </div>
                            <div>
                                <img src="http://univers-viager.test/wp-content/uploads/2023/10/avis-star.svg" alt=""/>
                                <div></div>
                            </div>       
                        </div>
                        <div class="fade3">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit</p>
                            <div>
                                <img src="http://univers-viager.test/wp-content/uploads/2023/10/alberto-barbarisi-sO3WT9XJOhE-unsplash-1.png" alt=""/>
                                <div>
                                    <span>Marie dupont</span>
                                    <span>Décembre 2022</span>
                                </div>
                            </div>
                            <div>
                                <img src="http://univers-viager.test/wp-content/uploads/2023/10/avis-star.svg" alt=""/>
                                <div></div>
                            </div>       
                        </div>
                    </div>
                </div>
                <div class="custom-slider fade">
                    <div>
                        <div class="fade1">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit</p>
                            <div>
                                <img src="http://univers-viager.test/wp-content/uploads/2023/10/alberto-barbarisi-sO3WT9XJOhE-unsplash-1.png" alt=""/>
                                <div>
                                    <span>Marie dupont</span>
                                    <span>Décembre 2022</span>
                                </div>
                            </div>
                            <div>
                                <img src="http://univers-viager.test/wp-content/uploads/2023/10/avis-star.svg" alt=""/>
                                <div></div>
                            </div>       
                        </div>
                        <div class="fade2">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit</p>
                            <div>
                                <img src="http://univers-viager.test/wp-content/uploads/2023/10/alberto-barbarisi-sO3WT9XJOhE-unsplash-1.png" alt=""/>
                                <div>
                                    <span>Marie dupont</span>
                                    <span>Décembre 2022</span>
                                </div>
                            </div>
                            <div>
                                <img src="http://univers-viager.test/wp-content/uploads/2023/10/avis-star.svg" alt=""/>
                                <div></div>
                            </div>       
                        </div>
                        <div class="fade3">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit</p>
                            <div>
                                <img src="http://univers-viager.test/wp-content/uploads/2023/10/alberto-barbarisi-sO3WT9XJOhE-unsplash-1.png" alt=""/>
                                <div>
                                    <span>Marie dupont</span>
                                    <span>Décembre 2022</span>
                                </div>
                            </div>
                            <div>
                                <img src="http://univers-viager.test/wp-content/uploads/2023/10/avis-star.svg" alt=""/>
                                <div></div>
                            </div>       
                        </div>
                    </div>
                </div>
                <div class="custom-slider fade">
                    <div>
                        <div class="fade1">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit</p>
                            <div>
                                <img src="http://univers-viager.test/wp-content/uploads/2023/10/alberto-barbarisi-sO3WT9XJOhE-unsplash-1.png" alt=""/>
                                <div>
                                    <span>Marie dupont</span>
                                    <span>Décembre 2022</span>
                                </div>
                            </div>
                            <div>
                                <img src="http://univers-viager.test/wp-content/uploads/2023/10/avis-star.svg" alt=""/>
                                <div></div>
                            </div>       
                        </div>
                        <div class="fade2">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit</p>
                            <div>
                                <img src="http://univers-viager.test/wp-content/uploads/2023/10/alberto-barbarisi-sO3WT9XJOhE-unsplash-1.png" alt=""/>
                                <div>
                                    <span>Marie dupont</span>
                                    <span>Décembre 2022</span>
                                </div>
                            </div>
                            <div>
                                <img src="http://univers-viager.test/wp-content/uploads/2023/10/avis-star.svg" alt=""/>
                                <div></div>
                            </div>       
                        </div>
                        <div class="fade3">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit</p>
                            <div>
                                <img src="http://univers-viager.test/wp-content/uploads/2023/10/alberto-barbarisi-sO3WT9XJOhE-unsplash-1.png" alt=""/>
                                <div>
                                    <span>Marie dupont</span>
                                    <span>Décembre 2022</span>
                                </div>
                            </div>
                            <div>
                                <img src="http://univers-viager.test/wp-content/uploads/2023/10/avis-star.svg" alt=""/>
                                <div></div>
                            </div>       
                        </div>
                    </div>
                </div>       
                <div class="slide-dot">
                    <span class="dot active" onclick="currentSlide(1)"></span> 
                    <span class="dot" onclick="currentSlide(2)"></span> 
                    <span class="dot" onclick="currentSlide(3)"></span> 
                </div>
            </div>
        </section>


        <!-- Section 7  - Nos actualités  -->
        <section class="home-section7">
            <div>
                <?= get_field('titre_nos_actualites') ?>
                <div>
                    <div>
                        <?php
                            $args = array(
                                'post_type' => 'post',
                                'posts_per_page' => 1,
                                'order' => 'ASC',
                            );

                            $query = new WP_Query($args);

                            if ($query->have_posts()) :
                                while ($query->have_posts()) : $query->the_post();
                                    ?>
                                    <div class="article">
                                            <?php
                                                $categories = get_the_category();
                                                if (!empty($categories)) {
                                                    foreach ($categories as $category) {
                                                        echo '<div>';
                                                        echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
                                                        $content = get_the_content();
                                                        if (preg_match('/<img[^>]+src=["\']([^"\']+)["\'][^>]*>/', $content, $matches)) {
                                                            $image_url = $matches[1];
                                                            echo '<img src="' . $image_url . '" alt="Image de l\'article">';
                                                        } else {
                                                            echo 'Aucune image trouvée dans le contenu de l\'article.';
                                                        }
                                                        echo '</div>';                  
                                                    }
                                                } else {
                                                    echo 'Aucune catégorie trouvée pour cet article.';
                                                }
                                            ?>
                                            <span><?php the_title(); ?></span>
                                            <?php the_excerpt(); ?>
                                            <span>
                                                <?php
                                                    $formatted_date = get_the_date('d/m/Y');
                                                    echo $formatted_date;
                                                ?>
                                            </span>
                                            <a href="<?php the_permalink(); ?>">Lire la suite</a>
                                    </div>
                                    <?php
                                endwhile;
                                wp_reset_postdata();
                            else :
                                echo "Aucun article trouvé.";
                            endif;
                        ?>

                    </div>
                

                    <div>
                        <div>
                            <?php
                                $args = array(
                                    'post_type' => 'post',
                                    'posts_per_page' => 2
                                );

                                $query = new WP_Query($args);

                                if ($query->have_posts()) :
                                    while ($query->have_posts()) : $query->the_post();
                                        ?>
                                        <div class="article">
                                                <?php
                                                    $categories = get_the_category();
                                                    if (!empty($categories)) {
                                                        foreach ($categories as $category) {
                                                            echo '<div>';
                                                            echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
                                                            $content = get_the_content();
                                                            if (preg_match('/<img[^>]+src=["\']([^"\']+)["\'][^>]*>/', $content, $matches)) {
                                                                $image_url = $matches[1];
                                                                echo '<img src="' . $image_url . '" alt="Image de l\'article">';
                                                            } else {
                                                                echo 'Aucune image trouvée dans le contenu de l\'article.';
                                                            }
                                                            echo '</div>';                  
                                                        }
                                                    } else {
                                                        echo 'Aucune catégorie trouvée pour cet article.';
                                                    }
                                                ?>
                                                <a href="<?php the_permalink(); ?>">
                                                    <span><?php the_title(); ?></span>
                                                    <?php the_excerpt(); ?>
                                                    <span>
                                                        <?php
                                                            $formatted_date = get_the_date('d/m/Y');
                                                            echo $formatted_date;
                                                        ?>
                                                    </span>
                                                </a>
                                        </div>
                                        <?php
                                    endwhile;
                                    wp_reset_postdata();
                                else :
                                    echo "Aucun article trouvé.";
                                endif;
                            ?>

                        </div>
                    </div>
                </div>
                <div class="bloc2">

                        <div>
                            <?php
                                $args = array(
                                    'post_type' => 'post',
                                    'posts_per_page' => 1,
                                    'order' => 'ASC',
                                );

                                $query = new WP_Query($args);

                                if ($query->have_posts()) :
                                    while ($query->have_posts()) : $query->the_post();
                                        ?>
                                        <div class="article">
                                                <?php
                                                    $categories = get_the_category();
                                                    if (!empty($categories)) {
                                                        foreach ($categories as $category) {
                                                            echo '<div>';
                                                            echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
                                                            $content = get_the_content();
                                                            if (preg_match('/<img[^>]+src=["\']([^"\']+)["\'][^>]*>/', $content, $matches)) {
                                                                $image_url = $matches[1];
                                                                echo '<img src="' . $image_url . '" alt="Image de l\'article">';
                                                            } else {
                                                                echo 'Aucune image trouvée dans le contenu de l\'article.';
                                                            }
                                                            echo '</div>';                  
                                                        }
                                                    } else {
                                                        echo 'Aucune catégorie trouvée pour cet article.';
                                                    }
                                                ?>
                                                <span><?php the_title(); ?></span>
                                                <?php the_excerpt(); ?>
                                                <span>
                                                    <?php
                                                        $formatted_date = get_the_date('d/m/Y');
                                                        echo $formatted_date;
                                                    ?>
                                                </span>
                                                <a href="<?php the_permalink(); ?>">Lire la suite</a>
                                        </div>
                                        <?php
                                    endwhile;
                                    wp_reset_postdata();
                                else :
                                    echo "Aucun article trouvé.";
                                endif;
                            ?>

                        </div>
                        <div>
                            <div>
                                <?php
                                    $args = array(
                                        'post_type' => 'post',
                                        'posts_per_page' => 2
                                    );

                                    $query = new WP_Query($args);

                                    if ($query->have_posts()) :
                                        while ($query->have_posts()) : $query->the_post();
                                            ?>
                                            <div class="article">
                                                    <?php
                                                        $categories = get_the_category();
                                                        if (!empty($categories)) {
                                                            foreach ($categories as $category) {
                                                                echo '<div>';
                                                                echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
                                                                $content = get_the_content();
                                                                if (preg_match('/<img[^>]+src=["\']([^"\']+)["\'][^>]*>/', $content, $matches)) {
                                                                    $image_url = $matches[1];
                                                                    echo '<img src="' . $image_url . '" alt="Image de l\'article">';
                                                                } else {
                                                                    echo 'Aucune image trouvée dans le contenu de l\'article.';
                                                                }
                                                                echo '</div>';                  
                                                            }
                                                        } else {
                                                            echo 'Aucune catégorie trouvée pour cet article.';
                                                        }
                                                    ?>
                                                    <a href="<?php the_permalink(); ?>">
                                                        <span><?php the_title(); ?></span>
                                                        <?php the_excerpt(); ?>
                                                        <span>
                                                            <?php
                                                                $formatted_date = get_the_date('d/m/Y');
                                                                echo $formatted_date;
                                                            ?>
                                                        </span>
                                                    </a>
                                            </div>
                                            <?php
                                        endwhile;
                                        wp_reset_postdata();
                                    else :
                                        echo "Aucun article trouvé.";
                                    endif;
                                ?>

                            </div>
                        </div>

                </div>
                <button id="moreActu">Charger plus d'articles</button>  
            </div>
        </section>

        <!-- Section 8 - FAQ -->
        <section class="home-section8">
            <div>
            <?= get_field('titre_du_bloc_faq') ?>
            <?php
                $group = get_field('questions');
                $question1 = $group['question1'];
                $question2 = $group['question2'];
                $question3 = $group['question3'];
                $question4 = $group['question4'];
                        
                $title1 = $question1['titre_question1'];
                $text1 = $question1['texte_question1'];
                        
                $title2 = $question2['titre_question2'];
                $text2 = $question2['texte_question2'];
                        
                $title3 = $question3['titre_question3'];
                $text3 = $question3['texte_question3'];

                $title4 = $question4['titre_question4'];
                $text4 = $question4['texte_question4'];

                        
                echo '<div class="accordion">';
                echo '<div class="accordion-item close">';
                echo '<div class="accordion-header">';
                echo '<span>' . $title1 . '</span>';
                echo '<div><img src="http://univers-viager.test/wp-content/uploads/2023/10/plus.svg"/>';
                echo '<img src="http://univers-viager.test/wp-content/uploads/2023/10/moins.svg"/></div>';
                echo '</div>';
                echo '<div class="accordion-content">';
                echo '<div>' . $text1 . '</div>';
                echo '</div>';
                echo '</div>';
                echo '<div class="accordion-item open">';
                echo '<div class="accordion-header">';
                echo '<span>' . $title2 . '</span>';
                echo '<div><img src="http://univers-viager.test/wp-content/uploads/2023/10/plus.svg"/>';
                echo '<img src="http://univers-viager.test/wp-content/uploads/2023/10/moins.svg"/></div>';
                echo '</div>';
                echo '<div class="accordion-content">';
                echo '<div>' . $text2 . '</div>';
                echo '</div>';
                echo '</div>';
                echo '<div class="accordion-item close">';
                echo '<div class="accordion-header">';
                echo '<span>' . $title3 . '</span>';
                echo '<div><img src="http://univers-viager.test/wp-content/uploads/2023/10/plus.svg"/>';
                echo '<img src="http://univers-viager.test/wp-content/uploads/2023/10/moins.svg"/></div>';
                echo '</div>';
                echo '<div class="accordion-content">';
                echo '<div>' . $text3 . '</div>';
                echo '</div>';
                echo '</div>';
                echo '<div class="accordion-item close">';
                echo '<div class="accordion-header">';
                echo '<span>' . $title3 . '</span>';
                echo '<div><img src="http://univers-viager.test/wp-content/uploads/2023/10/plus.svg"/>';
                echo '<img src="http://univers-viager.test/wp-content/uploads/2023/10/moins.svg"/></div>';
                echo '</div>';
                echo '<div class="accordion-content">';
                echo '<div>' . $text4 . '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            ?>
            </div>
        </section>

        
    </main>
<?php get_footer(); ?>
