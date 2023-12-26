<?php foreach ($data['competences'] as $categorie): ?>
<div class="categorie-competence">
   <h3><?php echo $categorie['categorie']; ?></h3>
   <?php foreach ($categorie as $key => $items): ?>
      <?php if($key != 'categorie'): ?>
         <?php foreach ($items as $competence): ?>
            <div class="competence">
               <span class="nom-competence"><?php echo $competence['name']; ?></span>
               <span class="etoiles">
                  <?php
                  if (isset($competence['value'])) {
                     for ($i = 0; $i < 5; $i++) {
                        if ($i < floor($competence['value'])) {
                           echo '<i class="fa-solid fa-star"></i>';
                        } elseif ($i < $competence['value']) {
                           $pourcentage = (($competence['value'] - $i) * 100) . '%';
                           echo "<span class='star-partial' style='width: $pourcentage;'><i class='fa-solid fa-star'></i></span>";
                        } else {
                           echo '<i class="fa-regular fa-star"></i>';
                        }
                     }
                     } elseif (isset($competence['score'])) {
                        echo "<span class='score'>" . $competence['score'] . "</span>";
                     }
                  ?>
               </span>
            </div>
         <?php endforeach; ?>
      <?php endif; ?>
   <?php endforeach; ?>
</div>
<?php endforeach; ?>
