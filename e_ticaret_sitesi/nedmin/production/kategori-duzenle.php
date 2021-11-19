uu<?php 

include 'header.php'; 


$kategorisor=$db->prepare("SELECT * FROM kategori where kategori_id=:id");
$kategorisor->execute(array(
  'id' => @$_GET['kategori_id']
));

$kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC);

?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Kategori Düzenleme <small>

              <?php 

              if (@$_GET['durum']=="ok") {?>

                <b style="color:green;">İşlem Başarılı...</b>

              <?php } elseif (@$_GET['durum']=="no") {?>

                <b style="color:red;">İşlem Başarısız...</b>

              <?php }

              ?>


            </small></h2>
            
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />

            <!-- / => en kök dizine çık ... ../ bir üst dizine çık -->
            <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">







              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori Ad <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="kategori_ad"  value= <?php echo $kategoricek['kategori_ad'] ?> required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>


              <!-- Ck Editör Başlangıç -->

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori Detay <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">

                  <textarea  class="ckeditor" id="editor1" name="kategori_detay"><?php echo $kategoricek['kategori_detay']; ?></textarea>
                </div>
              </div>

              <script type="text/javascript">

               CKEDITOR.replace( 'editor1',

               {

                filebrowserBrowseUrl : 'ckfinder/ckfinder.html',

                filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',

                filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',

                filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

                filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

                filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

                forcePasteAsPlainText: true

              } 

              );

            </script>

            <!-- Ck Editör Bitiş -->



            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori Url <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="first-name" name="kategori_seourl"  value=" <?php echo $kategoricek['kategori_seourl'] ?>"  class="form-control col-md-7 col-xs-12">
              </div>
            </div>


            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori Sıra <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="first-name" name="kategori_sira"  value=" <?php echo $kategoricek['kategori_sira'] ?>" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>


            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori Durum<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
               <select id="heard" class="form-control" name="kategori_durum" required>



                   <!-- Kısa İf Kulllanımı 

                    <?php echo $kategoricek['kategori_durum'] == '1' ? 'selected=""' : ''; ?>

                  -->
                 <option value="1" <?php echo $kategoricek['kategori_durum'] == '1' ? 'selected=""' : ''; ?>>Aktif</option>

                  <option value="0" <?php if ($kategoricek['kategori_durum']==0) { echo 'selected=""'; } ?>>Pasif</option>
                  <!-- <?php 

                   if ($kategoricek['kategori_durum']==0) {?>

ss
                   <option value="0">Pasif</option>
                   <option value="1">Aktif</option>


                   <?php } else {?>

                   <option value="1">Aktif</option>
                   <option value="0">Pasif</option>

                   <?php  }

                   ?> -->


                 </select>
               </div>
             </div>


             <input type="hidden" name="kategori_id" value="<?php echo $kategoricek['kategori_id'] ?>"> 


             <div class="ln_solid"></div>
             <div class="form-group">
              <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit"  name="kategoriduzenle" class="btn btn-success">Güncelle</button>
                

              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>

</div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>
