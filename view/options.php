<?php ob_start(); ?>
   
<div class="container pb-4">
        
        <div class="mt-5 justify-content-center text-danger font-weight-light border border-danger">
            <div class="col-12 col-md-6 col-lg-4 py-5">
                <h3 class="font-weight-light">Ajoutez une recette : </h3>
                <hr class="border border-info"><br/>
                
                <form action="index.php?action=saveEdito" method="post">
                        <label for="contentEdito">Contenu de l'edito : </label>
                        <br>
                        <input class="form-control border border-info" type="text" id="contentEdito" name="contentEdito">
                                    
                    <button type="submit" class="text-gray-900 btn-info btn-sm shadow">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>

<?php $content = ob_get_clean();
    include 'template.php';
?>