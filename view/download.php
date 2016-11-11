<?PHP include_once (ROOT.'/view/layout/CSSJSFILE.php'); ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">
                <h2 class ="form-signin-heading" >Загруженные файлы</h2>
                
                <table class="table">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>URL</th>
                        <th>USER ID</th>
                      </tr>
                    </thead>
                  <tbody>
                    <?php for ($i = 0; $i<$count;$i++): ?>
                    <tr>
                        <td><?PHP echo $lifo->pop() ?></td>
                        <td>
                            <?PHP $temp = $lifo->pop() ?>
                            <a href="<?PHP echo $dirDown.$temp; ?>">
                                <?PHP echo $temp ?>
                            </a>
                        </td>
                        <td><?PHP echo $lifo->pop() ?></td>
                    </tr>
                    <?php endfor;?>
                   </tbody>
                 </table>
                 
                <?php if(!empty($error_array)): ?>
                    <div class="alert alert-danger"><b>Файл не загружен!</b><br/>
                    <?php foreach($error_array as $one_error): ?>
                        <?=$one_error;?><br/>
                    <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <?php if(empty($error_array) AND $_FILES): ?>
                    <div class="alert alert-success"><b>Файл успешно загружен!</b></div><br/>
                <?php endif; ?>
                <form action="" method="POST" enctype="multipart/form-data">
                        <input type="file" name="upload_file"><br> 
                        <input type="submit" value="Загрузить"><br>
                </form>
                    
                <br/>
                <br/>
                
            </div>
        </div>
    </div>
</section>
