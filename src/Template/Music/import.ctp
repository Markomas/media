<?php include 'menu_admin.ctp'; ?>

<div class="well">
    <table class="table table-striped">

        <tbody>
            <?php foreach ($musiques_path as $index => $music): ?>
            <tr>
              <td>
                <?= $music ?>

              </td>
              <td>
                <?= $musiques_num[$index] ?>
              </td>
              <td>
                <?= $musiques_title[$index] ?>
              </td>
              <td>
                <?= $musiques_album[$index] ?>
              </td>
              <td>
                <?= $musiques_artist[$index] ?>
              </td>

              <td>
                <?php echo $musiques_ok[$index];
                 ?>

              </td>

            </tr>
            <?php endforeach; ?>

        </tbody>
    </table>

</div>
