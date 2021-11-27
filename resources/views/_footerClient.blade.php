<section class="section section__footer">
    <div class="footer has-text-centered-touch">
        <div class="footer__el">
            <h2 class="is-size-5 is-uppercase mb-3">Suivez-nous</h2>
            <ul class="footer__listeres my-3">
                <li class="footer__listeres-el">
                    <a href="#"><i class="fab fa-facebook-f fa-2x"></i></a>
                </li>
                <li class="footer__listeres-el">
                    <a href="#"><i class="fab fa-instagram fa-2x"></i></a>
                </li>
                <li class="footer__listeres-el">
                    <a href="#"><i class="fab fa-tiktok fa-2x"></i></a>
                </li>
            </ul>
            <small>
                <a class="has-text-white" href="mailto:info@yourshootingplace.be">info@yourshootingplace.be</a>
            </small>
        </div>
        <div class="footer__el ">
            <div class="logo logo--large is-center mr-6">
                <a href="/">
                    <img src="/assets/icones/logo_photoshoot_desktop--blanc.svg" alt="PhotoShoot"/>
                </a>
            </div>
        </div>
        <div class="footer__el">
            <h2 class="is-size-5 is-uppercase mb-3">Newsletter</h2>
            <small>Restez informer de toutes nos offres.</small>
            <form class="form form__newsletter mt-3 " method="get" action="{{ route('client') }}">
                <div class="field is-grouped">
                    <p class="control has-icons-left is-expanded">
                        <input class="input is-normal" type="email" placeholder="email@exemple.com" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                    </p>
                    <p class="control">
                        <button class="button button--blue" type="submit">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </p>
                </div>
            </form>
        </div>
    </div>
</section>
