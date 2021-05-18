<footer class="footer" id="footer">
    <div class="hidden-xs hidden-sm col-md-4">
        <nav class="menu-rodape" id="main-nav" data-nav="true">
            <div>
                <ul class="menu">
                    <li class="menu-item">
                        <a href="#a-cervejaria" class="rodape">- A Cervejaria</a>
                    </li>
                    <li class="menu-item">
                        <a href="#sobre" class="rodape">- Sobre</a>
                    </li>
                    <li class="menu-item">
                        <a href="#produtos" class="rodape">- Produtos</a>
                    </li>
                    <li class="menu-item">
                        <a href="#clube-de-assinatura" class="rodape">- Clube de Assinatura</a>
                    </li>
                    <li class="menu-item">
                        <div class="menu-item telefone">
                            <a href="tel:+55519999999" class="rodape">- 51 9999.9999</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="rodape-direita">
        <div class="info-box">
            <h2 class="titulo-rodape">Receba nossas novidades</h2>

            <form ajax-form="form" action="php/newsletter.php" method="post" enctype="multipart/form-data" class="form-inline assinar">
                <div class="clearfix">
                    <div>
                        <button ajax-form="submit" type="submit" class="btn btn-primary-assinar hidden-xs hidden-sm">Assinar</button>
                    </div>
                    <div class="form-group">
                        <input name="email-newsletter" id="email-newsletter" type="text" class="form-control" placeholder="Seu e-mail:">
                    </div>
                </div>
                <p ajax-form="message" class="help-block"></p>
            </form>
        </div>

        <div class="info-box">
            <h2 class="sociais-rodape">Siga-nos nas redes sociais</h2>
            <div class="redes">
                <a href="" target="_blank">
                    <img src="{{ asset('images/instagram-branco.svg') }}" class="rede-sociais">
                </a>
                <a href="" target="_blank">
                    <img src="{{ asset('images/youtube-branco.svg') }}" class="rede-sociais">
                </a>
                <a href="" target="_blank">
                    <img src="{{ asset('images/facebook-branco.svg') }}" class="rede-sociais">
                </a>
            </div>
        </div>
    </div>


    <div class="copyright">
        <span>Jack Luis - Todos os direitos reservados ©2021</span>
    </div>

</footer>