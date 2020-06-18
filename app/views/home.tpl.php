<section class="posts">
  <div class="bo-formulaire">
    <form name="connexion" id="connexion" action="<?= $this->baseUrl; ?>/confirmation" method="post" class="backoffice-connexion">
                
        <div class="field">
            <label for="login" class="label">Login</label>
            <input type="text" name="login" id="login" class="form-control">
        </div>
        <div class="field">
            <label for="pass" class="label">Mot de passe</label>
            <input type="pass" name="pass" id="pass" class="form-control">
        </div>
        <p class="login-submit">
            <input type="submit" name="bo-submit" id="bo-submit" class="btn btn-info" value="Se connecter">
        </p>
    </form>
  </div>
</section>