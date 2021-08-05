<?php
    $title= "My Prescription Records | Nishka HMS";
    $page_name= "prescription";

    include_once '../config/db.php';
    include_once '../models/PrescriptionRecord.php';

    session_start();
    $user_name= $_SESSION["PATIENT_USERNAME"];

    // prescription record
    $prescription_record = new PrescriptionRecords();
    $prescription_record_list = $prescription_record->find_by_patient($user_name);
?>
<!DOCTYPE html>
<html>
  <?php
    include_once 'comps/head.php';
  ?>
  <body>
    <?php
      include_once 'comps/header.php';
    ?>
    <div class="pagearea">
      <div class="container">
        <div class="desktop-hide">
          <h4 class="center">Please Use Wide Screen For Records</h4>
        </div>
        <!-- Treatment Records -->
        <table>
          <thead>
            <tr>
                <td class="center" colspan="7">Presciption Records</td>
            </tr>

            <tr>
              <th>Doctor Name</th>
              <th>Appointment ID</th>
              <th>Treatment ID</th>
              <th>Medicine</th>
              <th>Dosage</th>
              <th>Duration</th>
              <th>Note</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($prescription_record_list as $prescription_row): ?>
            <tr>
              <td><?php echo ($prescription_row->dname); ?></td>
              <td><?php echo ($prescription_row->ap_id); ?></td>
              <td><?php echo ($prescription_row->tr_id); ?></td>
              <td><?php echo ($prescription_row->medicine); ?></td>
              <td><?php echo ($prescription_row->dosage); ?></td>
              <td><?php echo ($prescription_row->duration); ?></td>
              <td><?php echo ($prescription_row->note); ?></td>
            </tr>
            <?php endforeach;?>
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>
