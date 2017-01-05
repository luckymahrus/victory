<style type="text/css">
    .ket{
      width: 100px;
      display: inline-block;
    }
    .box-req{
      border: 3px solid #04BFBF;
    }
    .table.border,.table.bordered th, .table.bordered td,.table thead{
      border-color: #95a5a6;
    }
</style>

<div class="container-fluid">
  <div class="grid">
    <div class="row">
      <div class="cell">
      </div><!--Container ends-->
    </div>
	</div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    startTime();
  });

  

    function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        var d = today.getDate();
        var D = today.getDay();
        var M = today.getMonth();
        var Y = today.getFullYear();
        h = checkTime(h);
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('txt').innerHTML =
        getDayName(D) + ", "+ d + " " + getMonthName(M) + " " + Y + " " + h + ":" + m + ":" + s;
        var t = setTimeout(startTime, 500);
    }
    function checkTime(i) {
        if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
        return i;
    }

    <?php if($this->session->userdata('success')): ?>

       <?php echo $this->session->userdata('success') ?>

    <?php endif; ?>
</script>