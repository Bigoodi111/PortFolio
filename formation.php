<?php foreach ($data['formation'] as $formation): ?>
   <div>
      <h3><?php echo $formation['catego']; ?></h3>
      <ul class="formation">
         <li>
            <p><?php echo $formation['description']; ?></p>
            <p><?php echo $formation['date']; ?></p>
            <p><?php echo $formation['lieu']; ?></p>
            <?php if (isset($formation['lieu_2'])): ?>
            <p><?php echo $formation['lieu_2']; ?></p>
            <?php endif; ?>
         </li>
      <ul>
   </div>
<?php endforeach; ?>
