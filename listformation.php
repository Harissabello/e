 <div id="wrapper">

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="col-md-12">
                <div class="d-flex flex-column p-3 h-100">

                    <div class="row flex-row">
                        <?php if(mysqli_num_rows($resultClasse) > 0) {
                                        // output data of each row
                                         while($rowClasse = mysqli_fetch_assoc($resultClasse)) { 
                                         ?>

                        <div class="col-xl-3 col-md-6 mt-4">
                            <!-- <a href="details_classe.php?id=<?php echo $row["id"]; ?>" class="text-decoration-none"> -->
                            <div class="card border-left-primary shadow h-100 taille">
                                <img src="./fichier/<?php echo $rowClasse['img'];?>"
                                    class="card-img-top img-fluid max-height-im" alt="Image 1">
                                <div class="card-body">
                                    <div class="no-gutters align-items-center">
                                        <div class="mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                <?php   
                          $titre =  $rowClasse["titre"];
                          $titre = substr($titre, 0, 50);
                          $length = strlen($titre);
                            if($length > 50){
                                echo $titre."...";
                            }else{
                                echo $titre."...";
                            }
                          ?><br>

                                                </b></h5>
                                                <p class="text-primary">
                                                    <?php echo  $rowClasse["montant"]?> F.CFA
                                                </p>
                                                <h6 class="text-dark">
                                                    <?php   
                          $contenue =  $rowClasse["des_formation"];
                          $contenue = substr($titre, 0, 20);
                          $length = strlen($contenue);
                            if($length >=50){
                                echo $contenue."...";
                            }else{
                                echo $contenue."...<br>";
                            }
                         
                          ?>
                                                </h6>
                                            </div>


                                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                                                <a href="info_formation.php?id=<?php echo $rowClasse['id_formation']?>"
                                                    class="btn btn-primary">Voir plus</a>
                                            </div>
                                        </div>


                                        <!-- <div>
                                            <p>
                                                <?php if ($rowClasse['debut'] <= date('Y-m-d')) { ?>
                                                <?php 
                                    ?>
                                            <div class='text-success'>Commencé</div>
                                            <?php

                                    }else{ ?>
                                            <?php
                                    ?>
                                            <div class='text-success'>En cours</div>
                                            <?php
                                    }?>
                                            </p>
                                        </div> -->

                                    </div>

                                </div>
                            </div>
                            </a>
                        </div>

                        <!-- </div> -->
                        <!--Fin Content Row -->

                        <?php   
                                    }
                                            } else {
                                           echo " <div style='margin-top: 25px;'>
                                                    <h2> Vous n'avez pas encore créé de classe !</h2>
                                           </div>";
                                            }
                                           ?>

                    </div>
                </div>
<button class="btn btn-success btn-block" type="button">Plus de cours</button>

            </div>
        </div>
    </div>

</div>