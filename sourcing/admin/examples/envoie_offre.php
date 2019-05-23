<?php include 'header_admin.php'; ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Envoie d'une offre</h4>
                        
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="row">
                                <div class="col-md-10">
                                    
                    <label class="bmd-label-floating" for="titre">Titre de l'offre</label><br />
                    <input class="form-control" type="text" name="titre" id="titre" /><br />
                    <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
                    <label class="bmd-label-floating" for="doc">Document (PDF, DOC, DOCX | Max 5 MO) :</label><br/>
                    <input class="form-control" type="file" name="doc" id="icone" /><br />

                    <label class="bmd-label-floating"for="description">Description de votre offre :</label><br />
                    <textarea class="form-control" rows="5" name="description" id="description"></textarea><br />
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
