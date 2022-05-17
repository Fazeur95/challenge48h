 <nav class="sidebar sidebar-offcanvas" id="sidebar">
     <ul class="nav">
         <li class="nav-item nav-profile">
             <?php
                $aid = $_SESSION['odmsaid'];
                $sql = "SELECT * from  tbladmin where ID=:aid";
                $query = $dbh->prepare($sql);
                $query->bindParam(':aid', $aid, PDO::PARAM_STR);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                $cnt = 1;
                if ($query->rowCount() > 0) {
                    foreach ($results as $row) {
                ?>
                     <a href="#" class="nav-link">
                         <div class="nav-profile-image">
                             <?php
                                if ($row->Photo == "avatar15.jpg") {
                                ?>
                                 <img class="img-avatar" src="assets/img/avatars/avatar15.jpg" alt="">
                             <?php
                                } else {
                                ?>
                                 <img class="img-avatar" src="assets/img/profileimages/<?php echo $row->Photo; ?>" alt="">
                             <?php
                                } ?>
                         </div>
                         <div class="nav-profile-text d-flex flex-column">
                             <span class="font-weight-bold mb-2"><?php echo $row->FirstName; ?> <?php echo $row->LastName; ?></span>
                             <?php
                                $sql = "SELECT * from  tblcompany ";
                                $query = $dbh->prepare($sql);
                                $query->execute();
                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                if ($query->rowCount() > 0) {
                                    foreach ($results as $row2) {
                                ?>
                                     <span class="text-secondary text-small"><?php echo $row2->companyname; ?></span>
                             <?php
                                    }
                                } ?>
                         </div>
                         <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                     </a>
             <?php
                    }
                } ?>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="dashboard.php">
                 <span class="menu-title">Tableau de bord</span>
                 <i class="mdi mdi-home menu-icon"></i>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="manage_event.php">
                 <span class="menu-title">Gérer les événements</span>
                 <i class="mdi mdi-steering menu-icon"></i>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="manage_service.php">
                 <span class="menu-title">Gérer les services</span>
                 <i class="mdi mdi-subway menu-icon"></i>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                 <span class="menu-title">Gestion des réservations</span>
                 <i class="menu-arrow"></i>
                 <i class="mdi mdi-archive menu-icon"></i>
             </a>
             <div class="collapse" id="ui-basic">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item"> <a class="nav-link" href="new_bookings.php">Nouvelles réservations</a></li>
                     <li class="nav-item"> <a class="nav-link" href="approved_bookings.php">Réservations approuvées</a></li>
                     <li class="nav-item"> <a class="nav-link" href="cancelled_bookings.php">Réservations annulées</a></li>
                 </ul>
             </div>
         </li>


         <li class="nav-item">
             <a class="nav-link" data-toggle="collapse" href="#companymanagement" aria-expanded="false" aria-controls="general-pages">
                 <span class="menu-title">Gestion d'entreprise</span>
                 <i class="menu-arrow"></i>
                 <i class="mdi mdi-bank menu-icon"></i>
             </a>
             <div class="collapse" id="companymanagement">

                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item"> <a class="nav-link" href="companyprofile.php">Profil de la société </a></li>
                 </ul>
             </div>
         </li>
         <?php
            $aid = $_SESSION['odmsaid'];
            $sql = "SELECT * from  tbladmin where ID=:aid";
            $query = $dbh->prepare($sql);
            $query->bindParam(':aid', $aid, PDO::PARAM_STR);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            $cnt = 1;
            if ($query->rowCount() > 0) {
                foreach ($results as $row) {
                    if ($row->AdminName == "Admin") {
            ?>
                     <li class="nav-item">
                         <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
                             <span class="menu-title">Gestion des utilisateurs</span>
                             <i class="menu-arrow"></i>
                             <i class="mdi mdi-account-multiple menu-icon"></i>
                         </a>
                         <div class="collapse" id="general-pages">

                             <ul class="nav flex-column sub-menu">
                                 <li class="nav-item"> <a class="nav-link" href="userregister.php">Enregistrer l'utilisateur </a></li> <?php
                                                                                                                                        $aid = $_SESSION['odmsaid'];
                                                                                                                                        $sql = "SELECT * from  tbladmin where ID=:aid";
                                                                                                                                        $query = $dbh->prepare($sql);
                                                                                                                                        $query->bindParam(':aid', $aid, PDO::PARAM_STR);
                                                                                                                                        $query->execute();
                                                                                                                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                                                                                                        $cnt = 1;
                                                                                                                                        if ($query->rowCount() > 0) {
                                                                                                                                            foreach ($results as $row) {
                                                                                                                                                if ($row->AdminName == "Admin") {
                                                                                                                                        ?>
                                             <li class="nav-item"> <a class="nav-link" href="user_permission.php"> Autorisations utilisateur</a></li>

                                 <?php
                                                                                                                                                }
                                                                                                                                            }
                                                                                                                                        } ?>
                             </ul>

                         </div>
                     </li>
         <?php
                    }
                }
            } ?>
         <li class="nav-item">
             <a class="nav-link" data-toggle="collapse" href="#reports" aria-expanded="false" aria-controls="ui-basic">
                 <span class="menu-title">Rapports</span>
                 <i class="menu-arrow"></i>
                 <i class="mdi mdi-database menu-icon"></i>
             </a>
             <div class="collapse" id="reports">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item"> <a class="nav-link" href="booking_report.php"> Rapports de réservation</a></li>
                     <li class="nav-item"> <a class="nav-link" href="btndates_report.php">Rapports de mises à jour</a></li>
                 </ul>
             </div>
         </li>
     </ul>
 </nav>