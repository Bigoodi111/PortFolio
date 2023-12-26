<?php foreach ($data['experience']['experiences'] as $exp): ?>
   <div class="experience">
      <h3><?php echo $exp['exp']; ?></h3>
      <p>Le but : <br><br><?php echo $exp['description'];  ?></p>
      <p>Ce que j'ai fais : <br><br><?php echo $exp['role']; ?></p>
      <p><br><?php echo $exp['date']; ?><br></p>
      <?php if (!empty($exp['lieu'])): ?>
         <p><?php echo $exp['lieu']; ?></p>
      <?php endif; ?>
   </div>
<?php endforeach; ?>
<br><br>
<p id="cv">  Voici mon également mon <a href="CV.pdf" target="_blank"> CV </a> </p>

