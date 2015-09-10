//<![CDATA[
window.addEvent('domready', function() {


    function calcage(secs, num1, num2, starthtml, endhtml, singular, plural) {
        s = ((Math.floor(secs / num1)) % num2).toString();
        z = ((Math.floor(secs / num1)) % num2);
        if (LeadingZero && s.length < 2) {
            s = "0" + s;
        }
        return starthtml + '<div class="sp_countdown_int"> ' + s + '</div>' + '<div class="sp_countdown_string"> ' + ((z <= 1) ? singular : plural) + '</div>' + endhtml;
    }

    function CountBack(secs) {
        if (secs < 0) {
            document.getElementById("sp_countdown_cntdwn111").innerHTML = '<div class="sp_countdown_finishtext">' + FinishMessage + '</div>';
            return;
        }
        DisplayStr = DisplayFormat.replace(/%%D%%/g, calcage(secs, 86400, 100000,
            '<div class="sp_countdown_days">', '</div>', ' Day', ' Days'));
        DisplayStr = DisplayStr.replace(/%%H%%/g, calcage(secs, 3600, 24,
            '<div class="sp_countdown_hours">', '</div>', ' Hr', ' Hrs'));
        DisplayStr = DisplayStr.replace(/%%M%%/g, calcage(secs, 60, 60,
            '<div class="sp_countdown_mins">', '</div>', ' Min', ' Mins'));
        DisplayStr = DisplayStr.replace(/%%S%%/g, calcage(secs, 1, 60,
            '<div class="sp_countdown_secs">', '</div>', ' Sec', " Secs"));

        document.getElementById("sp_countdown_cntdwn111").innerHTML = DisplayStr;
        if (CountActive)
            setTimeout(function() {

                CountBack((secs + CountStepper))

            }, SetTimeOutPeriod);
    }

    function putspan(backcolor, forecolor) {

    }

    if (typeof(BackColor) == "undefined")
        BackColor = "";
    if (typeof(ForeColor) == "undefined")
        ForeColor = "";
    if (typeof(TargetDate) == "undefined")
        TargetDate = "12/18/2030 12:00 AM";
    if (typeof(DisplayFormat) == "undefined")
        DisplayFormat = "%%D%%  %%H%%  %%M%%  %%S%% ";
    if (typeof(CountActive) == "undefined")
        CountActive = true;
    if (typeof(FinishMessage) == "undefined")
        FinishMessage = "Finally we are here";
    if (typeof(CountStepper) != "number")
        CountStepper = -1;
    if (typeof(LeadingZero) == "undefined")
        LeadingZero = true;

    CountStepper = Math.ceil(CountStepper);
    if (CountStepper == 0)
        CountActive = false;
    var SetTimeOutPeriod = (Math.abs(CountStepper) - 1) * 1000 + 990;
    putspan(BackColor, ForeColor);
    var dthen = new Date(TargetDate);
    var dnow = new Date();
    if (CountStepper > 0)
        ddiff = new Date(dnow - dthen);
    else
        ddiff = new Date(dthen - dnow);
    gsecs = Math.floor(ddiff.valueOf() / 1000);
    CountBack(gsecs);
});
//]]>