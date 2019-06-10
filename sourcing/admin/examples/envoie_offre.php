<?php include 'header_admin.php';
    
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Envoie d'une offre</h4>

                    </div>
                    <div class="card-body">
                        <form method="post" action="recup_offre.php" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-10">

                                    <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
                                    <label class="bmd-label-floating" for="doc">Document (PDF, DOC, DOCX | Max 5 MO) :</label><br/>
                                    <input class="form-control" type="file" name="doc" id="icone" /><br />
                                    <button type="submit" class="btn btn-primary pull-right">Envoyer une offre!</button>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
        <?php include 'foot_admin.php'; ?>
