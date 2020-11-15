<?php
if (!$Read):
    $Read = new Read;
endif;

$Read->ExeRead(DB_CATEGORIES, "WHERE category_name = :nm", "nm={$URL[1]}");
if (!$Read->getResult()):
    require REQUIRE_PATH . '/404.php';
    return;
else:
    extract($Read->getResult()[0]);
endif;
?> 
<!-- Section: inner-header -->
<section class="inner-header divider parallax layer-overlay overlay-dark-5" style="background-image:url(<?= INCLUDE_PATH; ?>/images/paralax-all.jpg)">
    <div class="container pt-100 pb-50">
        <!-- Section Content -->
        <div class="section-content pt-20">
            <div class="row"> 
                <div class="col-md-12">
                    <h3 class="title text-white">Todos os Artigos & Dicas</h3>
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

                    <?php
                    $Page = (!empty($URL[2]) ? $URL[2] : 1);
                    $Pager = new Pager(BASE . "/artigos/{$category_name}/", "<<", ">>", 5);
                    $Pager->ExePager($Page, 5);
                    $Read->ExeRead(DB_POSTS, "WHERE post_status = 1 AND post_date <= NOW() AND (post_category = :ct OR FIND_IN_SET(:ct, post_category_parent)) ORDER BY post_date DESC LIMIT :limit OFFSET :offset", "limit={$Pager->getLimit()}&offset={$Pager->getOffset()}&ct={$category_id}");
                    if (!$Read->getResult()):
                        $Pager->ReturnPage();
                        echo Erro("Ainda não existe posts cadastrados. Por favor, volte mais tarde :)", E_USER_NOTICE);
                    else:
                        foreach ($Read->getResult() as $Post):
                            extract($Post);
                            ?>

                            <article class="post clearfix mb-0">
                                <div class="entry-header">
                                    <div class="post-thumb thumb"> <img src="<?= BASE; ?>/tim.php?src=uploads/<?= $post_cover; ?>&w=<?= IMAGE_W / 2; ?>&h=<?= IMAGE_H / 2; ?>" alt="<?= $post_title; ?>" title="<?= $post_title; ?>" class="img-responsive img-fullwidth"></div>
                                </div>  
                                <div class="entry-title pt-0">
                                    <h4><a href="<?= BASE; ?>/artigo/<?= $post_name; ?>" title="<?= $post_title; ?>"><?= $post_title; ?></a></h4>
                                </div>
                                <div class="entry-meta">
                                    <ul class="list-inline">
                                        <li>Publicado em: <span class="text-theme-colored"><time datetime="<?= date('Y-m-d', strtotime($post_date)); ?>" pubdate="pubdate"><?= date('d/m/Y', strtotime($post_date)); ?></time></span></li>
                                        <li>Autor: <span class="text-theme-colored"> Casa Dorotéia</span></li>
                                    </ul>
                                    <br>
                                    <a class="btn btn-default btn-theme-colored btn-circled" href="<?= BASE; ?>/artigo/<?= $post_name; ?>" title="<?= $post_title; ?>">Ver Artigo</a>
                                    <br><br>
                                </div>
                            </article>
                            <?php
                        endforeach;
                    endif;

                    $Pager->ExePaginator(DB_POSTS, "WHERE post_status = 1 AND post_date <= NOW() AND (post_category = :ct OR FIND_IN_SET(:ct, post_category_parent))", "ct={$category_id}");
                    echo $Pager->getPaginator();
                    ?>
                </div>
            </div>
            <!--SideBar-->
            <!--includ Content Sidebar-->
            <?php require REQUIRE_PATH . '/inc/sidebar.php'; ?>
        </div>
    </div>
</section>
<a class="scrollToTop" href="#" style="display: block;"><i class="fa fa-angle-up"></i></a>