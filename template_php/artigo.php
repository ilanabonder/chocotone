<?php
if (!$Read):
    $Read = new Read;
endif;

$Read->ExeRead(DB_POSTS, "WHERE post_name = :nm", "nm={$URL[1]}");
if (!$Read->getResult()):
    require REQUIRE_PATH . '/404.php';
    return;
else:
    extract($Read->getResult()[0]);
    $Update = new Update;
    $UpdateView = ['post_views' => $post_views + 1, 'post_lastview' => date('Y-m-d H:i:s')];
    $Update->ExeUpdate(DB_POSTS, $UpdateView, "WHERE post_id = :id", "id={$post_id}");

    $Read->FullRead("SELECT category_title, category_name FROM " . DB_CATEGORIES . " WHERE category_id = :id", "id={$post_category}");
    $PostCategory = $Read->getResult()[0];

    $Read->FullRead("SELECT user_name, user_lastname FROM " . DB_USERS . " WHERE user_id = :user", "user={$post_author}");

endif;
?>
<!-- Start main-content -->
<div class="main-content">
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" style="background-image:url(<?= BASE; ?>/tim.php?src=uploads/<?= $post_cover; ?>&w=<?= IMAGE_W / 2; ?>&h=<?= IMAGE_H / 2; ?>)">
        <div class="container pt-20 pb-50">
            <!-- Section Content -->
            <div class="section-content pt-20">
                <div class="row"> 
                    <div class="col-md-12 text-center">
                        <h3 class="title text-white"><?= $post_title; ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Blog -->
    <section>
        <div class="container mt-30 mb-30 pt-30 pb-30">
            <div class="row">
                <div class="col-md-9 blog-pull-right">
                    <div class="blog-posts single-post">
                        <article class="post clearfix mb-0">
                            <div class="entry-header">
                                <div class="post-thumb thumb"> <img src="<?= BASE; ?>/tim.php?src=uploads/<?= $post_cover; ?>&w=<?= IMAGE_W / 2; ?>&h=<?= IMAGE_H / 2; ?>" alt="<?= $post_title; ?>" title="<?= $post_title; ?>" class="img-responsive img-fullwidth"> </div>
                            </div> 
                            <!--                            <div class="entry-meta">
                                                            <ul class="list-inline">
                                                                <li>Publicado em: <span class="text-theme-colored"><time datetime="<?= date('Y-m-d', strtotime($post_date)); ?>" pubdate="pubdate"><?= date('d/m/Y', strtotime($post_date)); ?></time></span></li>
                                                                <li>Autor: <span class="text-theme-colored"><?= $AuthorName; ?></span></li>
                                                            </ul>
                                                        </div>-->
                            <?php
                            $WC_TITLE_LINK = $post_title;
                            $WC_SHARE_HASH = "AquideGramado";
                            $WC_SHARE_LINK = BASE . "/artigo/{$post_name}";
                            require './_cdn/widgets/share/share.wc.php';
                            ?>
                            <div class="entry-title pt-0">
                                <h3><a href="#"><?= $post_title; ?></a></h3>
                            </div>
                            <div class="mt-10 fontblog htmlchars">
                                <p class="mb-15"><?= $post_content; ?></p>
                            </div>
                            <?php
                            $WC_TITLE_LINK = $post_title;
                            $WC_SHARE_HASH = "AquideGramado";
                            $WC_SHARE_LINK = BASE . "/artigo/{$post_name}";
                            require './_cdn/widgets/share/share.wc.php';
                            ?>
                        </article>
                        <!--Comentários-->
                        <article class="post_comments">
                            <h4 style="color: #688D59;">Deixe seu comentário aqui:</h4>
                            <div class="fb-comments" data-href="<?= BASE; ?>/artigo/<?= $post_name; ?>" data-width="100%" data-numposts="10" data-order-by="reverse_time"></div>
                        </article>
                        <!--FIm comentários-->
                    </div>
                </div>
                <!--SideBar-->
                <!--includ Content Sidebar-->
                <?php require REQUIRE_PATH . '/inc/sidebar.php'; ?>
            </div>
        </div>
    </section>
    <a class="scrollToTop" href="#" style="display: block;"><i class="fa fa-angle-up"></i></a>