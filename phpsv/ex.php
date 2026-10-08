<script type="text/javascript">
function nextbox(e, id) {
   // อ่าน keycode (cross browser)
    var keycode = e.which || e.keyCode;
    // ตรวจสอบ keycode (13 คือ กด enter)
    if (keycode == 13) {
        // ย้ายโฟกัสไปยัง input ที่ id
        document.getElementById(id).focus();
        // return false เพื่อยกเลิกการ submit form
        return false;
    }
}
</script>
<form method="post" action="test.php">
<input type="text" id="no1" onkeydown="return nextbox(event, 'no2');" />
<input type="text" id="no2" onkeydown="return nextbox(event, 'no3');" />
<input type="text" id="no3" />
<input type="submit" />
</form>