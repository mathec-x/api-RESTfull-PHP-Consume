<?php include "../../classes/Veic.class.php";

if (isset($_POST['delete'])) {
	
	$delete = new Veic;
	$delete->setDelete($_POST['delete']);	
}

if (isset($_POST['venda'])) {
	
	$delete = new Veic;
	$delete->setUpdate($_POST['venda'],$_POST['uid']);	
}

foreach (Veic::getContent() as $key) { 
$created = new DateTime($key['created']);
?>
<tr>
  <td><?php print $key['idveiculos'] ?></td>
  <td><?php print $key['descMarca'] ?></td>
  <td><?php print $key['ano'] ?></td>
  <td><?php print $key['descObs'] ?></td>
  <td><?php print $created->format("d/m/Y") ?></td>
  <td><?php print Veic::updated($key['updated']); ?></td>
  <td class="switch">
    <label>
      S
      <input type="checkbox" <?php Veic::specVenda($key['vendido']); ?> id="venda" data-uid="<?php print $key['idveiculos'] ?>">
      <span class="lever"></span>
      N
    </label>
  </td>
  <td><button class="btn-floating" onclick="remove(<?php print $key['idveiculos'] ?>)"><i class="material-icons">close</i></button></td>
</tr>

<?php  } ?>

<script>
  
$("input[id^=venda]").on('change',function() {
    let uid = $(this).attr("data-uid");
    let onOff = $(this).attr("checked") ? "N" : "S";
    
    $.ajax({
      url: 'views/veiculos/partialView.ui.php',
      type: 'POST',
      data: {
        venda : onOff,
        uid : uid,
      },
      success: function(data){
        $("#listaPartial").html(data);
      }
    })
});
</script>