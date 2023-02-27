<tbody>
                  <?php

                    $sql = "SELECT * FROM evenement where id_club = '$id_club'";
                    $querys = mysqli_query($con,$sql);
                    while ($rows = mysqli_fetch_assoc($querys)){
                      $id = $rows['id_evenement'];
                    echo("<tr>");
                    echo '<td>'.$i++.'</td>';
                    echo '<td>'.$rows["title_evenement"].'</td>';
                    echo '<td>'.$rows["description_evenement"].'</td>';
                    echo '<td>'.$rows["date_evenement"].'</td>';
                    echo '<td>'.$rows["lieu_evenement"].'</td>';
                  ?>
                      <td class="text-right">
                        <!-- Trigger the modal with a button -->
                        <button type="button" class="btn btn-info badge-pill" data-toggle="modal" data-target="#Modal_modifier_<?php echo $id; ?>">Modifier</button>
                        <!-- Modal -->
                        <div class="modal fade" id="Modal_modifier_<?php echo $id; ?>" role="dialog">
                          <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Modifier vos informations</h4>
                              </div>
                              <div class="modal-body">
                                <?php 
                                  $requet = "SELECT * FROM `evenement` where id_evenement='$id'";
                                  $querys = mysqli_query($con,$requet);
                                  $row = mysqli_fetch_assoc($querys);
                                  $id_club = $row['id_club'];
                                ?>
                                <div class="row">
                                  <div class="col-md-12 col-lg-12">
                                    <div class="tile">
                                      <h4 class="tile-title text-left">EVENEMENT INFORMATION</h4>
                                      <div class="tile-body text-left">
                                        <form action="modify_eve.php" method="POST">
                                            <label class="control-label">Titre de l'evenement</label>
                                            <input class="form-control" type="text" placeholder="Entrer le titre" name="titre_eve" value="<?php echo $row['title_evenement'] ?>">
                                            <label class="control-label">Date d'evenement</label>
                                            <input class="form-control" type="date" placeholder="Entrer la date d'evenement" name="date_eve" value="<?php echo $row['date_evenement'] ?>">
                                            <label class="control-label">Lieu de l'evenement</label>
                                            <input class="form-control" type="text" placeholder="Entrer le lieu" name="lieu_eve" value="<?php echo $row['lieu_evenement'] ?>">
                                            <label class="control-label">Description</label>
                                            <textarea  class="form-control" rows="4" placeholder="Enter your Description" name="description_eve" ><?php echo $row['description_evenement'] ?></textarea>
                                            <label class="control-label">Photo de l'evenement</label>
                                            <input class="form-control" type="file" name="photo_eve" accept="image/*">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <input type="hidden" name="id_evenement" value="<?php echo $id; ?>">
                                <input type="hidden" name="id_club" value="<?php echo $id_club; ?>">
                                <button type="submit" class="btn btn-info" >Changer</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Retour</button>
                              </form>
                              </div>
                              
                            </div>
                          </div>
                        </div>
                        <!-- Trigger the modal with a button -->
                        <button type="button" class="btn btn-danger badge-pill" data-toggle="modal" data-target="#Modal_supprimer_<?php echo $id; ?>">Supprimer</button>
                        <!-- Modal -->
                        <div class="modal fade" id="Modal_supprimer_<?php echo $id; ?>" role="dialog">
                          <div class="modal-dialog">
                          
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Attention</h4>
                              </div>
                              <div class="modal-body">
                                <p>Est ce que vous etes sur ?</p>
                              </div>
                              <div class="modal-footer">
                              <form action="delete_eve.php" method="POST">
                                <input type="hidden" name="id_eve" value="<?php echo $id;?>">
                                <button type="submit" class="btn btn-info" >Oui</button>
                              </form>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Non</button>
                              </div>
                            </div>
                          </div>
                        </div>
                     </td>
                    
                      <?php echo '</tr>'; ?>
                      <?php } ?>
                  </tbody>