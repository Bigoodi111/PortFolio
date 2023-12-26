<?php

require_once("../yaml/yaml.php");
$data=yaml_parse_file('main.yaml');
use Symfony\Component\Yaml\Yaml;
$yamlFilePath = 'main.yaml';
$data = Yaml::parse(file_get_contents($yamlFilePath));


?>
<script src="https://kit.fontawesome.com/7ca312f99b.js" crossorigin="anonymous"></script>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <?php "<title>".$data['titre']."</title>"?>
        <link rel="stylesheet" href="CSS/main.css">
        <link rel="icon" href="Images\Logo_onglet.png">    
    </head>
    
    <body>
        <header id="top">
            <div class="titre-principal">
                <?php
                echo "<h1><span class='" . $data['header']['class'] . "'>" . $data['header']['text_bleu'] . "</span>" . $data['header']['text_blanc'] . "</h1>";
                $phraseAccroche = $data['phraseaccroche']['phrases'];
                $phraseAleatoire = $phraseAccroche[array_rand($phraseAccroche)];
                echo "<p id ='" . $data['phraseaccroche']['class'] . "'> $phraseAleatoire </p>";
                ?>
            </div>
            <nav class="navigation">
                <div id="menuToggle">
                    <input type="checkbox">
                    <span></span>
                    <span></span>
                    <span></span>
                    <ul id="menu">
                        <?php foreach ($data['nav'] as $navItem): ?>
                            <li><a href="<?php echo $navItem['link']; ?>" target="<?php echo $navItem['target']; ?>"><?php echo $navItem['name']; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </nav>
        </header>
        <main>
            <section>
                <h2 id="a_propos">À propos</h2>
                <div id="contenue-a-propos">
                    <?php include ('a_propos.php') ?>
                </div>
            </section>
            <section>
                <h2 id="competences">Compétences</h2>
                <div>
                    <?php include ('competences.php') ?>
                </div>
            </section>
            <section>
                <h2 id="experience">Expérience</h2>
                <div>
                    <ul>
                        <?php include ('experience.php') ?>
                    </ul>
                </div>
            </section>
            <section>
                <h2 id="formation">Formation</h2>
                <div>
                    <?php include ('formation.php') ?>
                </div>
            </section>
            <section>
                <h2 id="contact">Contact</h2>
                <?php include ('contact.php') ?>
            </section>
        </main>
        <footer>
            <p>Droit d'auteur © 2023 Grégoire FONTAINE</p>
        </footer>
    </body>
</html>
        