<div class="row">
  <select class="" name="drop_down" id="drop_down" onchange="changeOption()">
    <option value="0" <?php if($page == "edit"){echo "selected";} ?>>Edit/Extension</option>
    <option value="1">Upgrade</option>
    <option value="2">Renewal</option>
    <option value="3">Payment History</option>
  </select>
</div>

<script type="text/javascript">
  function changeOption() {
    var value = $("#drop_down").val();
    if (value == 0) {
      window.location.href = "<?php echo base_url(); ?>user/edit/<?php echo $userid; ?>"
    }
  }
</script>
