//$(document).ready(function() {
// Datepicker Popups calender to Choose date.
//$(function() {
//$("#datepicker").datepicker();
//});
//});

$(document).ready(function () {
    $("#selectDate").datepicker();
    /**
     * This function will validate all the fields in the "enterTime" form in the document.
     *
     * @var public STRING studentSelection,dateSelection,hrsSelection,minsSelection,reqError
     * @var public ARRAY formErrors
     * @args e event corresponding to submit
     * @return
     */
    $('#enterTime').on('submit', function (e) {
        e.preventDefault();
        var studentSelection = $('#selectStudent').val();
        var dateSelection = $('#selectDate').val();
        var hrsSelection = $('#selectHrs').val();
        var minsSelection = $('#selectMins').val();
        var reqError = "";
        if (!studentSelection) {
            reqError = reqError + "Please select STUDENT" + '\n';
        }
        if (!dateSelection) {
            reqError = reqError + "Please select DATE" + '\n';
        }
        if (!hrsSelection) {
            reqError = reqError + "Please select Hrs" + '\n';
        }
        if (!minsSelection) {
            reqError = reqError + "Please select Mins" + '\n';
        }
        if (reqError) {
            alert(reqError);
        }
        if (!reqError) {
            alert('Submitted');
            this.submit();
        }
    });

});
