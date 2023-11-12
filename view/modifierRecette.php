<?php ob_start(); ?>

<div class="container pb-4">
        
        <div   class="mt-5 justify-content-center text-danger font-weight-light border border-danger">
            <div class="col-12 col-md-6 col-lg-4 py-5">
                <p class="font-weight-light">Pour modifier <?= $recipe['REC_TITRE']; ?>, veuillez remplir le formulaire ci-dessous</p>
                <hr class="border border-info"><br/>
                
                <form action="index.php?action=updateRecette" method ="POST" class="w-full max-w-sm">
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="nameRecipe">
                        Nom de la recette : 
                    </label>
                    </div>
                    <div class="md:w-2/3">
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="nameRecipe" type="text" name="nameRecipe" value="<?= $recipe['REC_TITRE'] ?>">
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="contentRecipe">
                        Contenu de la recette : 
                    </label>
                    </div>
                    <div class="md:w-2/3">
                    <textarea class="form-control border border-info" id="contentRecipe" name="contentRecipe"><?= $recipe['REC_CONTENU'] ?></textarea>
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="summaryRecipe">
                        Résumé de la recette : 
                    </label>
                    </div>
                    <div class="md:w-2/3">
                    <textarea class="form-control border border-info" id="summaryRecipe" name="summaryRecipe"><?= $recipe['REC_RESUME'] ?></textarea>
                    </div>
                </div>
                <input type="hidden" id="recetteID" name="recetteID" value="<?= $recipe['REC_ID']; ?>" />
                
                <button type="submit" class="text-black btn-info btn-sm shadow">Confirmer la modification</button>
                </form>
            </div>
        </div>
    </div>

<?php $content = ob_get_clean();
    include 'template.php';
?>