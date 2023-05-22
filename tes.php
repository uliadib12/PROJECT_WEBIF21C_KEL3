<table class="card-event">
  <?php foreach ($penjadwalan as $dashboard) : ?>
    <tr>
      <td>
        <img src="<?= base_url('uploads/' . $dashboard['gambar']) ?>" class="gambar-event" alt="">
      </td>
      <td class="deskripsi-event">
        <span><b><?= $dashboard['Nama_Event']; ?></b></span><br>
        <span>Tanggal : <?= $dashboard['Tanggal']; ?></span><br>
        <span>Jam : <?= $dashboard['Jam']; ?></span><br>
        <span>Tempat : <?= $dashboard['Tempat']; ?></span><br>
      </td>
    </tr>
    <tr>
      <td>
        <span>Peserta : 50/50 </span>
      </td>
      <td class="details-event">
        <span>More Details<i class="bi bi-link-45deg"></i></span>
      </td>
    </tr>
  <?php endforeach; ?>
</table>
