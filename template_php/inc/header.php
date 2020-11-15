<?php
require '_cdn/widgets/contact/contact.wc.php';
?>
<!-- Inpicio Header Original -->
<header class="header">
    <div class="header-top bg-theme-colored sm-text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="widget no-border m-0">
                        <ul class="list-inline sm-text-center mt-5">
                            <li>
                                <a href="#" class="jwc_contact text-white">cursos@aquidegramado.com.br</a>
                            </li>
<!--                            <li class="text-white">|</li>
                            <li>
                                <a href="#" class="text-white">54 | 3282-2482</a>
                            </li>-->
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="widget no-border m-0">
                        <ul class="styled-icons icon-dark icon-circled icon-theme-colored icon-sm pull-right flip sm-pull-none sm-text-center mt-sm-15">
                            <li><a href="https://www.facebook.com/Aqui-de-Gramado-103397818154340" target="_blank" alt="Facebook Aqui de Gramado" title="Facebook Aqui de Gramado"><i class="fa fa-facebook text-white"></i></a></li>
                            <li><a href="https://www.instagram.com/aquidegramado/" target="_blank" alt="Instagram Aqui de Gramado" title="Instagram Aqui de Gramado"><i class="fa fa-instagram text-white"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-nav">
        <div class="header-nav-wrapper navbar-scrolltofixed bg-white">
            <div class="container">
                <nav id="menuzord-right" class="menuzord green no-bg menuzord-responsive">
                    <!--                    <header class="fontezero"><h1>Escolha no Menu</h1></header>-->
                    <a class="menuzord-brand pull-left flip" href="<?= BASE; ?>"><img style="margin-bottom: 8px;"src="<?= INCLUDE_PATH; ?>/images/logo-aqui-de-gramado-p.png" alt="logomarca Aqui de Gramado"></a>
                    <div class="navbar-header">
                        <!-- Toggle Button -->    	
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <img src="<?= INCLUDE_PATH; ?>/images/abrir-menu.png" style="width: 100%;">
    <!--                        <span class="icon-bar"></span>
                            <span class="icon-bar"></span>-->
                        </button>
                    </div>

                    <div class="navbar-collapse collapse clearfix">
                        <header class="fontezero"><h1>Escolha entre as opções de navegação do nosso site - adquira seu curso agora mesmo</h1></header>
                        <ul class="menuzord-menu menuzord-right menuzord-indented scrollable navigation">
<!--                            <li><a href="<?= BASE; ?>" title="home" alt="home">Home</a></li>-->
<!--                            <li><a href="#" title="Sobre" alt="Sobre">Quem Somos</a></li>-->
<!--                            <li><a href="#" title="Cursos" alt="Cursos">Cursos</a></li>-->
                            <li class="jwc_contact"><a href="#" title="Fale Conosco" alt="Fale Conosco">Fale Conosco</a></li>
                            <li><a class="btn-laranja" href="<?= BASE; ?>/campus" title="Cursos" alt="Cursos">Área do Aluno | <img src="<?= INCLUDE_PATH; ?>/images/aluno.png" style="width: 12%;"></a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>

