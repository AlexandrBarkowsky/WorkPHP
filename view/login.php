<?PHP include_once (ROOT.'/view/layout/CSSJSFILE.php'); ?>
<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">

                <?php if (isset($errors) && is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li> - <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                
                    <h2 class="form-signin-heading">Вход на сайт</h2>
                    <form action="#" method="post">
                        <input class="form-control" type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>"/>
                        <input class ="form-control" type="password" name="password" placeholder="Пароль" value="<?php echo $password; ?>"/>
                        <input class ="btn btn-lg btn-primary btn-block" type="submit" name="submit" class="form-signin-heading" value="Вход" />
                    </form>



                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>
