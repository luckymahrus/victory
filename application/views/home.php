<style type="text/css">
    
    .ket{
      width: 100px;
      display: inline-block;
    }
</style>
        <div class="tile-group">
          <div class="tile-group-title"><div id="txt"></div></div>
            <div class="tile-container"><!--Container begin-->
              <div class="tile-wide bg-teal fg-white" data-role="tile">
                <div class="tile-content padding10">
                    <div class="tilehead" style="height: 40px;">
                        <h4 style="display: inline-block; float: left;"><span class="fa fa-dollar"></span> Kurs Hari Ini</h4>  
                        <a href="" class="button info btn-teal" style="float: right;">Edit</a>
                    </div>
                    <p><div class="ket">Dollar </div>: Rp 13.360 ,-</p>
                    <p><div class="ket">Gold </div>: Rp 568.000 ,- / gram</p>
                </div>
              </div>
            </div><!--Container ends-->
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
</script>