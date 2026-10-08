<!doctype html>
<html class="">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Untitled Document</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="../CSstyle/CStyle.css?v=<?php echo filemtime('../CSstyle/CStyle.css'); ?>"  rel="stylesheet" type="text/css">
<link rel="stylesheet" href="../detepicker/jquery-ui.css">
<!--<script src="../detepicker/jquery-ui.js"></script>-->
<script src="../js/respond.min.js"></script>
<script src="../js/main_page.js?v=<?php echo filemtime('../js/main_page.js'); ?>"></script>
<script src="../detepicker/external/jquery/jquery.js"></script>
<!--<script src="../css/jquery-3.2.1.min.js"></script>-->
<script src="../detepicker/jquery-ui.js"></script>
<script src="../js/functionScript.js?v=<?php echo filemtime('../js/functionScript.js'); ?>"></script>
<script src="../js/JsBarcode.all.min.js"></script>
<head>
</head>
<body>
<div>
    <button type="button" onclick="addTextAtCaret('textArea','Apple')">Insert Apple!</button>
    <button type="button" onclick="addTextAtCaret('textArea','Mango')">Insert Mango!</button>
    <button type="button" onclick="addTextAtCaret('textArea','Orange')">Insert Orange!</button>
</div>
<textarea id="textArea" rows="20" cols="50"></textarea>

<script type="text/javascript">
function addTextAtCaret(textAreaId, text) {
    var textArea = document.getElementById(textAreaId);
    var cursorPosition = textArea.selectionStart;
    addTextAtCursorPosition(textArea, cursorPosition, text);
    updateCursorPosition(cursorPosition, text, textArea);
}
function addTextAtCursorPosition(textArea, cursorPosition, text) {
    var front = (textArea.value).substring(0, cursorPosition);
    var back = (textArea.value).substring(cursorPosition, textArea.value.length);
    textArea.value = front + text + back;
}
function updateCursorPosition(cursorPosition, text, textArea) {
    cursorPosition = cursorPosition + text.length;
    textArea.selectionStart = cursorPosition;
    textArea.selectionEnd = cursorPosition;
    textArea.focus();    
}
</script>

</body>
</html>