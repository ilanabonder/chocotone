<div class="col-sm-12 col-md-3">
    <div class="sidebar sidebar-left mt-sm-30">
        <div class="widget">
            <div class="search-form">
                <form class="sidebar_search sidebar_widget" name="search" action="" method="post" enctype="multipart/form-data">
                    <input type="text" name="s" placeholder="Digite a pesquisa..." required/><button class="btn hvr-buzz-out">Pesquisar...</button>
                </form>
            </div>
        </div>
        <div class="widget">
            <h5 class="widget-title line-bottom">Categorias</h5>
            <div class="categories">
                <?php
          $Read->ExeRead(DB_CATEGORIES,
              "WHERE category_parent IS NULL AND category_id IN(SELECT post_category FROM " . DB_POSTS . " WHERE post_status = 1 AND post_date <= NOW()) ORDER BY category_title ASC");
          if (!$Read->getResult()):
                echo Erro("Ainda não existem sessões cadastradas!", E_USER_NOTICE);
          else:
                echo "<ul class='greylinks list2 star-bullets'>";
                foreach ($Read->getResult() as $Ses):
                      echo "<li class='active'><a class='content-justify' title='artigos/{$Ses['category_name']}' href='" . BASE . "/artigos/{$Ses['category_name']}'>&raquo; {$Ses['category_title']}</a></li>";
                      $Read->ExeRead(DB_CATEGORIES,
                          "WHERE category_parent = :pr AND category_id IN(SELECT post_category_parent FROM " . DB_POSTS . " WHERE post_status = 1 AND post_date <= NOW()) ORDER BY category_title ASC",
                          "pr={$Ses['category_id']}");
                      if ($Read->getResult()):
                            foreach ($Read->getResult() as $Cat):
                                  echo "<li><a title='artigos/{$Cat['category_name']}' href='" . BASE . "/artigos/{$Cat['category_name']}'>&raquo;&raquo; {$Cat['category_title']}</a></li>";
                            endforeach;
                      endif;
                endforeach;
                echo "</ul>";
          endif;
          ?>

            </div>
        </div>
        <div class="widget">
            <h5 class="widget-title line-bottom">Mais Vistos</h5>
            <div class="latest-posts">
                <?php
                $Read->ExeRead(DB_POSTS, "WHERE post_status = 1 AND post_date <= NOW() ORDER BY post_views DESC, post_date DESC LIMIT 5");
                if (!$Read->getResult()):
                    echo Erro("Ainda Não existe posts cadastrados. Favor volte mais tarde :)", E_USER_NOTICE);
                else:
                    foreach ($Read->getResult() as $Post):
                        ?>
                        <article class="post media-post clearfix pb-0 mb-10">
                            <a class="post-thumb" href="<?= BASE; ?>/artigo/<?= $Post['post_name']; ?>"><img src="<?= BASE; ?>/tim.php?src=uploads/<?= $Post['post_cover']; ?>&w=<?= IMAGE_W / 2; ?>&h=<?= IMAGE_H / 2; ?>"></a>
                            <div class="post-right">
                                <h5 class="post-title mt-0"><a href="<?= BASE; ?>/artigo/<?= $Post['post_name']; ?>"><?= $Post['post_title']; ?></a></h5>
                                <p><?= Check::Words($Post['post_subtitle'], 20); ?></p>
                            </div>
                        </article> 
                        <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>

    </div>
</div>