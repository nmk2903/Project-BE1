<?php
include "header.php";
include "sidebar.php";
?>
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">General</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <?php
              $id;
              if (isset($_GET["id"])) {
                $id = $_GET["id"];
              }
              $value = $product->getProductById($id);
              ?>
              <div class="card-body">
                <div class="form-group">
                  <label for="inputName">Product Name</label>
                  <input type="text" id="inputName" class="form-control" value="<?php echo $value[0]["name"]; ?>">
                </div>
                <div class="form-group">
                  <label for="inputDescription">Product Description</label>
                  <textarea id="inputDescription" class="form-control" rows="4"><?php echo $value[0]["description"]; ?></textarea>
                </div>
                <div class="form-group">
                  <label for="inputStatus">Manu Id</label>
                  <select id="inputStatus" class="form-control custom-select">
                    <option disabled>Select one</option>
                    <?php
                    for ($i = 0; $i < 7; $i++) {
                      if ($i == $value[0]["manu_id"]) {
                        echo "<option selected>$i</option>";
                      } else {
                        echo "<option>$i</option>";
                      }
                    }
                    ?>
                  </select>
                </div><div class="form-group">
                  <label for="inputStatus">Type Id</label>
                  <select id="inputStatus" class="form-control custom-select">
                    <option disabled>Select one</option>
                    <?php
                    for ($i = 0; $i < 6; $i++) {
                      if ($i == $value[0]["manu_id"]) {
                        echo "<option selected>$i</option>";
                      } else {
                        echo "<option>$i</option>";
                      }
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputClientCompany">Price</label>
                  <input type="text" id="inputClientCompany" class="form-control" value="<?php echo $value[0]["price"]; ?>">
                </div>
                <div class="form-group">
                  <label for="inputProjectLeader">Created At</label>
                  <input type="text" id="inputProjectLeader" class="form-control" value="<?php echo $value[0]["created_at"]; ?>">
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-md-6">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Quanity</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="inputEstimatedBudget">Sold</label>
                  <input type="number" id="inputEstimatedBudget" class="form-control" value="<?php echo $value[0]["sold"] ?>" step="1">
                </div>
                <div class="form-group">
                  <label for="inputSpentBudget">In Stock</label>
                  <input type="number" id="inputSpentBudget" class="form-control" value="<?php echo $value[0]["in_stock"] ?>" step="1">
                </div>
                <!-- <div class="form-group">
                  <label for="inputEstimatedDuration">Estimated project duration</label>
                  <input type="number" id="inputEstimatedDuration" class="form-control" value="20" step="0.1">
                </div> -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Files</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th>File Name</th>
                      <th>File Size</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>

                    <tr>
                      <td><?php echo $value[0]["image"]; ?></td>
                      <td>49.8005 kb</td>
                      <td class="text-right py-0 align-middle">
                        <div class="btn-group btn-group-sm">
                          <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                          <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </div>
                      </td>
                    <!-- <tr>
                      <td>UAT.pdf</td>
                      <td>28.4883 kb</td>
                      <td class="text-right py-0 align-middle">
                        <div class="btn-group btn-group-sm">
                          <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                          <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </div>
                      </td>
                    <tr>
                      <td>Email-from-flatbal.mln</td>
                      <td>57.9003 kb</td>
                      <td class="text-right py-0 align-middle">
                        <div class="btn-group btn-group-sm">
                          <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                          <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </div>
                      </td>
                    <tr>
                      <td>Logo.png</td>
                      <td>50.5190 kb</td>
                      <td class="text-right py-0 align-middle">
                        <div class="btn-group btn-group-sm">
                          <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                          <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </div>
                      </td>
                    <tr>
                      <td>Contract-10_12_2014.docx</td>
                      <td>44.9715 kb</td>
                      <td class="text-right py-0 align-middle">
                        <div class="btn-group btn-group-sm">
                          <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                          <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </div>
                      </td> -->
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <a href="./projects.php" class="btn btn-secondary">Cancel</a>
            <input type="submit" value="Save Changes" class="btn btn-success float-right">
          </div>
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
<?php include "footer.php"; ?> 